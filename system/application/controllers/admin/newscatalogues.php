<?php
class Newscatalogues extends MY_Controller{
    function __construct()
    {
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>91));
        $this->load->library('login_manager');
    }
    function index()
    {
        $this->list_all();
    }
    function list_all()
    {
        $dis['base_url']=base_url();
        $newscatalogue =new newscatalogue();
        $newscatalogue->order_by('position','asc');
        $newscatalogue->get();
        $dis['view']='newscatalogue/list';
        $dis['menu_active']='Danh mục';
        $dis['title']="Danh mục tin tức";
        $dis['newscatalogue']=$newscatalogue;
        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm danh mục",
    				"link"=>"{$this->admin_url}newscatalogues/edit/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function list_by_catparent($catparent_id)
    {
        
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>91));
        $dis['base_url']=base_url();
        $newscatalogue =new newscatalogue();
        $newscatalogue->where('parentcat_id',$catparent_id);
        $newscatalogue->order_by('position','asc');
        $newscatalogue->get();
        $dis['view']='newscatalogue/list_by_parent';
        $dis['menu_active']='Danh mục tin tức';
        $dis['title']="Danh mục tin tức";
        $dis['newscatalogue']=$newscatalogue;
        $this->viewadmin($dis);
    }
    function edit($id=0)
    {
        $newscatalogue=new newscatalogue($id);
        if($_SERVER['REQUEST_METHOD']=="GET")
        {
        }
        else
        {
               $newscatalogue->name_vietnamese=$this->input->post('name_vietnamese');
               $newscatalogue->name_english=$this->input->post('name_english');
               $newscatalogue->name_japanese=$this->input->post('name_japanese');
               $parentcat=new newscatalogue(trim($this->input->post('parentcat')));
               $newscatalogue->title_bar=$this->input->post('title_bar');
               $newscatalogue->slogan=$this->input->post('slogan');
               $newscatalogue->keyword=$this->input->post('keyword');
               $newscatalogue->group=$this->input->post('group');
               if($this->logged_in_user->adminrole->id == 1)
               {
                   $newscatalogue->navigation=$this->input->post('navigation');
                   $newscatalogue->menu_active=$this->input->post('menu_active');
               }
               $this->load->helper('remove_vn_helper');
               $newscatalogue->name_none=remove_vn($newscatalogue->name_vietnamese);
               if($newscatalogue->save(array('parentcat'=>$parentcat)))
               {
                    redirect($this->admin.'newscatalogues/list_all/');
               }
        }
        $parentcat = new newscatalogue();
        $parentcat->where('parentcat_id',NULL);
        if($newscatalogue->exists())
        {
            $parentcat->where('id !=',$newscatalogue->id);
        }
        $parentcat->order_by('position','asc');
        $parentcat->get();
        
        $sitelanguage = new Sitelanguage();
        $sitelanguage->get()->all;
        $dis['sitelanguage']=$sitelanguage;
        
        
        $dis['base_url']=base_url();
        $dis['parentcat']=$parentcat;
        $dis['title']="Thêm/ Sửa danh mục tin tức";
        $dis['menu_active']="Danh mục tin tức";
        $dis['view']="newscatalogue/edit";
        $dis['object']=$newscatalogue;
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Back",
    				"link"=>"{$this->admin_url}newscatalogues/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
   
    function up_position($id,$step=1)
    {
        $o=new newscatalogue();
        $o->get_by_id($id);
        if(!$o->exists())
        {
            show_404("Không tìm thấy");
        }
        for($i=0;$i<$step;$i++)
        {
            $o->up_position();
        }
      redirect($this->admin.'newscatalogues/list_all/');
    }
    function down_position($id,$step=1)
    {
        $o=new newscatalogue();
        $o->get_by_id($id);
        if(!$o->exists())
        {
            show_404("Không tìm thấy");
        }
       for($i=0;$i<$step;$i++)
        {
            $o->down_position();
        }
          //  flash_message('warning','Không th? thay d?i v? trí du?c n?a ');
       redirect($this->admin.'newscatalogues/list_all/');
    }
    function delete()
    {
        $id=$this->uri->segment(4);
        $newscatalogue=new newscatalogue($id);
        //delete city
        if(count($newscatalogue->child->all)>0)
        {
            flash_message('error','không thể xóa menu gốc, vui lòng xóa menu con trước');
        }
        else
        {
            $newscatalogue->delete();
        }    
        //redirect to city
        redirect($this->admin.'newscatalogues/list_all/');
    }
}
/* End of file newscatalogues.php */
/* Location: ./application/controller/newscatalogues.php */
<?php
class estatetypes extends MY_Controller{
    function __construct()
    {
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>253));
        $this->load->library('login_manager');
    }


    function index()
    {
        $this->list_all();
    }


    function list_all($offset=0,$limit=20)
    {
        $types = new Estatetype();
        $types->order_by('position','asc');
        $types->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatecatalogues/list_all/',$types->paged->total_rows,$limit,4);
        $dis['types'] = $types;
        $dis['base_url'] = base_url();
        $dis['view']='estatetype/list_all';
        $dis['menu_active']='Hình thức';
        $dis['title']="Danh sách các loại";
        $dis['title_table'] = "Trang hiện tại:".$types->paged->current_page.'/'.$types->paged->total_pages;
        $this->viewadmin($dis);
    }


    function list_by_parent($id,$offset=0,$limit=20)
    {
        $catalogue = new Estatecatalogue($id);
        
        $types = new Estatetype();
        $types->where('estatecatalogue_id',$id);
        $types->order_by('position','asc');
        $types->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatetypes/list_by_parent/',$types->paged->total_rows,$limit,5);
        $dis['types'] = $types;
        $dis['catalogue'] = $catalogue;
        $dis['base_url'] = base_url();
        $dis['view']='estatetype/list_by_parent';
        $dis['menu_active']='Hình thức';
        $dis['title']="Danh sách các loại thuộc <span style='color:#F00;'>".$catalogue->name.'</span>';
        $dis['title_table'] = "Trang hiện tại:".$types->paged->current_page.'/'.$types->paged->total_pages;
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatecatalogues/list_all/",
    				"onclick"=>""		
    			),
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatetypes/edit_by_parent/".$catalogue->id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }


    function edit_by_parent($catalogue_id,$id=0)
    {
        $catalogue = new Estatecatalogue($catalogue_id);
        
        $type = new Estatetype($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $type->name = $this->input->post('name');
            $type->name_none = remove_vn($type->name);
            $type->estatecatalogue_id = $catalogue_id;
            $type->description = $this->input->post('description');
            $type->keyword = $this->input->post('keyword');
            if($type->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estatetypes/list_by_parent/'.$catalogue_id);
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $type;
        $dis['catalogue_id'] = $catalogue_id;
        $dis['base_url'] = base_url();
        $dis['view']='estatetype/edit';
        $dis['menu_active']='Hình thức';
        $dis['title']="Thêm/Sửa loại thuộc <span style='color:#F00;'>".$catalogue->name."</span>";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatetypes/list_by_parent/".$catalogue_id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }


    function delete_by_parent()
    {
        $id=$this->uri->segment(5);
        $catalogue_id=$this->uri->segment(4);
        $type= new Estatetype($id);
        //delete catalogue
        $type->delete();
        flash_message('success','Xóa thành công.');    
        //redirect to catalogue
        redirect($this->admin.'estatetypes/list_by_parent/'.$catalogue_id);
    }


    function delete()
    {
        $id=$this->uri->segment(4);
        $type= new Estatetype($id);
        //delete catalogue
        $type->delete();
        flash_message('success','Xóa thành công.');    
        //redirect to catalogue
        redirect($this->admin.'estatetypes/list_all');
    }

    function updatePosition(){

        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $estateareas = new Estatetype();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $estateareas->where("id",$idList[$i]);
            $estateareas->get();

            $estateareas->position = $positionList[$i];
            $estateareas->save();
            $estateareas->clear();
        }
        redirect($_SERVER['HTTP_REFERER']);

    }
}
/* End of file estatetypes.php */
/* Location: ./application/controller/estatetypes.php */
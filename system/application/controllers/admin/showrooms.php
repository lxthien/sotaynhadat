<?php
class showrooms extends MY_Controller{
    function __construct()
    {
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>246));
        $this->load->library('login_manager');
    }
    function index()
    {
        $this->listAll();
    }
    function listAll($offset=0,$limit=20)
    {
        $dis['base_url']=base_url();
        $showrooms =new showroom();
        $showrooms->order_by('position');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $showrooms->distinct();
            $showrooms->group_start();
            $showrooms->like('name_vietnamese',$searchKey);
            $showrooms->group_end();
        }
        $showrooms->get_paged($offset, $limit, TRUE);
        setPagination($this->admin.'levels/listAll/',$showrooms->paged->total_rows,$limit,4);

        $showrooms->order_by('position','asc');
        $showrooms->get();
        $dis['view']='showroom/list';
        $dis['menu_active']="Showroom";
        $dis['title_table']="Showroom";
        $dis['showrooms']=$showrooms;
        $dis['nav_menu']=array(
            array(
                "type"=>"add",
                "text"=>"Thêm showroom",
                "link"=>"{$this->admin_url}showrooms/edit/0",
                "onclick"=>""
            )
         );
        $this->viewadmin($dis);
    }

    function edit($id=0)
    {
        $showrooms=new showroom($id);
        if($_SERVER['REQUEST_METHOD']=="GET"){
        }
        else{
            $showrooms->name_vietnamese=$this->input->post('name_vietnamese');
            $showrooms->name_english=$this->input->post('name_english');
            
            $showrooms->kind=$this->input->post('kind');
            $showrooms->description=$this->input->post('description');
            $showrooms->keyword=$this->input->post('keyword');
            
            $showrooms->txtDescription_vietnamese=$this->input->post('txtDescription_vietnamese');
            $showrooms->txtDescription_english=$this->input->post('txtDescription_english');
            
            $showrooms->video=$this->input->post('video');
            $this->load->helper('remove_vn_helper');
            $showrooms->name_none=remove_vn($showrooms->name_vietnamese);
            $filePath = 'img/showroom/';
            $this->load->library('file_lib');
            $dataupload=$this->file_lib->upload('image', $filePath);
            if(is_array($dataupload)){
                $showrooms->image = $filePath . $dataupload['file_name'];
            }
            if($showrooms->save()){
                redirect($this->admin.'showrooms/listAll');
            }
        }
        

        $photos = new showroomphoto();
        $photos->where('showroom_id', $id);
        $photos->get_iterated();
        $dis['photos'] = $photos;


        $dis['base_url']=base_url();
        $dis['title']="Thêm/ Sửa Showroom";
        $dis['menu_active']="Showroom";
        $dis['view']="showroom/edit";
        $dis['object']=$showrooms;
        $dis['nav_menu']=array(
            array(
                "type"=>"back",
                "text"=>"Quay về",
                "link"=>"{$this->admin_url}showrooms/",
                "onclick"=>""
            ),
            array(
                "type"=>"add",
                "text"=>"Thêm Showroomphoto",
                "link"=>"{$this->admin_url}showroomphotos/edit/".$id,
                "onclick"=>""
            )
         );
        $this->viewadmin($dis);
    }
   
    function up_position($id,$step=1)
    {
        $o=new bannercat();
        $o->get_by_id($id);
        if(!$o->exists())
        {
            show_404("Không tìm thấy");
        }
        for($i=0;$i<$step;$i++)
        {
            $o->up_position();
        }
      redirect($this->admin.'bannercats/list_all/');
    }
    function down_position($id,$step=1)
    {
        $o=new bannercat();
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
       redirect($this->admin.'bannercats/list_all/');
    }
    function up_position_image($id,$bannercat_id,$step=1)
    {
        $o=new banner();
        $o->get_by_id($id);
        if(!$o->exists())
        {
            show_404("Không tìm thấy");
        }
        for($i=0;$i<$step;$i++)
        {
            $o->up_position();
        }
      redirect($this->admin.'bannercats/list_image/'.$bannercat_id);
    }
    function down_position_image($id,$bannercat_id,$step=1)
    {
        $o=new banner();
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
       redirect($this->admin.'bannercats/list_image/'.$bannercat_id);
    }
    function delete()
    {
        $this->checkRole(array(1));
        $id=$this->uri->segment(4);
        if($id != 1 && $id != 19)
        {
            $bannercat=new bannercat($id);
            //delete city
            if(count($bannercat->child->all)>0)
            {
                flash_message('error','không thể xóa menu gốc, vui lòng xóa menu con trước');
            }
            else
            {
                $bannercat->delete();
            }    
            //redirect to city
        }
        else
        {
            flash_message('error','không thể xóa danh mục này');
        }
        redirect($this->admin.'bannercats/list_all/');
    }
    
    
    function list_image($bannercat_id)
    {
        
        $bannercat=new bannercat($bannercat_id);
        $banner=new banner();
        $banner->where('bannercat_id',$bannercat_id);
        $banner->order_by('position','asc');
        $banner->get_iterated();        
        if(!$bannercat->exists())
            show_404();
        $dis['base_url']=base_url();
        $dis['view']='banner/list_image';
        $dis['bannercat']=$bannercat;
        $dis['menu_active']="Photos";
        $dis['title']="Hình ảnh của {$bannercat->name}";
        $dis['title_table']="Hình ảnh của {$bannercat->name}";
        $dis['banner'] = $banner;
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}bannercats/list_all/",
    				"onclick"=>""		
    			)
                ,
                array(
    				"type"=>"add",
    				"text"=>"Thêm banner",
    				"link"=>"{$this->admin_url}banners/edit/".$bannercat_id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function add_image($bannercat_id)
    {
        $this->load->library('file_lib');
        $bannercat = new bannercat($bannercat_id);
        $dataupload=$this->file_lib->upload('image',"img/banner");
        $this->resize_image("img/banner/".$dataupload['file_name'],200,100);
        if(!is_array($dataupload)){
            flash_message('error',"Hình ảnh :".$dataupload);
            $flag_error= true;
        }
        else{
            $banner = new banner();
            $banner->link = $dataupload['file_name'];
            $banner->title = $this->input->post('title');
            $banner->bannercat_id = $bannercat_id;
            $banner->save();
        }
        redirect($this->admin_url."bannercats/list_image/".$bannercat_id);
    }
    function edit_image($bannercat_id,$banner_id)
    {
        $bannercat = new bannercat($bannercat_id);
        $banner = new banner($banner_id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->library('file_lib');
            $dataupload=$this->file_lib->upload('image',"img/banner");
            $this->resize_image("img/banner/".$dataupload['file_name'],200,100);
            if(!is_array($dataupload)){
                flash_message('error',"Hình ảnh :".$dataupload);
                $flag_error= true;
            }
            else{
                $banner->link = $dataupload['file_name'];
                $banner->title = $this->input->post('title');
                $banner->bannercat_id = $bannercat_id;
                $banner->save();
                flash_message('success','Cập nhật thành công');
            }
        }
        $dis['base_url']=base_url();
        $dis['view']='banner/edit_image';
        $dis['bannercat']=$bannercat;
        $dis['menu_active']="Banner";
        $dis['title']="Sửa hình ảnh";
        $dis['title_table']="Sửa hình ảnh";
        $dis['banner'] = $banner;
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}bannercats/list_image/".$bannercat_id,
    				"onclick"=>""		
    			)
         );
         $this->viewadmin($dis);
    }
    function delete_image($bannercat_id,$banner_id)
    {
        $this->load->library('file_lib');
        $bannercat = new bannercat($bannercat_id);
        $banner = new banner($banner_id);
        if(!$bannercat->exists())
            show_404();
        if($banner->isCanNotDelete == 1){
            flash_message('error','Không thể xóa banner này');
        }
        else{
            $banner->delete();
            flash_message('success','Xóa thành công');
        }
        redirect($this->admin_url."bannercats/list_image/".$bannercat_id);
    }
     function resize_image($file_link,$width,$height)
    {
      
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file_link;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['quality'] = '100%';
        $config['thumb_marker'] = "_thump";
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->image_lib->clear();          
      //  return null;
    }
}
/* End of file bannercats.php */
/* Location: ./application/controller/bannercats.php */
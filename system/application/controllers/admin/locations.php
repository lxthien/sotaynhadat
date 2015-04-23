<?php
Class Locations extends MY_Controller{
    
    function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>232));
        $this->load->library('login_manager');
    }
     
    
    function index(){
        $this->listAll();
    }
    
    
    function listAll($offset=0,$limit=50){
        $locations = new Province();
        $locations->order_by('position');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $locations->distinct();
            $locations->group_start();
            $locations->like('name',$searchKey);
            $locations->group_end();
        }
        $locations->get_paged($offset, $limit, TRUE);
        setPagination($this->admin.'locations/listAll/',$locations->paged->total_rows,$limit,4);
        
        $dis['base_url']=base_url();
        $dis['view']='location/list';
        $dis['locations']=$locations;
        $dis['searchKey'] = $searchKey;
        $dis['menu_active']="Tỉnh thành";
        $dis['title_table']="Trang hiện tại:".$levels->paged->current_page.'/'.$levels->paged->total_pages;
        $dis['title']="Danh sách Locations";
        $dis['nav_menu']=array(
                array(
    				"type"=>"add",
    				"text"=>"Thêm Location",
    				"link"=>"{$this->admin_url}locations/edit/0",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function edit($id=0){
        $locations = new Province($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        }
        else{
            $locations->name = $this->input->post('name');
            if($locations->save()){
                flash_message('success', 'Thành công. Thao tác đã được thực hiện.');
                redirect($this->admin.'locations/edit/'.$locations->id);
            }
            else{
                flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
                redirect($this->admin_url.'locations/listAll');
            }
        }
        
        $sitelanguage = new Sitelanguage();
        $sitelanguage->order_by('position');
        $sitelanguage->get()->all;
        $dis['sitelanguage'] = $sitelanguage;
        
        $dis['base_url']=base_url();
        $dis['view']='location/edit';
        $dis['object']=$locations;
        $dis['menu_active']="Tỉnh thành";
        $dis['title']="Thêm/sửa Locations";
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}locations/listAll",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function delete($id){
        $o = new Province($id);
        if($o->delete()){
            flash_message('success', 'Locations đã được xóa thành công');
            redirect($this->admin_url.'locations/listAll');
        }
        else{
            flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
            redirect($this->admin_url.'locations/listAll');
        }
    }
    
    function updatePosition(){
        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $locations = new Province();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $locations->where("id",$idList[$i]);
            $locations->get();
        
            $locations->position = $positionList[$i];
            $locations->save();
            $locations->clear();
        }
        redirect("admin/locations/listAll/");
    }
}
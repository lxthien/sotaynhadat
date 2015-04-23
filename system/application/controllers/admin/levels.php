<?php
Class Levels extends MY_Controller{
    
    function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>232));
        $this->load->library('login_manager');
    }
     
    
    function index(){
        $this->listAll();
    }
    
    
    function listAll($offset=0,$limit=20){
        $levels = new Level();
        $levels->order_by('position');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $levels->distinct();
            $levels->group_start();
            $levels->like('name_vietnamese',$searchKey);
            $levels->group_end();
        }
        $levels->get_paged($offset, $limit, TRUE);
        setPagination($this->admin.'levels/listAll/',$levels->paged->total_rows,$limit,4);
        
        $dis['base_url']=base_url();
        $dis['view']='level/list';
        $dis['levels']=$levels;
        $dis['searchKey'] = $searchKey;
        $dis['menu_active']="Trình độ";
        $dis['title_table']="Trang hiện tại:".$levels->paged->current_page.'/'.$levels->paged->total_pages;
        $dis['title']="Danh sách levels";
        $dis['nav_menu']=array(
                array(
    				"type"=>"add",
    				"text"=>"Thêm level",
    				"link"=>"{$this->admin_url}levels/edit/0",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function edit($id=0){
        $levels = new Level($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        }
        else{
            $levels->name_vietnamese = $this->input->post('name_vietnamese');
            $levels->name_english    = $this->input->post('name_english');
            $levels->name_japanese   = $this->input->post('name_japanese');
            if($levels->save()){
                flash_message('success', 'Thành công. Thao tác đã được thực hiện.');
                redirect($this->admin.'levels/edit/'.$levels->id);
            }
            else{
                flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
                redirect($this->admin_url.'levels/listAll');
            }
        }
        
        $sitelanguage = new Sitelanguage();
        $sitelanguage->order_by('position');
        $sitelanguage->get()->all;
        $dis['sitelanguage'] = $sitelanguage;
        
        $dis['base_url']=base_url();
        $dis['view']='level/edit';
        $dis['object']=$levels;
        $dis['menu_active']="Trình độ";
        $dis['title']="Thêm/sửa Levels";
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}levels/listAll",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function delete($id){
        $o = new Level($id);
        if($o->delete()){
            flash_message('success', 'Level đã được xóa thành công');
            redirect($this->admin_url.'levels/listAll');
        }
        else{
            flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
            redirect($this->admin_url.'levels/listAll');
        }
    }
    
    function updatePosition(){
        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $levels = new Level();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $levels->where("id",$idList[$i]);
            $levels->get();
        
            $levels->position = $positionList[$i];
            $levels->save();
            $levels->clear();
        }
        redirect("admin/levels/listAll/");
    }
}
<?php
Class Experiences extends MY_Controller{
    
    function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>232));
        $this->load->library('login_manager');
    }
     
    
    function index(){
        $this->listAll();
    }
    
    
    function listAll($offset=0,$limit=20){
        $experiences = new Experience();
        $experiences->order_by('position');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $experiences->distinct();
            $experiences->group_start();
            $experiences->like('name_vietnamese',$searchKey);
            $experiences->group_end();
        }
        $experiences->get_paged($offset, $limit, TRUE);
        setPagination($this->admin.'levels/listAll/',$experiences->paged->total_rows,$limit,4);
        
        $dis['base_url']=base_url();
        $dis['view']='experience/list';
        $dis['experiences']=$experiences;
        $dis['searchKey'] = $searchKey;
        $dis['menu_active']="Kinh nghiệm";
        $dis['title_table']="Trang hiện tại:".$experiences->paged->current_page.'/'.$experiences->paged->total_pages;
        $dis['title']="Danh sách 'Kinh nghiệm'";
        $dis['nav_menu']=array(
                array(
    				"type"=>"add",
    				"text"=>"Thêm kinh nghiệm",
    				"link"=>"{$this->admin_url}experiences/edit/0",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function edit($id=0){
        $experiences = new Experience($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        }
        else{
            $experiences->name_vietnamese = $this->input->post('name_vietnamese');
            $experiences->name_english    = $this->input->post('name_english');
            $experiences->name_japanese   = $this->input->post('name_japanese');
            if($experiences->save()){
                flash_message('success', 'Thành công. Thao tác đã được thực hiện.');
                redirect($this->admin.'experiences/edit/'.$experiences->id);
            }
            else{
                flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
                redirect($this->admin_url.'experiences/listAll');
            }
        }
        
        $sitelanguage = new Sitelanguage();
        $sitelanguage->order_by('position');
        $sitelanguage->get()->all;
        $dis['sitelanguage'] = $sitelanguage;
        
        $dis['base_url']=base_url();
        $dis['view']='experience/edit';
        $dis['object']=$experiences;
        $dis['menu_active']="Kinh nghiệm";
        $dis['title']="Thêm/sửa Kinh nghiệm";
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}experiences/listAll",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function delete($id){
        $o = new Experience($id);
        if($o->delete()){
            flash_message('success', 'Level đã được xóa thành công');
            redirect($this->admin_url.'experiences/listAll');
        }
        else{
            flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
            redirect($this->admin_url.'experiences/listAll');
        }
    }
    
    function updatePosition(){
        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $o = new Experience();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $o->where("id",$idList[$i]);
            $o->get();
        
            $o->position = $positionList[$i];
            $o->save();
            $o->clear();
        }
        redirect("admin/experiences/listAll/");
    }
}
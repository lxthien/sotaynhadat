<?php
Class Jobsmethods extends MY_Controller{
    
    function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>232));
        $this->load->library('login_manager');
    }
     
    
    function index(){
        $this->listAll();
    }
    
    
    function listAll($offset=0,$limit=20){
        $jobmethods = new Jobsmethod();
        $jobmethods->order_by('position');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $jobmethods->distinct();
            $jobmethods->group_start();
            $jobmethods->like('name_vietnamese',$searchKey);
            $jobmethods->group_end();
        }
        $jobmethods->get_paged($offset, $limit, TRUE);
        setPagination($this->admin.'levels/listAll/',$jobmethods->paged->total_rows,$limit,4);
        
        $dis['base_url']=base_url();
        $dis['view']='jobsmethod/list';
        $dis['jobmethods']=$jobmethods;
        $dis['searchKey'] = $searchKey;
        $dis['menu_active']="Phương thức làm việc";
        $dis['title_table']="Trang hiện tại:".$jobmethods->paged->current_page.'/'.$jobmethods->paged->total_pages;
        $dis['title']="Danh sách 'Phương thức làm việc'";
        $dis['nav_menu']=array(
                array(
    				"type"=>"add",
    				"text"=>"Thêm jobsmethods",
    				"link"=>"{$this->admin_url}jobsmethods/edit/0",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function edit($id=0){
        $jobsmethods = new Jobsmethod($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        }
        else{
            $jobsmethods->name_vietnamese = $this->input->post('name_vietnamese');
            $jobsmethods->name_english    = $this->input->post('name_english');
            $jobsmethods->name_japanese   = $this->input->post('name_japanese');
            if($jobsmethods->save()){
                flash_message('success', 'Thành công. Thao tác đã được thực hiện.');
                redirect($this->admin.'jobsmethods/edit/'.$jobsmethods->id);
            }
            else{
                flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
                redirect($this->admin_url.'jobsmethods/listAll');
            }
        }
        
        $sitelanguage = new Sitelanguage();
        $sitelanguage->order_by('position');
        $sitelanguage->get()->all;
        $dis['sitelanguage'] = $sitelanguage;
        
        $dis['base_url']=base_url();
        $dis['view']='jobsmethod/edit';
        $dis['object']=$jobsmethods;
        $dis['menu_active']="Phương thức làm việc";
        $dis['title']="Thêm/sửa Jobsmethods";
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}jobsmethods/listAll",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
    }
    
    function delete($id){
        $o = new Jobsmethod($id);
        if($o->delete()){
            flash_message('success', 'Phương thức làm việc đã được xóa thành công');
            redirect($this->admin_url.'jobsmethods/listAll');
        }
        else{
            flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
            redirect($this->admin_url.'jobsmethods/listAll');
        }
    }
    
    function updatePosition(){
        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $jobsmethods = new Jobsmethod();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $jobsmethods->where("id",$idList[$i]);
            $jobsmethods->get();
        
            $jobsmethods->position = $positionList[$i];
            $jobsmethods->save();
            $jobsmethods->clear();
        }
        redirect("admin/jobsmethods/listAll/");
    }
}
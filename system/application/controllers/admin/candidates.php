<?php
Class Candidates extends MY_Controller{
    
    function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>232));
        $this->load->library('login_manager');
    }
    
    function index(){
        $this->listAll();
    }
    
    function listAll($offset=0, $limit=30){
        $candidates = new Candidate();
        $candidates->order_by('position', 'desc');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $candidates->distinct();
            $candidates->group_start();
            $candidates->like('lastname',$searchKey);
            $candidates->group_end();
        }
        $candidates->get_paged($offset, $limit, TRUE);
        setPagination($this->admin.'candidates/listAll/',$candidates->paged->total_rows,$limit,4);
        
        $dis['base_url']=base_url();
        $dis['view']='candidate/list';
        $dis['candidates']=$candidates;
        $dis['searchKey'] = $searchKey;
        $dis['menu_active']="Ứng viên";
        $dis['title_table']="Trang hiện tại:".$candidates->paged->current_page.'/'.$candidates->paged->total_pages;
        $dis['title']="Danh sách 'Ứng viên'";
        

        $this->viewadmin($dis);
    }
}
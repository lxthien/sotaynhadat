<?php

Class Jobscats extends MY_Controller{
    /**
     * Jobscats::__constructor()
     * 
     * @return
     */
     function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>232));
        $this->load->library('login_manager');
     }
     /**
     * Jobscats::index()
     * 
     * @return
     */
     function index(){
        $this->list_all();
     }
     
     /**
     * Jobscats::listAll()
     * 
     * @return
     */
     function listAll(){
        $jobscats = new Jobscat();
        $jobscats->order_by('name_vietnamese', 'asc');
        $searchKey = "";
        if($_SERVER['METHOD_REQUEST']=='GET'){
        }
        else{
            $searchKey = $this->input->post("search_name");
            $jobscats->distinct();
            $jobscats->group_start();
            $jobscats->like('name_vietnamese',$searchKey);
            $jobscats->group_end();
        }
        $jobscats->get()->all;
        
        
        $dis['base_url']=base_url();
        $dis['view']='jobscat/list';
        $dis['jobscats']=$jobscats;
        $dis['searchKey'] = $searchKey;
        $dis['menu_active']="Danh mục công việc";
        $dis['title_table']="Trang hiện tại";
        $dis['title']="Tất cả danh mục công việc";
        $dis['nav_menu']=array(
                array(
    				"type"=>"add",
    				"text"=>"Thêm danh mục",
    				"link"=>"{$this->admin_url}jobscats/edit/0",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
     }
     
     /**
     * Jobscats::edit()
     * @param integer $id
     * @return
     */
     function edit($id=0){
        $jobscat = new Jobscat($id);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        }
        else{
            $jobscat->name_vietnamese = $this->input->post('name_vietnamese');
            $jobscat->name_english    = $this->input->post('name_english');
            $jobscat->name_japanese   = $this->input->post('name_japanese');
            $jobscat->url = $this->input->post('url');
            $jobscat->description_vietnamese = $this->input->post('description_vietnamese');
            $jobscat->description_english    = $this->input->post('description_english');
            $jobscat->description_japanese   = $this->input->post('description_japanese');
            $jobscat->keyword_vietnamese     = $this->input->post('keyword_vietnamese');
            $jobscat->keyword_english        = $this->input->post('keyword_english');
            $jobscat->keyword_japanese       = $this->input->post('keyword_japanese');
            if($jobscat->save()){
                flash_message('success', 'Thành công. Thao tác đã được thực hiện.');
                redirect($this->admin.'jobscats/edit/'.$jobscat->id);
            }
            else{
                flash_message('error', 'Có lỗi. Vui lòng kiểm tra lại');
                redirect($this->admin_url.'jobscats/listAll');
            }
        }
        $sitelanguage = new Sitelanguage();
        $sitelanguage->order_by('position');
        $sitelanguage->get()->all;
        $dis['sitelanguage'] = $sitelanguage;
        
        $dis['base_url']=base_url();
        $dis['view']='jobscat/edit';
        $dis['object']=$jobscat;
        $dis['menu_active']="Danh mục công việc";
        //$dis['title_table']="Trang hiện tại";
        $dis['title']="Thêm/sửa danh mục";
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}jobscats/listAll",
    				"onclick"=>""		
    			)
         );

        $this->viewadmin($dis);
     }
     
     /**
     * Jobscats::delete()
     * @param integer $id
     * @return
     */
     function delete($id){
        $jobscat = new Jobscat($id);
        if($jobscat->delete()){
            flash_message('success', 'Danh mục công việc đã được xóa thành công');
            redirect($this->admin_url.'jobscats/listAll');
        }
     }
}
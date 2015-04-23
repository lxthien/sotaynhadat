<?php
class estateareas extends MY_Controller{
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
        $areas = new Estatearea();
        $areas->order_by('position','asc');
        $areas->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estateareas/list_all/',$areas->paged->total_rows,$limit,4);
        $dis['areas'] = $areas;
        $dis['base_url'] = base_url();
        $dis['view']='estatearea/list_all';
        $dis['menu_active']='Diện tích';
        $dis['title']="Danh sách các Diện tích";
        $dis['title_table'] = "Trang hiện tại:".$areas->paged->current_page.'/'.$areas->paged->total_pages;
        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estateareas/edit/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function edit($id=0)
    {
        $area = new Estatearea($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $area->label = $this->input->post('label');
            $area->from = $this->input->post('from');
            $area->to = $this->input->post('to');
            $area->url = remove_vn($area->label);

            if($area->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estateareas/list_all');
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $area;
        $dis['base_url'] = base_url();
        $dis['view']='estatearea/edit';
        $dis['menu_active']='Diện tích';
        $dis['title']="Thêm/Sửa Diện tích";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estateareas/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function delete()
    {
        $id=$this->uri->segment(4);
        $area = new Estatearea($id);
        //delete area
        $area->delete();
        flash_message('success','Xóa thành công');    
        //redirect to area
        redirect($this->admin.'estateareas/list_all');
    }

    function updatePosition(){

        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $estateareas = new Estatearea();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $estateareas->where("id",$idList[$i]);
            $estateareas->get();

            $estateareas->position = $positionList[$i];
            $estateareas->save();
            $estateareas->clear();
        }
        redirect("admin/estateareas/list_all");

    }
}
/* End of file estateareas.php */
/* Location: ./application/controller/estateareas.php */
<?php
class estatedirections extends MY_Controller{
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
    function list_all($offset=0,$limit=10)
    {
        $directions = new Estatedirection();
        $directions->order_by('id','desc');
        $directions->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatedirections/list_all/',$directions->paged->total_rows,$limit,4);
        $dis['directions'] = $directions;
        $dis['base_url'] = base_url();
        $dis['view']='estatedirection/list_all';
        $dis['menu_active']='Hướng';
        $dis['title']="Danh sách các Hướng";
        $dis['title_table'] = "Trang hiện tại:".$directions->paged->current_page.'/'.$directions->paged->total_pages;
        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatedirections/edit/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function edit($id=0)
    {
        $direction = new Estatedirection($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $direction->name = $this->input->post('name');
            if($direction->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estatedirections/list_all');
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $direction;
        $dis['base_url'] = base_url();
        $dis['view']='estatedirection/edit';
        $dis['menu_active']='Hướng';
        $dis['title']="Thêm/Sửa Hướng";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatedirections/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function delete()
    {
        $id=$this->uri->segment(4);
        $direction = new Estatedirection($id);
        //delete direction
        $direction->delete();
        flash_message('success','Xóa thành công');    
        //redirect to direction
        redirect($this->admin.'estatedirections/list_all');
    }
}
/* End of file estatedirections.php */
/* Location: ./application/controller/estatedirections.php */
<?php
class estatecitys extends MY_Controller{
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
    function list_all($offset=0,$limit=100)
    {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            foreach($_POST as $key =>$value)
            {                                     
                if(substr($key,0,8) == "position")
                {
                    if(trim($this->input->post($key)) != "")
                    {
                        $keylist = explode("_",$key);
                        $cityId = $keylist[1];
                        $city = new Estatecity($cityId);
                        $city->position = $this->input->post($key);
                        $city->save();
                        $city->clear();
                    }
                }
            }
            flash_message('success','Cập nhật thành công.');
            redirect($this->admin.'estatecitys/list_all/');    
        }
        $citys = new Estatecity();
        $citys->order_by('position','asc');
        $citys->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatecitys/list_all/',$citys->paged->total_rows,$limit,4);
        $dis['citys'] = $citys;
        $dis['base_url'] = base_url();
        $dis['view']='estatecity/list_all';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Danh sách các Thành phố/Tỉnh";
        $dis['title_table'] = "Trang hiện tại:".$citys->paged->current_page.'/'.$citys->paged->total_pages;
        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatecitys/edit/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function edit($id=0)
    {
        $city = new Estatecity($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $city->name = $this->input->post('name');
            $city->name_none = remove_vn($city->name);
            if($this->input->post('isDefault') == 1)
            {
                $city->isDefault = 1;
                $city->position = $this->input->post('position');
            }
            else
            {
                $city->isDefault = 0;
            }
            if($city->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estatecitys/list_all');
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $city;
        $dis['base_url'] = base_url();
        $dis['view']='estatecity/edit';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Thêm/Sửa Thành phố/Tỉnh";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatecitys/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function delete()
    {
        $id=$this->uri->segment(4);
        $city = new Estatecity($id);
        //delete city
        if(count($city->estatedistrict->all)>0)
        {
            flash_message('error','Không thể xóa Thành phố/Tỉnh, vui lòng xóa Quận/Huyện trước');
        }
        else
        {
            $city->delete();
            flash_message('success','Xóa Thành phố/Tỉnh thành công');
        } 
        //redirect to city
        redirect($this->admin.'estatecitys/list_all');
    }
}
/* End of file estatecitys.php */
/* Location: ./application/controller/estatecitys.php */
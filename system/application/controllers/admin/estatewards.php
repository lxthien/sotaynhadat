<?php
class Estatewards extends MY_Controller{
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
        $districts = new Estatedistrict();
        $districts->order_by('position','asc');
        $districts->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatecitys/list_all/',$districts->paged->total_rows,$limit,4);
        $dis['districts'] = $districts;
        $dis['base_url'] = base_url();
        $dis['view']='estatedistrict/list_all';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Danh sách các Quận/Huyện";
        $dis['title_table'] = "Trang hiện tại:".$districts->paged->current_page.'/'.$districts->paged->total_pages;
        $this->viewadmin($dis);
    }

    function list_by_parent($id, $offset=0, $limit=10)
    {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            foreach($_POST as $key =>$value)
            {                                     
                if(substr($key,0,8) == "position")
                {
                    if(trim($this->input->post($key)) != "")
                    {
                        $keylist = explode("_",$key);
                        $object_id = $keylist[1];
                        $object = new Estateward($object_id);
                        $object->position = $this->input->post($key);
                        $object->save();
                        $object->clear();
                    }
                }
            }
            $district_id = $this->input->post('district_id');
            flash_message('success','Cập nhật thành công.');
            redirect($this->admin.'estatewards/list_by_parent/'.$district_id);
        }
        $districts = new Estatedistrict($id);

        $wards = new Estateward();
        $wards->where('estatedistrict_id',$id);
        $wards->order_by('position','asc');
        $wards->get_iterated();

        $dis['wards'] = $wards;
        $dis['districts'] = $districts;
        $dis['base_url'] = base_url();
        $dis['view']='estateward/list_by_parent';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Danh sách các Xã/Phường thuộc <span style='color:#F00;'>".$districts->name.'</span>';
        $dis['title_table'] = "Trang hiện tại:".$wards->paged->current_page.'/'.$wards->paged->total_pages;
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatedistricts/list_by_parent/".$districts->estatecity_id,
    				"onclick"=>""		
    			),
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatewards/edit_by_parent/".$districts->id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }

    function edit_by_parent($district_id,$id=0)
    {
        $district = new Estatedistrict($district_id);
        
        $wards = new Estateward($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $wards->name = $this->input->post('name');
            $wards->name_none = remove_vn($wards->name);
            $wards->estatedistrict_id = $district_id;
            if($wards->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estatewards/list_by_parent/'.$district_id);
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $wards;
        $dis['district_id'] = $district_id;
        $dis['base_url'] = base_url();
        $dis['view']='estateward/edit';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Thêm/Sửa Xã/Phường thuộc <span style='color:#F00;'>".$district->name."</span>";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatewards/list_by_parent/".$district_id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }

    function delete_by_parent()
    {
        $id = $this->uri->segment(5);
        $district_id = $this->uri->segment(4);
        $wards = new Estateward($id);
        $wards->delete();
        flash_message('success','Xóa Quận/Huyện thành công.');    
        //redirect to city
        redirect($this->admin.'estatewards/list_by_parent/'.$district_id);
    }

    function delete()
    {
        $id=$this->uri->segment(4);
        $district= new Estatedistrict($id);
        //delete city
        $district->delete();
        flash_message('success','Xóa Quận/Huyện thành công.');    
        //redirect to city
        redirect($this->admin.'estatedistricts/list_all');
    }
}
/* End of file estatedistricts.php */
/* Location: ./application/controller/estatedistricts.php */
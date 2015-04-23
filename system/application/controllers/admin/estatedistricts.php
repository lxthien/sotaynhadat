<?php
class estatedistricts extends MY_Controller{
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
    function list_by_parent($id,$offset=0,$limit=10)
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
                        $object = new Estatedistrict($object_id);
                        $object->position = $this->input->post($key);
                        $object->save();
                        $object->clear();
                    }
                }
            }
            $city_id = $this->input->post('city_id');
            flash_message('success','Cập nhật thành công.');
            redirect($this->admin.'estatedistricts/list_by_parent/'.$city_id);    
        }
        $city = new Estatecity($id);
        $districts = new Estatedistrict();
        $districts->where('estatecity_id',$id);
        $districts->order_by('position','asc');
        $districts->get_iterated();
        //$districts->get_paged($offset,$limit,TRUE);
        //setPagination($this->admin.'estatedistricts/list_by_parent/'.$id.'/',$districts->paged->total_rows,$limit,5);
        $dis['districts'] = $districts;
        $dis['city'] = $city;
        $dis['base_url'] = base_url();
        $dis['view']='estatedistrict/list_by_parent';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Danh sách các Quận/Huyện thuộc <span style='color:#F00;'>".$city->name.'</span>';
        $dis['title_table'] = "Trang hiện tại:".$districts->paged->current_page.'/'.$districts->paged->total_pages;
        $dis['nav_menu']=array(
                array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatecitys/list_all/",
    				"onclick"=>""		
    			),
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatedistricts/edit_by_parent/".$city->id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function edit_by_parent($city_id,$id=0)
    {
        $city = new Estatecity($city_id);
        
        $district = new Estatedistrict($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $district->name = $this->input->post('name');
            $district->name_none = remove_vn($district->name);
            $district->estatecity_id = $city_id;
            if($district->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estatedistricts/list_by_parent/'.$city_id);
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $district;
        $dis['city_id'] = $city_id;
        $dis['base_url'] = base_url();
        $dis['view']='estatedistrict/edit';
        $dis['menu_active']='Thành phố/Tỉnh';
        $dis['title']="Thêm/Sửa Quận/Huyện thuộc <span style='color:#F00;'>".$city->name."</span>";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatedistricts/list_by_parent/".$city_id,
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function delete_by_parent()
    {
        $id=$this->uri->segment(5);
        $city_id=$this->uri->segment(4);
        $district= new Estatedistrict($id);
        //delete city
        $district->delete();
        flash_message('success','Xóa Quận/Huyện thành công.');    
        //redirect to city
        redirect($this->admin.'estatedistricts/list_by_parent/'.$city_id);
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
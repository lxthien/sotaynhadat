<?php
class landcategories extends MY_Controller{
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
        $landcategories = new Landcategory();
        $landcategories->order_by('position','asc');
        /*$landcategories->where('parentcat_id', NULL);*/
        $landcategories->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatecatalogues/list_all/',$landcategories->paged->total_rows,$limit,4);
        $dis['catalogues'] = $landcategories;
        $dis['base_url'] = base_url();
        $dis['view']='landcategory/list_all';
        $dis['menu_active']='Danh mục nhà đất';
        $dis['title']="Danh sách các Danh mục nhà đất";
        $dis['title_table'] = "Trang hiện tại:".$landcategories->paged->current_page.'/'.$landcategories->paged->total_pages;

        /*$dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatecatalogues/edit/",
    				"onclick"=>""		
    			)
         );*/


        /*$estatesCatalogue = new Estatecatalogue();
        $estatesCatalogue->where('parentcat_id !=', 0);
        $estatesCatalogue->order_by('position');
        $estatesCatalogue->get_iterated();
        $dis['estatesCatalogue'] = $estatesCatalogue;*/

        $this->viewadmin($dis);
    }


    function edit($id=0){
        $landcategories = new Landcategory($id);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $this->load->helper('remove_vn_helper');
            /*$landcategories->parentcat_id = $this->input->post('parentcat_id');*/
            $landcategories->name = $this->input->post('name');
            $landcategories->name_none = remove_vn($landcategories->name);
            /*$landcategories->link = $this->input->post('link');*/
            if($landcategories->save()){
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'landcategories/list_all');
            }   
            else{
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }

        $dis['object'] = $landcategories;
        $dis['base_url'] = base_url();
        $dis['view']='landcategory/edit';
        $dis['menu_active']='Danh mục nhà đất';
        $dis['title']="Thêm/Sửa Danh mục nhà đất";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}landcategories/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }


    function delete()
    {
        $id=$this->uri->segment(4);
        $catalogue = new Landcategory($id);
        //delete catalogue
        $catalogue->delete();
        flash_message('success','Xóa thành công');
        //redirect to catalogue
        redirect($this->admin.'landcategories/list_all');
    }
}
/* End of file estatecatalogues.php */
/* Location: ./application/controller/estatecatalogues.php */
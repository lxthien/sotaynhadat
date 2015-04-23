<?php
class estatecatalogues extends MY_Controller{
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
        $catalogues = new Estatecatalogue();
        $catalogues->order_by('name','asc');
        $catalogues->where('parentcat_id', NULL);
        $catalogues->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estatecatalogues/list_all/',$catalogues->paged->total_rows,$limit,4);
        $dis['catalogues'] = $catalogues;
        $dis['base_url'] = base_url();
        $dis['view']='estatecatalogue/list_all';
        $dis['menu_active']='Hình thức';
        $dis['title']="Danh sách các Hình thức";
        $dis['title_table'] = "Trang hiện tại:".$catalogues->paged->current_page.'/'.$catalogues->paged->total_pages;

        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estatecatalogues/edit/",
    				"onclick"=>""		
    			)
         );


        $estatesCatalogue = new Estatecatalogue();
        $estatesCatalogue->where('parentcat_id !=', 0);
        $estatesCatalogue->order_by('position');
        $estatesCatalogue->get_iterated();
        $dis['estatesCatalogue'] = $estatesCatalogue;

        $this->viewadmin($dis);
    }
    function edit($id=0){
        $catalogue = new Estatecatalogue($id);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $this->load->helper('remove_vn_helper');
            //$catalogue->parentcat_id = $this->input->post('parentcat_id');
            $catalogue->name = $this->input->post('name');
            $catalogue->name_none = remove_vn($catalogue->name);
            $catalogue->title = $this->input->post('title');
            $catalogue->description = $this->input->post('description');
            $catalogue->keyword = $this->input->post('keyword');
            if($catalogue->save()){
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estatecatalogues/list_all');
            }   
            else{
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }

        $estatesCatalogue = new Estatecatalogue();
        $estatesCatalogue->where('parentcat_id', NULL);
        $estatesCatalogue->order_by('position');
        $estatesCatalogue->get_iterated();
        $dis['estatesCatalogue'] = $estatesCatalogue;

        $dis['object'] = $catalogue;
        $dis['base_url'] = base_url();
        $dis['view']='estatecatalogue/edit';
        $dis['menu_active']='Hình thức';
        $dis['title']="Thêm/Sửa Hình thức";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estatecatalogues/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }
    function delete()
    {
        $id=$this->uri->segment(4);
        $catalogue = new Estatecatalogue($id);
        //delete catalogue
        if(count($catalogue->child->all)>0)
        {
            flash_message('error','Không thể xóa danh mục cha, vui lòng xóa mục con trước');
        }
        else
        {
            $catalogue->delete();
            flash_message('success','Xóa thành công');
        }    
        //redirect to catalogue
        redirect($this->admin.'estatecatalogues/list_all');
    }
}
/* End of file estatecatalogues.php */
/* Location: ./application/controller/estatecatalogues.php */
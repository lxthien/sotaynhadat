<?php
class estateprices extends MY_Controller{
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
        $estatecatalogues = new Estatecatalogue();
        $estatecatalogues->get_iterated();
        $dis['estatecatalogues'] = $estatecatalogues;
        
        $prices = new Estateprice();
        $prices->order_by('position');
        $prices->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estateprices/list_all/',$prices->paged->total_rows,$limit,4);
        $dis['prices'] = $prices;
        $dis['base_url'] = base_url();
        $dis['view']='estateprice/list_all';
        $dis['menu_active']='Mức giá';
        $dis['title']="Danh sách các Mức giá";
        $dis['title_table'] = "Trang hiện tại:".$prices->paged->current_page.'/'.$prices->paged->total_pages;
        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estateprices/edit/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }


    function edit($id=0)
    {
        $price = new Estateprice($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $price->label = $this->input->post('label');
            $price->from = $this->input->post('from');
            $price->to = $this->input->post('to');
            $price->estatecatalogue_id = $this->input->post('estatecatalogue_id');
            $price->url = remove_vn($price->label);
            if($price->save())
            {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estateprices/list_all');
            }   
            else
            {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $estatecatalogues = new Estatecatalogue();
        $estatecatalogues->get_iterated();
        $dis['estatecatalogues'] = $estatecatalogues;
        
        $dis['object'] = $price;
        $dis['base_url'] = base_url();
        $dis['view']='estateprice/edit';
        $dis['menu_active']='Mức giá';
        $dis['title']="Thêm/Sửa Mức giá";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estateprices/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }


    function updatePosition(){
        $positionList = $this->input->post('positionList');
        $idList = $this->input->post('idList');
        $o = new Estateprice();
        for($i= 0; $i < count($idList) ; $i++)
        {
            $o->where("id",$idList[$i]);
            $o->get();

            $o->position = $positionList[$i];
            $o->save();
            $o->clear();
        }
        redirect("admin/estateprices/list_all");
    }


    function delete()
    {
        $id=$this->uri->segment(4);
        $price = new Estateprice($id);
        //delete price
        $price->delete();
        flash_message('success','Xóa thành công');    
        //redirect to price
        redirect($this->admin.'estateprices/list_all');
    }
}
/* End of file estateprices.php */
/* Location: ./application/controller/estateprices.php */
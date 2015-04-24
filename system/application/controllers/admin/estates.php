<?php
class estates extends MY_Controller{
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


    function list_all($offset=0,$limit=50)
    {
        $estates = new Estate();
        $estates->where('isFree', 0);
        $estates->order_by('id', 'desc');
        $estates->get_paged($offset,$limit,TRUE);

        setPagination($this->admin.'estates/list_all/',$estates->paged->total_rows,$limit,4);

        $estateareas = new Estatearea();
        $estateareas->order_by('position', 'asc');
        $estateareas->get_iterated();
        $dis['estateareas'] = $estateareas;

        $estateusers = new Estateuser();
        $estateusers->order_by('name','asc');
        $estateusers->get_iterated();
        $dis['estateusers'] = $estateusers;

        $dis['estates'] = $estates;
        $dis['base_url'] = base_url();
        $dis['view']='estate/list_all';
        $dis['menu_active']='Tin bất động sản';
        $dis['title']="Danh sách các Tin bất động sản";
        $dis['title_table'] = "Trang hiện tại:".$estates->paged->current_page.'/'.$estates->paged->total_pages;

        $this->viewadmin($dis);
    }

    function searchUrl() {
        $searchKey = $this->input->post('searchKey');
        $estatecatalogue_id = $this->input->post('estatecatalogue_id');
        $estatetype_id = $this->input->post('estatetype_id');
        $estateprice_id = $this->input->post('estateprice_id');
        $estatearea_id = $this->input->post('estatearea_id');

        $url = base_url().'admin/estates/search/?searchKey='.$searchKey.'&estatecatalogue_id='.$estatecatalogue_id.'&estatetype_id='.$estatetype_id.'&estateprice_id='.$estateprice_id.'&estatearea_id='.$estatearea_id;

        redirect($url);
    }

    function search($params) {
        $this->load->library('pagination');
        parse_str(array_pop(explode('?', $_SERVER['REQUEST_URI'], 2)), $_GET);

        $limit = 50;
        $offset = $_GET['per_page'] == "" ? 0 : $_GET['per_page'];

        $estates = new Estate();
        $estates->where('isFree', 0);
        $estates->order_by('id', 'desc');
        if ($_GET['searchKey'] != "" && isset($_GET['searchKey'])) {
            $estates->like('code', $_GET['searchKey']);
        }
        if ($_GET['estateuser_id'] != "" && isset($_GET['estateuser_id'])) {
            $estates->where('estateuser_id', $_GET['estateuser_id']);
        }
        if ($_GET['estatecatalogue_id'] != "" && isset($_GET['estatecatalogue_id'])) {
            $estates->where('estatecatalogue_id', $_GET['estatecatalogue_id']);
        }
        if ($_GET['estatetype_id'] != "" && isset($_GET['estatetype_id'])) {
            $estates->where('estatetype_id', $_GET['estatetype_id']);
        }
        if ($_GET['estateprice_id'] != "" && isset($_GET['estateprice_id'])) {
            $estates->where('estateprice_id', $_GET['estateprice_id']);
        }
        if ($_GET['estatearea_id'] != "" && isset($_GET['estatearea_id'])) {
            $estates->where('estatearea_id', $_GET['estatearea_id']);
        }
        $estates->get_paged($offset, $limit, TRUE);

        // get all estate search
        $estatesAll = new Estate();
        $estatesAll->where('isFree', 0);
        $estatesAll->order_by('id', 'desc');
        if ($_GET['searchKey'] != "" && isset($_GET['searchKey'])) {
            $estatesAll->like('code', $_GET['searchKey']);
        }
        if ($_GET['estateuser_id'] != "" && isset($_GET['estateuser_id'])) {
            $estatesAll->where('estateuser_id', $_GET['estateuser_id']);
        }
        if ($_GET['estatecatalogue_id'] != "" && isset($_GET['estatecatalogue_id'])) {
            $estatesAll->where('estatecatalogue_id', $_GET['estatecatalogue_id']);
        }
        if ($_GET['estatetype_id'] != "" && isset($_GET['estatetype_id'])) {
            $estatesAll->where('estatetype_id', $_GET['estatetype_id']);
        }
        if ($_GET['estateprice_id'] != "" && isset($_GET['estateprice_id'])) {
            $estatesAll->where('estateprice_id', $_GET['estateprice_id']);
        }
        if ($_GET['estatearea_id'] != "" && isset($_GET['estatearea_id'])) {
            $estatesAll->where('estatearea_id', $_GET['estatearea_id']);
        }
        $estatesAll->get_iterated();

        $url = $_SERVER['REQUEST_URI'];
        $config['base_url'] = $url;
        $config['total_rows'] = $estatesAll->result_count();
        $config['per_page'] = $limit;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);

        $estateareas = new Estatearea();
        $estateareas->order_by('position', 'asc');
        $estateareas->get_iterated();
        $dis['estateareas'] = $estateareas;

        $estateusers = new Estateuser();
        $estateusers->order_by('name','asc');
        $estateusers->get_iterated();
        $dis['estateusers'] = $estateusers;

        $dis['estates'] = $estates;
        $dis['page_i'] = $offset;
        $dis['base_url'] = base_url();
        $dis['view']='estate/search';
        $dis['menu_active']='Tin bất động sản';
        $dis['title']="Tìm kiếm bất động sản";

        $this->viewadmin($dis);
    }

    function listFree($offset=0,$limit=50)
    {
        $estates = new Estate();
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $searchKey = $this->input->post('searchKey');
            $estates->like('code',$searchKey);
        }
        $estates->where('isFree', 1);
        $estates->order_by('id', 'desc');
        $estates->get_paged($offset,$limit,TRUE);

        setPagination($this->admin.'estates/listFree/',$estates->paged->total_rows,$limit,4);

        $dis['estates'] = $estates;
        $dis['base_url'] = base_url();
        $dis['view']='estate/list_free';
        $dis['menu_active']='Tin bất động sản (miễn phí)';
        $dis['title']="Danh sách các Tin bất động sản (miễn phí)";
        $dis['title_table'] = "Trang hiện tại:".$estates->paged->current_page.'/'.$estates->paged->total_pages;
        $this->viewadmin($dis);
    }


    function edit($id=0)
    {
        $estate = new estate($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
			$this->load->library('file_lib');
            $estate->estatecity_id = $this->input->post('estatecity_id');
            $estate->estatedistrict_id = $this->input->post('estatedistrict_id');
			$estate->estateward_id = $this->input->post('estateward_id');
            $estate->estatedirection_id = $this->input->post('estatedirection_id');
            $estate->estatecatalogue_id = $this->input->post('estatecatalogue_id');
            $estate->estatetype_id = $this->input->post('estatetype_id');
            $estate->estatearea_id = $this->input->post('estatearea_id');
            $estate->estateprice_id = $this->input->post('estateprice_id');
            $estate->address = $this->input->post('address');
            $estate->isArea = $this->input->post('IsArea');
            $estate->area = $this->input->post('area');
            $estate->legally = $this->input->post('legally');
            $estate->isPrice = $this->input->post('IsPrice');
            $estate->price_text = $this->input->post('price_text');
            $estate->estatedirection_id = $this->input->post('estatedirection_id');
            /*$estate->estateuser_id = $this->session->userdata('userLoginId');*/
            $estate->title = $this->input->post('title');
            $estate->description = $this->input->post('description');
            $estate->price_text = $this->input->post('price_text');
            $estate->area_text = $this->input->post('area_text');
            $estate->article_id = $this->input->post('article_id');
            $estate->price_type = $this->input->post('price_type');
            if( $estate->isVip == 0 ){
                $estate->updateTime = date('Y-m-d H:i:s');
            }else{
                $estate->created = $estate->created;
                $estate->updated = $estate->updated;
                $estate->updateTime = date('Y-m-d H:i:s');
            }

            $estate->tag = $this->input->post('tag');
            $tags=remove_vn($this->input->post('tag').' '.$this->input->post('title'));
            $tags=explode('-', $tags);
            $estate->tag_search = implode(' ', $tags);
			
			// Change images default
			if($_FILES['image']['name'] != ""){
                $folder = 'img/project/';
                $dataupload = $this->file_lib->upload('image', $folder, $rename_file = true);
                if(!is_array( $dataupload )){
                    flash_message('error', $dataupload);
                    $estate->photo = '';
                }
                else{
                    $estate->photo = $folder.$dataupload['file_name'];
                }
            }
			
			// Add thumbnail to slide
			if($_FILES['thumb']['name'] != ""){
                $folder = 'img/project/';
                $dataupload = $this->file_lib->upload('thumb', $folder, $rename_file = true);
                if(!is_array( $dataupload )){
                    flash_message('error', $dataupload);
                }
                else{
                    $estate_photos= new Estate_photo();
                    $estate_photos->estate_id = $estate->id;
                    $estate_photos->name = $folder.$dataupload['file_name'];
                    $estate_photos->save();
                    $estate_photos->clear();
                }
            }

            $estate->title_none = remove_vn($this->input->post('title')).$estate->code;

            if($estate->save()){
                flash_message('success','Bản tin đã được thay đổi thành công.');
                redirect($this->admin_url.'estates/list_all/');
                //redirect($this->admin_url.'estates/edit/'.$estate->id);
            }
            else{
                flash_message('error','Đã có lỗi xãy ra !');
                //redirect($this->admin_url.'estates/list_all/');
                redirect($this->admin_url.'estates/edit/'.$estate->id);
            }
        }

        $estateCategory = new Estatecatalogue();
        $estateCategory->get_iterated();
        $dis['estateCategory'] = $estateCategory;

        $estateType = new Estatetype();
        $estateType->order_by('id');
        $estateType->where('estatecatalogue_id', $estate->estatecatalogue_id);
        $estateType->get_iterated();
        $dis['estateType'] = $estateType;

        $estateAreas = new Estatearea();
        $estateAreas->order_by('position');
        //$estateAreas->where('estatecatalogue_id', $estate->estatecatalogue_id);
        $estateAreas->get_iterated();
        $dis['estateAreas'] = $estateAreas;

        $estateDirection = new Estatedirection();
        $estateDirection->order_by('id');
        $estateDirection->get_iterated();
        $dis['estateDirection'] = $estateDirection;

        $estatePrices = new Estateprice();
        $estatePrices->where('estatecatalogue_id', $estate->estatecatalogue_id);
        $estatePrices->order_by('position', 'asc');
        $estatePrices->get_iterated();
        $dis['estatePrices'] = $estatePrices;

        $estateCities = new Estatecity();
        $estateCities->order_by('id');
        $estateCities->get_iterated();
        $dis['estateCities'] = $estateCities;

        $estateDictricts = new Estatedistrict();
        $estateDictricts->where('estatecity_id', $estate->estatecity_id);
        $estateDictricts->order_by('position', 'asc');
        $estateDictricts->get_iterated();
        $dis['estateDictricts'] = $estateDictricts;

        $estateWards = new Estateward();
        $estateWards->where('estatedistrict_id', $estate->estatedistrict_id);
        $estateWards->order_by('position');
        $estateWards->get_iterated();
        $dis['estateWards'] = $estateWards;

        $project = new Article();
        $project->where('recycle', 0);
        $project->where('estatecity_id', $estate->estatecity_id);
        $project->where('estatedistrict_id', $estate->estatedistrict_id);
        $project->order_by('title_vietnamese', 'asc');
        $project->get_iterated();
        $dis['project'] = $project;

		$photos = new Estate_photo();
        $photos->where('estate_id', $estate->id);
        $photos->get_iterated();
        $dis['photos'] = $photos;

        $dis['object'] = $estate;
        $dis['base_url'] = base_url();
        $dis['view']='estate/edit';
        $dis['menu_active']='Tin bất động sản';
        $dis['title']="Thêm/Sửa Tin '".$estate->title."'";
        $dis['nav_menu']=array(
    			array(
    				"type"=>"back",
    				"text"=>"Quay về",
    				"link"=>"{$this->admin_url}estates/list_all/",
    				"onclick"=>""		
    			)
         );
        $this->viewadmin($dis);
    }

    function editFree($id=0)
    {
        $estate = new estate($id);
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->load->helper('remove_vn_helper');
            $estate->estatecity_id = $this->input->post('estatecity_id');
            $estate->estatedistrict_id = $this->input->post('estatedistrict_id');
            $estate->estateward_id = $this->input->post('estateward_id');
            $estate->estatedirection_id = $this->input->post('estatedirection_id');
            $estate->estatecatalogue_id = $this->input->post('estatecatalogue_id');
            $estate->estatetype_id = $this->input->post('estatetype_id');
            $estate->estatearea_id = $this->input->post('estatearea_id');
            $estate->estateprice_id = $this->input->post('estateprice_id');
            $estate->address = $this->input->post('address');
            $estate->isArea = $this->input->post('IsArea');
            $estate->area = $this->input->post('area');
            $estate->legally = $this->input->post('legally');
            $estate->isPrice = $this->input->post('IsPrice');
            $estate->price_text = $this->input->post('price_text');
            $estate->estatedirection_id = $this->input->post('estatedirection_id');
            $estate->title = $this->input->post('title');
            $estate->description = $this->input->post('description');
            $estate->price_text = $this->input->post('price_text');
            $estate->area_text = $this->input->post('area_text');
            $estate->article_id = $this->input->post('article_id');
            $estate->price_type = $this->input->post('price_type');
            if( $estate->isVip == 0 ){
                $estate->updateTime = date('Y-m-d H:i:s');
            }else{
                $estate->created = $estate->created;
                $estate->updated = $estate->updated;
                $estate->updateTime = date('Y-m-d H:i:s');
            }

            $estate->name_contact = $this->input->post('name_contact');
            $estate->address_contact = $this->input->post('address_contact');
            $estate->phone_contact = $this->input->post('phone_contact');
            $estate->mobile_contact = $this->input->post('mobile_contact');
            $estate->email_contact = $this->input->post('email_contact');

            $estate->tag = $this->input->post('tag');
            $tags=remove_vn($this->input->post('tag').' '.$this->input->post('title'));
            $tags=explode('-', $tags);
            $estate->tag_search = implode(' ', $tags);

            $estate->title_none = remove_vn($this->input->post('title')).$estate->code;

            if($estate->save()){
                flash_message('success','Bản tin đã được thay đổi thành công.');
                redirect($this->admin_url.'estates/listFree/');
                //redirect($this->admin_url.'estates/editFree/'.$estate->id);
            }
            else{
                flash_message('error','Đã có lỗi xãy ra !');
                //redirect($this->admin_url.'estates/listFree/');
                redirect($this->admin_url.'estates/editFree/'.$estate->id);
            }
        }

        $estateCategory = new Estatecatalogue();
        $estateCategory->get_iterated();
        $dis['estateCategory'] = $estateCategory;

        $estateType = new Estatetype();
        $estateType->order_by('id');
        $estateType->where('estatecatalogue_id', $estate->estatecatalogue_id);
        $estateType->get_iterated();
        $dis['estateType'] = $estateType;

        $estateAreas = new Estatearea();
        $estateAreas->order_by('position');
        $estateAreas->get_iterated();
        $dis['estateAreas'] = $estateAreas;

        $estateDirection = new Estatedirection();
        $estateDirection->order_by('id');
        $estateDirection->get_iterated();
        $dis['estateDirection'] = $estateDirection;

        $estatePrices = new Estateprice();
        $estatePrices->where('estatecatalogue_id', $estate->estatecatalogue_id);
        $estatePrices->order_by('position', 'asc');
        $estatePrices->get_iterated();
        $dis['estatePrices'] = $estatePrices;

        $estateCities = new Estatecity();
        $estateCities->order_by('id');
        $estateCities->get_iterated();
        $dis['estateCities'] = $estateCities;

        $estateDictricts = new Estatedistrict();
        $estateDictricts->where('estatecity_id', $estate->estatecity_id);
        $estateDictricts->order_by('position', 'asc');
        $estateDictricts->get_iterated();
        $dis['estateDictricts'] = $estateDictricts;

        $estateWards = new Estateward();
        $estateWards->where('estatedistrict_id', $estate->estatedistrict_id);
        $estateWards->order_by('position');
        $estateWards->get_iterated();
        $dis['estateWards'] = $estateWards;

        $project = new Article();
        $project->where('recycle', 0);
        $project->where('estatecity_id', $estate->estatecity_id);
        $project->order_by('title_vietnamese', 'asc');
        $project->get_iterated();
        $dis['project'] = $project;

        $dis['object'] = $estate;
        $dis['base_url'] = base_url();
        $dis['view']='estate/edit_free';
        $dis['menu_active']='Tin bất động sản (miễn phí)';
        $dis['title']="Thêm/Sửa Tin '".$estate->title."'";
        $dis['nav_menu']=array(
            array(
                "type"=>"back",
                "text"=>"Quay về",
                "link"=>"{$this->admin_url}estates/listFree",
                "onclick"=>""
            )
        );
        $this->viewadmin($dis);
    }

    function add_code($total,$id,$catalogue)
    {
        if($catalogue == 1){
            $text = 'B';
        }
        elseif($catalogue == 2){
            $text = 'T';
        }
        else{
            $text = 'N';
        }
        $count = strlen($id);
        for($i=1; $i<=($total-$count-1); $i++){
            $text .= '0';
        }
        return $text.$id;
    }

    function hot($id=0,$value)
    {
        if($id!=0)
        {
            $estates=new Estate($id);
            if(!$estates->exists())
                show_404();
            $estates->isVip=($estates->isVip+1)%2;
            $estates->save();
        }
        flash_message('success',"Kích hoạt thành công.");
        redirect($this->admin.'estates/list_all');
    }

    function reals($id=0, $value)
    {
        if($id!=0)
        {
            $estates=new Estate($id);
            if(!$estates->exists())
                show_404();
            $estates->isReals=($estates->isReals+1)%2;
            $estates->save();
        }
        flash_message('success',"Kích hoạt thành công.");
        redirect($this->admin.'estates/list_all');
    }

    function active($id=0,$value)
    {
        if($id!=0)
        {
            $estates=new Estate($id);
            if(!$estates->exists())
                show_404();
            $estates->active=($estates->active+1)%2;
            $estates->save();
        }
        flash_message('success',"Thay đổi trạng thái thành công.");
        redirect($this->admin.'estates/listFree');
    }


    function delete($id, $redirect, $param)
    {
        $id = $this->uri->segment(4);
        $estate = new Estate($id);
        $estate->delete();
        flash_message('success','Xóa Tin bất động sản thành công');
        if( $this->uri->segment(5) == 'user' )
            redirect($this->admin.'estateusers/listEstates/'.$this->uri->segment(6));
        if( $this->uri->segment(5) == 'free' )
            redirect($this->admin.'estates/listFree');
        else
            redirect($this->admin.'estates/list_all');
    }
	
	function deletePhoto($estateID, $photoID)
    {
        $photoEstates = new Estate_photo($photoID);

        // remove image from folder.
        $pathImage = $_SERVER['DOCUMENT_ROOT'].'/'.$photoEstates->name;
        unlink($pathImage);

        if($photoEstates->delete()){
            flash_message('success','Hình ảnh đã được xóa khỏi tin nhà đất');
            redirect($this->admin.'estates/edit/'.$estateID);
        }
    }

    function deletePhotoDefault($estateID)
    {
        $estate = new Estate($estateID);

        // remove image from folder.
        $pathImageDefault = $_SERVER['DOCUMENT_ROOT'].'/'.$estate->photo;
        unlink($pathImageDefault);

        // set image to default.
        $estate->photo = "";
        if ($estate->save()) {
            flash_message('success','Hình ảnh đại diện đã được xóa khỏi tin nhà đất');
            redirect($this->admin.'estates/edit/'.$estateID);
        }else {
            flash_message('error','Đã có lỗi xãy ra !');
            redirect($this->admin.'estates/edit/'.$estateID);
        }
    }

    function getRoot(){
        echo $_SERVER['DOCUMENT_ROOT']; die;
    }
}
/* End of file estates.php */
/* Location: ./application/controller/estates.php */
<?php
class Home extends MY_Controller
{
    var $menu_active = "home";
    var $column = 1;

    function Home()
    {
        parent::MY_Controller();
		$this->load->helper('form');
		$this->load->library('validation');
		$this->load->library('email');
		$this->load->helper('email');
		$this->load->plugin('phpmailer');
        $this->load->library("pagination");
    }
  
    function index()
    {
        $this->GL();
    }
   
    function GL()
    {
        // get all province
        $estateProvince = new Estatecity();
        $estateProvince->order_by('position', 'asc');
        $estateProvince->get_iterated();
        $dis['estateProvince'] = $estateProvince;

        // get all Areas
        $estateAreas = new Estatearea();
        $estateAreas->order_by('position', 'asc');
        $estateAreas->get_iterated();
        $dis['estateAreas'] = $estateAreas;

        // get all Prices
        $estatePrices = new Estateprice();
        $estatePrices->order_by('position', 'asc');
        $estatePrices->get_iterated();
        $dis['estatePrices'] = $estatePrices;

        // get all Direction
        $estateDirection = new Estatedirection();
        $estateDirection->order_by('position', 'asc');
        $estateDirection->get_iterated();
        $dis['estateDirection'] = $estateDirection;

        // get all District
        $estateDistrict = new Estatedistrict();
        $estateDistrict->order_by('position', 'asc');
        $estateDistrict->get_iterated();
        $dis['estateDistrict'] = $estateDistrict;


        // get estates new
        $estatesNew = new Estate();
        $estatesNew->order_by('created', 'desc');
        $estatesNew->where('active', 0);
        $estatesNew->get(12);
        $dis['estatesNew'] = $estatesNew;

        // get estates vip
        $estatesVip = new Estate();
        $estatesVip->order_by('created', 'desc');
        $estatesVip->where('isVip', 1);
        $estatesVip->where('active', 0);
        $estatesVip->get(12);
        $dis['estatesVip'] = $estatesVip;

        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$this->listAllCat);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(10);
        $dis['newViewMost'] = $newViewMost;


        //load view
		$this->isRobotFollow = 3;
        $dis['base_url']=base_url();
        $dis['view']='front/includes/main_content';
		$this->viewfront($dis);
    }

    public function searchNews(){
        $level = 1;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 15;
        $offset = ($page - 1)*$limit;

        if( $_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->session->unset_userdata('value');

            $value = $this->input->post('value');
            $this->session->set_userdata('value', $value);

            $news = new Article();
            $news->like('title_vietnamese', '%'.$value.'%');
            $news->like('tag_search', '%'.$value.'%');
            $news->where_in('newscatalogue_id', array(71, 72, 73, 74, 75, 77, 78, 79, 80, 81, 82, 84, 85, 86, 87, 88, 89));
            $news->where('recycle', 0);
            $news->order_by('created', 'desc');
            $news->get_paged($offset,$limit,TRUE);
            $dis['news'] = $news;

            $newsAll = new Article();
            $newsAll->like('title_vietnamese', '%'.$value.'%');
            $newsAll->like('tag_search', '%'.$value.'%');
            $news->where_in('newscatalogue_id', array(71, 72, 73, 74, 75, 77, 78, 79, 80, 81, 82, 84, 85, 86, 87, 88, 89));
            $newsAll->where('recycle', 0);
            $newsAll->order_by('created', 'desc');
            $newsAll->get();
            $total = $newsAll->result_count();
        }
        else{
            $news = new Article();
            $news->like('title_vietnamese', '%'.$this->session->userdata('value').'%');
            $news->like('tag_search', '%'.$this->session->userdata('value').'%');
            $news->where_in('newscatalogue_id', array(71, 72, 73, 74, 75, 77, 78, 79, 80, 81, 82, 84, 85, 86, 87, 88, 89));
            $news->where('recycle', 0);
            $news->order_by('created', 'desc');
            $news->get_paged($offset,$limit,TRUE);
            $dis['news'] = $news;

            $newsAll = new Article();
            $newsAll->like('title_vietnamese', '%'.$this->session->userdata('value').'%');
            $newsAll->like('tag_search', '%'.$this->session->userdata('value').'%');
            $news->where_in('newscatalogue_id', array(71, 72, 73, 74, 75, 77, 78, 79, 80, 81, 82, 84, 85, 86, 87, 88, 89));
            $newsAll->where('recycle', 0);
            $newsAll->order_by('created', 'desc');
            $newsAll->get();
            $total = $newsAll->result_count();
        }

        /*Begin pagination*/
        $url = $this->uri->segment(1).'/';
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
        $config['full_tag_open']		= '<span class="pagin">';
        $config['full_tag_close']		= "</span>";
        $config['first_link'] 			= FALSE;
        $config['first_tag_open']		= '';
        $config['first_tag_close']		= '';
        $config['last_link'] 			= FALSE;
        $config['last_tag_open'] 		= '';
        $config['last_tag_close'] 		= '';
        $config['next_link']			= '>';
        $config['next_tag_open'] 		= '';
        $config['next_tag_close'] 		= '';
        $config['prev_link'] 			= '<';
        $config['prev_tag_open'] 		= '';
        $config['prev_tag_close'] 		= '';
        $config['num_tag_open'] 		= '';
        $config['num_tag_close'] 		= '';
        $config['cur_tag_open'] 		= '<span class="active">';
        $config['cur_tag_close']		= '</span>';
        $this->pagination->initialize($config);
        /*End pagination*/


        /*Seo for website*/
        $this->page_title = 'Thông tin '.$this->session->userdata('value').' đầy đủ, cập nhật nhất';
        $this->page_description = $this->session->userdata('value').' với đầy đủ thông tin, cập nhật liên tục...';
        $keyword = explode(' ', $this->page_title);
        $this->page_keyword = implode(',', $keyword);

        $dis['base_url']=base_url();
        $dis['view']='front/includes/search_new';
        $this->viewfront($dis);
    }
	
	function pagesigle($url){
        $url = geturlfromuri($this->uri->segment(1));

        $news = new Article();
        $news->where(array('recycle'=>0, 'title_none'=>$url))->get();
        if(!$news->exists()){
            show_404();
        }
        $dis['news'] = $news;

        $arrayCateNewsId = array();
        foreach($this->guideCate as $row){
            $arrayCateNewsId[] = $row->id;
        }

        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$this->listAllCat);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(10);
        $dis['newViewMost'] = $newViewMost;

        $this->page_title = $news->title_vietnamese." - ".$this->page_title;

        $this->menu_active = 'home';
        $dis['base_url']=base_url();
        $dis['view']='front/single-page';
		$this->viewfront($dis);
    }
    
    function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $o = new Candidate();
        $o->where(array('username'=>$username, 'password'=>$password));
        $o->get_iterated();
        if($o->result_count() == 0){
        }
        else{
        }
    }

	function search($value) {
        $valueSearch = $this->input->post('valueSearch');
        
        $products = new Product();
        $products->order_by('position');
        $products->like('name_vietnamese', '%'.$valueSearch.'%');
        $products->get_iterated();
        $dis['products'] = $products;
        
        $this->page_title = lang('search')." - ".$this->page_title;
        $this->menu_active = 'home';
        $dis['base_url']=base_url();
        $this->sidebar = true;
        $dis['view']='front/searchpage';
        $this->page_title = "Kết quả tìm kiếm";
        $this->page_keyword = "Kết quả tìm kiếm";
        $this->page_description = "Kết quả tìm kiếm";
        $this->viewfront($dis);
    }

    function sitemap(){
        $this->menu_active = 'home';
        $dis['base_url']=base_url();
        $dis['view']='front/sitemap';
        $this->viewfront($dis);
    }
    
    
    /*Begin function for partner*/
    function partners(){
        $partner = new Khachhang();
        $partner->order_by('id', 'desc');
        $partner->get_iterated();
        $dis['partner'] = $partner;

        $this->column = 2;
        $this->page_title = 'Đối tác - '.$this->page_title;
        $dis['base_url']=base_url();
        $dis['view']='front/partner';

        $this->viewfront($dis);
    }

    function tags($url){
        $title = $this->uri->segment(2);

        $level = 2;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 15;
        $offset = ($page - 1)*$limit;

        $tags = explode('-', $title);
        $title = implode(' ', $tags);

        $news = new Article();
        $news->order_by('created', 'desc');
        $news->group_start();
        $news->like('tag_search', '%'.$title.'%');
        $news->where(array('recycle'=>0));
        $news->where_not_in('newscatalogue_id', array(90));
        $news->group_end();
        $news->get_paged($offset,$limit,TRUE);
        $dis['news'] = $news;

        $newsAll = new Article();
        $newsAll->order_by('created', 'desc');
        $newsAll->group_start();
        $newsAll->like('tag_search', '%'.$title.'%');
        $newsAll->where(array('recycle'=>0));
        $newsAll->where_not_in('newscatalogue_id', array(90));
        $newsAll->group_end();
        $newsAll->get();
        $total = $newsAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2);
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['full_tag_open']        = '<div class="news-pagination" style="padding-top: 10px;">';
        $config['full_tag_close']       = "</div>";
        $config['first_link']           = FALSE;
        $config['first_tag_open']       = '';
        $config['first_tag_close']      = '';
        $config['last_link']            = FALSE;
        $config['last_tag_open']        = '';
        $config['last_tag_close']       = '';
        $config['next_link']            = '>';
        $config['next_tag_open']        = '';
        $config['next_tag_close']       = '';
        $config['prev_link']            = '<';
        $config['prev_tag_open']        = '';
        $config['prev_tag_close']       = '';
        $config['num_tag_open']         = '';
        $config['num_tag_close']        = '';
        $config['cur_tag_open']         = '<span class="active">';
        $config['cur_tag_close']        = '</span>';
        $this->pagination->initialize($config);
        /*End pagination for product*/

        $arrayCateNewsId = array();
        foreach($this->newsCate as $row){
            $arrayCateNewsId[] = $row->id;
        }

        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$arrayCateNewsId);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(5);
        $dis['newViewMost'] = $newViewMost;

        $newNews = new Article();
        $newNews->where('recycle',0);
        $newNews->where_in('newscatalogue_id',$arrayCateNewsId);
        $newNews->order_by('created', 'desc');
        $newNews->get(5);
        $dis['newNews'] = $newNews;

        // seo
        $this->page_title = 'Thông tin '.$title.' đầy đủ, cập nhật nhất';
        $this->page_description = $title.' với đầy đủ thông tin, cập nhật liên tục...';
        $keyword = explode(' ', $this->page_title);
        $this->page_keyword = implode(',', $keyword);

        $dis['base_url']=base_url();
        $dis['view']='front/tags';

        $this->viewfront($dis);
    }

    function tagsDangTin($url){
        $title = geturlfromuri($this->uri->segment(2, ''));
        $tags = explode('-', $title);
        $title = implode(' ', $tags);

        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
		$estates->order_by('created', 'desc');
        $estates->group_start();
        $estates->like('tag_search', '%'.$title.'%');
        $estates->group_end();
        $estates->get();
        $dis['estates'] = $estates;

		
        // support seo
        $this->page_title = 'Thông tin '.$title.' mới nhất';
        $this->page_description = $title.' với đầy đủ thông tin giá, hình ảnh, hướng, vị trí...cập nhật nhất';
        $keyword = explode(' ', $this->page_title);
        $this->page_keyword = implode(',', $keyword);

        $dis['base_url']=base_url();
        $dis['view']='front/estates/tags';
        $this->viewfront($dis);
    }

    function getDistrict(){
        $provincesId = $this->input->post('provincesId');

        $districts = new Estatedistrict();
        $districts->where('estatecity_id', $provincesId);
        $districts->order_by('position', 'asc');
        $districts->get();

        $option = '<option value="">Chọn Quận/Huyện</option>';
        foreach($districts as $row){
            if($row->id == $this->input->post('districtSelected')){
                $option .='<option selected="selected" value='.$row->id.'>'.$row->name.'</option>';
            }
            else{
                $option .='<option value='.$row->id.'>'.$row->name.'</option>';
            }
        }

        echo $option;
        die();
    }

    function getWard(){
        $districtId = $this->input->post('districtId');

        $wards = new Estateward();
        $wards->where('estatedistrict_id', $districtId);
        $wards->order_by('position', 'asc');
        $wards->get();

        $option = '<option value="" selected="">Chọn Xã/Phường</option>';
        foreach($wards as $row){
            if($row->id == $this->input->post('wardSelected')){
                $option .='<option selected="selected" value='.$row->id.'>'.$row->name.'</option>';
            }
            else{
                $option .='<option value='.$row->id.'>'.$row->name.'</option>';
            }
        }

        echo $option;
        die();
    }

    function getType(){
        $type = new Estatetype();
        $type->where('estatecatalogue_id', $this->input->post('id'));
        $type->order_by('position', 'asc');
        $type->get();

        $option = '<option value="">Chọn Phân mục</option>';
        foreach($type as $row){
            if($row->id == $this->input->post('typeSelected')){
                $option .='<option selected="selected" value="'.$row->id.'">'.$row->name.'</option>';
            }
            else{
                $option .='<option value="'.$row->id.'">'.$row->name.'</option>';
            }
        }

        echo $option;
        die();
    }

    function getPrice(){
        $prices = new Estateprice();
        $prices->where('estatecatalogue_id', $this->input->post('id'));
        $prices->order_by('position', 'asc');
        $prices->get();

        $option = '<option value="">Chọn Mức giá</option>';
        //$option.= '<option value="-1">Thỏa thuận</option>';
        foreach($prices as $row){
            if($row->id == $this->input->post('priceSelected')){
                $option .='<option selected="selected" value="'.$row->id.'">'.$row->label.'</option>';
            }
            else{
                $option .='<option value="'.$row->id.'">'.$row->label.'</option>';
            }
        }

        echo $option;
        die();
    }

    function getPriceByType(){
        $type = new Estatetype($this->input->post('typeId'));
        $category = new Estatecatalogue($type->estatecatalogue_id);

        $prices = new Estateprice();
        $prices->where('estatecatalogue_id', $category->id);
        $prices->order_by('position', 'asc');
        $prices->get();

        $option = '<option value="">Chọn Mức giá</option>';
        $option.= '<option value="-1">Thỏa thuận</option>';
        foreach($prices as $row){
            if($row->id == $this->input->post('priceSelected')){
                $option .='<option selected="selected" value='.$row->id.'>'.$row->label.'</option>';
            }
            else{
                $option .='<option value='.$row->id.'>'.$row->label.'</option>';
            }
        }

        echo $option;
        die();
    }

    function getProject(){
        $districtId = $this->input->post("districtId");

        $o = new Article();
        $o->where('recycle', 0);
        $o->where('estatecity_id', $this->input->post('provincesId'));
        if(!empty($districtId)){
            $o->where('estatedistrict_id', $this->input->post('districtId'));
        }
        $o->order_by('title_vietnamese', 'asc');
        $o->get();

        $option = '<option value="">Chọn Dự án</option>';
        foreach($o as $row){
            if($row->id == $this->input->post('priceSelected')){
                $option .='<option selected="selected" value='.$row->id.'>'.$row->title_vietnamese.'</option>';
            }
            else{
                $option .='<option value='.$row->id.'>'.$row->title_vietnamese.'</option>';
            }
        }

        echo $option;
        die();
    }

    function getTypeByCatagory(){
        $cateId = $this->input->post('cateId');

        $type = new Estatetype();
        $type->where('estatecatalogue_id', $cateId);
        $type->order_by('position', 'asc');
        $type->get();

        $option = '<option value="">Chọn Loại nhà đất</option>';
        foreach($type as $row){
            if($row->id == $this->input->post('typeSelected')){
                $option .='<option selected="selected" value='.$row->id.'>'.$row->name.'</option>';
            }
            else{
                $option .='<option value='.$row->id.'>'.$row->name.'</option>';
            }
        }

        echo $option;
        die();
    }
    
    function postGuide()
    {
        $news = new Article();
        $news->where(array('recycle'=>0, 'newscatalogue_id'=>90))->get_iterated();
        if(!$news->exists()){
            show_404();
        }
        $dis['news'] = $news;

        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$this->listAllCat);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(10);
        $dis['newViewMost'] = $newViewMost;

        $this->page_title = "Hướng dẫn đăng tin - ".$this->page_title;

        $this->menu_active = 'home';
        $dis['base_url']=base_url();
        $dis['view']='front/postGuide';
		$this->viewfront($dis);
    }
}

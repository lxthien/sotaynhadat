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
        $this->cart->product_name_rules =  "\d\D$";
    }
  
    function index()
    {
        $this->load->helper('remove_vn_helper');
        /*$news = new Article();
        $news->where(array('recycle'=>0));
        $news->where_in('newscatalogue_id', array(84, 85, 86, 87, 88, 89));
        $news->get();
        foreach ($news as $value) {
            $new = new Article($value->id);
            $tags = remove_vn($new->title_vietnamese . ' ' . $new->tag. ' ' . $new->short_vietnamese);
            $tags = explode('-', $tags);
            $new->tag_search = implode(' ', $tags);
            $new->save();
            $new->clear();
        }
        add filed for user
        $o = new Estateuser();
        $o->get();
        foreach ($o as $value) {
            $item = new Estateuser($value->id);
            $item->username_email = $item->email;
            $item->save();
            $item->clear();
        }
        exit;*/
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
        $estatesNew->get(25);
        $dis['estatesNew'] = $estatesNew;

        // get estates vip
        $estatesVip = new Estate();
        $estatesVip->order_by('id', 'desc');
        $estatesVip->where('isVip', 1);
        $estatesVip->get(10);
        $dis['estatesVip'] = $estatesVip;


        //load view
        $dis['base_url']=base_url();
        $dis['view']='front/includes/main_content';
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
        $title = geturlfromuri($this->uri->segment(2));

        $tags = explode('-', $title);
        $title = implode(' ', $tags);

        $news = new Article();
        $news->group_start();
        $news->like('tag_search', '%'.$title.'%');
        $news->where(array('recycle'=>0));
        //$news->where_not_in('id', array(9, 367));
        $news->group_end();
        $news->get();
        $dis['news'] = $news;


        // seo
        $this->page_title = $title.' | '.$this->page_title;
        $this->page_description = "Có ".$news->result_count()." kết quả tìm kiếm với từ khóa ".$title .' | '.$this->page_description;
        $this->page_keyword = $this->page_keyword;

        $dis['base_url']=base_url();
        $dis['view']='front/tags';

        $this->viewfront($dis);
    }

    function tagsDangTin($url){
        $title = geturlfromuri($this->uri->segment(2));

        $tags = explode('-', $title);
        $title = implode(' ', $tags);

        $estates = new Estate();
        $estates->order_by('created', 'desc');
        $estates->group_start();
        $estates->like('tag_search', '%'.$title.'%');
        $estates->group_end();
        $estates->get();
        $dis['estates'] = $estates;


        // seo
        $this->page_title = $title.' | '.$this->page_title;
        $this->page_description = "Có ".$estates->result_count()." kết quả tìm kiếm với từ khóa ".$title .' | '.$this->page_description;
        $this->page_keyword = $this->page_keyword;

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

    function getType(){
        $type = new Estatetype();
        $type->where('estatecatalogue_id', $this->input->post('id'));
        $type->order_by('name', 'asc');
        $type->get();

        $option = '<option value="">Chọn Loại</option>';
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
        $option.= '<option value="-1">Thỏa thuận</option>';
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
        //$type = new Estatetype($this->input->post('typeId'));
        //$category = new Estatecatalogue($type->estatecatalogue_id);

        $o = new Article();
        $o->where('recycle', 0);
        $o->where('estatecity_id', $this->input->post('provincesId'));
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
}

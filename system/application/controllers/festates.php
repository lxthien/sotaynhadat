<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Le
 * Date: 8/14/13
 * Time: 11:25 AM
 * To change this template use File | Settings | File Templates.
 */
class festates extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library("pagination");
        $this->load->library("securimage");
        $this->load->library('file_lib');
		ini_set("memory_limit","1024M");
    }

    function index(){
        // get category by url
        if($this->uri->segment(1,"") == 'nha-dat-ban'){
            $estatesCategoryId = 1;
            $estatesCategoryName = "Nhà đất bán";
            $estatesCategoryUrl = $this->uri->segment(1,"");
        }
        if($this->uri->segment(1,"") == 'nha-dat-cho-thue'){
            $estatesCategoryId = 2;
            $estatesCategoryName = "Nhà đất cho thuê";
            $estatesCategoryUrl = $this->uri->segment(1,"");
        }
        if($this->uri->segment(1,"") == 'nhu-cau-nha-dat'){
            $estatesCategoryId = 3;
            $estatesCategoryName = "Nhu cầu nhà đất";
            $estatesCategoryUrl = $this->uri->segment(1,"");
        }

        $level = 1;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;


        /*get estate vip*/
        $estatesVip = new Estate();
        $estatesVip->order_by('created', 'desc');
        $estatesVip->where_related_estatecatalogue('id', $estatesCategoryId);
        $estatesVip->where('isVip', 1);
        $estatesVip->get_paged($offset,$limit,TRUE);
        $dis['estatesVip'] = $estatesVip;

        /*get estates by category*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where('active', 0);
        $estates->where_related_estatecatalogue('id', $estatesCategoryId);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;


        // get all estates
        $estatesAll = new Estate();
        $estatesAll->order_by('isVip', 'desc');
        $estates->where('active', 0);
        $estatesAll->where_related_estatecatalogue('id', $estatesCategoryId);
        $estatesAll->get();

        $total = $estatesAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/';
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        /*End pagination for product*/

        $cat = new Estatecatalogue($estatesCategoryId);
        $this->page_title = $cat->title;
        $this->page_description = $cat->description;
        $this->page_keyword = $cat->keyword;

        

		$this->isRobotFollow = 1;
        $dis['estatesCategoryName']=$estatesCategoryName;
        $dis['estatesCategoryUrl']=$estatesCategoryUrl;
        $dis['atAddress'] = "tại Việt Nam";
        $this->menu_active = $this->uri->segment(1,"");
        $dis['base_url']=base_url();
        $dis['view']='front/estates/news';
        $this->viewfront($dis) ;
    }

    function cat($type_url=''){
        // get category by url
        if($this->uri->segment(1,"") == 'nha-dat-ban'){
            $estatesCategoryId = 1;
            $estatesCategoryName = "Nhà đât bán";
            $estatesCategoryUrl = $this->uri->segment(1,"");
        }
        if($this->uri->segment(1,"") == 'nha-dat-cho-thue'){
            $estatesCategoryId = 2;
            $estatesCategoryName = "Nhà đât cho thuê";
            $estatesCategoryUrl = $this->uri->segment(1,"");
        }
        if($this->uri->segment(1,"") == 'nhu-cau-nha-dat'){
            $estatesCategoryId = 3;
            $estatesCategoryName = "Nhu cầu nhà đất";
            $estatesCategoryUrl = $this->uri->segment(1,"");
        }

        $level = 2;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;

        // get type estates
        $type_url = $this->uri->segment(2, "");
        $type = new Estatetype();
        $type->where('name_none', $type_url)->get();
        if(!$type->exists()){
            show_404();
        }
        $dis['type'] = $type;

        $this->page_title = $type->name.' | '.$type->estatecatalogue->name;
        $this->page_description = $type->description;
        $this->page_keyword = $type->keyword;

        /*get estate vip*/
        $estatesVip = new Estate();
        $estatesVip->order_by('created', 'desc');
        $estatesVip->where_related_estatecatalogue('id', $estatesCategoryId);
        $estatesVip->where('isVip', 1);
        $estatesVip->get_paged($offset,$limit,TRUE);
        $dis['estatesVip'] = $estatesVip;

        /*get estates by category and type*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where_related_estatecatalogue('id', $estatesCategoryId);
        $estates->where_related_estatetype('id', $type->id);

        //$estates->where('isVip', 0);
        $estates->where('active', 0);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        /*get estates by category and type*/
        $estatesAll = new Estate();
        $estatesAll->order_by('id', 'desc');
        $estatesAll->where_related_estatecatalogue('id', $estatesCategoryId);
        $estatesAll->where_related_estatetype('id', $type->id);
        //$estates->where('isVip', 0);
        $estates->where('active', 0);
        $estatesAll->get();
        $total = $estatesAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2);
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        /*End pagination for product*/


		$this->isRobotFollow = 1;
        $dis['estatesCategoryName']=$estatesCategoryName;
        $dis['estatesCategoryUrl']=$estatesCategoryUrl;
        $dis['atAddress'] = "tại Việt Nam";
        $dis['base_url']=base_url();
        $dis['view']='front/estates/cat';
        $this->viewfront($dis) ;
    }

    function getEstateByAddress(){
        $districtUrl = $this->uri->segment(1, '');
        if(strpos($districtUrl, 'ha-dat-ban')){
            $districtKey = substr($districtUrl, 12, strlen($districtUrl));
            $catagory = new Estatecatalogue(1);
            $catName = 'Nhà đất bán';
        }
        if(strpos($districtUrl, 'ha-dat-cho-thue')){
            $districtKey = substr($districtUrl, 17, strlen($districtUrl));
            $catagory = new Estatecatalogue(2);
            $catName = 'Nhà đất cho thuê';
        }
        if(strpos($districtUrl, 'hu-cau-nha-dat')){
            $districtKey = substr($districtUrl, 16, strlen($districtUrl));
            $catagory = new Estatecatalogue(3);
            $catName = 'Nhu cầu nhà đất';
        }

        $cityUrl = $this->uri->segment(2, '');
        $city = new Estatecity();
        $city->where('name_none', $cityUrl)->get();
        if(!$city->exists()){
            show_404();
        }
        $dis['city'] = $city;

        $district = new Estatedistrict();
        $district->where('name_none', $districtKey)->get();
        if(!$district->exists()){
            show_404();
        }
        $dis['district'] = $district;

        $level = 2;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;

        /*get estates by category and type*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where('estatedistrict_id', $district->id);
        $estates->where('estatecatalogue_id', $catagory->id);
        $estates->where('isVip', 0);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        /*get estates by category and type*/
        $estatesAll = new Estate();
        $estatesAll->order_by('id', 'desc');
        $estatesAll->where('estatedistrict_id', $district->id);
        $estatesAll->where('estatecatalogue_id', $catagory->id);
        $estatesAll->where('isVip', 0);
        $estatesAll->get();
        $total = $estatesAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2);
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        /*End pagination for product*/


        $this->page_title = $catName .' '.$district->name.' '.$city->name.' | '.$catName .' '.$district->name;
        $this->page_description = $catName .' '.$district->name.' '.$city->name.' với nhiều mức giá, diện tích, hướng nhà đất, vị trí khác nhau. '.$catName .' '.$district->name.' 2014, 2015 mới nhất, cập nhật liên tục...';
        $keyword = explode(" ", $this->page_title);
        $this->page_keyword = str_replace('|,', '', implode(',', $keyword));


		$this->isRobotFollow = 3;
        $dis['category'] = $catagory;
        $dis['base_url']=base_url();
        $dis['view']='front/estates/by_address';
        $this->viewfront($dis) ;
    }

    function getEstateByCity(){
        $districtUrl = $this->uri->segment(1, '');
        if(strpos($districtUrl, 'ha-dat-ban')){
            $catagory = new Estatecatalogue(1);
            $districtKey = substr($districtUrl, 12, strlen($districtUrl));
        }
        if(strpos($districtUrl, 'ha-dat-cho-thue')){
            $catagory = new Estatecatalogue(2);
            $districtKey = substr($districtUrl, 17, strlen($districtUrl));
        }
        if(strpos($districtUrl, 'hu-cau-nha-dat')){
            $catagory = new Estatecatalogue(3);
            $districtKey = substr($districtUrl, 16, strlen($districtUrl));
        }

        $city = new Estatecity();
        $city->where('name_none', $districtKey)->get();
        if(!$city->exists()){
            show_404();
        }
        $dis['city'] = $city;

        $level = 1;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;

        /*get estates by category and type*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where('estatecity_id', $city->id);
        $estates->where('estatecatalogue_id', $catagory->id);
        $estates->where('isVip', 0);
        $estates->where('active', 0);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        /*get estates by category and type*/
        $estatesAll = new Estate();
        $estatesAll->order_by('id', 'desc');
        $estatesAll->where('estatecity_id', $city->id);
        $estatesAll->where('estatecatalogue_id', $catagory->id);
        $estatesAll->where('isVip', 0);
        $estatesAll->where('active', 0);
        $estatesAll->get();
        $total = $estatesAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1);
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        /*End pagination for product*/


        $this->page_title = $catagory->name .' '.$city->name.' | '.$catagory->name .' tại '.$city->name;
        $this->page_description = $catagory->name .' tại '.$city->name.' với nhiều mức giá, diện tích, hướng nhà đất và vị trí khác nhau. '.$catagory->name .' '.$city->name.' 2014, 2015 mới nhất, cập nhật liên tục...';
        $keyword = explode(" ", $this->page_title);
        $this->page_keyword = str_replace('|,', '', implode(',', $keyword));

		$this->isRobotFollow = 3;
        $dis['category'] = $catagory;
        $dis['base_url']=base_url();
        $dis['view']='front/estates/by_address_city';
        $this->viewfront($dis) ;
    }

    public function getEstateByTypeDistrict(){

        $typeUrl = $this->uri->segment(1, '');
        $districtUrl = $this->uri->segment(2, '');
        $cityUrl = $this->uri->segment(3, '');

        $type = new Estatetype();
        $type->where('name_none', $typeUrl)->get();
        if(!$type->exists()){
            show_404();
        }
        $dis['type'] = $type;

        $city = new Estatecity();
        $city->where('name_none', $cityUrl)->get();
        if(!$city->exists()){
            show_404();
        }
        $dis['city'] = $city;

        $district = new Estatedistrict();
        $district->where('name_none', $districtUrl)->get();
        if(!$district->exists()){
            show_404();
        }
        $dis['district'] = $district;

        $level = 3;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;

        /*get estates by category and type*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where('estatecity_id', $city->id);
        $estates->where('estatetype_id', $type->id);
        $estates->where('estatedistrict_id', $district->id);
        $estates->where('active', 0);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        /*get estates by category and type*/
        $estatesAll = new Estate();
        $estatesAll->order_by('isVip', 'desc');
        $estatesAll->order_by('created', 'desc');
        $estatesAll->where('estatecity_id', $city->id);
        $estatesAll->where('estatetype_id', $type->id);
        $estatesAll->where('estatedistrict_id', $district->id);
        $estatesAll->where('active', 0);
        $estatesAll->get();
        $total = $estatesAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
        $config['num_links'] = 4;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        /*End pagination for product*/

        $this->page_title = $type->name .' '.$district->name.' | '.$type->name .' tại '.$district->name.', '.$city->name;
        $this->page_description = $type->name .' tại '.$district->name.', '.$city->name.' với nhiều mức giá, diện tích, hướng nhà đất và vị trí khác nhau. '.$type->name .' '.$district->name.' 2014, 2015 mới nhất, cập nhật liên tục...';
        $keyword = explode(" ", $this->page_title);
        $this->page_keyword = str_replace('|,', '', implode(',', $keyword));

        $this->isRobotFollow = 3;
        $dis['base_url']=base_url();
        $dis['view']='front/estates/by_type_address';
        $this->viewfront($dis) ;
    }

    /*
     * Trang menu cấp 2 của Tỉnh/TP
     * Vd: http://sotaynhadat.vn/ban-dat/ba-ria-vung-tau
     */
    function estateByTypeCity(){

        $typeUrl = $this->uri->segment(1, '');
        $cityUrl = $this->uri->segment(2, '');

        $type = new Estatetype();
        $type->where('name_none', $typeUrl)->get();
        if(!$type->exists()){
            show_404();
        }
        $dis['type'] = $type;

        $city = new Estatecity();
        $city->where('name_none', $cityUrl)->get();
        if(!$city->exists()){
            show_404();
        }
        $dis['city'] = $city;

        $level = 2;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;

        /*get estates by type and city*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where('estatecity_id', $city->id);
        $estates->where('estatetype_id', $type->id);
        $estates->where(array('active' => 0, 'isFree' => 0));
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        /*get estates by category and type*/
        $estatesAll = new Estate();
        $estatesAll->order_by('isVip', 'desc');
        $estatesAll->order_by('created', 'desc');
        $estatesAll->where('estatecity_id', $city->id);
        $estatesAll->where('estatetype_id', $type->id);
        $estatesAll->where(array('active' => 0, 'isFree' => 0));
        $estatesAll->get();
        $total = $estatesAll->result_count();

        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2);
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        /*End pagination for product*/

        $this->page_title = $type->name .' '.$city->name.' | '.$type->name .' tại '.$city->name;
        $this->page_description = $type->name .' tại '.$city->name.' với nhiều mức giá, diện tích, hướng nhà đất, vị trí khác nhau. '.$type->name .' '.$city->name.' 2014, 2015 mới nhất, cập nhật liên tục...';
        $keyword = explode(" ", $this->page_title);
        $this->page_keyword = str_replace('|,', '', implode(',', $keyword));

        $this->isRobotFollow = 3;
        $dis['base_url']=base_url();
        $dis['view']='front/estates/by_type_and_city';
        $this->viewfront($dis) ;

    }

    function search()
    {
        $this->isRobotFollow = false;
        $estatecatalogue_id = $this->input->post('estatecatalogue_id')!=''?$this->input->post('estatecatalogue_id'):0;
        $estatetype_id = $this->input->post('estatetype_id')!=''?$this->input->post('estatetype_id'):0;
        $estatecity_id = $this->input->post('estatecity_id')!=''?$this->input->post('estatecity_id'):0;
        $estatedistrict_id = $this->input->post('estatedistrict_id')!=''?$this->input->post('estatedistrict_id'):0;
        $estatearea_id = $this->input->post('estatearea_id')!=''?$this->input->post('estatearea_id'):0;
        $estateprice_id = $this->input->post('estateprice_id')!=''?$this->input->post('estateprice_id'):0;
        $estatedirection_id = $this->input->post('estatedirection_id')!=''?$this->input->post('estatedirection_id'):0;
        
        $url = base_url().'tim-kiem-bat-dong-san/?danhmuc='.$estatecatalogue_id.'&loai='.$estatetype_id.'&tinh='.$estatecity_id.'&huyen='.$estatedistrict_id.'&dientich='.$estatearea_id.'&gia='.$estateprice_id.'&huong='.$estatedirection_id;
        
        redirect($url);
    }
    
    function searchView()
    {
        $this->isRobotFollow = false;
        $query_string = explode('tim-kiem-bat-dong-san?',$_SERVER['REQUEST_URI']);
        parse_str($query_string[1],$_GET);
        
        $estatecatalogue_id = $_GET['danhmuc'];
        $estatetype_id = $_GET['loai'];
        $estatecity_id = $_GET['tinh'];
        $estatedistrict_id = $_GET['huyen'];
        $estatearea_id = $_GET['dientich'];
        $estateprice_id = $_GET['gia'];
        $estatedirection_id = $_GET['huong'];
        $dis['estatecatalogue_id'] = $estatecatalogue_id;
        $level = 1;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;
        
        $estates = new Estate();

        if($estatecatalogue_id != 0){
            $estates->where('estatecatalogue_id', $estatecatalogue_id);
        }
        if($estatetype_id != 0){
            $estates->where('estatetype_id', $estatetype_id);
        }
        if($estatecity_id != 0){
            $estates->where('estatecity_id', $estatecity_id);
        }
        if($estatedistrict_id != 0){
            $estates->where('estatedistrict_id', $estatedistrict_id);
        }
        if($estatearea_id != 0){
            if($estatearea_id == -1){
                $estates->where('isArea', 1);
            }
            else{
                $estates->where('estatearea_id', $estatearea_id);
            }
        }
        if($estateprice_id != 0){
            if($estateprice_id == -1){
                $estates->where('isPrice', 1);
            }
            else{
                $estates->where('estateprice_id', $estateprice_id);
            }
        }
        if($estatedirection_id != 0){
            $estates->where('estatedirection_id', $estatedirection_id);
        }
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->get_paged($offset,$limit,TRUE);
        
        
        $estatesAll = new Estate();

        if($estatecatalogue_id != 0){
            $estatesAll->where('estatecatalogue_id', $estatecatalogue_id);
        }
        if($estatetype_id != 0){
            $estatesAll->where('estatetype_id', $estatetype_id);
        }
        if($estatecity_id != 0){
            $estatesAll->where('estatecity_id', $estatecity_id);
        }
        if($estatedistrict_id != 0){
            $estatesAll->where('estatedistrict_id', $estatedistrict_id);
        }
        if($estatearea_id != 0){
            if($estatearea_id == -1){
                $estatesAll->where('isArea', 1);
            }
            else{
                $estatesAll->where('estatearea_id', $estatearea_id);
            }
        }
        if($estateprice_id != 0){
            if($estateprice_id == -1){
                $estatesAll->where('isPrice', 1);
            }
            else{
                $estatesAll->where('estateprice_id', $estateprice_id);
            }
        }
        if($estatedirection_id != 0){
            $estatesAll->where('estatedirection_id', $estatedirection_id);
        }
        $estatesAll->order_by('isVip', 'desc');
        $estatesAll->order_by('created', 'desc');
        $estatesAll->get_iterated();
        
        $dis['estates'] = $estates;
        
        /*Begin pagination for product*/
        $url = $this->uri->segment(1).'/';
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $estatesAll->result_count();
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
        $config['full_tag_open']		= '<div class="news-pagination">';
        $config['full_tag_close']		= "</div>";
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
        
        $dis['base_url']=base_url();
        $dis['view']='front/estates/search';
        $this->viewfront($dis);
    }

    public function staticByAreas(){
        $url_type = $this->uri->segment(2);
        $cat_type = new Estatetype();
        $cat_type->where('name_none', $url_type)->get();
        $dis['cat_type'] = $cat_type;

        $url_district = $this->uri->segment(3);
        $cat_districts = new Estatedistrict();
        $cat_districts->where('name_none', $url_district)->get();
        $dis['cat_districts'] = $cat_districts;

        $url_areas = $this->uri->segment(4);
        $cat_areas = new Estatearea();
        $cat_areas->where('url', $url_areas)->get();
        $dis['cat_areas'] = $cat_areas;

        $level = 4;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 10;
        $offset = ($page - 1)*$limit;

        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where_related_estatetype('name_none', $url_type);
        $estates->where_related_estatedistrict('name_none', $url_district);
        $estates->where_related_estatearea('url', $url_areas);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where_related_estatetype('name_none', $url_type);
        $estates->where_related_estatedistrict('name_none', $url_district);
        $estates->where_related_estatearea('url', $url_areas);
        $estates->get();
        $total = $estates->result_count();

        /*Begin pagination for product*/
        $url = 'thong-ke-theo-dien-tich/'.$url_type.'/'.$url_district.'/'.$url_areas;
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 5;
        $config['num_links'] = 5;
        $config['full_tag_open']        = '<div class="news-pagination">';
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

        $this->page_title = $cat_type->name.' '.$cat_districts->name.' diện tích '.$cat_areas->label.' | '.$cat_type->name .' tại '.$cat_districts->name;
        $this->page_description = $cat_type->name.' tại '.$cat_districts->name.' diện tích '.$cat_areas->label.' với nhiều mức giá, vị trí, hình ảnh, hướng... để bạn lựa chọn. '. $cat_type->name.' tại '.$cat_districts->name.'';
        
        $dis['base_url']=base_url();
        $dis['view']='front/estates/by-areas';
        $this->viewfront($dis) ;
    }

    function staticByPrices(){
        $url_type = $this->uri->segment(2);
        $cat_type = new Estatetype();
        $cat_type->where('name_none', $url_type)->get();
        $dis['cat_type'] = $cat_type;

        $url_district = $this->uri->segment(3);
        $cat_districts = new Estatedistrict();
        $cat_districts->where('name_none', $url_district)->get();
        $dis['cat_districts'] = $cat_districts;

        $url_price = $this->uri->segment(4);
        $cat_price = new Estateprice();
        $cat_price->where('url', $url_price)->get();
        $dis['cat_price'] = $cat_price;

        $level = 4;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 20;
        $offset = ($page - 1)*$limit;

        /*get page estate*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where_related_estatetype('name_none', $url_type);
        $estates->where_related_estatedistrict('name_none', $url_district);
        $estates->where_related_estateprice('url', $url_price);
        $estates->get_paged($offset,$limit,TRUE);
        $dis['estates'] = $estates;

        /*get all estate*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where_related_estatetype('name_none', $url_type);
        $estates->where_related_estatedistrict('name_none', $url_district);
        $estates->where_related_estateprice('url', $url_price);
        $estates->get();
        $total = $estates->result_count();

        /*Begin pagination for product*/
        $url = 'thong-ke-theo-muc-gia/'.$url_type.'/'.$url_district.'/'.$url_price;
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 5;
        $config['num_links'] = 5;
        $config['full_tag_open']        = '<div class="news-pagination">';
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
        
        $this->page_title = $cat_type->name.' tại '.$cat_districts->name.' giá từ '.$cat_price->label.' | '.$cat_type->name .' tại '.$cat_districts->name;
        $this->page_description = $cat_type->name.' tại '.$cat_districts->name.' giá từ '.$cat_price->label.' với đầy đủ hình ảnh, hướng, vị trí khác nhau... ' .'Thông tin ' .$cat_type->name.' tại '.$cat_districts->name.' cập nhật nhất!';;

        $dis['base_url']=base_url();
        $dis['view']='front/estates/by-prices';
        $this->viewfront($dis) ;
    }

    public function postFree(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $o = new Estate();
            $o->estatecity_id = $this->input->post('estatecity_id');
            $o->estatedistrict_id = $this->input->post('estatedistrict_id');
            $o->estatedirection_id = $this->input->post('estatedirection_id');
            $o->estatecatalogue_id = $this->input->post('estatecatalogue_id');
            $o->estatetype_id = $this->input->post('estatetype_id');
            $o->estatearea_id = $this->input->post('estatearea_id');
            $o->estateprice_id = $this->input->post('estateprice_id');
            $o->estateward_id = $this->input->post('estateward_id');
            $o->address = $this->input->post('address');
            $o->isArea = $this->input->post('IsArea');
            $o->area = $this->input->post('area');
            $o->legally = $this->input->post('legally');
            $o->isPrice = $this->input->post('IsPrice');
            $o->price_text = $this->input->post('price_text');
            $o->estatedirection_id = $this->input->post('estatedirection_id');
            $o->estateuser_id = $this->session->userdata('userLoginId');
            $o->title = ucfirst( $this->input->post('title') );
            $o->description = $this->input->post('description');
            $o->price_text = $this->input->post('price_text');
            $o->area_text = $this->input->post('area_text');
            if( $o->estatecatalogue_id == 1 )
                $o->price_type = $this->input->post('price_type');
            else
                $o->price_type = $this->input->post('price_type_2');

            $o->name_contact = $this->input->post('name_contact');
            $o->address_contact = $this->input->post('address_contact');
            $o->phone_contact = $this->input->post('phone_contact');
            $o->mobile_contact = $this->input->post('mobile_contact');
            $o->email_contact = $this->input->post('email_contact');
            $o->isFree = 1;
            $o->active = 1;

            $o->code = $this->add_code(7, ($o->max_id() + 1), $o->estatecatalogue_id);
            $o->title_none = remove_vn($this->input->post('title')).$o->code;

            if ($this->securimage->check($_POST['captcha_code']) == false){
                $msg = '<div class="frm-error error-capcha">Vui lòng nhập đúng mã xác nhận !</div>';
                $type = 0;
            }
            else{
                $folder = 'img/project/';
                $dataupload = $this->file_lib->upload('image', $folder, $rename_file = true);
                if(!is_array($dataupload)){
                    $o->photo = '';
                }
                else{
                    $o->photo = $folder.$dataupload['file_name'];
                }
                if($o->save()){
                    $msg = '<div class="frm-success">Cảm ơn bạn. Tin của Bạn đã được gửi đến Chúng tôi thành công!<br /><br />Bạn chưa đăng ký thành viên nên Chúng tôi sẽ kiểm duyệt tin đăng của Bạn trước khi hiển thị. Để bỏ qua bước này, Bạn có thể <a style="color: #018e07;font-weight: bolder;" href="'.base_url().'dang-ky'.'">đăng ký thành viên</a> - Tin đăng được hiển thị ngay và nhận nhiều hỗ trợ từ Chúng tôi! <br/><br/>  Hoặc, Bạn có thể tiếp tục <a style="color: #018e07;font-weight: bolder;" href="'.base_url().'dang-tin-rao-vat-nha-dat-mien-phi'.'">đăng tin rao vặt miễn phí</a>!</div>';
                    $type = 1;

                    /*Upload list images for estates*/
                    $numfile = $this->input->post('numfile');
                    foreach($numfile as $row){
                        $dataupload=$this->file_lib->upload('image'.$row, $folder);
                        if(is_array($dataupload)){
                            $estate_photos= new Estate_photo();
                            $estate_photos->estate_id = $o->id;
                            $estate_photos->name = $folder.$dataupload['file_name'];
                            $estate_photos->save();
                            $estate_photos->clear();
                        }
                    }
                }
            }
        }

        $dis['msg'] = $msg;
        $dis['type'] = $type;
        $dis['o'] = $o;
        $dis['base_url']=base_url();
        $dis['view']='front/estates/post-free';

        $this->page_title = "Đăng tin rao vặt nhà đất | Không cần đăng ký thành viên | SotayNhadat.vn";
        
        $this->viewfront($dis) ;
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
}
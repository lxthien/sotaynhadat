<?php
class fshowrooms extends MY_Controller{
    var $menu_active = "showroom";

    function __construct()
    {
        parent::__construct();

    }
    function index($offset=0, $limit=5)
    {
        // offset
        if(!empty($offset)){
            $offset = $this->uri->segment(3);
        }

        $router = $this->uri->segment(2);
        if($router == 'factory'){
            $this->menu_active = "factory";

            // showrooms
            $showrooms = new showroom();
            $showrooms->order_by('id', 'DESC');
            $showrooms->where('kind', 1);
            $showrooms->get_iterated();
            $dis['showrooms'] = $showrooms;

            // seo
            $this->page_title = "Factory - nhà xưởng Tân Lộc Phát";
            $dis['title'] = 'Factory';
            $dis['url'] = 'factory';
        }
        elseif($router == 'showroom'){
            // showrooms
            $showrooms = new showroom();
            $showrooms->order_by('id', 'DESC');
            $showrooms->where('kind', 2);
            $showrooms->get_iterated();
            $dis['showrooms'] = $showrooms;

            // seo
            $this->page_title = "Factory - nhà xưởng Tân Lộc Phát";
            $dis['title'] = 'Showroom';
            $dis['url'] = 'showroom';
        }



        $dis['base_url']=base_url();
        $dis['view']='front/showroom/list';
        $this->viewfront($dis) ;

    }

    function detail($name_none){
        $title_none = $this->uri->segment(3);
        $arrTitle = explode('.', $title_none);
        if($arrTitle[1] == '' || $arrTitle[1] != 'html'){
            redirect('');
        }
        $title_none = $arrTitle[0];

        $showrooms = new showroom();
        $showrooms->order_by('id', 'DESC');
        $showrooms->where('name_none', $title_none);
        $showrooms->get();
        $dis['showrooms'] = $showrooms;

        $showroomphotos = new showroomphoto();
        $showroomphotos->where('showroom_id', $showrooms->id);
        $showroomphotos->get_iterated();
        $dis['showroomphotos'] = $showroomphotos;

        $this->page_title = $showrooms->name;
        $this->page_description = $showrooms->description;
        $this->page_keyword = $showrooms->keyword;

        $dis['base_url']=base_url();
        $dis['view']='front/showroom/detail';
        $this->viewfront($dis) ;
    }


    function factory(){
        $showrooms = new showroom(3);
        $dis['showrooms'] = $showrooms;


        $showroomphotos = new showroomphoto();
        $showroomphotos->where('showroom_id', $showrooms->id);
        $showroomphotos->get_iterated();
        $dis['showroomphotos'] = $showroomphotos;


        $this->page_title = $showrooms->name;
        $this->page_description = $showrooms->description;
        $this->page_keyword = $showrooms->keyword;


        $this->menu_active = 'factory';
        $dis['base_url']=base_url();
        $dis['view']='front/showroom/factory';
        $this->viewfront($dis) ;
    }
}
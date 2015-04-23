<?php
class frecruit extends MY_Controller{
    var $menu_active = "recruit";
    var $submenu_active = "";
    
    function __construct()
    {
        parent::__construct();
        $this->sidebar = true;
       
    }
    function index($offset=0, $limit=10)
    {
		// offset
        if(!empty($offset)){
            $offset = $this->uri->segment(3);
        }

		// news
		$news = new Article();
        $news->where('recycle',0);
        $news->where('newscatalogue_id',67);
        $news->order_by('created', 'DESC');
        $news->get_paged($offset,$limit,TRUE);
		$dis['news'] = $news;
				
		//seo
        $this->page_title = "Recruit - Tuyển dung - ".$this->page_title;
        
        $dis['base_url']=base_url();
        $dis['link'] = gen_seo_url($this->lang->line('news')).'/';
        $dis['view']='front/recruit/recruit';
        $this->viewfront($dis) ;
		
    }
    function cat($cat = NULL, $offset = 0,$limit = 10 )
    {
		$dis['cat_name'] = '';
        $dis['cat_id'] = '';
        $dis['name_none'] = '';
		
        $category = new Newscatalogue();
		$category->where(array('name_none' => $cat))->get();
		if(!$category->exists()){
			show_404();
		}
        if($cat == "khuyen-mai")
        {
            $this->menu_active = "khuyen-mai";
        }
		$cat = $category->id;
		$dis['cat_id'] = $category->id;
		$dis['cat_name'] = $category->{'name_vietnamese'};
		$dis['name_none'] = $category->name_none;
        
		//Category news
		$cat_news = new Article();
        $cat_news->where(array('recycle'=>0));
		$cat_news->where('active',1);
		$cat_news->where('newscatalogue_id',$cat);
        $cat_news->order_by('created','desc');
        $cat_news->get_paged($offset,$limit,TRUE);
        $dis['cat_news'] = $cat_news;
		
		// Pagination
        setPaginationVb('tin-tuc/c/'.gen_seo_url($dis['cat_name']),$cat_news->paged->total_rows,$limit,4);
		
		//DDV news
		$ddv_news = new Article();
        $ddv_news->where('recycle',0);
        $ddv_news->where('active',1);
        $ddv_news->where('newscatalogue_id',59);
        $ddv_news->order_by('created', 'DESC');
        $ddv_news->get_paged(0,4,TRUE);
		$dis['ddv_news'] = $ddv_news;
		
		$cat_ddv = new Newscatalogue();
		$cat_ddv->where(array('id' => 59))->get();
		$dis['cat_ddv'] = $cat_ddv->name_vietnamese;
		$dis['cat_ddv_none'] = $cat_ddv->name_none;
		
		//link counter
		$links_counter = new Article();
        $links_counter->where('recycle',0);
        $links_counter->where('active',1);
        $links_counter->order_by('clicks', 'DESC');
        $links_counter->get_paged(0,10,TRUE);
		$dis['links_counter'] = $links_counter;
		
		//Video on youtube
		$videos = new Article();
        $videos->where('recycle',0);
        $videos->where('active',1);
        $videos->where('newscatalogue_id',64);
        $videos->order_by('created', 'DESC');
        $videos->get_paged(0,4,TRUE);
		$dis['videos'] = $videos;
		
		//
        $this->page_title = $dis['cat_name']." - ".$this->page_title;
     
        $dis['base_url']=base_url();
        $dis['link'] = gen_seo_url($this->lang->line('news')).'/';
        $dis['view']='news/news_cat';
        $this->viewfront($dis) ;
    }
	
	function detail($title_none = NULL){
		//echo 'lien minh';exit;
        $news = new Article();
		$news->where('title_none',$title_none);
        $news->get();
		//print_r($this->db->last_query());exit();
        if(!$news->exists())
            show_404();
        $dis['news'] = $news;

        //related news
        $related_news = new Article();
        $related_news->where('recycle',0);
        $related_news->where('newscatalogue_id',$news->newscatalogue_id);
        $related_news->where("id !=",$news->id);
        $related_news->order_by('created', 'DESC');
        $related_news->get_paged(0, 10, TRUE);
        $dis['related_news'] = $related_news;
        
		
        $category = new Newscatalogue();
        $category->where(array('id' => $news->newscatalogue_id))->get();
        if($category->name_none == "khuyen-mai")
        {
            $this->menu_active = "khuyen-mai";
        }
        
        
		
        $this->page_title = $news->{'title_vietnamese'};
        $this->page_description = $news->short_vietnamese;
        $this->page_keyword = $news->tag;
        $dis['base_url']=base_url();
        $dis['link'] = gen_seo_url($this->lang->line('news')).'/';
        $dis['view']='front/recruit/recruit_de';
        $this->viewfront($dis) ;
    }
    
    function shopingCartGuide()
    {
        
        $news = new Article(165);
        $news->get();
        if(!$news->exists())
            show_404();
		

        $dis['news'] = $news;
        $this->page_title = $news->{'title_vietnamese'}." - ".$this->page_title;
        $dis['base_url']=   base_url();
        $dis['view']    =   'singlepage';
        $this->viewfront($dis) ;
    }
    
    
    function warranty()
    {
        $news = new Article();
        $news->where('id',166);
        $news->get();
        if(!$news->exists())
            show_404();
        $dis['news'] = $news;
        $this->page_title = $news->{'title_vietnamese'}." - ".$this->page_title;
        $dis['base_url']=   base_url();
        
        $dis['view']    =   'singlepage';
        $this->viewfront($dis) ;
    }
    
    
    function helpCenter()
    {
        $news = new Article();
        $news->where('newscatalogue_id',65);
        $news->order_by('id','desc');
        $news->get_iterated();
        
        $dis['news'] = $news;
        $this->page_title = "Trợ giúp - ".$this->page_title;
        $dis['base_url']=   base_url();
        $dis['view']    =   'helpCenter';
        $this->viewfront($dis) ;
    
    }
}
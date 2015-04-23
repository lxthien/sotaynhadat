<?php
class faboutus extends MY_Controller{
    var $menu_active = "about_us";
    
    function __construct()
    {
        parent::__construct();
       
    }
    function index()
    {
		// about us
		$this->aboutus = new Article(351);
        $dis['news'] = $this->aboutus;
        
        // related_news
        $related_news = new Article();
        $related_news->order_by('id', 'asc');
        $related_news->where(array('recycle'=>0, 'newscatalogue_id'=>$this->aboutus->newscatalogue_id));
        $related_news->where('id !=', $this->aboutus->id);
        $related_news->get_iterated();
        $dis['related_news'] = $related_news;

		// seo
        $this->page_title = $this->aboutus->{'title_'.$this->language};
        $this->page_description = $this->aboutus->{'short_'.$this->language};
        $this->page_keyword = $this->aboutus->tag;
        
        $dis['base_url']=base_url();
        $dis['view']='front/aboutus/aboutus-de';
        $this->viewfront($dis) ;
		
    }

	
	function detail($title_none = NULL){
        $title_none = $this->uri->segment(3);
        $arrTitle = explode('.', $title_none);
        if($arrTitle[1] == '' || $arrTitle[1] != 'html'){
            redirect('');
        }
        $title_none = $arrTitle[0];

        $news = new Article();
		$news->where('title_none',$title_none);
        $news->get();
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
        
		

        $this->page_title = $news->{'title_vietnamese'};
        $this->page_description = $news->short_vietnamese;
        $this->page_keyword = $news->tag;

        $dis['base_url']=base_url();
        $dis['link'] = base_url().$_SERVER['REQUEST_URI'];
        $dis['view']='front/aboutus/aboutus-de';
        $this->viewfront($dis) ;
    }
}
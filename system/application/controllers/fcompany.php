<?php
class fcompany extends MY_Controller{
    var $menu_active = "company";
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('remove_vn_helper');
    }

    function index($offset = 0, $limit = 15)
    {
        if(empty($offset))
            $offset = $this->uri->segment(2);

        $arrayCateNewsId = array();
        foreach ($this->businessCat as $row){
            $arrayCateNewsId[] = $row->id;
        }

        // get news hot
        $newHot = new Article();
        $newHot->where('recycle',0);
        $newHot->where('hot',1);
        $newHot->where_in('newscatalogue_id',$arrayCateNewsId);
        $newHot->order_by('created', 'desc');
        $newHot->get(4);
        $dis['newHot'] = $newHot;
        $dis['newHotFirst'] = $newHot->limit(1);

        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$arrayCateNewsId);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(5);
        $dis['newViewMost'] = $newViewMost;

        // get news new
        $newNews = new Article();
        $newNews->where('recycle',0);
        $newNews->where_in('newscatalogue_id',$arrayCateNewsId);
        $newNews->order_by('created', 'desc');
        $newNews->get_paged($offset, $limit,TRUE);
        $dis['newNews'] = $newNews;
        setPaginationVb('doanh-nghiep/', $newNews->paged->total_rows, $limit, 2);

        //seo
        $category = new Newscatalogue(58);
        $this->page_title = $category->title_bar;
        $this->page_description = $category->slogan;
        $this->page_keyword = $category->keyword;
        
		$this->isRobotFollow = 1;
        $dis['base_url']=base_url();
        $dis['link'] = gen_seo_url($this->lang->line('news')).'/';
        $dis['view']='front/business/news';
        $this->viewfront($dis) ;
		
    }

    function cat($cat = NULL, $offset = 0, $limit = 15 ){
        if(empty($offset))
            $offset = $this->uri->segment(3);

        $cat_news_url = $this->uri->segment(1);
        $cat_news = new Newscatalogue();
        $cat_news->where(array('name_none' => $cat_news_url))->get();
        if(!$cat_news->exists()){
            show_404();
        }
        $dis['cat_news'] = $cat_news;

        $cat = $this->uri->segment(2);
        $category = new Newscatalogue();
        $category->where(array('name_none' => $cat, 'parentcat_id' => $cat_news->id))->get();
        if(!$category->exists()){
            show_404();
        }
        $dis['category'] = $category;
        
		//category news
		$cat_news = new Article();
        $cat_news->where(array('recycle'=>0));
		$cat_news->where('newscatalogue_id', $category->id);
        $cat_news->order_by('created','desc');
        $cat_news->get_paged($offset,$limit,TRUE);
        $dis['news'] = $cat_news;
        setPaginationVb('doanh-nghiep/'.$cat,$cat_news->paged->total_rows,$limit,3);
        
        $arrayCateNewsId = array();
        foreach($this->businessCat as $row){
            $arrayCateNewsId[] = $row->id;
        }
        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$arrayCateNewsId);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(5);
        $dis['newViewMost'] = $newViewMost;

        // get news new
        $newNews = new Article();
        $newNews->where('recycle',0);
        $newNews->where_in('newscatalogue_id',$arrayCateNewsId);
        $newNews->order_by('created', 'desc');
        $newNews->get(5);
        $dis['newNews'] = $newNews;

        //seo
        $this->page_title = $category->title_bar;
        $this->page_description = $category->slogan;
        $this->page_keyword = $category->keyword;
     
		$this->isRobotFollow = 1;
        $dis['base_url']=base_url();
        $dis['view']='front/business/news_cat';
        $this->viewfront($dis) ;
    }
	
	function detail($title_none = NULL){
        $cat_news_url = $this->uri->segment(1);
        $cat_news = new Newscatalogue();
        $cat_news->where(array('name_none' => $cat_news_url))->get();
        if(!$cat_news->exists()){
            show_404();
        }
        $dis['cat_news'] = $cat_news;


        $cat = $this->uri->segment(2);
        $category = new Newscatalogue();
        $category->where(array('name_none' => $cat, 'parentcat_id' => $cat_news->id))->get();
        if(!$category->exists()){
            show_404();
        }
        $dis['category'] = $category;

        $title_none = geturlfromuri($this->uri->segment(3));
        $news = new Article();
		$news->where(array('title_none'=>$title_none, 'newscatalogue_id'=>$category->id));
        $news->get();
        if (!$news->exists()){
            redirect( base_url().$this->uri->segment(1, '').'/'.$this->uri->segment(2, '') );
            die;
        }
        $dis['news'] = $news;

        $tag = $news->tag;
        $dis['tag'] = explode(',', $tag);

        $news->view_count = $news->view_count+1;
        $news->save();



        //related news
        $related_news = new Article();
        $related_news->where('recycle',0);
        $related_news->where('newscatalogue_id',$news->newscatalogue_id);
        $related_news->where("id !=",$news->id);
        $related_news->order_by('created', 'DESC');
        $related_news->get_paged(0, 15, TRUE);
        $dis['related_news'] = $related_news;

        $arrayCateNewsId = array();
        foreach($this->businessCat as $row){
            $arrayCateNewsId[] = $row->id;
        }
        // get news view most
        $newViewMost = new Article();
        $newViewMost->where('recycle',0);
        $newViewMost->where_in('newscatalogue_id',$arrayCateNewsId);
        $newViewMost->order_by('view_count', 'desc');
        $newViewMost->get(5);
        $dis['newViewMost'] = $newViewMost;

        // get news view most
        $newView = new Article();
        $newView->where('recycle',0);
        $newView->where_in('newscatalogue_id',$arrayCateNewsId);
        $newView->order_by('created', 'desc');
        $newView->get(5);
        $dis['newView'] = $newView;

        $this->page_title = $news->{'title_vietnamese'}.' | SotayNhadat.vn';
        $this->page_description = $news->short_vietnamese;
        $this->page_keyword = $news->tag;


        $this->url = base_url().substr($this->uri->uri_string, 1, strlen($this->uri->uri_string));
		$this->isRobotFollow = 1;
        $dis['base_url']=base_url();
        $dis['view']='front/business/news_de';
        $this->viewfront($dis) ;
    }
}
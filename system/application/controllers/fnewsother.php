<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Le
 * Date: 8/14/13
 * Time: 9:56 AM
 * To change this template use File | Settings | File Templates.
 */
class Fnewsother extends MY_Controller{
    var $menu_active = "home";

    function __construct(){
        parent::__construct();
    }

    function index($offset = 0, $limit = 2){
        if(empty($offset))
            $offset = $this->uri->segment(2);

        $url = $this->uri->segment(1);
        $category = new Newscatalogue();
        $category->where(array('recycle'=>0, 'name_none'=>$url))->get();
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
        setPaginationVb($url.'/',$cat_news->paged->total_rows,$limit,2);

        //seo
        $this->page_title = $category->title_bar." - ".$this->page_title;
        $this->page_description = $category->slogan." - ".$this->page_description;
        $this->page_keyword = $category->keyword." - ".$this->page_keyword;

        $dis['base_url']=base_url();
        $dis['view']='front/newsother/news_cat';
        $this->viewfront($dis) ;
    }

    function detail($url){
        $urlcat = $this->uri->segment(1);
        $category = new Newscatalogue();
        $category->where(array('recycle'=>0, 'name_none'=>$urlcat))->get();
        if(!$category->exists()){
            show_404();
        }
        $dis['category'] = $category;


        $url = geturlfromuri($this->uri->segment(2));
        $news = new Article();
        $news->where(array('title_none'=>$url, 'recycle'=>0));
        $news->get();
        if(!$news->exists())
            show_404();
        $dis['news'] = $news;

        $this->page_title = $news->title_vietnamese;
        $this->page_description = $news->short_vietnamese;
        $this->page_keyword = $news->tag;

        //related news
        $related_news = new Article();
        $related_news->where('recycle',0);
        $related_news->where('newscatalogue_id',$news->newscatalogue_id);
        $related_news->where("id !=",$news->id);
        $related_news->order_by('created', 'DESC');
        $related_news->get_paged(0, 10, TRUE);
        $dis['related_news'] = $related_news;


        $dis['base_url']=base_url();
        $dis['view']='front/newsother/news_de';
        $this->viewfront($dis) ;
    }
}
<?php
class Emails_signups extends MY_Controller{

    function __construct()
    {
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>11));
        $this->load->library('login_manager');
    }


    function index($offset=0,$limit=100)
    {
        $o = new Emailsignup();
        $o->order_by('created','desc');
        $o->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'emails_signups/index/',$o->paged->total_rows, $limit, 4);
        $dis['o'] = $o;

        $dis['base_url'] = base_url();
        $dis['view']='emails_signups/list_all';
        $dis['menu_active']='Email đăng ký';
        $dis['title']="Danh sách email đăng ký";
        $dis['title_table'] = "Trang hiện tại:".$o->paged->current_page .'/'. $o->paged->total_pages;

        $this->viewadmin($dis);
    }
}
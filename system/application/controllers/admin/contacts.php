<?php
class Contacts extends MY_Controller{
    function __construct()
    {
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>11));
        $this->load->library('login_manager');
    }
    function index()
    {
        $this->list_all();
    }
    function list_all()
    {
        $dis['base_url']=base_url();
        $contact =new contact();
        $contact->order_by('id','desc');
        $contact->get();
        $dis['view']='contact/list';
        $dis['menu_active']='Phản hồi liên hệ';
        $dis['title']="Phản hồi liên hệ";
        $dis['contact']=$contact;
        $this->viewadmin($dis);
    }
   
    function edit($id=0)
    {
        $contact=new contact($id);
        $dis['base_url']=base_url();
        $dis['title']="Thêm/ Sửa danh mục tin tức";
        $dis['menu_active']="Danh mục";
        $dis['view']="contact/edit";
        $dis['contact']=$contact;
        $this->load->view('admin/contact/edit',$dis);
    }
   
   
    function delete($id)
    {
      
        $contact=new contact($id);
        //delete city
        
            $contact->delete();
        //redirect to city
        redirect($this->admin.'contacts/list_all/');
    }
}
/* End of file contacts.php */
/* Location: ./application/controller/contacts.php */
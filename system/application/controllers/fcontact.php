<?php
class Fcontact extends MY_Controller{
    var $menu_active = "contact";
    
    function __construct()
    {
        parent::__construct();
        $this->menu_active = 'proud'; 
		$this->load->library('email');
		$this->load->helper('email');
		$this->load->plugin('phpmailer');
        $this->sidebar = true;
    }

    function index()
    {
		$this->load->library("securimage");
        $contact = new Contact();
        $msg = "";
       
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $contact->name = $this->input->post('name');
            $contact->address = $this->input->post('address');
            $contact->title = $this->input->post('title');
            $contact->email = $this->input->post('email');
            $contact->content = $this->input->post('content');
            $contact->phone = $this->input->post('phone');

            if ($this->securimage->check($_POST['captcha_code']) == false){
                $msg = '<div class="frm-error">Vui lòng nhập đúng mã xác nhận !</div>';
                $type = 0;
            }
            else{
                if($contact->save()) {
                    //redirect("lien-he/success");
                    $type = 1;
                    /*
                    $content = "<html><head></head><body>";
                    $content .= "<br>Hi Mr/ms !";
                    $content .= "<br>We've received a contact information from lienminh.com.vn website . Please see detail below :";
                    $content .= "<br>Title:".$contact->title;
                    $content .= "<br>Name:".$contact->name;
                    $content .= "<br>Email:".$contact->email;
                    $content .= "<br>Message:".$contact->content;
                    $content .="</body></html>";
                    $this->sendMail($content);
                    */
                    if($this->_send_email($file_name, $file_path)){
                        $msg = "Cảm ơn bạn đã gửi thông tin. Chúng tôi sẽ phản hồi sớm nhất. Trân trọng !";
                    } else {
                        $msg = "Có lỗi xảy ra trong quá trình gửi mail.";
                    }
                    $contact->clear();
                }
                else
                {
                    $msg="Có 1 số lỗi sau :\n";
                    foreach($contact->error->all as $row){
                        $msg.=$row."\n";
                    }
                }
            }
        }
       
        $dis['contact']   = $contact;

        $this->menu_active ="contact";
        $dis['base_url']=base_url();
        $dis['view']='front/contact';
        $dis['msg']=$msg;

        $this->page_title = "Liên hệ - ".$this->page_title;
        $this->page_keyword = "Liên hệ ";
        $this->page_description = "thông tin, địa chỉ liên hệ ";

        $this->viewfront($dis);
    }

    function contact()
    {
        $news = new Article(1273);

        $dis['base_url']=base_url();
        $dis['view']='front/user/vip';
        $dis['news'] = $news;

        $this->page_title = "Liên hệ - ".$this->page_title;
        $this->page_keyword = "Liên hệ ";
        $this->page_description = "thông tin, địa chỉ liên hệ ";

        $this->viewfront($dis);
    }

    function sendMail($content)
    {
			
            $config = Array(
			    'mailtype'  => 'html'
			);
			$this->load->helper('email');
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->clear();
			$this->email->from('info@lienminh.com.vn', 'Liên minh');
			$this->email->to(getconfigkey("email"));
			$this->email->subject("There're a new contact infomation from liemminh.com.vn");
			$this->email->message($content);
			$this->email->send();
    }
    
	function _send_email()
    {        
		$this->data['subject']		= $this->input->post('title');
		$this->data['message']   	= "<p><b><i>Email được gửi từ chức năng liên hệ của website <a href='".base_url()."'>".base_url()."</a></i></b></p> <br />"; 
		$this->data['message']   	.= "---------------- Thông Tin Người Gửi ---------------- <br />";        
        $this->data['message']   	.= "<b><i>Họ Tên:</i></b> ".$this->input->post('name')."<br />";
		$this->data['message']   	.= "<b><i>Email:</i></b> <a href='mailto:".$this->input->post('email')."'>".$this->input->post('email')."</a> <br />";
		$this->data['message']   	.= "<b><i>Điện Thoại:</i></b> ".$this->input->post('phone')."<br /><br />";
        $this->data['message']   	.= "---------------------- Nội Dung --------------------- <br />";
        $this->data['message']   	.= $this->input->post('content')."<br />";
		
		//Establish settings for phpmailer to use to send the mail
		$mailer = new PHPMailer();
		$mailer->CharSet = 'UTF-8';
		$mailer->SMTPDebug = 1;
		
		$mailer->IsSMTP(); // set mailer to use SMTP
		$mailer->Host = "smtp.googlemail.com"; // specify main and backup server
		$mailer->Port = 465; // set the port to use
		$mailer->SMTPAuth = true; // turn on SMTP authentication
		$mailer->SMTPSecure = 'ssl';
		$mailer->Username = "sendmail.sts@gmail.com"; // your SMTP username or your gmail username
		$mailer->Password = "123sts!@#"; // your SMTP password or your gmail password
		
		$mailer->From = $this->input->post('email');
		$mailer->FromName = $this->input->post('name');
		$mailer->Subject = $this->data['subject'];
		$mailer->Body = $this->data['message'];
		//$mailer->AddAttachment($file_path, $file_name); // add attache file
		$mailer->WordWrap = 50;
		$mailer->IsHTML(true);
		//$mailer->AddAddress('info@lienminh.com.vn','Info - Lien Minh');
		$mailer->AddAddress(getconfigkey('email_contact'),'Info - So Tay Nha Dat');
		//Send the mail
		if($mailer->Send()){
			return true;
		} else {
			return false;
		}
    }
}
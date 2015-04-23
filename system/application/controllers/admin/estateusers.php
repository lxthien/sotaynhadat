<?php
class estateusers extends MY_Controller{
    function __construct()
    {
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>253));
        $this->load->library('login_manager');
    }

    function index()
    {
        $this->list_all();
    }

    function list_all($offset=0,$limit=250)
    {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            foreach($_POST as $key =>$value)
            {                                     
                if(substr($key,0,8) == "position")
                {
                    if(trim($this->input->post($key)) != "")
                    {
                        $keylist = explode("_",$key);
                        $estateuserId = $keylist[1];
                        $estateuser = new estateuser($estateuserId);
                        $estateuser->position = $this->input->post($key);
                        $estateuser->save();
                        $estateuser->clear();
                    }
                }
            }
            flash_message('success','Cập nhật thành công.');
            redirect($this->admin.'estateusers/list_all/');    
        }
        $estateusers = new Estateuser();
        $estateusers->order_by('id','desc');
        $estateusers->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'estateusers/list_all/',$estateusers->paged->total_rows,$limit,4);
        $dis['estateusers'] = $estateusers;
        $dis['base_url'] = base_url();
        $dis['view']='estateuser/list_all';
        $dis['menu_active']='Thành viên';
        $dis['title']="Danh sách các Thành viên";
        $dis['title_table'] = "Trang hiện tại:".$estateusers->paged->current_page.'/'.$estateusers->paged->total_pages;
        /*
        $dis['nav_menu']=array(
    			array(
    				"type"=>"add",
    				"text"=>"Thêm",
    				"link"=>"{$this->admin_url}estateusers/edit/",
    				"onclick"=>""		
    			)
         );
         */
        $this->viewadmin($dis);
    }

    function send_mail_all()
    {   
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $title = $this->input->post('title');
            $content = $this->input->post('txtFull_vietnamese');
            $name_form =  getconfigkey('name_contact');
            $email_form =  getconfigkey('email_contact');
            $estateusers = new Estateuser();
            $estateusers->where('active',1);
            $estateusers->get_iterated();
            $list_error = array();
            foreach($estateusers as $row)
            {
                if(!$this->sendemail($title,$content,$row->email))
                {
                    array_push($list_error,$row->name);    
                }
            }
            if(count($list_error)==0)
            {
                flash_message('success','Gửi mail thành công.');
                redirect($this->admin.'estateusers/list_all');
            }
            else
            {
                flash_message('error','Có lỗi trong quá trình gửi mail đến các thành viên sau:');
                foreach($list_error as $row)
                {
                    flash_message('error',$row);
                }
                redirect($this->admin.'estateusers/list_all');
            }
        }
        $sitelanguage=new Sitelanguage();
        $sitelanguage->order_by('position','asc');
        $sitelanguage->get();
        $dis['sitelanguage']=$sitelanguage;
        $dis['base_url']=base_url();
        $dis['view']='estateuser/send_mail_all';
        $dis['menu_active']='Gửi mail';
        $dis['title']="Gửi mail đến tất cả thành viên";
        $this->viewadmin($dis);
    }

    function _send_email($title,$content,$name_from,$email_from,$name_to,$email_to)
    {        
		$this->load->plugin('phpmailer');
        
        $this->data['subject']		= $title; 
		$this->data['message']   	= $content;
		
		//Establish settings for phpmailer to use to send the mail
		$mailer = new PHPMailer();
		$mailer->CharSet = 'UTF-8';
		$mailer->SMTPDebug = 1;
		
		$mailer->IsSMTP(); // set mailer to use SMTP
		$mailer->Host = getconfigkey('smtp_host'); // specify main and backup server
		$mailer->Port = getconfigkey('smtp_port'); // set the port to use
		$mailer->SMTPAuth = true; // turn on SMTP authentication
		$mailer->SMTPSecure = 'ssl';
		$mailer->Username = getconfigkey('smtp_user'); // your SMTP username or your gmail username
		$mailer->Password = getconfigkey('smtp_password'); // your SMTP password or your gmail password
		$mailer->From = $email_from;
		$mailer->FromName = $name_from;
        $mailer->AddReplyTo($email_from,$name_from);
		$mailer->Subject = $this->data['subject'];
		$mailer->Body = $this->data['message'];
		//$mailer->AddAttachment($file_path, $file_name); // add attache file
		$mailer->WordWrap = 50;
		$mailer->IsHTML(true);
		$mailer->AddAddress($email_to,$name_to);
		//Send the mail
		if($mailer->Send()){
			return true;
		} else {
			return false;
		}
    }

    function sendemail($subject,$content,$email_to)
    {
		$config = Array(
			'mailtype'  => 'html'
		);
        $this->load->helper('email');
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->clear();
		//$this->email->from($this->get_email(), 'Nhà Đất Việt Nam 24h');
        $this->email->from($this->get_email(), 'Nhà Đất Việt Nam 24h');
		$this->email->to($email_to);
		$this->email->subject($subject);
		$this->email->message($content);
		if($this->email->send())
            return true;
        else
            return false;
    }

    function edit($id=0)
    {
        $estateuser = new Estateuser($id);
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $this->load->helper('remove_vn_helper');
            $estateuser->name = $this->input->post('name');
            $estateuser->mobilePhone = $this->input->post('mobilePhone');
            $estateuser->mobile = $this->input->post('mobile');
            $estateuser->name_none = remove_vn($estateuser->name);

            if ($this->input->post('resetPassword') == 1) {
                $resetPassword = 123456;
                $estateuser->password = md5($resetPassword);
            }

            if ($estateuser->save()) {
                flash_message('success','Thao tác đã được thực hiện');
                redirect($this->admin.'estateusers/list_all');
            }else {
                flash_message('error','Đã có lỗi xãy ra !');
            }
        }
        $dis['object'] = $estateuser;

        $dis['base_url'] = base_url();
        $dis['view']='estateuser/edit';
        $dis['menu_active']='Thành viên';
        $dis['title']="Thêm/Sửa Thành viên";
        $dis['nav_menu']=array(
            array(
                "type"=>"back",
                "text"=>"Quay về",
                "link"=>"{$this->admin_url}estateusers/list_all/",
                "onclick"=>""
            )
        );

        $this->viewadmin($dis);
    }

    function delete()
    {
        $id=$this->uri->segment(4);
        $estateuser = new Estateuser($id);
        $estateuser->delete();
        flash_message('success','Xóa Thành viên thành công');
        redirect($this->admin.'estateusers/list_all');
    }

    function active($id=0,$value)
    {
        if($id!=0)
        {
            $estateuser=new Estateuser($id);
            if(!$estateuser->exists())
                show_404();
            $estateuser->active=($estateuser->active+1)%2;
            $estateuser->save();
        }
        flash_message('success',"Kích hoạt thành công.");
         redirect($this->admin.'estateusers/list_all');
    }

    function listEstates($user_id)
    {
        $estateuser = new Estateuser($user_id);

        $estates = new Estate();
        $estates->where('estateuser_id', $user_id);
        $estates->order_by('created','desc');
        $estates->get_iterated();
        $dis['estates'] = $estates;


        $dis['estateuser'] = $estateuser;
        $dis['base_url'] = base_url();
        $dis['view']='estateuser/list_by_user';
        $dis['menu_active']="Thành viên";
        $dis['title']='Danh sách các Tin bất động sản của "'.$estateuser->firstname.' '.$estateuser->name.'"';
        $dis['title_table'] = "Trang hiện tại:".$estates->paged->current_page.'/'.$estates->paged->total_pages;

        $this->viewadmin($dis);
    }
}
/* End of file estateusers.php */
/* Location: ./application/controller/estateusers.php */
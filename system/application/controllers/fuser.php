<?php
class fuser extends MY_Controller{
    var $menu_active = "user";
    var $submenu_active = "";
    function fuser()
    {
        parent::__construct();
        $this->isCache = false;
        $this->isRobotFollow =false;
        $this->load->helper('flash_message');
        $this->load->helper('remove_vn');
        $this->load->library("securimage");
        $this->load->library('file_lib');
        $this->load->library("pagination");
    }
    
    function regiter() {
        $this->page_title = "Đăng ký thành viên SotayNhadat.vn";
        $o = new Estateuser();
        $msg = "";
        $isHide = 0;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $o->name = $this->input->post('name');
            $o->username = $this->input->post('username');
            $o->username_email = $this->input->post('email');
            $o->password = md5($this->input->post('repassword'));
            $o->email = $this->input->post('email');
            $o->yahoo = $this->input->post('yahoo');
            $o->skype = $this->input->post('skype');
            $o->mobilePhone = $this->input->post('mobilePhone');
            $o->mobile = $this->input->post('mobile');
            $o->address = $this->input->post('address');
            $o->estatecity_id = $this->input->post('estatecity_id');
            $o->estatedistrict_id = $this->input->post('estatedistrict_id');

            $this->load->library("securimage");
            $this->load->library('file_lib');

            if ($this->securimage->check($_POST['captcha_code']) == false) {
                $type = 0;
                $msg = '<div class="frm-error error-capcha">Vui lòng nhập đúng hình ảnh xác nhận !</div>';
            }
            else{
                if($o->save()){
                    $msg = "Đăng ký tài khoản thành công! Chúng tôi đã gửi một email thông báo tới địa chỉ <b>".$o->email."</b> của Bạn. Ngay bây giờ Bạn có thể truy cập <b><a style='color: #109502;' href=".base_url().'trang-ca-nhan'.">Trang cá nhân</a></b> để đăng tin mua bán - cho thuê.";
                    $msg .= "<br /><br />";
                    $msg .= "<em>Lưu ý: Trong một số trường hợp, email này có thể bị hòm thư của Bạn lọc vào thư mục spam. Vì vậy, Bạn vui lòng kiểm tra trong hộp inbox/spam/junk.</em>";

                    $type = 1;
                    $isHide = 1;
                    $this->session->set_userdata('userLogin', $o->name);
                    $this->session->set_userdata('userLoginId', $o->id);
                    $this->session->set_userdata('userLoginFlag', 1);

                    $subject = "Thông tin tài khoản thành viên tại SotayNhadat.vn";
                    $content = "Chào bạn ".$o->name;
                    $content.= "<br /><br />Tài khoản của bạn tại website ".base_url()." đã được tạo thành công. Dưới đây là thông tin tài khoản của bạn:";
                    $content.= "<br />Tên đăng nhập: ".$o->username;
                    $content.= "<br />Mật khẩu: ".$this->input->post('repassword');
                    $content.= "<br /><br />Nếu bạn gặp khó khăn, bạn có thể liên hệ với Chúng tôi để được hỗ trợ:";
                    $content.= "<br />Email: <a href='mailto:info@sotaynhadat.vn'>info@sotaynhadat.vn</a> – Hotline: 0168 200 0080";
                    $content.= "<br /><br />---------------------------------------------------------";
                    $content.= "<br />Ban quản trị SotayNhadat.vn";
                    if($this->_send_email('myemail',$subject, $content, $o->email)){

                    }
                }
                else{
                    $msg = '<div class="frm-error">Đã có lỗi xãy ra trong quá trình đăng ký !</div>';
                    foreach($o->error->all as $row){
                        $msg.=$row.'<br />';
                    }
                    $type = 0;
                }
            }
        }

        $dis['o'] = $o;
        $dis['base_url']=base_url();
        $dis['view']='front/user/register';
        $dis['msg'] = $msg;
        $dis['isHide'] = $isHide;
		$this->viewfront($dis);
    }


    /*function _send_email($title, $content, $name_from, $email_to)
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
    }*/


    function checkLogin(){
        if($_SERVER['METHOD_REQUEST'] == 'POST'){
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            $customer = new customer();
            $customer->where('username',$username);
            $customer->where('password',md5($password));
            $customer->get();
            if($customer->exists()){
                $this->session->set_userdata("userLogin",$customer->username);
                $this->session->set_userdata('userToken',$customer->id);
                $this->session->set_userdata('userLoginFlag',"1");
                redirect(base_url().$this->lang->lang().'/payment');
            }
        }

        //$dis['customer'] = $customer;
        $this->column = 2;
        $dis['base_url']=base_url();
        $dis['view']='front/user/checkLogin';

        $this->viewfront($dis);
    }
    
    
    function account(){
        if($this->session->userdata('userLoginFlag') != 1){
            redirect(base_url());
        }
        $this->page_title = "Tài khoản thành viên ".base_url();
        
        $customer = new Estateuser($this->session->userdata('userLoginId'));
        if(!$customer->exists())
            show_404();
        $msg = "";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $customer->name = $this->input->post('regis_name');
            $customer->birthday = $this->input->post('regis_birthday');
            $customer->sex = $this->input->post('regis_sex');
            $customer->address = $this->input->post('regis_address');
            $customer->homePhone = $this->input->post('regis_homePhone');
            $customer->mobilePhone = $this->input->post('regis_mobilePhone');
            //$customer->username = $this->input->post('regis_username');
            if($this->input->post('regis_password') != "")
            {
                $customer->password = md5($this->input->post('regis_password'));
            }
            
            //$customer->email = $this->input->post('regis_email');
            $customer->isReceiverEmail = $this->input->post('regis_isReceiverEmail');
            $this->load->library("securimage");
            if ($this->securimage->check($_POST['captcha_code']) == false) {
                $msg = "Vui lòng nhập đúng hình ảnh xác nhận";
                $step = 2;
            }
            else
            {
                
                $customer->save();
                $msg = "Cập nhật thành công.";
            }
        }   
        $dis['customer'] = $customer;
        $dis['newAccount'] = new Article(386);
        $dis['base_url']=base_url();
        $dis['view']='front/user/account';
        $dis['step'] = $step;
        $dis['msg'] =$msg;
		$this->viewfront($dis);
         
    }

    function changeAccount(){
        if($this->session->userdata('userLoginFlag') != 1){
            redirect(base_url());
        }
        $this->page_title = "Tài khoản thành viên ".base_url();

        $customer = new Estateuser($this->session->userdata('userLoginId'));
        if(!$customer->exists())
            show_404();
        $msg = "";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $customer->name = $this->input->post('name');
            //$customer->username = $this->input->post('username');
            //$customer->email = $this->input->post('email');
            /*$customer->yahoo = $this->input->post('yahoo');
            $customer->skype = $this->input->post('skype');*/
            $customer->mobilePhone = $this->input->post('mobilePhone');
            $customer->mobile = $this->input->post('mobile');
            $customer->address = $this->input->post('address');
            $customer->estatecity_id = $this->input->post('estatecity_id');
            $customer->estatedistrict_id = $this->input->post('estatedistrict_id');
            if($customer->save()){
                $msg = "Thông tin cá nhân đã được thay đổi";
                $type = 2;
            }
            else{
                $msg = "Có lỗi trong quá trình cập nhật thông tin cá nhân. Vui lòng thử lại";
                $type = 2;
            }
        }

        $district = new Estatedistrict();
        $district->where('estatecity_id', $customer->estatecity_id);
        $district->get_iterated();
        $dis['district'] = $district;

        $dis['customer'] = $customer;
        $dis['base_url']=base_url();
        $dis['view']='front/user/change-account';
        $dis['msg'] =$msg;
        $this->viewfront($dis);

    }

    function post(){
        if($this->session->userdata('userLoginFlag') != 1){
            redirect(base_url().'dang-nhap');
        }
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
            $o->title = ucfirst( mb_strtolower( $this->input->post('title'), "utf-8" ) );
            $o->description = $this->input->post('description');
            $o->price_text = $this->input->post('price_text');
            $o->area_text = $this->input->post('area_text');
            if( $o->estatecatalogue_id == 1 )
                $o->price_type = $this->input->post('price_type');
            else
                $o->price_type = $this->input->post('price_type_2');

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
                    $msg = '<div class="frm-success">Thành công. Tin của bạn đã được đăng thành công !</div>';
                    $type = 1;

                    /*Upload list images for estates*/
                    $numfile = $this->input->post('numfile');
                    foreach($numfile as $row){
                        $dataupload=$this->file_lib->upload('image'.$row, $folder, $rename_file = true);
                        if(is_array($dataupload)){
                            $estate_photos= new Estate_photo();
                            $estate_photos->estate_id = $o->id;
                            $estate_photos->name = $folder.$dataupload['file_name'];
                            $estate_photos->save();
                            $estate_photos->clear();
                        }
                    }

                    redirect(base_url().'chinh-sua-tin-da-dang');
                }
            }
        }

        $project = new Article();
        $project->where_in('newscatalogue_id', array(84, 85, 86, 87, 88, 89));
        $project->get_iterated();
        $dis['project'] = $project;

        $this->page_title = "Đăng tin rao vặt bất động sản | Rao vặt nhà đất  | SotayNhadat.vn";

        $dis['base_url']=base_url();
        $dis['view']='front/user/post';
        $dis['msg'] = $msg;
        $dis['type'] = $type;
        $dis['o']=$o;
        $this->viewfront($dis);
    }
    
    function editPost($postId){
        $postId = $this->uri->segment(2);
        $dis['postId'] = $postId;
        $o = new Estate($postId);
        if(!$o->exists()){
            show_404();
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $o->estatecity_id = $this->input->post('estatecity_id');
            $o->estatedistrict_id = $this->input->post('estatedistrict_id');
            $o->estatecatalogue_id = $this->input->post('estatecatalogue_id');
            $o->estatetype_id = $this->input->post('estatetype_id');
            $o->estatedirection_id = $this->input->post('estatedirection_id');
            $o->estatearea_id = $this->input->post('estatearea_id');
            $o->estateprice_id = $this->input->post('estateprice_id');
            $o->estateward_id = $this->input->post('estateward_id');
            $o->address = $this->input->post('address');
            $o->isArea = $this->input->post('IsArea');
            $o->area = $this->input->post('area');
            $o->legally = $this->input->post('legally');
            $o->isPrice = $this->input->post('IsPrice');
            $o->price_text = $this->input->post('price_text');
            $o->area_text = $this->input->post('area_text');
            $o->estatedirection_id = $this->input->post('estatedirection_id');
            $o->estateuser_id = $this->session->userdata('userLoginId');
            /*$o->title = $this->input->post('title');*/
            $o->description = $this->input->post('description');
            if( $o->estatecatalogue_id == 1 )
                $o->price_type = $this->input->post('price_type');
            else
                $o->price_type = $this->input->post('price_type_2');
            /*$o->title_none = remove_vn($this->input->post('title')).$o->code;*/

            $o->article_id = $this->input->post('article_id');
            $o->created = date('Y-m-d H:i:s');
            $o->updateTime = date('Y-m-d H:i:s');


            if ($this->securimage->check($_POST['captcha_code']) == false){
                $msg = '<div class="frm-error error-capcha">Vui lòng nhập đúng mã xác nhận !</div>';
                $type = 0;
            }
            else{
                // Change images default
                if($_FILES['image']['name'] != ""){
                    $folder = 'img/project/';
                    $dataupload = $this->file_lib->upload('image', $folder, $rename_file = true);
                    if(!is_array( $dataupload )){
                        flash_message('error', $dataupload);
                        $o->photo = '';
                    }
                    else{
                        $o->photo = $folder.$dataupload['file_name'];
                    }
                }
                // Add thumbnail to slide
                if($_FILES['thumb1']['name'] != ""){
                    $folder = 'img/project/';
                    $numfile = $this->input->post('numfile');
                    foreach($numfile as $row) {
                        $dataupload=$this->file_lib->upload('thumb'.$row, $folder, $rename_file = true);
                        if(is_array($dataupload)) {
                            $estate_photos= new Estate_photo();
                            $estate_photos->estate_id = $o->id;
                            $estate_photos->name = $folder.$dataupload['file_name'];
                            $estate_photos->save();
                            $estate_photos->clear();
                        }
                    }
                }
                if($o->save()){
                    redirect(base_url().'chinh-sua-tin-da-dang');
                }
            }
        }

        $project = new Article();
        $project->where('estatecity_id', $o->estatecity_id);
        $project->get_iterated();
        $dis['project'] = $project;

        $photo = new Estate_photo();
        $photo->where('estate_id', $postId);
        $photo->get_iterated();
        $dis['photo'] = $photo;

        $this->page_title = "Đăng tin rao vặt bất động sản | Rao vặt nhà đất  | SotayNhadat.vn";

        $dis['o']=$o;
        $dis['base_url']=base_url();
        $dis['view']='front/user/post-edit';
        $dis['msg'] = $msg;
        $dis['type'] = $type;
        $this->viewfront($dis);
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

    function deletePost($postId){
        $postId = $this->uri->segment(2);
        $customerId = $this->session->userdata('userLoginId');
        $o = new Estate($postId);
        if( $o->estateuser_id == $customerId )
            $o->delete();
        redirect($_SERVER['HTTP_REFERER']);
    }

    function postDetail($url){
        $typeNameNone = $this->uri->segment(1, "");
        $type = new Estatetype();
        $type->where('name_none', $typeNameNone)->get();
        if($type->exists()){
            show_404();
        }


        $cate = new Estatecatalogue();
        $cate->where('name_none', $this->uri->segment(1, ''))->get();
        if(!$cate->exists()){
            show_404();
        }
        $dis['cate'] = $cate;
        $url  = geturlfromuri($this->uri->segment(3));

        $estate = new Estate();
        $estate->where('title_none', $url);
        $estate->where_related_estatecatalogue('id', $cate->id);
        $estate->where('active', 0);
        $estate->get();
        if(!$estate->exists()){
            redirect( base_url().$this->uri->segment(1, '').'-'.$this->uri->segment(2, '') );
            die;
        }
        $dis['o'] = $estate;

        $photo = new Estate_photo();
        $photo->where('estate_id', $estate->id);
        $photo->get_iterated();
        $dis['photo'] = $photo;

        $tag = $estate->tag;
        $dis['tag'] = explode(',', $tag);

        $keyword = explode(' ', $estate->title);

        $this->page_title = $estate->title.' | SotayNhadat.vn';
        $this->page_description = cut_string(str_replace(array("\r", "\n"), '', strip_tags($estate->description)), 150);
        $this->page_keyword = implode(', ', $keyword);

        /*Get estate related vip*/
        $estates_vip = new Estate();
        $estates_vip->where('id !=', $estate->id);
        $estates_vip->where('estatetype_id', $estate->estatetype_id);
        $estates_vip->where('isVip', 1);
        $estates_vip->where('active', 0);
        $estates_vip->order_by('created', 'desc');
        $estates_vip->get(10);
        $count_vip = $estates_vip->result_count();
        $dis['estates_vip'] = $estates_vip;

        /*Get estate related follow type, city and price*/
        $estates_related_type_city_area = new Estate();
        $estates_related_type_city_area->where('id !=', $estate->id);
        $estates_related_type_city_area->where('estatetype_id', $estate->estatetype_id);
        $estates_related_type_city_area->where('estatecity_id', $estate->estatecity_id);
        $estates_related_type_city_area->where('estateprice_id', $estate->estateprice_id);
        $estates_related_type_city_area->where('isVip', 0);
        $estates_related_type_city_area->where('active', 0);
        $estates_related_type_city_area->order_by('created', 'desc');
        $estates_related_type_city_area->get(10 - $count_vip);
        $dis['estates_related_type_city_area'] = $estates_related_type_city_area;
        $count_type_city_area = $estates_related_type_city_area->result_count();

        /*Get all id estate*/
        $list_estates_id = array(0);
        foreach($estates_related_type_city_area as $row){
            array_push($list_estates_id, $row->id);
        }

        /*Get estate related follow type, city and area*/
        if(10 - $count_vip - $count_type_city_area > 0){ /*If count more than 10*/
            $estates_related_area_price = new Estate();
            $estates_related_area_price->where('estatetype_id', $estate->estatetype_id);
            $estates_related_area_price->where('estatearea_id', $estate->estatearea_id);
            $estates_related_area_price->where('estatecity_id', $estate->estatecity_id);
            $estates_related_area_price->where_not_in('id',$list_estates_id);
            $estates_related_area_price->where('isVip', 0);
            $estates_related_area_price->where('active', 0);
            $estates_related_area_price->order_by('created', 'desc');
            $estates_related_area_price->get(10-$count_vip-$count_type_city_area);
            //$dis['estates_related_area_price'] = $estates_related_area_price;
        }
        
        //$limit_lv3 = $estates_related_area_price->result_count()==$limit_lv2?0:$limit_lv2-$estates_related_area_price->result_count();
        
        foreach($estates_related_area_price as $row)
        {
            array_push($list_estates_id,$row->id);    
        }
        
        $estates_related_new = new Estate();
        $estates_related_new->where('estatetype_id', $estate->estatetype_id);
        $estates_related_new->where('estatearea_id', $estate->estatearea_id);
        $estates_related_new->where('estatecity_id', $estate->estatecity_id);
        $estates_related_new->where('estateprice_id', $estate->estateprice_id);
        $estates_related_new->where_not_in('id',$list_estates_id);
        $estates_related_new->where('active', 0);
        $estates_related_new->order_by('created', 'desc');
        $estates_related_new->get($limit_lv3);
        $dis['estates_related_new'] = $estates_related_new;
        
        $estates_related_price = new Estate();
        $estates_related_price->where('estateprice_id', $estate->estateprice_id);
        $estates_related_price->where('estatecity_id', $estate->estatecity_id);
        $estates_related_price->where('id !=', $estate->id);
        $estates_related_price->where('active', 0);
        $estates_related_price->order_by('created', 'desc');
        $estates_related_price->get(10);
        $dis['estates_related_price'] = $estates_related_price;

        $estatePrices = new Estateprice();
        $estatePrices->where('estatecatalogue_id', $estate->estatecatalogue_id);
        $estatePrices->order_by('position', 'asc');
        $estatePrices->get_iterated();
        $dis['estatePrices'] = $estatePrices;



	    $this->isRobotFollow = 3;
        $dis['base_url']=base_url();
        $dis['view']='front/user/post-detail';
        $this->viewfront($dis);
    }

    function getEstateByAddress(){
        $cityUrl = $this->uri->segment(2, '');
        $districtUrl = $this->uri->segment(3, '');

        $city = new Estatecity();
        $city->where('name_none', $cityUrl)->get();
        if(!$city->exists()){
            show_404();
        }

        $district = new Estatedistrict();
        $district->where('name_none', $districtUrl)->get();
        if(!$district->exists()){
            show_404();
        }
        $dis['district'] = $district;

        /*get estates by category and type*/
        $estates = new Estate();
        $estates->order_by('isVip', 'desc');
        $estates->order_by('created', 'desc');
        $estates->where('estatedistrict_id', $district->id);
        $estates->where('isVip', 0);
        $estates->get_iterated();
        $dis['estates'] = $estates;

        $dis['base_url']=base_url();
        $dis['view']='front/estates/by_address';
        $this->viewfront($dis) ;
    }

    function changePassword()
    {
        $msg = "";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if($this->input->post('password') != $this->input->post('repassword') || $this->input->post('password') == '' ){
                $msg = 'Mật khẩu nhập lại không trùng nhau !';
                $type = 1;
            }
            else{
                $o = new Estateuser($this->session->userdata('userLoginId'));
                $o->password = md5($this->input->post('password'));
                $o->save();
                $msg = 'Thay đổi mật khẩu thành công.';
                $type = 2;
            }
        }

        $view = "front/user/change-password";
        $dis['base_url'] = base_url();
        $dis['view'] = $view;
        $dis['msg'] = $msg;
        $dis['type'] = $type;

        $this->viewfront($dis);
    }


    function forgetPassword(){
        $msg = '';
        error_reporting(0);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $email = $this->input->post('email');
            $user = new Estateuser();
            $user->get_by_email($email);
            if(!$user->exists()){
                $msg = 'Địa chỉ email không tồn tại. Vui lòng kiểm tra lại';
            }
            else{

                $newPassword = substr($user->password, 1, 6);
                $user->password = md5($newPassword);
                $subject = "Lấy lại mật khẩu tài khoản SotayNhadat.vn";
                $content = "Chào bạn ".$user->name;
                $content.= "<br /><br />Tài khoản của bạn tại website ".base_url()." đã được Chúng tôi cấp lại mật khẩu. Bạn vui lòng truy cập ".base_url()." và đăng nhập với mật khẩu mới, sau đó bạn cần thay đổi lại mật khẩu.";
                $content.= "<br /><br />Tên đăng nhập: ".$user->username;
                $content.= "<br />Mật khẩu: ".$newPassword;
                $content.= "<br /><br />Nếu bạn gặp khó khăn, bạn có thể liên hệ với Chúng tôi để được hỗ trợ:";
                $content.= "<br />Email: info@sotaynhadat.vn – Hotline: 0168 200 0080";
                $content.= "<br /><br />-------------------------------------------------------------";
                $content.= "<br />BQT SotayNhadat.vn";
                if($this->_send_email('myemail',$subject, $content, $user->email)){
                    $user->save();
                }

                $msg = "Chúng tôi đã gửi email chứa mật khẩu mới của bạn. Vui lòng kiểm tra hộp thư spam hay bulk nếu không tìm thấy email của chúng tôi.";
            }
        }
        $view = "front/user/forgotPassword";
        $dis['base_url'] = base_url();
        $dis['view'] = $view;
        $dis['msg'] = $msg;
        /*$dis['view'] = $view;

        $dis['type'] = $type;*/

        $this->viewfront($dis);
    }
    
    
    function resentEmailActive()
    {
        $msg = "";
        $view = "user/resentEmailActive";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $email = $this->input->post('regis_email');
            $customer = new customer();
            $customer->get_by_email($email);
            
            $view = "user/resentEmailActiveResult";
            if($customer->exists())
            {
                
                if($customer->isEmailActive == 1)
                {
                    $msg = "Tài khoản của bạn đã được kích hoạt. Vui lòng  click <a href='".base_url()."quen-mat-khau' >Vào đây</a>";
                    $msg.=" để được yêu cầu gửi lại mật khẩu.";
                    
                }
                else
                {
                    $subject = "Chúc mừng bạn đã đăng ký thành công tài khoản trên di động việt";
                    $content = "Chào ".$customer->name;
                    $content.= "<br />Bạn đã đăng ký thành công tài khoản trên website didongviet.vn";
                    $content.= "<br />Tên đăng nhập: ".$customer->username;
                    $content.= "<br />Để hoàn thành đăng ký, vui lòng click vào đường dẫn dưới đây:";
                    $content.= "<br /><br /><a href='".base_url()."xac-nhan-dang-ky/".$customer->emailActiveCode."' >".base_url()."xac-nhan-dang-ky/".$customer->emailActiveCode."</a>";
                    $this->_send_email('myemail',$subject,$content,$customer->email);
                    $msg = "Chúng tôi đã gửi email kích hoạt mới của bạn. Vui lòng kiểm tra hộp thư spam hay bulk nếu không tìm thấy email của chúng tôi.";
                }
            }else
            {
                $msg = "Tài khoản của bạn không tồn tại trong hệ thống.";
            }
        }
        $dis['base_url']=base_url();
        $dis['view']=$view;
    
        $dis['msg'] =$msg;
        $this->viewfront($dis);
    }
    
    private function _loginUser($customer)
    {
        $this->session->set_userdata("userLogin",$customer->username);
        $this->session->set_userdata('userToken',md5($customer->id));
        $this->session->set_userdata('userLoginFlag',"1");
        $this->userLoginFlag = 1;
        $this->loginUsername = $customer->username;
        $this->loginUser = $customer;
    }
    
    function mailActive()
    {
        $code = $this->uri->segment(2);
        $customer = new customer();
        $customer->get_by_emailActiveCode($code);
        $msg = "";
        if($customer->exists()  )
        {
            if($customer->isEmailActive == 0)
            {
                $customer->isEmailActive = 1;
                $customer->save();
                $this->_loginUser($customer);
                $msg = "Chúc mừng ".$customer->name. " đã kích hoạt thành công tài khoản.";
                $msg .= "<br />Click vào đây để về trang chủ:<a href='".base_url()."' >Về trang chủ</a>";
            }else
            {
                $msg = "Tài khoản của bạn đã được kích hoạt từ trước. Liên kết này không có hiệu lực nữa.";
            }
        }else
        {
            $msg = "Tài khoản của bạn không tồn tại trong hệ thống.";
        }
        $dis['customer'] = $customer;
        $dis['base_url']=base_url();
        $dis['view']='user/activeEmail';
        //$dis['step'] = $step;
        $dis['msg'] =$msg;
		$this->viewfront($dis);
    }
    function logout()
    {
        $this->session->set_userdata("userLogin",NULL);
        $this->session->set_userdata('userToken',NULL);
        $this->session->set_userdata('userLoginFlag',NULL);
        redirect(base_url());
    }
    function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $o = new Estateuser();
            $o->where('username',$username);
            $o->where('password',md5($password));
            $o->get();
            if($o->exists()){
                $this->session->set_userdata('userLogin', $o->name);
                $this->session->set_userdata('userLoginId', $o->id);
                $this->session->set_userdata('userLoginFlag', 1);
                redirect(base_url().'trang-ca-nhan');
            }else{
                $o = new Estateuser();
                $o->where('username_email',$username);
                $o->where('password',md5($password));
                $o->get();
                if($o->exists()){
                    $this->session->set_userdata('userLogin', $o->name);
                    $this->session->set_userdata('userLoginId', $o->id);
                    $this->session->set_userdata('userLoginFlag', 1);
                    redirect(base_url().'trang-ca-nhan');
                }
                else
                    $msg = "Tài khoản hay mật khẩu của bạn chưa đúng.";
            }
        }


        $dis['base_url']=base_url();
        $dis['view']='front/user/login';
        $dis['msg'] =$msg;
        $this->viewfront($dis);
    }

    function listPostByUser(){
        if($this->session->userdata('userLoginFlag') != 1){
            redirect(base_url().'dang-nhap');
        }

        $level = 1;
        $page = $this->uri->segment($level + 1,"") == "" ? 1 : $this->uri->segment($level + 1);
        $dis['page'] = $page;
        $limit = 15;
        $offset = ($page - 1)*$limit;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $estatecatalogue_id = $this->input->post('estatecatalogue_id');
            $estatetype_id = $this->input->post('estatetype_id');
            $estateprice_id = $this->input->post('estateprice_id');

            $estates = new Estate();
            $estates->where_related_estateuser('id', $this->session->userdata('userLoginId'));
            $estates->where( array('isFree' => 0) );
            if( $estatecatalogue_id != 0 )
                $estates->where('estatecatalogue_id' , $estatecatalogue_id);
            if( $estatetype_id != 0 )
                $estates->where('estatetype_id' , $estatetype_id);
            if( $estateprice_id != 0 )
                $estates->where('estateprice_id' , $estateprice_id);
            $estates->order_by('created','desc');
            $estates->get_paged($offset,$limit,TRUE);
            $dis['estates'] = $estates;
            setPaginationVb('chinh-sua-tin-da-dang/',$estates->paged->total_rows, $limit, 2);

        }else{

            $estates = new Estate();
            $estates->where_related_estateuser('id', $this->session->userdata('userLoginId'));
            $estates->where('isFree', 0);
            $estates->order_by('created','desc');
            $estates->get_paged($offset,$limit,TRUE);
            $dis['estates'] = $estates;
            setPaginationVb('chinh-sua-tin-da-dang/',$estates->paged->total_rows, $limit, 2);

            /*$estatesAll = new Estate();
            $estatesAll->where_related_estateuser('id', $this->session->userdata('userLoginId'));
            $estatesAll->order_by('created','desc');
            $estatesAll->get();
            $total = $estatesAll->result_count();*/

        }

        $dis['base_url']=base_url();
        $dis['view']='front/user/list-post';
        $this->viewfront($dis);
    }

    
    function emailCheck(){
        $email = $this->input->post('email');
        $o = new Estateuser();
        $o->get_by_email($email);
        if($o->exists())
            echo 'false';
        else
            echo 'true';
        exit;
    }

    function emailCheckSignup(){
        $email = $this->input->post('email');
        $o = new Emailsignup();
        $o->get_by_email($email);
        if($o->exists())
            echo 'false';
        else
            echo 'true';
        exit;
    }

    function emailSignup(){
        $email = $this->input->post('email');
        if( $email != '' ){
            $o = new Emailsignup();
            $o->email = $email;
            if( $o->save() ){
                echo "Bạn đã đăng ký nhận bản tin STND thành công";
            }else{
                echo "Có lỗi trong quá trình xử lý. Vui lòng thử lại";
            }
        }
        die;
    }
    
    function usernameCheck(){
        $username = $this->input->post('username');
        $o = new Estateuser();
        $o->get_by_username($username);
        if($o->exists())
            echo 'false';
        else
            echo 'true';
            
        exit;
    }

    function deletePhotoDefault($estateID) {
        $estate = new Estate($estateID);

        // remove image from folder.
        $pathImageDefault = $_SERVER['DOCUMENT_ROOT'].'/'.$estate->photo;
        unlink($pathImageDefault);

        // set image to default.
        $estate->photo = "";
        if ($estate->save()) {
            flash_message('success','Hình ảnh đại diện đã được xóa khỏi tin nhà đất');
            redirect(base_url().'chinh-sua-tin/'.$estateID);
        }else {
            flash_message('error','Đã có lỗi xãy ra !');
            redirect(base_url().'chinh-sua-tin/'.$estateID);
        }
    }

    function deletePhoto($estateID, $photoID)
    {
        $photoEstates = new Estate_photo($photoID);

        // remove image from folder.
        $pathImage = $_SERVER['DOCUMENT_ROOT'].'/'.$photoEstates->name;
        unlink($pathImage);

        if($photoEstates->delete()){
            flash_message('success','Hình ảnh đã được xóa khỏi tin nhà đất');
            redirect(base_url().'chinh-sua-tin/'.$estateID);
        }else {
            flash_message('error','Đã có lỗi xãy ra !');
            redirect(base_url().'chinh-sua-tin/'.$estateID);
        }
    }

    function getRoot(){
        echo $_SERVER['DOCUMENT_ROOT']; die;
    }
}
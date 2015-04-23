<style type="text/css">
    .note-login a{
        display: inline-block; color: #000; margin-top: 5px; font-style: italic;
    }
    .note-login a:hover{
        text-decoration: underline;
    }
    .login {
        width: 250px;
        height: auto;
        margin-left: 100px;
        border: 1px solid #b75a0e;
        border-radius: 6px;
        float: left;
    }
    .notice-login{
        float: left;
        width: 540px;
        margin-left: 40px;
        line-height: 22px;
    }
    .butondn input[type="submit"]{
        background: url("<?=base_url()?>images/butondn2.png");
        border: none;
        width: 100px;
        height: 35px;
        margin-left: 35px;
    }
</style>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url?>dang-nhap">Đăng nhập</a></div>
</div>
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <div class="lefkdk" style="width:480px; float:left; margin-left:8px; margin-bottom:10px;">
        <span style="display: block; text-align: center; margin-bottom: 10px; color: <?=$type==1 ? 'red' : 'blue';?>">
            <?=$msg;?>
        </span>
        <div class="boxtopdn" style="background-image:url('<?=$base_url;?>images/boxtop.png'); width:472px; height:63px; float:left;"></div>
        <div class="boxmid" style="background-image:url('<?=$base_url;?>images/boxmid.png'); width:472px; float:left;">
            <form class="form-login" action="<?=$base_url?>dang-nhap" method="post">
                <div class="form" style="padding-left: 45px;">
                    <p style="font-size:13px; margin-top:8px;float:left; font-weight:bold;">Tên đăng nhập hoặc Email:</p>
                    </p>
                    <input name="username" type="text" style="border:1px #a7a7a7 solid; width:370px; padding-left: 5px; color: #555; height:26px; margin-top:3px;" />
                </div>
                <div class="form" style="padding-left: 45px;">
                    <p style="font-size:13px; margin-top:8px; font-weight:bold; display: block">Mật khẩu: </p>
                    </p>
                    <input name="password" type="password" style="border:1px #a7a7a7 solid; width:370px; padding-left: 5px; color: #555; height:26px; margin-top:3px;" />
                </div>
                <div class="formdn" style="margin-left: 145px;">
                    <div class="butondn">
                        <input type="submit" value="" style="cursor: pointer"/>
                    </div>
                </div>
            </form>
            <div class="form">
                <div class="form1" style="float:left; width:130px; height:30px; padding-left: 0px;">
                    <div class="iconmatkhau">
                    </div>
                    <div class="titleform">
                        <a href="<?=$base_url?>quen-mat-khau">
                            <p>Quên mật khẩu</p>
                        </a>
                    </div>
                </div>
                <div class="form1"  style="float:left; width:80px; margin-left:20px; height:30px;">
                    <div class="icondangky">
                    </div>
                    <div class="titleform">
                        <a href="<?=$base_url?>dang-ky">
                            <p>Đăng ký</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="boxbotom" style="background-image:url('<?=$base_url;?>images/boxbottom.png'); height:32px; width:472px; float:left;"></div>
    </div>
    <style type="text/css">
        .rightdn a {color:#000;}
        .rightdn a:hover {color:#0A6E00;}
    </style>
    <div class="rightdn" style="float:left; width:455px;  border:1px #c5c5c5 solid; margin-top:18px;">
        <p style="font-size:14px; margin-left:10px; margin-top:10px;">Nếu bạn chưa có tài khoản tại <a href="<?=$base_url?>"><strong>Sotaynhadat.vn</strong></a>, bạn có thể <a href="<?=$base_url;?>dang-ky"><strong>Đăng ký</strong></a> </p>
        <p style="font-size:14px; margin-left:10px; margin-top:10px;">hoàn toàn miễn phí!</p>
        <p style="font-size:14px; margin-left:10px; margin-top:10px;">Nếu bạn gặp khó khăn trong quá trình đăng nhập, vui lòng sử dụng</p>
        <p style="font-size:14px; margin-left:10px; margin-top:10px;">chức năng <a href="<?=$base_url;?>quen-mat-khau"><strong>Quên mật khẩu</strong></a> hoặc liên hệ ngay với Chúng tôi để được</p>
        <p style="font-size:14px; margin-left:10px; margin-top:10px;">hỗ trợ nhanh chóng:</p>

        <div style="float:left; margin-top:10px; margin-left:10px; margin-bottom:10px; width:400px;">
            <div class="icon9" style="background-image:url('<?=$base_url;?>images/icon5.png'); width:31px; margin-right:5px; height:20px; float:left;"></div>
            <p style="color:#e00202; margin-top:3px; float:left; font-size:14px;">hotro@sotaynhadat.vn</p>
            <div class="icon9" style="background-image:url('<?=$base_url;?>images/icon6.png'); width:33px; margin-right:5px; margin-left:20px; height:22px; float:left;"></div>
            <p style="color:#e00202; margin-top:3px; float:left; font-size:14px;">0168 200 0080</p>
        </div>

    </div>
    <?=$this->load->view('front/includes/footer')?>
<!--end main-->
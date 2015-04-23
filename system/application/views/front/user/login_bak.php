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
</style>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url?>dang-nhap">Đăng nhập</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <span style="display: block; text-align: center; margin-bottom: 10px; color: <?=$type==1 ? 'red' : 'blue';?>">
        <?=$msg;?>
    </span>
    <div class="login">
        <div class="title-login">
            Đăng nhập
        </div>
        <div class="main-login">
            <form class="form-login" action="<?=$base_url?>dang-nhap" method="post">
                <span>Tên đăng nhập:</span>
                <input type="text" name="username" value=""/>
                <span>Mật khẩu:</span>
                <input type="password" name="password" value=""/>
                <input type="submit" value="Đăng nhập"/>
                <span class="note-login">
                    <a style="float: left; margin-left: 20px;" href="<?=$base_url?>quen-mat-khau">Quên mật khẩu</a>
                    <a style="margin-left: 20px;" href="<?=$base_url?>dang-ky">Đăng ký</a>
                </span>
            </form>
        </div>
    </div>
    <div class="notice-login">
        <?php $news= new Article(504); ?>
        <?= $news->full_vietnamese; ?>
    </div>
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
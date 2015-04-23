<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?=$base_url; ?>images/js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    $('#frm-post').validate({
        rules:{
            description:{
                required: true
            }
        },
        messages:{
            description:{
                required: 'Vui lòng nhập Thông tin mô tả'
            }
        }
    });
});

</script>
<style type="text/css">
    .note-capcha{
        position: absolute;
        top: 18px;
        left: 175px;
        color: #A5A5A5;
    }
    @media screen and (-webkit-min-device-pixel-ratio:0) {
        label.error {
            color: #FFFFFF;
            display: block;
            height: 18px;
            padding-left: 30px;
            padding-top: 2px;
            position: absolute;
            right: 0px;
            top: -17px;
            width: 150px;
            z-index: 10;
            font-weight: bold;
            font-size: 12px;
        }
    }
    .register input[type="text"], .register input[type="password"]{
        width: 388px;
        border: 1px solid #b75a0e;
    }
    .post{
        width: 700px;
        margin-bottom: 20px;
        border: none;
    }
    .post .title-form-register{
        width: 700px;
        background-color: #109502;
        margin-bottom: 20px;
    }
    .register select {
        border: 1px solid #CCC;
    }
    .register input[type="text"], .register input[type="password"] {
        width: 570px;
        border: 1px solid #CCC;
    }
    .register input[type="file"] {
        width: 580px;
        border: 1px solid #CCC;
    }
    .register textarea {
        width: 517px;
        border: 1px solid #CCC;
    }
    .register input[type="submit"] {
        border: 1px solid #109502;
    }
    .login span{
        padding: 0;
    }
    .main-register{
        padding: 0 3px 0 3px;
    }
</style>
<div class="linktop" style="width:960px;height:20px; float:left; margin-top:12px; margin-bottom:0px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang" style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?=$base_url;?>dang-tin-vip.html">Liên hệ đăng tin VIP</a></div>
</div>

<?php echo $this->load->view('front/user/navi-functions')?>

<div style="width:920px; float:left; border:1px solid #CCCCCC; height:auto; border-top:none; margin-bottom:15px; margin-left:9px; padding: 20px;">
    <div class="righttv" style="width:920px;margin-bottom:-16px;float:left; margin-left:0px;">
        <div style="width: 920px; margin: 0 auto;">
            <div class="register login post">
                <div class="title-form-register">Liên hệ đăng tin VIP</div>
                <div class="main-register">
                    <?php echo $news->full_vietnamese; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--main-->
<div class="main" style="width:980px;">
    <div class="cotleft" style="width:645px; float:left; margin-bottom:10px;">
        <p style=" font-size:18px; color:#109502; font-weight:bold; margin-left:9px;">Bạn nên xem </p>
        <div style="float:right; width:515px; height:1px; background-color:#109502; margin-top:-7px;"></div>
        <?php foreach($this->newsPrivate as $row): ?>
            <?php $cat = new Newscatalogue($row->newscatalogue_id); ?>
            <div class="sreentinthitruong">
                <div class="boxhinhthitruonglon">
                    <a target="_blank" href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?php echo $row->title_vietnamese;?>">
                        <img alt="<?php echo $row->title_vietnamese;?>" style="width: auto; height: auto;" src="<?= image('img/news/'.$row->image, 'news_196_124'); ?>" width="196" height="124">
                    </a>
                </div>
                <div  class="sreennoidungthitruong" style=" float:left; margin-top:6px; width:430px; margin-left:5px;">
                    <div class="sreentieudethitruong" style="width:430px; float:right; margin-bottom:3px; margin-top:0px; ">
                        <div class="tieudenoibat2" >
                            <a target="_blank" style="width: 100%;height: auto;" href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?php echo $row->title_vietnamese;?>">
                                <p  style="margin-left:12px; "><?php echo $row->title_vietnamese;?></p>
                            </a>
                        </div>
                    </div>
                    <div style="width:430px; margin-bottom:10px;float:left;">
                        <p style="color:#999999; font-size:13px; margin-left:12px;">Cập nhật: <?=get_date_from_sql($row->created);?></p>
                    </div>
                    <div class="sreenndtinthitruong" style="width:410px; margin-left:12px; height:70px; float:left;color:#333333;">
                        <p align="justify" style="margin-left:0px; font-size:14px; font-weight:lighter;">
                            <?=strlen($row->short_vietnamese) < 200 ? $row->short_vietnamese : cut_string($row->short_vietnamese, 250).'...';?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="linedot"></div>
        <?php endforeach; ?>
    </div>
    <div style="width:1px; background:#CCCCCC; height:520px; float:left; margin-left:12px; margin-top:15px;"></div>
    <div class="cotright" style="width: 300px; margin-top:14px; float:right; margin-right:9px; ">
        <?php echo $this->load->view('front/includes/adv_right_s'); ?>
    </div>
</div>
<!--end main-->
<?=$this->load->view('front/includes/footer')?>
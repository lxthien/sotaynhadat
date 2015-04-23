<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style=" width:960px;height:20px; float:left; margin-top:8px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang" style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?=$base_url;?>doi-mat-khau">Đổi mật khẩu</a></div>
</div>

<?php echo $this->load->view('front/user/navi-functions')?>

<div style="width:920px; float:left; border:1px solid #CCCCCC; height:auto; border-top:none; margin-bottom:15px; margin-left:9px; padding: 20px;">
    <div class="righttv" style="width:920px; margin-bottom:-16px;  float:left; margin-left:3px;">
        <div style="width: 700px; margin: 0 auto;">
            <span style="display: block; text-align: center; margin-bottom: -2px; color:#057200; ">
                <?=$msg;?>
            </span>
            <div class="login">
                <div class="title-login">
                    Thay đổi mật khẩu
                </div>
                <div class="main-login">
                    <form class="form-login" action="<?=$base_url?>doi-mat-khau" method="post" color="#3245a4">
                        <span>Mật khẩu mới:</span>
                        <input style="width: 200px;" type="password" name="password" value=""/>
                        <span>Nhập lại mật khẩu:</span>
                        <input style="width: 200px;" type="password" name="repassword" value=""/>
                        <input type="submit" value="Thay đổi"/>
                    </form>
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
        <!--
        <div class="phantrang" style="float:left; width:240px;   margin-left:210px; margin-top:5px; height:20px;">
            <div class="next"><a href=""><p style="margin-left:3px;margin-top:2px;"> << Sau</p></a></div>
            <div class="number"><a href=""><p style="margin-left:7px; margin-top:2px;">1</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">2</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">3</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">4</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">5</p></a></div>
            <div class="next">
                <a href="">
                    <p style="margin-left:3px;margin-top:2px;"> Trước >> </p>
                </a>
            </div>
        </div>
        -->
    </div>
    <div style="width:1px; background:#CCCCCC; height:520px; float:left; margin-left:12px; margin-top:15px;"></div>
    <div class="cotright" style="width: 300px; margin-top:14px; float:right; margin-right:9px; ">
        <?php echo $this->load->view('front/includes/adv_right_s'); ?>
    </div>
</div>
<!--end main-->
<?=$this->load->view('front/includes/footer')?>
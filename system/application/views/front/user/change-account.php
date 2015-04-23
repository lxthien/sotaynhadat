<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style="width:960px;height:20px; float:left; margin-top:12px; margin-bottom:0px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang" style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?=$base_url;?>thay-doi-thong-tin">Thay đổi thông tin cá nhân</a></div>
</div>

<?php echo $this->load->view('front/user/navi-functions')?>

<div style="width:920px; float:left; border:1px solid #CCCCCC; height:auto; border-top:none; margin-bottom:15px; margin-left:9px; padding: 20px;">
    <div class="righttv" style="width:920px; margin-bottom:-16px;  float:left; margin-left:3px;">
        <div style="width: 700px; margin: 0 auto; margin-bottom: 20px;">
            <span style="display: block; text-align: center; margin-bottom: -2px; color: <?=$type==1 ? 'red' : 'blue';?>">
                <?=$msg;?>
            </span>
            <div class="register login">
                <div class="title-form-register">
                    Thay đổi thông tin cá nhân
                </div>
                <div class="main-register">
                    <form class="form-register" id="frmContact" name="frmContact" method="post" action="<?=$base_url;?>thay-doi-thong-tin">
                        <span class="rowLabel"></span>
                        <span class="rowLabel">Họ và tên<span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input type="text" name="name" id="name" value="<?=$customer->name;?>" /></span>
                        <span style="display: none;" class="rowLabel">Tên đăng nhập<span style="display: inline-block; color: red;">(*)</span></span>
                        <span style="display: none;" class="rowInput"><input type="text" name="username" id="username" value="<?=$customer->username;?>"" /></span>
                        <span style="display: none;" class="rowLabel">Email của bạn <span style="display: inline-block; color: red;">(*)</span></span>
                        <span style="display: none;" class="rowInput"><input type="text" name="email" id="email" value="<?=$customer->email;?>" /></span>
                        <span class="rowLabel">Điện thoại cố định<span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input type="text" name="mobilePhone" id="mobilePhone" value="<?=$customer->mobilePhone;?>" /></span>
                        <span class="rowLabel">Điện thoại di động<span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input type="text" name="mobile" id="mobile" value="<?=$customer->mobile;?>" /></span>
                        <span class="rowLabel">Địa chỉ<span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input type="text" name="address" id="address" value="<?=$customer->address;?>" /></span>
                        <span class="rowLabel">Tỉnh/Thành phố<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput">
                    <select name="estatecity_id" id="estatecity_id">
                        <option value="0">--- Chọn Tỉnh/Thành phố ---</option>
                        <?php foreach($this->estateProvince as $row): ?>
                            <option <?php if($customer->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </span>
                        <span class="rowLabel">Quận/Huyện<span style="display: inline-block; color: red;">(*)</span></span>
                        <input type="hidden" name="estatedistrict_selected" value="<?=$customer->estatedistrict_id;?>"/>
                        <span class="rowInput">
                    <select name="estatedistrict_id" id="estatedistrict_id">
                        <option value="0">--- Chọn Quận/Huyện ---</option>
                        <?php foreach($district as $row): ?>
                            <option <?php if($customer->estatedistrict_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </span>
                <span class="rowInput" >
                    <input type="submit" class="button" value="Cập nhật" />
                </span>
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
    </div>
    <div style="width:1px; background:#CCCCCC; height:520px; float:left; margin-left:12px; margin-top:15px;"></div>
    <div class="cotright" style="width: 300px; margin-top:14px; float:right; margin-right:9px; ">
        <?php echo $this->load->view('front/includes/adv_right_s'); ?>
    </div>
</div>
<!--end main-->
<?=$this->load->view('front/includes/footer')?>

<style type="text/css">
    span.rowInput{display: block;}
    .register input[type="text"], .register input[type="password"]{width: 414px;}
    .register select{width: 420px;height: 25px;}
</style>
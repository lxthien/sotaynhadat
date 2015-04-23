<!--
<div class="lefttv" style="width: 220px; height:235px; float:left; margin-left: 15px; border-right:1px #109502 solid;">
    <div class="tieudetv" style="width: 210px; height:30px; background-color:#109502; color:#FFFFFF; font-size:16px; font-weight:bold; margin-bottom:10px;">
        <p style="margin-top:7px; float:left; margin-left:40px;">Trang cá nhân</p>
    </div>
    <div class="sreencanhan" style="width:210px; margin-top:-10px; height:35px; float:left;  background-color:#e7e7e7; ">
        <div class="noidungtv">
            <a href="<?=$base_url?>dang-tin" style="width: 210px; height: 35px;">
                <p style="text-align:justify; margin-left:8px; margin-top:13px; font-size:13px;">Đăng tin Bán/Cho thuê</p>
            </a>
        </div>
    </div>
    <div class="sreencanhan2" style="width:210px; height:35px; float:left;  background-color:#FFFFFF; ">
        <div class="noidungtv">
            <a href="<?=$base_url?>chinh-sua-tin-da-dang" style="width: 210px; height: 35px;">
                <p style="text-align:justify; margin-left:8px; margin-top:11px; font-size:13px;">Sửa/Xóa tin đã đăng</p>
            </a>
        </div>
    </div>
    <div class="sreencanhan2" style="width:210px; height:35px; float:left;  background-color:#e7e7e7; ">
        <div class="noidungtv">
            <a  href="<?=$base_url?>dang-tin-vip.html" style="width: 210px; height: 35px;">
                <p style="text-align:justify; margin-left:8px; margin-top:11px; font-size:13px;">Liên hệ tin đăng VIP</p>
            </a>
        </div>
    </div>
    <div class="sreencanhan" style="width:210px; height:35px; float:left;  background-color:#fff; ">
        <div class="noidungtv">
            <a  href="<?=$base_url?>thay-doi-thong-tin" style="width: 210px; height: 35px;">
                <p style="text-align:justify; margin-left:8px; margin-top:11px; font-size:13px;">Thay đổi thông tin cá nhân</p>
            </a>
        </div>
    </div>
    <div class="sreencanhan2" style="width:210px; height:35px; float:left;  background-color:#e7e7e7; ">
        <div class="noidungtv">
            <a  href="<?=$base_url?>doi-mat-khau" style="width: 210px; height: 35px;">
                <p style="text-align:justify; margin-left:8px; margin-top:11px; font-size:13px;">Thay đổi mật khẩu</p>
            </a>
        </div>
    </div>
    <div class="sreencanhan" style="width:210px; height:35px; float:left;  background-color:#fff; ">
        <div class="noidungtv">
            <a  href="<?=$base_url?>dang-xuat" style="width: 210px; height: 35px;">
                <p style="text-align:justify; margin-left:8px; margin-top:11px; font-size:13px;">Thoát khỏi hệ thống</p>
            </a>
        </div>
    </div>
	<?php if($this->uri->segment(1, '') == 'dang-tin'): ?>
    <div class="info-post">
        <img src="<?php echo $base_url.'img/upload/notice-post.jpg' ?>" />
    </div>
	<?php endif; ?>
</div>
-->
<div style="width:960px; height:35px; float:left; margin-top:20px; border-bottom:none; margin-left:9px; border:1px solid #CCCCCC;">
    <div class="nav-member-col <?php echo $this->router->fetch_method() == 'post' ? 'active' : ''; ?>">
        <p class="textthanhvien2" style="margin-left:12px; margin-top:10px;"><a href="<?=$base_url?>dang-tin">Đăng tin bán/Cho thuê</a></p>
    </div>
    <div class="nav-member-col <?php echo $this->router->fetch_method() == 'listPostByUser' ? 'active' : ''; ?> <?php echo $this->router->fetch_method() == 'editPost' ? 'active' : ''; ?>">
        <p class="textthanhvien2" style="margin-left:20px; margin-top:10px;"><a href="<?=$base_url?>chinh-sua-tin-da-dang">Sửa/Xóa tin đã đăng</a></p>
    </div>
    <div class="nav-member-col <?php echo $this->router->fetch_method() == 'contact' ? 'active' : ''; ?>">
        <p class="textthanhvien2" style="margin-top:10px; margin-left:12px;"><a href="<?=$base_url?>dang-tin-vip.html">Liên hệ tin đăng tin VIP</a></p>
    </div>
    <div class="nav-member-col <?php echo $this->router->fetch_method() == 'changeAccount' ? 'active' : ''; ?>">
        <p class="textthanhvien2" style="margin-top:10px; margin-left:28px;"><a href="<?=$base_url?>thay-doi-thong-tin">Thay đổi thông tin</a></p>
    </div>
    <div class="nav-member-col <?php echo $this->router->fetch_method() == 'changePassword' ? 'active' : ''; ?>">
        <p class="textthanhvien2" style="margin-top:10px; margin-left:26px;"><a href="<?=$base_url?>doi-mat-khau">Thay đổi mật khẩu</a></p>
    </div>
    <div class="nav-member-col last" style="width:105px;">
        <p class="textthanhvien2" style="margin-top:10px; margin-left:32px;"><a href="<?=$base_url?>dang-xuat">Thoát</a></p>
    </div>
</div>
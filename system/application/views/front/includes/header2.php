<!--header-->
    <div class="header">
        <div class="logo">	<a href="<?=$base_url;?>"></a></div>
        <div class="headerleft">
            <a target="_blank" href="<?=$this->adverHeader->link;?>">
                <img src="<?=$base_url.$this->adverHeader->image;?>" width="352" height="90" />
            </a>
        </div>
    </div>
    <div class="sreendk" style="float:right; width:295px; margin-bottom:-2px; margin-right:17px; height:25px;">
        <?php if($this->session->userdata('userLoginFlag') != 1): ?>
        <div class="dk">
            <a style="text-align: center; font-weight: 600;" href="<?=$base_url?>dang-nhap">
                <p style="padding-top: 5px;">Đăng Nhập </p>
            </a></div>
        <div class="dk">
            <a style="text-align: center; font-weight: 600;" href="<?=$base_url?>dang-ky">
                <p style="padding-top: 5px;">Đăng Ký  </p>
            </a>
        </div>
        <?php else: ?>
            <div class="dk">
                <a style="text-align: center; font-weight: 600;" href="<?=$base_url?>dang-xuat">
                    <p style="padding-top: 5px;">Đăng xuất</p>
                </a>
            </div>
            <div class="dk">
                <a style="text-align: center; font-weight: 600;" href="<?=$base_url?>trang-ca-nhan">
                    <p style="padding-top: 5px;"><?=$this->session->userdata('userLogin')?></p>
                </a>
            </div>
        <?php endif; ?>
    </div>
<!--end header-->
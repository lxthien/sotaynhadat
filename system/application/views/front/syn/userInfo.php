<script type="text/javascript">
$().ready(function(){
    $(".login_link").colorbox({inline:true, width:"500px"});
});
</script>
<?php if($this->loginUsername == "") { ?>
		<span><a href="#login_content" class="login_link" title="Đăng nhập">Đăng nhập</a></span>&nbsp;|&nbsp;
		<span><a href="<?=$base_url;?>dang-ky" title="Đăng ký">Đăng ký</a></span>&nbsp;|&nbsp;
        <?php } else { ?>
        <span>Chào <strong><?=$this->loginUsername;?></strong></span>
        <span><a href="<?=$base_url;?>dang-xuat" title="Đăng xuất" class="">Đăng xuất</a></span>&nbsp;|&nbsp;
        <span><a href="<?=$base_url;?>tai-khoan" title="Tài khoản" class="">Tài khoản</a></span>&nbsp;|&nbsp;
        <?php } ?>
		<span><a href="<?=$base_url;?>tro-giup">Trợ giúp</a></span>
<script type="text/javascript" src="<?=$base_url;?>images/js/jquery.validate.js?v1"></script>
<script type="text/javascript">
$().ready(function(){
    $("#frmForgotPassword").validate({
       rules:{
            regis_email :{
                required:true,
                email:true
            }
       } ,
       messages:{
            regis_email: {
                required:"Vui lòng nhập email",
                email: "Nhập đúng email"
            }
       }
    });
    $("#btnConfirm").click(function(){
        if($("#frmForgotPassword").valid())
        {
            $("#frmForgotPassword").submit();
        } 
        returnf false;
    });
}) ;
</script>
<?php $this->load->view('front/includes/breadcrumb') ?>
<div class="regis_box">
	<div class="regis_box_title">Gửi lại email kích hoạt</div>
	<div class="">
    <form id="frmForgotPassword" action="<?=$base_url;?>gui-lai-mail-kich-hoat" method="post" >
		<div style="text-align: left;padding-left:104px;padding-top:20px;">Nhập email của bạn bên dưới</div>
        <div class="regis_line">
			<div class="fl regis_line_txt">Email <font color="red">(*)</font></div>
			<div class="fl"><input type="text" name="regis_email" value="" /></div>
			<div class="clr"></div>
		</div>
        <div class="regis_btn">
		      <input type="image" id="btnConfirm" src="<?=base_url()?>images/btn_confirm.png" />
		</div>
	</div>
    </form>
</div>
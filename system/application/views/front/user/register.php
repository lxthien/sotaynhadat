<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<link type="text/css" href="<?=$base_url;?>images/js/jqueryui/css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$base_url;?>images/js/jqueryui/js/jquery-ui-1.8.24.custom.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>images/js/jquery.validate.js?v1"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.validator.addMethod("nospace", function(value, element) { 
          return value.indexOf(" ") < 0 && value != ""; 
        }, "Không nhập khoảng trắng");
        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^\w+$/i.test(value);
        }, "Không nhập các kí tự đặc biệt");

        $("#frmContact").validate({
            rules:{
                name:{
                    required:true
                },
                username:{
                    required:true,
                    nospace: true,
                    alphanumeric: true,
                    minlength: 6,
                    remote:{
                        url:'<?=$base_url;?>kiem-tra-account',
                        type:'post',
                        data:{username :function(){return $(':input[name="username"]').val();}}
                    }
                },
                email:{
                    required:true,
                    email:true,
                    remote:{
                        url:'<?=$base_url;?>kiem-tra-email',
                        type:'post',
                        data:{email :function(){return $(':input[name="email"]').val();}}
                    }
                },
                password:{
                    required:true,
                    minlength: 6
                },
                repassword:{
                    equalTo: ':input[name="password"]'
                },
                estatecity_id:{
                    required:true
                },
                estatedistrict_id: {
                    required: true
                },
                country:{
                    required: true
                },
                agree:{
                    required: true
                },
                mobile:{
                    required: true,
                    number: true
                }
            } ,
            messages:{
                name:{
                    required: 'Vui lòng nhập họ và tên'
                },
                username:{
                    required: 'Vui lòng nhập tên tài khoản',
                    minlength: 'Vui lòng nhập hơn 6 kí tự',
                    remote:"Username đã được sử dụng."
                },
                email:{
                    required: 'Vui lòng nhập email',
                    email: "Nhập đúng địa chỉ email",
                    remote:"Email đã được sử dụng."
                },
                password:{
                    required: 'Vui lòng nhập mật khẩu'
                },
                repassword:{
                    equalTo:"Nhập trùng với mật khẩu."
                },
                estatecity_id:{
                    required: 'Vui lòng chọn thành phố'
                },
                estatedistrict_id: {
                    required: 'Vui lòng chọn huyện'
                },
                agree:{
                    required: 'Vui lòng đồng ý quy định'
                },
                mobile:{
                    required: 'Vui lòng nhập di động',
                    number: 'Vui lòng chỉ nhập số'
                }
            }
        });
    });
</script>
<style type="text/css">
    .form{
        position: relative;
    }
</style>
<div class="linktop" style="width:960px;height:20px; float:left; margin-top:12px; margin-bottom:0px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang" style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?=$base_url;?>dang-ky">Đăng ký</a></div>
</div>
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <?php if(!empty($msg)): ?>
        <span style="display: block; line-height: 16px; padding-left: 25px; width: 910px; font-size: 13px; text-align: justify; margin-top: 7px; margin-bottom: <?php if($isHide == 1) {echo '180px';}?>;">
            <?=$msg;?>
        </span>
    <?php endif; ?>
    <form class="form-register" id="frmContact" name="frmContact" method="post" action="<?=$base_url;?>dang-ky">
        <div class="lefkdk" style="width:480px; float:left; margin-left:8px; margin-bottom:10px;">
            <div style="<?php if($isHide == 1) {echo 'display: none';}?>">
                <div class="boxtopdn" style="background-image:url('<?=base_url()?>images/boxtop2.png'); width:472px; height:63px; float:left;"></div>
                <div class="boxmid" style="background-image:url('<?=base_url()?>images/boxmid.png'); width:472px; float:left;">
                <div class="form">
				<center> <p style="font-size:13px">Các trường có dấu <span style="color: red;">(*)</span> là buộc phải nhập.</p></center>
                    <p style="font-size:13px;font-weight:bold;">Họ và tên: <span style="display: inline-block; color: red;">(*)</span></p>
                    <input name="name" value="<?=$o->name;?>" type="text" maxlength="50" style="border:1px #a7a7a7 solid; width:395px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                </div>
                <div class="form">
                    <p style="font-size:13px;font-weight:bold;">Tên đăng nhập: <span style="display: inline-block; color: red;">(*)</span></p>
                    <input name="username" value="<?=$o->username;?>" type="text" style="border:1px #a7a7a7 solid; width:395px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                </div>
                <div class="row-full-register">
                    <div class="form">
                        <p style="font-size:13px;font-weight:bold;">Mật khẩu: <span style="display: inline-block; color: red;">(*)</span></p>
                        <input name="password" type="password" style="border:1px #a7a7a7 solid; width:190px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                    </div>
                    <div class="form" style="padding-left: 5px;">
                        <p style="font-size:13px;font-weight:bold;">Nhập lại mật khẩu: <span style="display: inline-block; color: red;">(*)</span></p>
                        <input name="repassword" type="password" style="border:1px #a7a7a7 solid; width:190px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                    </div>
                </div>
                <div class="form">
                    <p style="font-size:13px;font-weight:bold;">Email: <span style="display: inline-block; color: red;">(*)</span></p>
                    <input name="email" value="<?=$o->email;?>" type="text" style="border:1px #a7a7a7 solid; width:395px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                </div>
                <div class="row-full-register">
                    <div class="form">
                        <p style="font-size:13px;font-weight:bold;">Điện thoại cố định:</p>
                        <input name="mobilePhone" value="<?=$o->mobilePhone;?>" type="text" style="border:1px #a7a7a7 solid; width:190px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" maxlength="12" />
                    </div>
                    <div class="form" style="padding-left: 5px;">
                        <p style="font-size:13px;font-weight:bold;">Điện thoại di động: <span style="display: inline-block; color: red;">(*)</span></p>
                        <input name="mobile" value="<?=$o->mobile;?>" type="text" style="border:1px #a7a7a7 solid; width:190px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" maxlength="12" />
                    </div>
                </div>
                <div class="form">
                    <p style="font-size:13px;font-weight:bold;">Địa chỉ:</p>
                    <input name="address" value="<?=$o->address;?>" type="text" style="border:1px #a7a7a7 solid; width:395px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                </div>
                <div class="row-full-register">
                    <div class="form">
                        <p style="font-size:13px;font-weight:bold; margin-bottom: 3px;">Tỉnh/TP: <span style="display: inline-block; color: red;">(*)</span></p>
                        <select name="estatecity_id" id="estatecity_id" style="width: 197px; color: #555; height: 25px; line-height: 25px;">
                            <option value="">Chọn Tỉnh/Thành phố</option>
                            <?php foreach($this->estateProvince as $row): ?>
                                <option <?php if($o->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                    <div class="form" style="padding-left: 5px;">
                        <p style="font-size:13px;font-weight:bold; margin-bottom: 3px;">Quận/Huyện: <span style="display: inline-block; color: red;">(*)</span></p>
                        <input type="hidden" name="estatedistrict_selected" value="<?=$o->estatedistrict_id;?>"/>
                        <select name="estatedistrict_id" id="estatedistrict_id" style="width: 197px; color: #555; height: 25px; line-height: 25px;">
                            <option value="">Chọn Quận/Huyện</option>
                        </select>
                    </div>
                </div>
                <div class="form">
                    <p style="font-size:13px;font-weight:bold;line-height: 25px;">Mã xác nhận: </p>
                    <div class="maxacnhan">
                        <img id="captcha" height="40" width="200" src="<?=$base_url;?>securimage/securimage_show.php" alt="CAPTCHA Image" />
                    </div>
                    <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '<?=$base_url;?>/securimage/securimage_show.php?' + Math.random(); return false">
                        <img alt="Refresh" width="20" height="20" style="margin-top: 20px; margin-left: -18px;" src="<?=$base_url?>images/refresh.png"/>
                    </a>
                </div>
                <div class="form">
                    <p style="font-size:13px;font-weight:bold;">Nhập mã xác nhận: <span style="display: inline-block; color: red;">(*)</span></p>
                    <input name="captcha_code" type="text" style="border:1px #a7a7a7 solid; width:395px; padding-left: 5px; color: #555555; height:26px; margin-top:3px;" />
                </div>
                <div class="form">
                    <style type="text/css">
                        .form a {color:#000;}
                        .form a:hover {color:#0A6E00;}
                    </style>
                    <p style="font-size:13px;font-weight:bold;">&nbsp;</p>
                    <label><input type="checkbox" name="agree" value="1"/> Tôi đồng ý với <a class="footer-term-use" href="<?=$base_url;?>quy-dinh-su-dung.html ">Quy định sử dụng</a> của SotayNhadat.vn</label>
                </div>
                <div class="formdky">
                    <div class="butondk">
                        <input type="submit" value=""/>
                    </div>
                </div>
                </div>
                    <div class="boxbotom" style="background-image:url('<?=base_url()?>images/boxbottom.png'); height:32px; width:472px; float:left;">
                </div>
            </div>
        </div>
    </form>
    <div class="rightdn" style="float:left; width:455px;  border:1px #c5c5c5 solid; margin-top:8px; <?php if($isHide == 1) {echo 'display: none';}?>">
        <p style="font-size:14px; margin-left:10px; margin-top:10px;">Việc đăng ký thành viên rất đơn giản, nhanh chóng. Và tất nhiên,</p>
        <p style="font-size:14px; margin-left:10px; margin-top:2px;">hoàn toàn miễn phí!</p>
        <p style="font-size:14px; margin-left:10px; margin-top:10px;"><strong>Tham gia cùng SotayNhaDat.vn:</strong></p>
        <div style="width:450px; height:25px; float:left; margin-left:10px; margin-bottom:10px; margin-top:5px;">
            <div class="icon8"></div>
            <div style="float:left; width:420px; height:25px;">
                <p class="style3" style="font-size:14px; margin-top:5px; float:left; ">
                    - Giúp bạn tiếp cận với lượng khách hàng lớn, việc mua bán trở nên dễ dàng hơn.
                </p>
                <p class="style3" style="font-size:14px; margin-top:5px; float:left; height:50px;">&nbsp;</p>
            </div>
        </div>
        <div style="width:450px; height:25px; float:left; margin-left:10px; margin-bottom:10px;margin-top:5px;">
            <div class="icon8"></div>
            <div style="float:left; width:420px; height:25px;">
                <p class="style3" style="font-size:14px; margin-top:5px; float:left; ">
                    - Các chức năng, thông tin được thiết kế khoa học, thân thiện, dễ sử dụng.
                </p>
                <p class="style3" style="font-size:14px; margin-top:5px; float:left; height:50px;">&nbsp;</p>
            </div>
        </div>
        <div style="width:450px; height:25px; float:left; margin-left:10px;margin-top:5px;">
            <div class="icon8"></div>
            <div style="float:left; width:420px; height:25px;">
                <p class="style3" style="font-size:14px; margin-top:5px; float:left; ">
                    - Nhận được sự hỗ trợ tích cực từ Chúng tôi.
                </p>
                <p class="style3" style="font-size:14px; margin-top:5px; float:left; height:50px;">&nbsp;</p>
            </div>
        </div>
        <div style="float:left; width:450px; height:25px; margin-left:10px; margin-bottom:10px;">
            <p class="style4" style="font-size:14px; margin-top:5px; float:left; ">
                Nếu bạn gặp khó khăn khi đăng ký, vui lòng liên hệ ngay để được hỗ trợ nhanh chóng:</p>
            <p class="style3" style="font-size:14px; margin-top:5px; float:left; height:50px;">&nbsp;</p>
        </div>
        <div style="float:left; margin-top:10px; margin-left:10px; margin-bottom:10px; width:400px;">
            <div class="icon9" style="background-image:url('<?=base_url()?>images/icon5.png'); width:31px; margin-right:5px; height:20px; float:left;"></div>
            <p style="color:#e00202; margin-top:3px; float:left; font-size:14px;">hotro@sotaynhadat.vn</p>
            <div class="icon9" style="background-image:url('<?=base_url()?>images/icon6.png'); width:33px; margin-right:5px; margin-left:20px; height:22px; float:left;"></div>
            <p style="color:#e00202; margin-top:3px; float:left; font-size:14px;">0168 200 0080</p>
        </div>
    </div>
    <!--end main-->
    <?=$this->load->view('front/includes/footer')?>
</div>
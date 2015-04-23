<link type="text/css" href="<?=$base_url;?>images/js/jqueryui/css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$base_url;?>images/js/jqueryui/js/jquery-ui-1.8.24.custom.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>images/js/jquery.validate.js?v1"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#frmContact").validate({
        rules:{
            firstname:{
                required:true
            },
            lastname:{
                required:true
            },
            username:{
                required:true
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
            address:{
                required:true
            },
            phone:{
                required:true
            },
            estatecity_id:{
                required: true
            },
            country:{
                required: true
            },
            estatedistrict_id:{
                required: true
            }
        } ,
        messages:{
            firstname:{
                required: 'Vui lòng nhập họ và tên lót'
            },
            lastname:{
                required: 'Vui lòng nhập tên'
            },
            username:{
                required: 'Vui lòng nhập tên tài khoản'
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
            address:{
                required: 'Vui lòng nhập địa chỉ'
            },
            phone:{
                required: 'Vui lòng nhập số điện thoại'
            },
            estatecity_id:{
                required: 'Vui lòng chọn tỉnh'
            },
            estatedistrict_id:{
                required: 'Vui lòng chọn huyện'
            }
        }
    });
});
</script>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url;?>dang-ky">Đăng ký</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <span style="display: block; text-align: center;"><?=$msg;?></span>
    <div class="register login">
        <div class="title-form-register">
            Đăng ký thành viên
        </div>
        <div class="main-register">
            <form class="form-register" id="frmContact" name="frmContact" method="post" action="<?=$base_url;?>dang-ky">
                <span class="rowLabel"></span>
                <span class="rowLabel">Họ và tên lót<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="firstname" id="firstname" value="<?=$o->firstname;?>" placeholder="Nhập họ và tên lót" /></span>
                <span class="rowLabel">Tên<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="lastname" id="lastname" value="<?=$o->lastname;?>" placeholder="Nhập tên của bạn" /></span>
                <span class="rowLabel">Tên đăng nhập<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="username" id="username" value="<?=$o->username;?>" placeholder="Nhập tài khoản" /></span>
                <span class="rowLabel">Mật khẩu<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="password" name="password" id="password" value="<?=$o->password;?>" /></span>
                <span class="rowLabel">Nhập lại mật khẩu <span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="password" name="repassword" id="repassword" value="<?=$o->password;?>" /></span>
                <span class="rowLabel">Email của bạn <span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="email" id="email" value="<?=$o->email;?>" placeholder="Nhập địa chie email" /></span>
                <span class="rowLabel">Phone<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="mobilePhone" id="mobilePhone" value="<?=$o->phone;?>" placeholder="Nhập số điện thoại"/></span>
                <span class="rowLabel">Mobile<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="mobile" id="mobile" value="<?=$o->mobile;?>" placeholder="Nhập điện thoại di động"/></span>
                <span class="rowLabel">Địa chỉ<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="address" id="address" value="<?=$o->address;?>" placeholder="Nhập địa chỉ" /></span>
                <span class="rowLabel">Tỉnh/Thành phố <span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput">
                    <select name="estatecity_id" id="estatecity_id">
                        <option value="">--- Chọn Tỉnh/ Thành phố ---</option>
                        <?php foreach($this->estateProvince as $row): ?>
                            <option <?php if($o->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </span>
                <span class="rowLabel">Quận/huyện:<span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput">
                    <input type="hidden" name="estatedistrict_selected" value="<?=$o->estatedistrict_id;?>"/>
                    <select name="estatedistrict_id" id="estatedistrict_id">
                        <option value="">--- Chọn Quận/ Huyện ---</option>
                    </select>
                </span>
                <span class="rowLabel" style="position:relative;">
                    <img id="captcha" height="50" src="<?=$base_url;?>securimage/securimage_show.php" alt="CAPTCHA Image" />
                    <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '<?=$base_url;?>/securimage/securimage_show.php?' + Math.random(); return false">
                        <img alt="Refresh" width="30" height="30" src="<?=$base_url?>images/refresh.png" style="position:absolute;bottom:5px;left:0px;cursor:pointer;" />
                    </a>
                </span>
                <span class="rowLabel">Mã xác nhận <span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="captcha_code" id="captcha_code" value="" placeholder="Nhập mã xác nhận hình trên" /></span>
                <span class="rowInput" >
                    <input type="submit" class="button" value="Đăng ký" />
                </span>
            </form>
        </div>
    </div>
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
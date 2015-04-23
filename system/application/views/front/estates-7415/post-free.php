<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?=$base_url; ?>images/js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    $('#frm-post').validate({
        rules:{
            estatetype_id:{
                required: true
            },
            estatecatalogue_id:{
                required: true
            },
            estatedirection_id:{
                required: true
            },
            estatearea_id:{
                required: true
            },
            legally:{
                required: true
            },
            estateprice_id:{
                required: true
            },
            estatecity_id:{
                required: true
            },
            estatedistrict_id:{
                required: true
            },
            title:{
                required: true,
                minlength: 25,
                maxlength: 100
            },
            description:{
                required: true
            },
            captcha_code:{
                required: true,
                maxlength: 6,
                minlength: 6
            },
            area_text:{
                required: true
            },
            price_text:{
                required: true
            },
            name_contact:{
                required: true
            },
            mobile_contact:{
                required: true,
                number: true
            }
        },
        messages:{
            estatetype_id:{
                required: 'Vui lòng chọn Phân mục'
            },
            estatecatalogue_id:{
                required: 'Vui lòng chọn Hình thức'
            },
            estatedirection_id:{
                required: 'Vui lòng chọn Hướng nhà'
            },
            estatearea_id:{
                required: 'Vui lòng chọn Diện tích'
            },
            legally:{
                required: 'Vui lòng chọn Pháp lý'
            },
            estateprice_id:{
                required: 'Vui lòng chọn Mức giá'
            },
            estatecity_id:{
                required: 'Vui lòng chọn Tỉnh/TP'
            },
            estatedistrict_id:{
                required: 'Vui lòng chọn Quận/Huyện'
            },
            title:{
                required: 'Vui lòng nhập Tiêu đề',
                minlength: 'Vui lòng nhập tối thiểu 30 kí tự',
                maxlength: 'Vui lòng nhập tối đa 100 ký tự'
            },
            description:{
                required: 'Vui lòng nhập Thông tin mô tả'
            },
            captcha_code:{
                required: 'Vui lòng nhập Mã xác nhận',
                maxlength: 'Mã xác nhận 6 ký tự',
                minlength: 'Mã xác nhận 6 ký tự'
            },
            area_text:{
                required: 'Vui lòng nhập Diện tích'
            },
            price_text:{
                required: 'Vui lòng nhập Giá'
            },
            name_contact:{
                required: 'Vui lòng nhập Tên'
            },
            mobile_contact:{
                required: 'Vui lòng nhập số di động',
                number: 'Vui lòng chỉ nhập số'
            }
        }
    });
    // Load Type
    load_type();
    $('#catalogue').focusout(function(){
        load_type();
    });
    $('#catalogue').change(function(){
        load_type();
    });
    // Load District
    load_district();
    $('#city').focusout(function(){
        load_district();
    });
    $('#city').change(function(){
        load_district();
    });

    $('.price[value="1"]').attr('checked','checked');

    // Check Price
    $('.isprice').click(function(){
        if($(this).val() == 0){
            $('.depend-isprice').show();
        }
        else{
            $('.depend-isprice').hide();
        }
    })
    $('.area[value="1"]').attr('checked','checked');
    $('#area').attr('value','');

    // Check Area
    $('.area').click(function(){
        if($(this).val() == 0){
            $('#area_content').hide();
            $('#area').attr('value','0');
        }
        else{
            $('#area_content').show();
            $('#area').attr('value','');
        }
    });

    // Show Price
    $("#number").keyup(function(){
        show_price();
    });
    $('#cal_unit').change(function(){
        show_price();
    });
    $("#unit").keyup(function(){
        show_price();
    });
    $("#number").focusout(function(){
        show_price();
    });

    $('#area_text').keypress(function(e) {
        var key = String.fromCharCode(e.which);
        var pattern=/^[0-9]{1,11}(,[0-9]{0,5})?$/;

        // test this
        var txt = $(this).val() + key;

        if (!pattern.test(txt)) {
            e.preventDefault();
        }
    });


    $('#price_text').keypress(function(e) {
        var key = String.fromCharCode(e.which);
        var pattern=/^[0-9]{1,11}(,[0-9]{0,5})?$/;

        // test this
        var txt = $(this).val() + key;

        if (!pattern.test(txt)) {
            e.preventDefault();
        }
    });

    /*jQuery to add/remove validate legally*/
    $('#estatecatalogue_id').change(function(){
        var Id = $(this).val();
        if(Id == 2){
            $('.pl-required').hide();
            $('.direction-required').hide();
            $( "#legally" ).rules( "remove", "required" );
            $( "#estatedirection_id" ).rules( "remove", "required" );

            $('.price-type-02').show();
            $('.price-type-01').hide();
        }else{
            $('.pl-required').show();
            $('.direction-required').show();
            $( "#legally" ).rules( "add", {required: true});
            $( "#estatedirection_id" ).rules( "add", {required: true});

            $('.price-type-01').show();
            $('.price-type-02').hide();
        }
    });
    if( $('#estatecatalogue_id').val() > 0 ){
        var Id = $('#estatecatalogue_id').val();
        if(Id == 2){
            $('.pl-required').hide();
            $('.direction-required').hide();
            $( "#legally" ).rules( "remove", "required" );
            $( "#estatedirection_id" ).rules( "remove", "required" );

            $('.price-type-02').show();
            $('.price-type-01').hide();
        }else{
            $('.pl-required').show();
            $('.direction-required').show();
            $( "#legally" ).rules( "add", {required: true});
            $( "#estatedirection_id" ).rules( "add", {required: true});

            $('.price-type-01').show();
            $('.price-type-02').hide();
        }
    }

    /*jQuery to add muti images*/
    var i = 0;
    $('.add-image').live('click', function(){
        if(i>6){
            alert('Vui lòng upload ít hơn hoặc 8 tấm hình');
            return false;
        }
        i++;
        $('.muti-images').append('<div class="row-image">'
            +'<input type="file" name="image'+i+'" id="image" value="" />'
            +'<a class="add-image" href="javascript:void(0)">Thêm hình</a> / '
            +'<a class="delete-image" href="javascript:void(0)">Xóa hình</a></span>'
            +'<input type="hidden" name="numfile[]" value="'+i+'" />'
            +'</div>');
        return false;
    });

    /*jQuery to delete muti images*/
    $('.delete-image').live('click', function(){
        i--;
        $(this).parent().remove();
        return false;
    });
});
function load_type()
{
    var catalogue = $('#catalogue').val();
    if(catalogue!=0){
        var id = '#type-'+catalogue;
        $('#type').html($(id).html());
    }else{
        $('#type').html('<option value="">Chọn Phân loại</option>');
    }
}
function load_district()
{
    var city = $('#city').val();
    if(city!='')
    {
        $('#district').html($('#city-'+city).html());
    }
    else
    {
        $('#district').html('<option value="">--- Chọn Quận/Huyện ---</option>');
    }
}
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
            padding-left: 25px;
            padding-top: 1px;
            position: absolute;
            right: 0px;
            top: -17px;
            width: 160px;
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
        width: 600px;
        margin-bottom: 20px;
        border: none;
    }
    .post .title-form-register{
        width: 600px;
        background-color: #109502;
    }
    .register select {
        border: 1px solid #CCC;
    }
    .register input[type="text"], .register input[type="password"] {
        width: 573px;
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
        border-radius: 5px;
        background: #109502;
        text-transform: uppercase;
        color: #fff;
        font-weight: bold;
        height: 30px;
        line-height: 28px;
    }
    .price-text{
        width: 190px;
        float: left;
    }
    .price-type{
        width: 200px;
        float: left;
        height: 21px;
    }
    .rowInput-price{
        height: 20px;
    }
    .add-image, .delete-image{
        text-decoration: underline !important;
        display: inline-block;
        font-weight: bold;
    }
    .add-image{
        margin-left: 5px;
    }
    .row-image{
        margin-bottom: 5px;
    }
    .login span{
        display: block;
    }
    #title{
        /*text-transform: lowercase;*/
    }
</style>

<div class="linktop" style=" width:960px;height:20px; float:left; margin-top:8px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang" style=" width:auto; float:left;"><a href="<?=$base_url;?>dang-tin-rao-vat-nha-dat-mien-phi">Đăng tin miễn phí</a></div>
</div>
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <div class="righttv" style="width:920px; margin: 0 auto;">
        <div style="width: 920px; margin: 0 auto;">
            <span style="margin-top: 30px; display: block;text-align: left;margin-bottom: 10px; margin-left: 0px; color: <?=$type==1 ? '#000' : 'red';?>;font-size: 14px;line-height: 20px;">
                <?=$msg;?>
            </span>
            <p style="text-align:center;color:#0000;margin-top:0px; font-size: 15px; line-height: 20px; display: <?php echo $type==1?'none':'block'; ?>">
                Tại đây, bạn có thể đăng tin mà không cần đăng nhập tài khoản thành viên.</br> 
    			Chúc bạn mua may bán đắt!
            </p>
            </br>
            <div style="display: <?php echo $type==1?'none':'block'; ?>" class="register login post">
                <div class="title-form-register">
                    Đăng tin 
                </div>
                <div class="main-register">
                    <form class="form-register" id="frm-post" name="frmContact" method="post" action="<?=$base_url;?>dang-tin-rao-vat-nha-dat-mien-phi" enctype="multipart/form-data">
                        <div class="row-post">
                            <div class="type-post">
							</br>
                                <span class="rowLabel">Hình thức: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <select name="estatecatalogue_id" id="estatecatalogue_id">
                                        <option value="">Chọn Hình thức</option>
                                        <?php foreach($this->estateCatalogues as $row): ?>
                                            <option <?php if($o->estatecatalogue_id == $row->id) echo 'selected="selected"';?> value="<?=$row->id?>"><?=$row->name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </span>
                            </div>
							</br>
			                <div class="row-post-02">
                                <span class="rowLabel">Phân mục: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <input type="hidden" name="estatetype_selected" value="<?=$o->estatetype_id?>"/>
                                    <select name="estatetype_id" id="estatetype_id">
                                        <option value="" selected="selected">Chọn Phân mục</option>
                                    </select>
                                </span>
								<span></span>
                            </div>
                        </div>
                        <div class="row-post">
                            <span class="rowInput">
                                <label><input <?php if($o->isArea == 0) echo 'checked="checked"'; ?> name="IsArea" value="0" type="radio"/> Có diện tích</label>
                                <label><input <?php if($o->isArea == 1) echo 'checked="checked"'; ?> name="IsArea" type="radio" value="1"/> Không xác định</label>
                            </span>
                        </div> 
                        <div class="row-post">
                            <div class="area-post">
                                <span class="rowLabel">Diện tích: <span style="display: inline-block; color: red;">(*)</span><span class="note-area-text">(Chỉ dùng số và dấu phẩy)</span></span>
                                <span class="rowInput">
                                    <input style="width: 444px;" type="text" name="area_text" id="area_text" value="<?=$o->area_text;?>"/>
                                    <span style="position: absolute; right: 0px; top: 0px;">m <sup>2</sup></span>
                                </span>
                            </div>
                            <div class="area-post-02">
                                <span class="rowLabel">Chọn Mức diện tích: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <select name="estatearea_id" id="estatearea_id">
                                        <option value="">Chọn Mức diện tích</option>
                                        <?php foreach($this->estateareas as $row): ?>
                                            <option <?php if($o->estatearea_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                                        <?php endforeach; unset($row); ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="row-post">
                            <div class="area-post phaply">
                                <span class="rowLabel">Pháp lý: <span class="pl-required" style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <select class="select" name="legally" id="legally">
                                        <option <?php if($o->legally == '') echo 'selected="selected"';?> value="">Chọn loại Pháp lý</option>
                                        <option <?php if($o->legally == 'Bìa hồng') echo 'selected="selected"';?> value="Bìa hồng">Bìa hồng</option>
                                        <option <?php if($o->legally == 'Bìa đỏ') echo 'selected="selected"';?> value="Bìa đỏ">Bìa đỏ</option>
                                        <option <?php if($o->legally == 'Hợp đồng góp vốn') echo 'selected="selected"';?> value="Hợp đồng góp vốn">Hợp đồng góp vốn</option>
                                        <option <?php if($o->legally == 'Hợp đồng') echo 'selected="selected"';?> value="Hợp đồng">Hợp đồng</option>
                                    </select>
                                </span>
                            </div>
                            <div class="area-post-02">
                                <span class="rowLabel">Hướng: <span class="direction-required" style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <select name="estatedirection_id" id="estatedirection_id">
                                        <option value="">Chọn Hướng nhà</option>
                                        <?php foreach($this->estateDirection as $row): ?>
                                            <option <?php if($o->estatedirection_id == $row->id) echo 'selected="selected"';?> value="<?=$row->id?>"><?=$row->name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="row-post">
                            <span class="rowInput">
                                <label><input class="isprice" <?php if($o->isPrice == 0) echo 'checked="checked"'; ?> name="IsPrice" type="radio" value="0"/> Có giá</label>
                                <label><input class="isprice" <?php if($o->isPrice == 1) echo 'checked="checked"'; ?> name="IsPrice" type="radio" value="1"/> Thỏa thuận</label>
                            </span>
                        </div>
                        <div class="row-post depend-isprice">
                            <div class="enter-price">
                                <span class="rowLabel">Nhập giá: <span style="display: inline-block; color: red;">(*)</span><span class="note-area-text">(Chỉ dùng số và dấu phẩy)</span></span>
                                <input style="width: 225px;" class="price-text" type="text" name="price_text" id="price_text" value="<?=$o->price_text;?>"/>
                            </div>
                            <div class="bettwen-price">
                                <span class="rowLabel">Đơn vị: <span style="display: inline-block; color: red;">(*)</span></span>
                                <select class="price-type price-type-01" name="price_type" style="width: 100px;">
                                    <option <?=$o->price_type==1?'selected="selected"':'';?> value="1">Triệu</option>
                                    <option <?=$o->price_type==2?'selected="selected"':'';?> value="2">Tỷ</option>
                                    <option <?=$o->price_type==3?'selected="selected"':'';?> value="3">Cây vàng</option>
                                    <option <?=$o->price_type==4?'selected="selected"':'';?> value="4">USD</option>
                                    <option <?=$o->price_type==5?'selected="selected"':'';?> value="5">USD/m2</option>
                                    <option <?=$o->price_type==6?'selected="selected"':'';?> value="6">Trăm nghìn/m2</option>
                                    <option <?=$o->price_type==7?'selected="selected"':'';?> value="7">Triệu/m2</option>
                                    <option <?=$o->price_type==8?'selected="selected"':'';?> value="8">Chỉ vàng/m2</option>
                                    <option <?=$o->price_type==9?'selected="selected"':'';?> value="9">Cây vàng/m2</option>
                                </select>
                                <select class="price-type price-type-02" name="price_type_2" style="width: 100px; display: none;">
                                    <option <?=$o->price_type==10?'selected="selected"':'';?> value="10">Nghìn/tháng</option>
                                    <option <?=$o->price_type==11?'selected="selected"':'';?> value="11">Triệu/tháng</option>
                                    <option <?=$o->price_type==12?'selected="selected"':'';?> value="12">USD/tháng</option>
                                    <option <?=$o->price_type==13?'selected="selected"':'';?> value="13">Triệu/năm</option>
                                    <option <?=$o->price_type==14?'selected="selected"':'';?> value="14">Nghìn/m2/tháng</option>
                                    <option <?=$o->price_type==15?'selected="selected"':'';?> value="15">Triệu/m2/tháng</option>
                                    <option <?=$o->price_type==16?'selected="selected"':'';?> value="16">USD/m2/tháng</option>
                                </select>
                            </div>
                            <div class="select-price">
                                <span class="rowLabel">Chọn Mức giá: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <input type="hidden" name="price_selected" value="<?=$o->estateprice_id;?>"/>
                                    <select name="estateprice_id" id="estateprice_id">
                                        <option value="" selected="selected">Chọn Mức giá</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="row-post">
                            <div class="area-post">
                                <span class="rowLabel">Tỉnh/Thành phố: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <select name="estatecity_id" id="estatecity_id">
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        <?php foreach($this->estateProvince as $row): ?>
                                            <option <?php if($o->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                                        <?php endforeach; unset($row); ?>
                                    </select>
                                </span>
                            </div>
                            <div class="area-post-02">
                                <span class="rowLabel">Quận/Huyện: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <input type="hidden" name="estatedistrict_selected" value="<?=$o->estatedistrict_id?>"/>
                                    <select name="estatedistrict_id" id="estatedistrict_id" class="district-select">
                                        <option value="" selected="selected">Chọn Quận/Huyện</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="row-post">
                            <div class="area-post">
                                <span class="rowLabel">Phường/Xã: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <input type="hidden" name="estateward_selected" value="<?=$o->estateward_id?>"/>
                                    <select name="estateward_id" id="estateward_id">
                                        <option value="" selected="">Chọn Phường/Xã</option>
                                    </select>
                                </span>
                            </div>
                            <div class="area-post-02" style="padding-top: 3px;">
                                <span class="rowLabel">Số nhà, Tên đường: </span>
                                <span class="rowInput"><input style="width: 444px;" type="text" name="address" id="address" value="<?=$o->address;?>"/></span>
                            </div>
                        </div>
                        <span class="rowLabel">Tiêu đề: <span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input maxlength="100" type="text" name="title" id="title" value="<?=$o->title;?>" /></span>
                         <span style="color: #5a5a5a; font-size: 12px;" class="rowLabel">(Vui lòng nhập tiêu đề, tối thiểu 30 ký tự, tối đa 100 ký tự, không sử dụng ký tự đặc biệt: !,@,#,$...)</span> <span> </span>
                        <span class="rowLabel">Hình ảnh: <span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput muti-images">
                            <div class="row-image">
                                <input type="file" name="image" id="image" value="<?=$o->image;?>" />
                            </div>
                        </span>
						<span style="color: #5a5a5a; font-size: 12px;" class="rowLabel">(Tin rao có ảnh sẽ được xem nhiều gấp 10 lần và nhiều người gọi gấp 5 lần so với tin rao không có ảnh.)</span> <span> </span>
                        <span class="rowLabel">Thông tin mô tả: <span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput">
                            <textarea style="height: 150px;" name="description"><?=$o->description;?></textarea>
                            <script type="text/javascript">
                                editor_description=CKEDITOR.replace( 'description',
                                    {
                                        toolbar:[],
                                        height:200,
                                        resize_enabled: false
                                    });
                            </script>
                        </span>
						</span></span>
                        <span class="rowLabel">Thuộc Dự án:  <span style="color: #5a5a5a; font-size: 12px;" class="rowLabel">(Chọn dự án để giúp tin đăng của bạn thêm phong phú.)</span></span>
                        <span class="rowInput">
                            <select name="article_id" id="article_id">
                                <option value="0">Chọn Dự Án</option>
                                <?php foreach($project as $row): ?>
                                    <option value="<?=$row->id?>"><?=$row->title_vietnamese?></option>
                                <?php endforeach; ?>
                            </select>
                        </span>
						<span></span><span></span>
                        <div class="row-posts">
                            <span class="information-contact">Thông tin liên hệ:</span>
                            <span class="rowLabel">Tên: <span style="display: inline-block; color: red;">(*)</span></span>
                            <span class="rowInput"><input placeholder="Nhập tên liên hệ" type="text" name="name_contact" id="name_contact" value="<?=$o->name_contact;?>" /></span>
                            <span class="rowLabel">Địa chỉ:</span>
                            <span class="rowInput"><input placeholder="Nhập địa chỉ liên hệ" type="text" name="address_contact" id="address_contact" value="<?=$o->address_contact;?>" /></span>
                            <span class="rowLabel">Điện thoại cố định:</span>
                            <span class="rowInput"><input placeholder="Nhập số điện thoại cố định (nếu có)" type="text" name="phone_contact" id="phone_contact" value="<?=$o->phone_contact;?>" /></span>
                            <span class="rowLabel">Điện thoại di động: <span style="display: inline-block; color: red;">(*)</span></span>
                            <span class="rowInput"><input placeholder="Nhập số điện thoại di động" type="text" name="mobile_contact" id="mobile_contact" value="<?=$o->mobile_contact;?>" /></span>
                            <span class="rowLabel">Email:</span>
                            <span class="rowInput"><input placeholder="Nhập địa chỉ Email (nếu có)" type="text" name="email_contact" id="email_contact" value="<?=$o->email_contact;?>" /></span>
                        </div>
                        <span class="rowInput" style="float: left;" >
                            <div class="area-post">
                                        <span class="rowLabel">Mã xác nhận: <span
                                                style="display: inline-block; color: red;">(*)</span></span>
                                        <span class="rowInput" style="position: relative;">
                                            <input style="width: 200px;float: left;margin-right: 5px;height: 28px;" type="text" name="captcha_code" id="captcha_code" value=""/>
                                            <img style="float: left;" id="captcha" height="30" src="<?= $base_url; ?>securimage/securimage_show.php" alt="CAPTCHA Image"/>
                                            <a href="javascript:void(0)"
                                               onclick="document.getElementById('captcha').src = '<?= $base_url; ?>/securimage/securimage_show.php?' + Math.random(); return false">
                                                <img style="position:absolute; bottom:16px; right:140px; cursor:pointer; top: 8px;"
                                                     alt="Refresh" width="18" height="18"
                                                     src="<?= $base_url ?>images/refresh.png"/>
                                            </a>
                                        </span>
                            </div>
                            <div class="area-post-02">&nbsp;</div>
                        </span><br>
                        <span class="rowInput" style="float: left; width: 100%;">
                            <input type="submit" class="button" value="Đăng tin" />
                        </span>
                        <div class="cl"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?=$this->load->view('front/includes/footer')?>
</div>
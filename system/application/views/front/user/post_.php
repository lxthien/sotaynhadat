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
            address:{
                required: true,
                maxlength: 200
            },
            title:{
                required: true,
                maxlength: 200
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
            address:{
                required: 'Vui lòng nhập Địa chỉ',
                maxlength: 'Nhập tối đa 200 ký tự'
            },
            title:{
                required: 'Vui lòng nhập Tiêu đề',
                maxlength: 'Nhập tối đa 200 ký tự'
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
    //
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
        if(i>3){
            alert('Vui lòng upload ít hơn hoặc 5 tấm hình');
            return false;
        }
        i++;
        $('.muti-images').append('<div class="row-image">'
            +'<input type="file" name="image'+i+'" id="image" value="" />'
            +'<a class="add-image" href="javascript:void(0)">Thêm hình</a> /'
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
    if(catalogue!=0)
    {
        var id = '#type-'+catalogue;
        $('#type').html($(id).html());
    }
    else
    {
        $('#type').html('<option value="">--- Chọn loại ---</option>');
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
function number_to_string($number) {
    var $dic = new Array('','ngàn ','triệu ','tỷ ','ngàn tỷ ','triệu tỷ ','tỷ tỷ ');
    var $number_str = $number.toString()
    var $new_number = $number_str.split("").reverse().join(""); // Dao chieu
    var $arr_number = new Array();
    // Cat so thanh tung phan
    for(var $i=0;$i<$new_number.length;$i+=3)
    {
        $arr_number.push($new_number.substr($i,3).split("").reverse().join(""));
    }
    var $arr_text = '';
    for($i=($arr_number.length-1);$i>=0;$i--)
    {
        $arr_text += remove_zero($arr_number[$i],$dic[$i]);
    }
    return $arr_text;
}
function remove_zero($number,$text)
{
    var $result = '';
    var $new_number = parseInt($number,10);
    if($new_number != 0)
    {
        $result += $new_number+' '+$text;
    }
    return $result;
}
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
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
        width: 600px;
        margin-bottom: 20px;
        border: 1px solid #0681ff;
    }
    .post .title-form-register{
        width: 600px;
        background-color: #0681ff;
    }
    .register select {
        border: 1px solid #CCC;
    }
    .register input[type="text"], .register input[type="password"] {
        width: 570px;
        border: 1px solid #CCC;
    }
    .register input[type="file"] {
        width: 570px;
        border: 1px solid #CCC;
    }
    .register textarea {
        width: 517px;
        border: 1px solid #CCC;
    }
    .register input[type="submit"] {
        border: 1px solid #0681ff;
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
</style>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px;  ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url;?>dang-tin">Đăng tin mua bán / cho thuê</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
<?=$this->load->view('front/user/navi-functions')?>
<!--right-->
<div class="righttv" style="width:720px; margin-bottom:-16px;  float:left; margin-left:3px;">
<div style="width: 700px; margin: 0 auto;">
            <span style="display: block; text-align: center; margin-bottom: 10px; margin-left: -95px; color: <?=$type==1 ? 'red' : 'blue';?>">
                <?=$msg;?>
            </span>
            <div class="register login post">
                <div class="title-form-register">
                    Đăng tin rao vặt nhà đất
                </div>
                <div class="main-register">
                    <form class="form-register" id="frm-post" name="frmContact" method="post" action="<?=$base_url;?>dang-tin" enctype="multipart/form-data">
                        <div class="row-post">
                            <div class="type-post">
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
                            <div class="row-post-02">
                                <span class="rowLabel">Phân mục: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput">
                                    <input type="hidden" name="estatetype_selected" value="<?=$o->estatetype_id?>"/>
                                    <select name="estatetype_id" id="estatetype_id">
                                        <option value="" selected="selected">Chọn Phân mục</option>
                                    </select>
                                </span>
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
                                    <input style="width: 275px;" type="text" name="area_text" id="area_text" value="<?=$o->area_text;?>"/>
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
                                        <option <?php if($o->legally == '') echo 'selected="selected"';?> value="">Chọn loại</option>
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
                                <label><input <?php if($o->isPrice == 0) echo 'checked="checked"'; ?> class="isprice" name="IsPrice" type="radio" value="0"/> Có giá</label>
                                <label><input <?php if($o->isPrice == 1) echo 'checked="checked"'; ?> class="isprice" name="IsPrice" type="radio" value="1"/> Thỏa thuận</label>
                            </span>
                        </div>
                        <div class="row-post depend-isprice">
                            <div class="enter-price">
                                <span class="rowLabel">Nhập giá: <span style="display: inline-block; color: red;">(*)</span></span>
                                <input style="width: 220px;" class="price-text" type="text" name="price_text" id="price_text" value="<?=$o->price_text;?>"/>
                            </div>
                            <div class="bettwen-price">
                                <span class="rowLabel">Đơn vị: <span style="display: inline-block; color: red;">(*)</span></span>
                                <select class="price-type price-type-01" name="price_type" style="width: 100px;">
                                    <option type="1" <?=$o->price_type==1?'selected="selected"':'';?> value="1">Triệu</option>
                                    <option type="1" <?=$o->price_type==2?'selected="selected"':'';?> value="2">Tỷ</option>
                                    <option type="1" <?=$o->price_type==3?'selected="selected"':'';?> value="3">Cây vàng</option>
                                    <option type="1" <?=$o->price_type==4?'selected="selected"':'';?> value="4">USD</option>
                                </select>
                                <select class="price-type price-type-02" name="price_type" style="width: 100px; display: none;">
                                    <option type="2" <?=$o->price_type==5?'selected="selected"':'';?> value="5">USD/m2</option>
                                    <option type="2" <?=$o->price_type==6?'selected="selected"':'';?> value="6">Trăm nghìn/m2</option>
                                    <option type="2" <?=$o->price_type==7?'selected="selected"':'';?> value="7">Triệu/m2</option>
                                    <option type="2" <?=$o->price_type==8?'selected="selected"':'';?> value="8">Chỉ vàng/m2</option>
                                    <option type="2" <?=$o->price_type==9?'selected="selected"':'';?> value="9">Cây vàng/m2</option>
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
                            <div class="area-post-02">
                                <span class="rowLabel">Số nhà, Tên đường: <span style="display: inline-block; color: red;">(*)</span></span>
                                <span class="rowInput"><input style="width: 275px;" type="text" name="address" id="address" value="<?=$o->address;?>"/></span>
                            </div>
                        </div>
                        <span class="rowLabel">Tiêu đề: <span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input type="text" name="title" id="title" value="<?=$o->title;?>" /></span>
                        <span style="color: #A5A5A5; font-size: 11px;" class="rowLabel"><em>(Tiêu đề nên viết rõ ràng, đầy đủ. Không sử dụng ký tự đặc biệt: @, #, $, v.v.v.)</em></span>
                        <span class="rowLabel">Hình ảnh: <span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput muti-images">
                            <div class="row-image">
                                <input type="file" name="image" id="image" value="<?=$o->image;?>" />
                                <!--<a class="add-image" href="javascript:void(0)">Thêm hình</a>
                                <input type="hidden" name="numfile[]" value="1" />-->
                            </div>
                        </span>
                        <span class="rowLabel">Mô tả: <span style="display: inline-block; color: red;">(*)</span></span>
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
                        <span class="rowLabel">Thuộc Dự án:</span>
                        <span class="rowInput">
                            <select name="article_id" id="article_id">
                                <option value="0">Chọn Dự Án</option>
                                <?php foreach($project as $row): ?>
                                    <option value="<?=$row->id?>"><?=$row->title_vietnamese?></option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                        <span class="rowLabel" style="position:relative;">
                            <img id="captcha" height="50" src="<?=$base_url;?>securimage/securimage_show.php" alt="CAPTCHA Image" />
                            <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '<?=$base_url;?>/securimage/securimage_show.php?' + Math.random(); return false">
                                <img alt="Refresh" width="30" height="30" src="<?=$base_url?>images/refresh.png" style="position:absolute;bottom:5px;left:0px;cursor:pointer;" />
                            </a>
                            <!--<span class="note-capcha"><em>(Lưu ý: Không phân biệt chữ hoa, chữ thường)</em></span>-->
                        </span>
                        <span class="rowLabel">Mã xác nhận: <span style="display: inline-block; color: red;">(*)</span></span>
                        <span class="rowInput"><input type="text" name="captcha_code" id="captcha_code" value="" /></span>
                        <span class="rowInput" >
                            <input type="submit" class="button" value="Đăng tin" />
                        </span>
                    </form>
                </div>
            </div>
</div>
</div>
<!--end right-->
<?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
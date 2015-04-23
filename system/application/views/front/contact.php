<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?=$base_url; ?>images/js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$('#myForm').validate({
			rules:{
				title:{
					required:true,
					maxlength:100
					},
				name:{
					required: true,
					maxlength:50
				},
				email:{
					required: true,
					email:true
				},
				content:{
					required: true
				},
				phone:{
                    required: true,
                    number:true
                },
                address:{
                    required: true
                }
			},
			messages:{
				title:{
					required:"<font color=red>Vui lòng nhập tiêu đề</font>"	,
					maxlength:"<font color=red>Tiêu đề tối đa 100 kí tự</font>"
					},
				name:{
					required: "<font color=red>Vui lòng nhập họ tên của bạn</font>",
					maxlength:"<font color=red>Tên không quá 50 kí tự</font>"
				},
				email:{
					required: "<font color=red>Vui lòng nhập địa chỉ email</font>",
					email: "<font color=red>Nhập đúng dạng địa chỉ email</font>"
				},
				content:{
					required: "<font color=red>Vui lòng nhập nội dung</font>"
				},
                phone:{
                    required: "<font color=red>Vui lòng nhập số điện thoại</font>",
                    number: "<font color=red>Vui lòng nhập số</font>"
                },
                address:{
                    required: "<font color=red>Vui lòng nhập địa chỉ</font>"
                }
			}
		});
	});
</script>
<style type="text/css">
    .contact-tbl-content{
        position: relative;
    }
    label.error{
        width: 200px;
        top: 0px;
        right: 120px;
        padding-top: 2px;
        height: 16px;
    }
</style>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url?>" title="Sàn nhà đất">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url?>lien-he.html" title="Liên hệ">Liên hệ với SotayNhadat.vn</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px;  margin-left:12px; ">
    <!--left-->
    <div class="left">
        <!--lien he-->
        <div class="hotnew">
            <div class="titlenew">
                <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px;  margin-top:5px;">
                    Liên hệ - Góp ý
                </p>
            </div>
            <form id="myForm" action="<?=$base_url?>lien-he.html" method="post">
                <div class="noidunggioithieu" style="  width:545px;  margin-top:25px; margin-left:25px; margin-bottom:10px;">
                    <div class="contact-tbl">
                        <div class="contact-tbl-row"><img src="<?=$base_url?>images/contact_add.png" width="16" height="18" />
                            <span class="label" style="font-weight:bold;">Địa chỉ: </span>
                            Tầng 3, Tòa nhà ACB, 12 Hoàng Hoa Thám, Phường 2, TP. Vũng Tàu, BRVT.
                        </div>
                        <div class="contact-tbl-row"><img src="<?=$base_url?>images/contact_phone.png" width="16" height="18" />
                            <span class="label" style="font-weight:bold;">Điện thoại: </span>
                            064.651.6388 &nbsp;&nbsp;<img src="<?=$base_url?>images/contact_hotline.png" width="16" height="18" style=" margin-bottom:-3px;" />
                    <span class="label">
                        <span id="ctl28_ctl01_lblTPhone" style="font-weight:bold;">Di động: </span>&nbsp;</span>
                            <span class="content" style="border: 0;background-image: none;">0168 200 0080 </span>
                        </div>
                        <div class="contact-tbl-row"><img src="<?=$base_url?>images/contact_web.png" width="16" height="18" />
                            <span class="label" style="font-weight:bold;">Website: </span> www.sotaynhadat.vn&nbsp;&nbsp;<img src="<?=$base_url?>images/contact_email.png" width="16" height="18"  style=" margin-bottom:-4px;"/>
                    <span class="label">
                        <span id="ctl28_ctl01_lblTPhone" style="font-weight:bold;">Email: </span>&nbsp;</span>
                            <span class="content">info@sotaynhadat.vn </span>
                        </div>
                        <div class="clear"></div>
                        <span style="display: block; text-align: center; padding: 5px 0px; font-weight: 600; color: #0000ff; margin-top: 10px;">
                            <?=$msg;?>
                        </span>
                        <div class="contact-tbl-title" style="margin-top:10px; font-size:16px; font-weight:bold;">Liên Hệ</div>
                        <div class="clear"></div>
                        <div class="separable"></div>
                        <div class="tbl-inform">
                            <span><span id="ctl28_ctl01_lblInform"></span></span>
                        </div>
                        <div class="contact-tbl-row" style="margin-bottom:8px;">
                            <div class="contact-tbl-label">
                                <span id="ctl28_ctl01_lblName">Họ tên:</span></div>
                            <div class="contact-tbl-content">
                                <input name="name" type="text" id="ctl28_ctl01_txtName" class="contact-text-field">
                            </div>
                        </div>
                        <div class="contact-tbl-row"style="margin-bottom:8px;">
                            <div class="contact-tbl-label">Địa chỉ:</div>
                            <div class="contact-tbl-content">
                                <input name="address" type="text" id="ctl28_ctl01_txtAddress" class="contact-text-field">
                            </div>
                        </div>
                        <div class="contact-tbl-row"style="margin-bottom:8px;">
                            <div class="contact-tbl-label">Email:</div>
                            <div class="contact-tbl-content">
                                <input name="email" type="text" id="ctl28_ctl01_txtAddress" class="contact-text-field">
                            </div>
                        </div>
                        <div class="contact-tbl-row">
                            <div class="contact-tbl-label">
                                <div class="contact-tbl-content"></div>
                            </div>
                            <div class="contact-tbl-row" style="margin-bottom:8px;">
                                <div class="contact-tbl-label">Điện thoại:</div>
                                <div class="contact-tbl-content">
                                    <input name="phone" type="text" id="ctl28_ctl01_txtPhone" class="contact-text-field">
                                </div>
                            </div>
                            <div class="contact-tbl-row" style="margin-bottom:8px;">
                                <div class="contact-tbl-label">Tiêu đề:</div>
                                <div class="contact-tbl-content">
                                    <input name="title" type="text" id="ctl28_ctl01_txtSubject" class="contact-text-field">
                                </div>
                            </div>
                            <div class="contact-tbl-row">
                                <div class="contact-tbl-label">
                                    <span id="ctl28_ctl01_lblContent">Nội dung:</span></div>
                                <div class="contact-tbl-content">
                                    <textarea name="content" rows="10" cols="50" id="ctl28_ctl01_txtContent" class="contact-text-area"></textarea>
                                </div>
                            </div>
                            <span class="rowLabel" style="position:relative;">
                                <img id="captcha" height="50" src="<?=$base_url;?>securimage/securimage_show.php" alt="CAPTCHA Image" />
                                <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '<?=$base_url;?>/securimage/securimage_show.php?' + Math.random(); return false">
                                    <img alt="Refresh" width="30" height="30" src="<?=$base_url?>images/refresh.png" style="position:absolute;bottom:5px;left:0px;cursor:pointer;" />
                                </a>
                            </span>
                            <span class="rowLabel">Mã xác nhận <span style="display: inline-block; color: red;">(*)</span></span>
                            <span class="rowInput"><input type="text" name="captcha_code" id="captcha_code" value="" /></span>
                        </div>
                    </div>
                </div>
                <!--end hotnew-->
                <div class="gui" style="width:100px; height:25px; float:left; margin-left:25px; margin-bottom:10px;">
                    <input type="submit" name="" value="Gửi" id="ctl28_ctl01_btnSend" class="button white">
                    <input type="reset" name="" value="Hủy" id="ctl28_ctl01_btnReset" class="button white">
                </div>
            </form>
        </div>
        <!--end lien he-->
    </div>
    <!--end left-->
    <!-- right-->
    <div class="right">
        <!-- tin xem nhieu-->
        <!--<div class="boxnoibat">
            <p  style="font-size:16px; font-weight:bold; color:#028287; margin-top:10px; margin-left:25px; float:left;">Tin xem nhi&#7873;u </p>
            <div class="line20"></div>
            <div class="sreentinnoibat" style="width:312px; height:30px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a href=""><p style="margin-left:25px; margin-top:9px; font-weight:bold;">B&aacute;n nh&agrave; &#7903; Qu&#7853;n T&acirc;n B&igrave;nh gi&aacute; r&#7867; b&#7845;t ng&#7901;</p>
                    </a>
                </div>
            </div>
            <div class="line3"></div>
            <div class="sreentinnoibat" style="width:312px; height:30px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a href=""><p style="margin-left:25px; margin-top:9px; font-weight:bold;">B&aacute;n nh&agrave; &#7903; Qu&#7853;n T&acirc;n B&igrave;nh gi&aacute; r&#7867; b&#7845;t ng&#7901;</p>
                    </a>
                </div>
            </div>
            <div class="line3"></div>
            <div class="sreentinnoibat" style="width:312px; height:30px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a href=""><p style="margin-left:25px; margin-top:9px; font-weight:bold;">B&aacute;n nh&agrave; &#7903; Qu&#7853;n T&acirc;n B&igrave;nh gi&aacute; r&#7867; b&#7845;t ng&#7901;</p>
                    </a>
                </div>
            </div>
        </div>-->
        <!-- end tin xem nhieu-->
        <!-- tim kiem bds-->
        <div class="boxtimkiembds">
            <p  style="font-size:16px; font-weight:bold; color:#028287; margin-top:10px; margin-left:79px; float:left;">Tìm kiếm bất động sản</p>
            <div class="line4"></div>
            <div class="sreenboxseach2" style=" width:310px;  margin-bottom:20px; float:left;">
                <form action="<?=$base_url?>tim-kiem-bat-dong-san" method="post">
                    <div  class="boxseach"  style=" width:100px; float:left; margin-left:60px;">
                        <label>
                            <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="1"/>
                            <p style="font-weight:bold; font-size:14px; color:#CC0000; float:left; margin-top:8px; margin-left:5px;">Mua - Bán</p>
                        </label>
                    </div>
                    <div class="boxseach"  style=" width:100px; margin-left:5px;  float:left;">
                        <label>
                            <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="2"/>
                            <p style="font-weight:bold; font-size:14px; color:#CC0000; float:left; margin-top:8px; margin-left:5px;">Cho Thuê</p>
                        </label>
                    </div>
                    <div class="sreenseachtimkiembds1" style="width:310px; height:25px; float:left; margin-bottom:3px;">
                        <select name="estatetype_id" id="estatetype_id" size="1" style="float:left; margin-right:5px; margin-left:13px; width:140px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                            <option value="" selected="selected">Chọn Loại nhà đất</option>
                            <?php /*foreach($this->estateCatalogues as $row):
                                $estatetype = new Estatetype();
                                $estatetype->order_by('position', 'asc');
                                $estatetype->where('estatecatalogue_id', $row->id);
                                $estatetype->get();
                                */?><!--
                                <option disabled="disabled" value=""><?/*=$row->name;*/?></option>
                                <?php /*foreach($estatetype as $rowType): */?>
                                <option <?php /*if($object->estatetype_id == $rowType->id) echo 'selected="selected"'; */?> value="<?/*=$rowType->id;*/?>">..........<?/*=$rowType->name;*/?></option>
                            <?php /*endforeach; unset($rowType); */?>
                            --><?php //endforeach; unset($row); ?>
                        </select>
                        <select name="estatecity_id" id="estatecity_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;">
                            <option value="">Chọn Tỉnh/TP</option>
                            <?php foreach($this->estateProvince as $row): ?>
                                <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                    <div class="sreenseachtimkiembds1" style="width:310px; height:25px; float:left; margin-bottom:3px;">
                        <select name="estatedistrict_id" id="estatedistrict_id" size="1" style="float:left; width:140px; margin-right:5px; margin-left:13px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;" >
                            <option value="">Chọn Quận/Huyện</option>
                        </select>
                        <select name="estatearea_id" id="estatearea_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;" >
                            <option value="" selected="selected">Chọn Diện tích</option>
                            <option value="-1">Không xác định</option>
                            <?php foreach($this->estateareas as $row): ?>
                                <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                    <div class="sreenseachtimkiembds1" style="width:310px; height:25px; float:left; margin-bottom:13px;">
                        <select name="estateprice_id" id="estateprice_id" size="1" style="float:left; width:140px; margin-right:5px; margin-left:13px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;" >
                            <option value="" selected="selected">Chọn Mức giá</option>
                        </select>
                        <select name="estatedirection_id" id="estatedirection_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;" >
                            <option value="" selected="selected">Chọn Hướng nhà</option>
                            <?php foreach($this->estateDirection as $row): ?>
                                <option value="<?=$row->id?>"><?=$row->name;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                    <div class="timkiembds2">
                        <input type="submit" value=""/>
                    </div>
                </form>
            </div>
        </div>
        <!-- qc-->
        <?php echo $this->load->view('front/includes/adv_right'); ?>
        <!-- end qc-->
    </div>
    <!--end right-->
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
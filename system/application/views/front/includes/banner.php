<script type="text/javascript">
	$(document).ready(function(){
		$(".inline").colorbox({ width:"500px"});
		$(".advance_search_link").colorbox({inline:true, width:"610px"});
		$(".login_link").colorbox({inline:true, width:"500px"});
        $("#btnLogin").click(function(){
            if($.trim($("#frmLoginPopup :input[name='login_username']")) == "")
            {
                alert("Vui lòng nhập tài khoản");
                return false;
            }
            if($.trim($("#frmLoginPopup :input[name='login_password']")) == "")
            {
                alert("Vui lòng nhập mật khẩu");
                return false;
            }
            $("#frmLoginPopup").submit();
        });
        <?php if($this->userLoginFlag == 1){ echo "alert('Bạn đã đăng nhập thành công.')";}?>
	});
</script>
<div id="banner" <?php if(getconfigkey('useHeaderBanner')) { ?>style="background: url('<?=$base_url.getconfigkey('bannerHeader');?>') top left no-repeat;" <?php } ?> >
	<div class="logo fl"><a href="<?=$base_url?>" title="Toxic Mobile"><img src="<?=$base_url?>images/logo.png" alt="Toxic Mobile" /></a></div>
	<div class="fr">
		<div>
			<div class="online_support fl">
				<br />
				<div><a class="inline" href="<?=$base_url;?>tin-nhan" title="Hỗ trợ online" ><b>Hỗ trợ online</b></a></div>
				<div style="text-align: center">
					<a class='inline' href="<?=$base_url;?>tin-nhan" ><img src="<?=$base_url?>images/yahoo-icon-24.png" /></a>
					&nbsp;<a class='inline' href="<?=$base_url;?>tin-nhan" ><img src="<?=$base_url?>images/skype-icon-24.png" /></a>
				</div>
			</div>
			<div class="hotline fr">
				<center style="color: red">hotline</center>
				<div><?=getconfigkey('hot_line_1')?></div>
				<div><?=getconfigkey('hot_line_2')?></div>
			</div>
			<div class="clr"></div>
		</div>
		<div style="text-align: right;"><a href="<?=$base_url?>gio-hang" class="btnShoppingCart">(<span class="numCart">_</span>)</a></div>
        <div class="cl"></div>
		<div class="mini_menu_top userInfo">
            
		</div>
	</div>
	<div class="top_search fr">
		<div style="position: relative;">
			<div class="text_quote">
                <?php $slogan = getconfigkey('pageslogan');
                if($slogan!="")
                    $slogan = explode(";",$slogan);
                foreach($slogan as $row):?>    
				<blockquote>
					<?=trim(nl2br($row),"<br />");?>
				</blockquote>
                <?php endforeach;?>
			</div>
            <script type="text/javascript">
                var typingTimer;                //timer identifier
                var doneTypingInterval = 2000;  //time in ms, 5 second for example
                $(document).ready(function(){
                    
                    $(document).click(function() {
                        $('#searchResult').fadeOut(500);
                    });
                    $('.searchResult').click(function(e) {
                        e.stopPropagation();
                        return true;
                    });
                    $('#search').click(function(e) {
                        e.stopPropagation();
                        return false;
                    });
                    
                    
                    //on keyup, start the countdown
                    $("#search").keyup(function () {
                      typewatch(function () {
                            showResult();
                      }, 500);
                    });
                    
                });
                
                
                var typewatch = (function(){
                  var timer = 0;
                  return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                  }  
                })();
                function searchBoxEvent()
                {
                    $('.searchResultItem:even').css('border-right','1px dashed #45C0EE');
                    $('.searchResultTitleTab:eq(0)').addClass("active");
                    $('.searchResultTitleTab').click(function(){
                       // hide all content
                       $('.searchResultTab').css('display','none');
                       // show select content
                       $('.searchResultTab:eq('+$(this).index()+')').fadeIn(500);
                       // remove class active all tab title 
                       $('.searchResultTitleTab').removeClass('active');
                       // add class active select tab title
                       $('.searchResultTitleTab:eq('+$(this).index()+')').addClass('active');
                    });
                    
                    
                    
                    
                    
                    //user is "finished typing," do something
                    
                }
                function showResult()
                {
                    var value = $("#search").val();
                    if($.trim(value) != '' && $.trim(value).length >= 3)
                    {
                        $.ajax({
                           url:'<?=$base_url;?>tim' ,
                           type:'post',
                           datatype:'html',
                           data:{searchKey:value},
                           success:function(data){
                                if($.trim(data) !="")
                                {
                                    $("#searchResult").html(data);
                                    $('#searchResult').fadeIn(500);   
                                    searchBoxEvent();
                                 }
                                 else
                                 {
                                    $('#searchResult').fadeOut(500);
                                 }    
                                 $(".ajaxSearchViewMore a").click(function(e){
                                    $("#frmAjaxSearch").submit(); 
                                });
                           }
                        });
                         
                    }
                    else
                    {
                        
                        $('#searchResult').fadeOut(500);
                        
                    }
                }
            </script>
   
			<div class="top_search1" style="margin-top: 40px;">
				<div class="fr">
					<form accept-charset="utf-8" method="post" action="<?=base_url()?>tim-kiem" id="frmAjaxSearch" class="search_box">
						<input class="btn fr" type="image"  src="<?=base_url()?>images/search_btn.png" />
						<input class="formtip fr" autocomplete="off"  type="text" value="Tìm kiếm" id="search" name="searchKey" />
						<div class="clr"></div>
					</form>
                    <div id="searchResult" class="searchResult">
                        
                    </div>
				</div>
				<div class="fr"><a href="#advance_search_link_content" title="tìm kiếm nâng cao" class="advance_search_link">Tìm kiếm nâng cao</a>&nbsp;&nbsp;</div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
	<div class="clr"></div>
</div>


<div style='display:none'>
	<div id='advance_search_link_content' style='padding:10px; background:#fff;'>
        <form action="<?=$base_url;?>tim-nang-cao" method="post">
		<p class="needed_product">SẢN PHẨM BẠN CẦN TÌM</p>
		<br />
		
			<div class="">
				<div class="search_manufacture fl">
					<div class="bold">Nhà sản xuất</div>
					<div>
						<select name="manufacture" class="search_select_box">
							<option value="0">Chọn nhà sản xuất</option>
                            <?php foreach($this->productManufacture as $row):?>
							     <option value="<?=$row->id;?>"><?=$row->name;?></option>
                            <?php endforeach;?>
							
						</select>
					</div>
				</div>
				<div class="search_price fl">
					<div class="bold">Mức giá</div>
					<div>
                    <?php $priceList = enum::getProductPriceArray();?>
						<select name="price" class="search_select_box">
							<option value="0">Mức giá</option>
                            <?php foreach($priceList as $row):?>
							<option value="<?=$row['value'];?>"><?=$row['name'];?></option>
                            <?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="search_os fl">
					<div class="bold">Hệ điều hành</div>
					<div>
						<select name="os" class="search_select_box">
							<option value="0">Hệ điều hành</option>
							<option value="iOS">iOS</option>
							<option value="windowPhone">Window phone</option>
							<option value="Adroid">Adroid</option>
							<option value="symbian">Symbian</option>
						</select>
					</div>
				</div>
				<div class="clr"></div>
			</div>
			<div class="chks">
				<div class="search_checkbox fl">
					<div class="chk_l"><input class="chk" type="checkbox" name="sTouch" value="yes">Cảm ứng<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sCamera" value="yes">Camera<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sTivi" value="yes">Xem tivi<br></div>
				</div>
				<div class="search_checkbox fl">
					<div class="chk_l"><input class="chk" type="checkbox" name="sWifi" value="yes">Wifi<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sFM" value="yes">đài FM<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sSim" value="yes">2 Sim<br></div>
				</div>
				<div class="search_checkbox fl">
					<div class="chk_l"><input class="chk" type="checkbox" name="s3g" value="yes">3G</div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sGPS" value="yes">GPS<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sTablet" value="yes">Tablet<br></div>
				</div>
				<div class="search_checkbox fl">
					<div class="chk_l"><input class="chk" type="checkbox" name="sQwerty" value="yes">Qwerty<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sCard" value="yes">Thẻ nhớ<br></div>
					<div class="chk_l"><input class="chk" type="checkbox" name="sNFC" value="yes">NFC<br></div>
				</div>
				<div class="clr"></div>
			</div>
			<br />
			<div><center><input type="submit" name="btn_search" id="btn_search" class="btn_search" value="Tìm kiếm"></center></div>
			<div class="clr"></div>
		</form>
	</div>
</div>

<div style='display:none'>
	<div id='login_content' style='background:#fff;'>
		<div class="bg_login">Đăng nhập | Di Động Việt</div>
		<div class="bg_login_logo"><img src="<?=$base_url?>images/logo_white.png" height="40" alt="Di Dong Viet" /></div>
		<div class="bg_login_s"></div>
		<p>Nếu chưa có tài khoản <b>Đi Động Việt</b> vui lòng bấm Đăng ký</p>
		<form id="frmLoginPopup" action="<?=$base_url;?>dang-nhap" method="post">
			<span class="lg_90">Tài khoản</span><span><input class="lg"  type="text" value="" id="email" name="login_username"></span>
			<div style="height: 5px;"></div>
			<span class="lg_90">Mật khẩu</span><span><input class="lg"  type="password" value="" id="pwd" name="login_password"></span>
			<div class="login_bt"><input type="image" id="btnLogin" src="<?=base_url()?>images/login_bt.png" ></div>
			<div class="chk_l">
				<input class="chk" type="checkbox" name="login_remember" value="Bike">Ghi nhớ | 
				<a class="forget_email_link" title="Quên mật khẩu" href="<?=$base_url;?>quen-mat-khau">Quên mật khẩu?</a>
			</div>
		</form>
		<div class="bg_login_register">
			<div>bạn chưa có tài khoản <span class="red_ddv">DI ĐỘNG VIỆT</span></div>
			<div style="height: 5px;"></div>
			<div><a href="<?=$base_url;?>dang-ky" title="Đăng ký"><img src="<?=$base_url?>images/register_btn.png" /></a></div>
			<div style="height: 5px;"></div>
			<div><img src="<?=$base_url?>images/login_arrow.png" /></div>
		</div>
		<div class="clr"></div>
	</div>
</div>
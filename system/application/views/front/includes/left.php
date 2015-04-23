<div id="left" class="fl">
<div id="left_column">
    <?php $i=0; foreach($this->productCat as $row):
        if($row->isHide != 1) { $i++;?>
	<div class="left_box">
		<div class="left_title">
            <a href="<?=$base_url;?><?=$row->url;?>" title="<?=$row->name;?>" style="color: #FFF;">
			<div class="white_bg">
				<div class="fl"><img src="<?=image($row->image,'product_catlogo');?>" alt="<?=$row->name;?>" /></div>
				<div class="red_bg_left fl">
					<?=$row->name;?>
				</div>
				<div class="fr"><img src="<?=$base_url?>images/right_menu_s.png" /></div>
				<div class="clr"></div>
			</div>
            </a>
		</div>
		<div class="left_bellow_title"></div>
		<div class="suckerdiv">
			<ul id="suckertree<?=$i;?>">
				<?php $childLv1 = getChildProduct($row->id,$this->productCatAll);?>
                <?php foreach($childLv1 as $rowChild1):
                  if($rowChild1->isHide != 1) { ?>
				<li>
					<a href="<?=$base_url?><?=$row->url;?>/<?=$rowChild1->url;?>" title="<?=$rowChild1->name;?>" >
						<?php if($rowChild1->isShowLogo == 1) { ?><span><img src="<?=image($rowChild1->image,'product_catLogoLeftMenu');?>" alt="<?=$rowChild1->name;?>"  /></span><?php } ?>
						<span><?=$rowChild1->name;?></span>
					</a>
                    <?php $childLv2 = getChildProduct($rowChild1->id,$this->productCatAll);?>
                    <?php if(count($childLv2) > 0){ ?> 
					<ul>
                        <?php foreach($childLv2 as $rowChildLv2):
                             if($rowChildLv2->isHide != 1) {  ?>
					       	<li><a href="<?=$base_url;?><?=$row->url;?>/<?=$rowChild1->url;?>/<?=$rowChildLv2->url;?>" title="<?=$rowChildLv2->name;?>" ><?=$rowChildLv2->name;?></a></li>
                        <?php } endforeach; ?>
					</ul>
                    <?php } ?>
				</li>
			
				<?php } endforeach; ?>
			</ul>
		</div>
	</div>
	
	<br />
    <?php } endforeach;?>
    <!-- New Letter Begin -->
    <script type="text/javascript">
        function validateEmail(email) { 
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        function saveNewLetter()
        {
            var emailNewsLetter = $(".emailNewsLetter").val();
                
                if ($.trim(emailNewsLetter) == "") {
                    alert("Vui lòng nhập địa chỉ email để đăng ký");
                    return false;
                }
                if (validateEmail(emailNewsLetter) == false) {
                    alert("Vui lòng nhập đúng địa chỉ email.");
                    return false;
                }

                $.ajax({
                    type: "post",
                    url: '<?=$base_url;?>dang-ky-nhan-thu',
                    datatype: "text",
                    data: { emailNewsLetter: $(".emailNewsLetter").val() },
                    success: function (data) {
                        $(".emailNewsLetter").val("");
                        alert(data);
                    }
                });
        }
        $().ready(function () {
            $(":input[name='btnSubmitNewLetter']").click(function () {
                saveNewLetter();
            });
            $(".emailNewsLetter").bind('keypress', function(e) {
				var code = (e.keyCode ? e.keyCode : e.which);
			 if(code == 13) { //Enter keycode
			   saveNewLetter();
			 }

	       	});
        });
    </script>
    <div class="left_box">
        <div class="left_title">
        	<div class="white_bg">
        		<div class="fl"><img src="<?=$base_url?>images/mobile_icon.png" /></div>
        		<div class="red_bg_left fl">
        			Đăng ký nhận tin
        		</div>
        		<div class="fr"><img src="<?=$base_url?>images/right_menu_s.png" /></div>
        		<div class="clr"></div>
        	</div>
        </div>
        <div class="left_bellow_title"></div>
        
        <div style="padding: 10px 5px 20px 5px;">
             <span>Vui lòng nhập địa chỉ email của bạn bên dưới để nhận được thông tin mới nhất từ chúng tôi.</span><br /><br />
             <input type="text" name="newletter"  class="txtNewLetter emailNewsLetter" value="" /><input type="button" name="btnSubmitNewLetter" class="btnSubmitNewLetter" value="Gửi" /> 
        </div>
        
    </div>
    <!-- New Letter End -->
    <!-- Product visiting Begin -->
    
    <div class="left_box">
        <div class="left_title">
        	<div class="white_bg">
        		<div class="fl"><img src="<?=$base_url?>images/mobile_icon.png" /></div>
        		<div class="red_bg_left fl">
        			Sản phẩm đã xem
        		</div>
        		<div class="fr"><img src="<?=$base_url?>images/right_menu_s.png" /></div>
        		<div class="clr"></div>
        	</div>
        </div>
        <div class="left_bellow_title"></div>
        <div class="visitedProduct"></div>
        
    </div>
    <!-- Product visiting End -->
    
   <div style="width: 208px;margin-top:10px;">
        <?php foreach($this->bannerLeft as $row): ?>
            <?php
                $path = pathinfo($base_url.$row->image);
                if($path['extension'] == 'swf') {
            ?>
             <object type="application/x-shockwave-flash" data="<?=$base_url.$row->image?>" width="<?=$row->width;?>" height="<?=$row->height;?>">
                <param name="movie" value="<?=$base_url.$row->image?>" />
                <param name="quality" value="high"/>
                <param name="wmode" value="transparent"/>
            </object>
            <?php } else {?>
                <div class="right_advertise_img"><a href="<?=$row->link;?>"><img src="<?=image($row->image,'product_leftBanner');?>"/></a></div>
            <?php } ?>
            
        <?php endforeach;?>
		
	</div> 
    
</div> 
</div> 
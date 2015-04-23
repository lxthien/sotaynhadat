<div id="menu">
	<div class="white_bg">
		<div class="red_bg fl" style="width: 973px;">
		<div class="grey">  
			<ul id="mega-menu" class="mega-menu">
				<li><a id="home_icon" class="active" href="<?=$base_url?>"><img src="<?=$base_url?>images/home_icon.png" /></a></li>
                <?php foreach($this->menu as $rowMenu):?>
				<li>
                    <a class="alone <?php if($this->menu_active == $rowMenu->active) echo ' black_bg' ;?>" title="<?=$rowMenu->name;?>" href="<?=$base_url.$rowMenu->link?>"><?=$rowMenu->name;?></a>
                    
                    <?php $countChild = $rowMenu->menuItem->result_count();?>
                        <?php if($countChild > 0) { ?>
        					<ul>
                                
                                 <?php $i=0; foreach($rowMenu->menuItem->all as $row):$i++;?>
                                 <?php if($i == 1) echo "<li><ul>";?>						
        								<li><a href="<?=$base_url.$row->link;?>" title="<?=$row->name;?>"><?=$row->name;?></a></li>							
        						 <?php if($i == round($countChild/2)) echo "</ul></li><li><ul>";?>
                                <?php endforeach;?>
                                <?php echo "</ul></li>";?>
        	                   
        					</ul>
                        <?php } ?>
				</li>
                <?php endforeach;?>
				
				<div class="clr"></div>
			</ul>
		</div>
		</div>
		<div class="fr"><img src="<?=$base_url?>images/right_menu.png" /></div>
		<div class="clr"></div>
	</div>
</div>
<div id="price_commpare">
    <span class="price_bg" style="position: absolute;right:149px;top:0;width: 140px;"><a class="red" title="Danh sách sản phẩm giảm giá" href="<?=$base_url;?>san-pham-giam-gia">Sản phẩm giảm giá</a></span>
    <span class="price_bg" style="right: 75px; background: none;background-color:red;color:#fff"><a title="Bảng giá điện thoại di động cập nhật ngày <?=date("d/m/Y");?>" href="<?=$base_url;?>bang-gia">Bảng giá</a></span>
	<span class="price_bg" style="position: absolute;right:0;width: 70px; background: none;background-color:green"><a title="So sánh giá điện thoại máy tính bảng" href="<?=$base_url;?>so-sanh">so sánh</a></span>
    
</div>
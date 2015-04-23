<div class="abate_product_title">Sản phẩm giảm giá</div>
<ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
	<?php foreach($productSaleOff as $row):?>
	<li>
			<div class="home_sale_off">
				<!--
				<div>
					<div class="hot"></div>
					<div class="gift"></div>
				</div>
				-->
				<div class="product" style="overflow: hidden;height: 65px;">
					<div class="fl" style="width: 50px;overflow: hidden;">
						<a class="normal_link" href="<?=$base_url.$row->url;?>" title="<?=$row->getName();?>">
                            <img src="<?=image($row->image, "product_homeSale");?>" />
                        </a>
					</div>
					<div class="fl" style="width: 70px;margin-top:0;margin-left:0;padding-left:3px; padding-right:3px;">
						
                            <a class="normal_link" href="<?=$base_url.$row->url;?>" title="<?=$row->getName();?>">
                            <?=$row->getName();?>
                            </a>
                        
					</div>
					<div class="clr"></div>
				</div>
				<div class="price" style="text-align: center;margin-left:0;padding-top:5px;">
					<span class="num_sale_off" style="text-align: center;"><?=$row->getRealPrice();?> VND</span>
				</div>
			</div>
	
	</li>
	<?php endforeach;?>
</ul>
<div class="promotion_product_caro">
	<img class="promotion_saleoff" src="<?=$base_url?>images/saleoff.png" height="70" />
	<ul id="promotion-product-carousel" class="jcarousel-skin-promotion">
		<?php foreach($productSaleOff as $row):?>
		<li>
			<div class="home_promotion">
				<div class="p_d_accessory_img"><a href="<?=$base_url.$row->url;?>" title="<?=$row->getName();?>" >
                    <img src="<?=image($row->image, "product_listPageSale");?>" alt="<?=$row->getName();?>" /></a></div>
				<div style="width: 100px;height: 30px;overflow: hidden;">
                    <a href="<?=$base_url.$row->url;?>" title="<?=$row->getName();?>" > <?=$row->name;?></a></div>
				<div class="red"><?=$row->getSalePrice();?></div>
			</div>
		</li>
		<?php endforeach;?>
		
	</ul>
</div>
<?php foreach($visitedProduct as $row):?>
	<div class="r_row">
		<div class="l_txt fl"><img  src="<?=image($row->image, "product_detailSameCategory");?>" /></div>
		<div class="r_txt fl viewlist" style="width:145px;">
			<a href="<?=$base_url;?><?=$row->url;?>"><?=$row->name;?></a><br />
			<div class="r_price"><?=$row->getPrice();?> VND</div>
		</div>
		<div class="clr"></div>
	</div>
<?php endforeach;?>
<div><img src="<?=$base_url?>images/arrow_compare.png" /></div>
<?php $i=0; foreach($this->compareProduct as $row): $i++;?>
<div><a href="javascript:void(0)" onclick="javascript:removeCompareCookie('<?=$row->id;?>')"><img src="<?=image($row->image,'product_compareSmall');?>"  /></a></div>
<?php endforeach;?>
<?php for($k =0; $k < 3-$i;$k++){?>
      <div class="null_product_compare"></div>
<?php } ?>
<div><a href="<?=$base_url;?>so-sanh"><img src="<?=$base_url?>images/button_compare_product.png" /></a></div>
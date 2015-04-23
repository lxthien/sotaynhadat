<div>
	<div class="main_title">
		<h2 class="">Hàng mới về</h2>
		<span class="didongviet">didongviet.vn</span>
        <?php $i=0; foreach($newCategory as $row):$i++;?>
		<span><a href="<?=$base_url;?><?=$row->buildUrl();?>" title="<?=$row->name;?>"><?=$row->name;?></a></span>
        <?php if( $newCategory->result_count() != $i){ ?>
            <span>|</span>
        <?php } ?>
		
        <?php endforeach;?>
	</div>
	<div class="main_product">
            <?php $i=0; foreach($newProduct as $row):$i++;?>
            <?php if($i% 5 == 1) echo '<div class="pp_line">';?>
			<?=printProduct($row);?>
            <?php if($i% 5 == 0) echo '</div><div class="clr"></div>';?>
            <?php endforeach;?>
            <?php if($i% 5 > 0) echo '</div><div class="clr"></div>';?>
	</div>
	
	<div class="pp_separate"></div>
	<div class="main_title">
		<h2 class="">Sản phẩm hot</h2>
		<span class="didongviet">didongviet.vn</span>
        <?php $i=0; foreach($hotCategory as $row):$i++;?>
		<span><a href="<?=$base_url;?><?=$row->buildUrl();?>" title="<?=$row->name;?>" ><?=$row->name;?></a></span>
		<?php if( $hotCategory->result_count() != $i){ ?>
            <span>|</span>
        <?php } ?>
        <?php endforeach;?>
		
	</div>
	<div class="main_product">
        <?php $i=0; foreach($hotProduct as $row):$i++;?>
        <?php if($i% 5 == 1) echo '<div class="pp_line">';?>
        <?=printProduct($row);?>
        <?php if($i% 5 == 0) echo '</div><div class="clr"></div>';?>
        <?php endforeach;?>
        <?php if($i% 5 > 0) echo '</div><div class="clr"></div>';?>
	</div>
    <?php foreach($this->productCat as $rowParentCat):
        if($rowParentCat->isHide != 1) { ?>
    <div class="clr"></div>
	<div class="pp_separate"></div>
	<div class="main_title">
		<h2 class=""><?=$rowParentCat->name;?></h2>
		<span class="didongviet">didongviet.vn</span>
        <?php $subCategory = getChildProduct($rowParentCat->id,$this->productCatAll,0,'isShowInParentHot');?>
        <?php $i=0; foreach($subCategory as $row):$i++;?>
		<span><a href="<?=$base_url;?><?=$row->buildUrl();?>" title="<?=$row->name;?>" ><?=$row->name;?></a></span>
		<?php if( $hotCategory->result_count() != $i){ ?>
            <span>|</span>
        <?php } ?>
        <?php endforeach;?>

	</div>
	<div class="main_product">
		<?php $i = 0; foreach($rowParentCat->getProductHome() as $row):$i++;?>
            <?php if($i% 5 == 1) echo '<div class="pp_line">';?>
			<?=printProduct($row->products);?>
        <?php if($i % 5 == 0) echo '</div><div class="clr"></div>';?>
        <?php endforeach;?>
        <?php  if($i % 5 > 0) echo '</div><div class="clr"></div>';?>
	</div>
    
	<?php }  endforeach;?>
    
	
	
</div>


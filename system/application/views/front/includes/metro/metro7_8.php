<div class="youtube_on_slide">
    <?php if($metro7->type == "youtube") { echo $metro7->link; }else{?>
    <a href="<?=$metro7->link;?>" title="<?=$metro7->title;?>" ><img alt="<?=$metro7->title;?>" src="<?=image($metro7->img, "product_home_metroBanner");?>" /></a>
    <?php } ?>
	
</div>
<div class="abate_product">
    <?php if($metro8->type == "sale") { $this->load->view('front/includes/homeSale'); }else{ ?>
        <a href="<?=$metro8->link;?>" title="<?=$metro8->title;?>" ><img alt="<?=$metro8->title;?>" src="<?=image($metro8->img, "product_home_metroSaleOffBanner");?>" /></a>
    <?php } ?>
	
</div>
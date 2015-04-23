<div class="col2 fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><a style="color: #000;" href="<?=$base_url.$this->lang->lang()?>/unique-products"><?=lang('uniqueProducts')?></a></h1></div>
            <?php $i=0; foreach($uniqueProduct as $row): $i++; ?>
            <div class="listproducts mainconstructioncol2 <?php if($i%3==0) echo "listproductsthree"; ?>">
                <div class="imglistproducts">
                    <a title="<?=$row->{'name_'.$this->language}?>" href="<?=$base_url.$this->lang->lang()?>/products/<?=$row->url?>"><img src="<?= $row->image != NULL ? $base_url.$row->image : '';?>" alt="<?=$row->{'name_'.$this->language}?>" width="210" height="160" /></a>
                </div>
                <div class="namelistproducts"><a title="<?=$row->{'name_'.$this->language}?>" href="<?=$base_url.$this->lang->lang()?>/products/<?=$row->url?>"><?= strlen($row->{'name_'.$this->language}) > 40 ? cut_string($row->{'name_'.$this->language}, 40).' ...' : $row->{'name_'.$this->language}; ?></a></div>
                <div class="deslistproducts"><?= strlen($row->{'des_'.$this->language}) > 70 ? cut_string($row->{'des_'.$this->language}, 70).' ...' : $row->{'des_'.$this->language}; ?></div>
                <div class="price"><span><?=lang('price')?>: </span><span style="color: #f47435; font-weight: 600; font-size: 17px;"><?=number_format($row->price, ',')?></span> <span style="color: #f47435; font-weight: 600; font-size: 15px;">vnđ</span></div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
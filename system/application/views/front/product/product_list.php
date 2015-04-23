<div class="col-right fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=$productCat->{'name_'.$this->language}?></h1></div>
            <span class="line730"></span>
            <div class="list-product">
                <?php $i=0; foreach($product as $row): $i++;?>
                <div class="list-product-item <?php if($i%4==0) echo 'list-product-item-break'; ?>">
                    <div class="img-list-product-item">
                        <a href="<?= $this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCat->url_vietnamese.'/'.$row->url_vietnamese.'.html' : $base_url.'en/'.$productCat->url_english.'/'.$row->url_english.'.html'; ?>" title="<?=$row->{'name_'.$this->language}?>"><img src="<?= $base_url.$row->image ?>" width="171" height="131" alt="<?=$row->{'name_'.$this->language}?>"/></a>
                    </div>
                    <div class="name-list-product-item">
                        <a href="<?= $this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCat->url_vietnamese.'/'.$row->url_vietnamese.'.html' : $base_url.'en/'.$productCat->url_english.'/'.$row->url_english.'.html'; ?>" title="<?=$row->{'name_'.$this->language}?>"><?=strlen($row->{'name_'.$this->language}) < 20 ? $row->{'name_'.$this->language} : cut_string($row->{'name_'.$this->language}, 20).' ...';?></a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <div class="cl"></div>
            <div class="pagination"><?php echo $this->pagination->create_links();?></div>
        </div>
    </div>
</div>
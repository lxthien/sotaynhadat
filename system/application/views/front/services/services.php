<div class="col2 fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=lang('services')?></h1></div>
            <?php foreach($news as $row): ?>
            <div class="listnews mainconstructioncol2">
                <div class="imgmainconstructioncol2"><a title="<?=$row->{'title_'.$this->language};?>" href="<?=$base_url.$this->lang->lang()?>/services/<?=$row->title_none?>"><img src="<?=$base_url?>img/news/<?=$row->image?>" alt="<?=$row->{'title_'.$this->language};?>" width="210" height="160"/></a></div>
                <div class="infomainconstructioncol2">
                    <h1><a title="<?=$row->{'title_'.$this->language};?>" href="<?=$base_url.$this->lang->lang()?>/services/<?=$row->title_none?>"><?=$row->{'title_'.$this->language};?></a></h1>
                    <p><?= strlen($row->{'short_'.$this->language}) > 150 ? cut_string($row->{'short_'.$this->language}, 150).' ...' : $row->{'short_'.$this->language}; ?></p>
                    <div class="readmore">
                        <a title="<?=$row->{'title_'.$this->language};?>" href="<?=$base_url.$this->lang->lang()?>/services/<?=$row->title_none?>"><?=lang('view_more')?></a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <div class="cl"></div>
            <div class="pagination"><?php echo $this->pagination->create_links();?></div>
        </div>
    </div>
</div>
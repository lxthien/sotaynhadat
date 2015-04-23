<div class="col2 fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=lang('recruit')?></h1></div>
            <?php foreach($news as $row): ?>
            <div class="listrecruit mainconstructioncol2">
                <div class="namelistrecruit"><h3><a title="<?=$row->{'title_'.$this->language}?>" href="<?=$base_url.$this->lang->lang()?>/recruit/<?=$row->title_none?>"><?=$row->{'title_'.$this->language}?></a></h3></div>
                <div class="deslistrecruit"><?= strlen($row->{'short_'.$this->language}) > 400 ? cut_string2($row->{'short_'.$this->language}, 400).' ...' : $row->{'short_'.$this->language}; ?></div>
                <div class="readmore fr">
                    <a title="<?=$row->{'title_'.$this->language};?>" href="<?=$base_url.$this->lang->lang()?>/recruit/<?=$row->title_none?>"><?=lang('view_more')?></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
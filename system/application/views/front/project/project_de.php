<style type="text/css">
.mainarticle *{
    background: none !important;
}
</style>
<div class="col2 fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1 style="font-size: 15px"><?=$news->{'title_'.$this->language}?></h1></div>
            <div class="mainarticle">
                <?=$news->{'full_'.$this->language};?>
            </div>
        </div>
    </div>
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="line640black"></div>
            <div class="titleconstructioncol2"><h1><?=lang('relatedNews')?></h1></div>
            <div class="mainarticle newssame">
                <ul>
                    <?php foreach($related_news as $row): ?>
                    <li><a title="<?=$row->{'title_'.$this->language};?>" href="<?=$base_url.$this->lang->lang()?>/projects/<?=$row->title_none?>"><?=$row->{'title_'.$this->language}?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>
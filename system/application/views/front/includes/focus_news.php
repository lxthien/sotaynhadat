<div class="focus_news">
	<div class="r_title"><?=lang('focus')?></div>
    <?php foreach($focus_news as $f_row): ?>
        <div class="box_news_l">
			<div class="fl">
                 <a href="<?=site_url($link.'d/'.$f_row->title_none);?>" title="<?=$f_row->{'title_'.getlanguage()}?>">
                    <img src="<?=$f_row->dir.($f_row->old_id==1?$f_row->image:filenameplus($f_row->image,'medium'));?>" width="85" height="75" />
                 </a>
            </div>
			<div class="txt fl">
                <a style="color: #000;" href="<?=site_url($link.'d/'.$f_row->title_none);?>" title="<?=$f_row->{'title_'.getlanguage()}?>">
                    <?=$f_row->{'title_'.getlanguage()}?>
                </a>
            </div>
			<div class="clr"></div>
		</div>
    <?php endforeach; ?>
</div>
<div class="col-right main-article fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=lang('advices')?></h1></div>
            <span class="line730"></span>
            <?php $i=0; foreach($news as $row): $i++; ?>
                <div class="listnews mainconstructioncol2 <?php if($i%2==0) echo 'listnews-break';?>">
                    <a title="<?=$row->{'title_'.$this->language};?>" href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/tu-van/'.$row->title_none.'.html' : $base_url.'en/advices/'.$row->title_none.'.html'; ?>">
                        <img class="padr-10" src="<?=$base_url?>img/news/<?=$row->image?>" alt="<?=$row->{'title_'.$this->language};?>" width="140" height="90" align="left"/>
                    </a>
                    <div class="tajf">
                        <h1><a title="<?=$row->{'title_'.$this->language};?>" href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/tu-van/'.$row->title_none.'.html' : $base_url.'en/advices/'.$row->title_none.'.html'; ?>"><?=$row->{'title_'.$this->language};?></a></h1>
                    </div>
                    <div class="tal small italic">
                        <?=lang('createdDate')?>: <?=get_date_from_sql($row->created);?>
                    </div>
                    <div class="mart5 tajf">
                        <?= strlen($row->{'short_'.$this->language}) > 150 ? cut_string($row->{'short_'.$this->language}, 150).' ...' : $row->{'short_'.$this->language}; ?>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="cl"></div>
            <div class="pagination"><?php echo $this->pagination->create_links();?></div>
        </div>
    </div>
</div>
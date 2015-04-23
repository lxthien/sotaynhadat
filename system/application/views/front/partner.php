<div class="col-right main-article fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=lang('partner')?></h1></div>
            <span class="line730"></span>
            <div class="list-partner">
                <?php $i=0; foreach($partner as $row): $i++;?>
                    <a href="<?=$row->link?>"><img src="<?=$base_url.$row->logo?>" alt="<?=$row->name_vietnamese?>" width="100"/></a>
                <?php endforeach ?>
            </div>
            <div class="cl"></div>
        </div>
    </div>
</div>
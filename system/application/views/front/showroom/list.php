<div class="col-right fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=$title?></h1></div>
            <span class="line730"></span>
            <?php foreach($showrooms as $row): ?>
                <div class="listnews mainconstructioncol2 showroom">
                    <div class="imgmainconstructioncol2 showroom-left fl">
                        <a title="<?=$row->{'name_'.getlanguage()};?>" href="<?=$base_url.$this->lang->lang().'/'.$url.'/'.$row->name_none.'.html'?>">
                            <img src="<?=$base_url.$row->image?>" alt="<?=$row->{'name_'.getlanguage()};?>" width="204" height="185"/>
                        </a>
                    </div>
                    <div class="infomainconstructioncol2 showroom-right fl">
                        <h1>
                            <a title="<?=$row->{'name_'.getlanguage()};?>" href="<?=$base_url.$this->lang->lang().'/'.$url.'/'.$row->name_none.'.html'?>">
                                <?=$row->{'name_'.getlanguage()};?>
                            </a>
                        </h1>
                        <span>
                            <?= strlen($row->description) > 300 ? cut_string($row->description, 300).' ...' : $row->description; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="cl"></div>
        </div>
    </div>
</div>
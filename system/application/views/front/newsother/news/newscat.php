<!--dmuc ttuc-->
<div class="danhmuctintuc">
    <div class="titledm" style="background-color:#1483d0; width:161px; height:35px; float:right; margin-bottom:5px;">
        <p  style="font-size:14px; font-weight:bold; color:#FFFFFF; margin-top:10px; margin-left:20px; float:left;">
            Danh mục tin tức
        </p>
    </div>
    <?php foreach($this->newsCate as $row): ?>
        <div class="sreenmenudm" style="width:161px; height:25px; float:right;">
            <div class="menutintuc">
                <a href="<?=$base_url?>tin-tuc/<?=$row->name_none?>" title="<?=$row->name_vietnamese;?>">
                    <p  style="margin-left: 10px ; margin-top:5px;">
                        <?/*=strlen($row->name_vietnamese) < 25 ? $row->name_vietnamese : cut_string($row->name_vietnamese, 25).'...';*/?>
                        <?=$row->name_vietnamese;?>
                    </p>
                </a>
            </div>
        </div>
        <div class="line10"></div>
    <?php endforeach; unset($row); ?>
</div>
<!--end dmuc ttuc-->
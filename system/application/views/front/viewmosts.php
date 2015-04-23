<!--tin xem nhiu-->
<div class="tinxemnhiu">
    <p  style="font-size:14px; font-weight:bold; color:#028287; margin-top:10px; margin-left:10px; float:left;">Tin được xem nhiều</p>
    <div class="line5"></div>
    <?php
        foreach($newViewMost as $row):
            $cat = new Newscatalogue($row->newscatalogue_id);
        ?>
        <div class="sreentieudedn" style=" width:161px; margin-top:5px; float:left;">
            
            <div class="noidungtieudetinduocxemnhieu">
                <a style="color: #000;margin-left: 13px;margin-bottom: 10px;" href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                    <img width="135" alt="<?=$row->title_vietnamese;?>" src="<?=$base_url.'img/news/'.$row->image;?>" />
                    <div class="icon3"></div>
                    <p style="text-align:justify; margin-top:-3px; padding: 1px 0px;">
                        <?/*=strlen($row->title_vietnamese) < 50 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 50).'...';*/?>
                        <?=$row->title_vietnamese;?>
                    </p>
                </a>
            </div>
        </div>
    <?php endforeach; unset($row); ?>
</div>
<!--end tin xem nhiu-->
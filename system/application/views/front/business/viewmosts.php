<!--tin xem nhiu-->
<div class="tinxemnhiu">
    <span class="title-top-box">Tin được xem nhiều</span>
    <?php
        foreach($newViewMost as $row):
            $cat = new Newscatalogue($row->newscatalogue_id);
        ?>
        <div class="sreentieudedn" style=" width:161px; margin-top:5px; float:left;">
            
            <div class="noidungtieudetinduocxemnhieu">
                <a style="color: #000;margin-left: 13px;margin-bottom: 10px;" href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                    <img width="135" alt="<?=$row->title_vietnamese;?>" src="<?=image('img/news/'.$row->image, 'news_135_101');?>" />
                    <div class="icon3 icon3-add"></div>
                    <p style="text-align:justify; margin-top: 3px; padding: 1px 0px;">
                        <?=$row->title_vietnamese;?>
                    </p>
                </a>
            </div>
        </div>
    <?php endforeach; unset($row); ?>
</div>
<!--end tin xem nhiu-->
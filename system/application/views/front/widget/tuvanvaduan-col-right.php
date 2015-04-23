<div class="sreenboxtwen" style="width:316px;  float:left;">
    <div class="nhinrathegioi">
        <span class="title-top-box">Tư vấn luật</span>
        <?php foreach($this->legalAdvices as $row): ?>
            <div class="sreentieudedn" style="width:160px; margin-top:5px; float:left;">
                <div class="icon3"></div>
                <div class="noidungtieudedn">
                    <a style="height: auto; color: #000;" href="<?=$base_url?>cam-nang/<?=$row->newscatalogue->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                        <p style="text-align:justify; margin-top:-3px; padding: 2px 0px;">
                            <?=$row->title_vietnamese;?>
                        </p>
                    </a>
                </div>
            </div>
        <?php endforeach; unset($row); ?>
    </div>
    <div class="boxduan3">
        <span class="title-top-box">Dự án nổi bật</span>
        <?php $i=0; foreach($this->projectHot as $row):
            $cat = new Newscatalogue($row->newscatalogue_id);
            $i++;
            if($i > 3){
                break;
            }
            ?>
            <div style="width:147px; float:left; margin-bottom:14px;">
                <div class="boxhinh4">
                    <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                        <img src="<?php echo image('img/news/'.$row->image, 'news_135_101') ?>" />
                    </a>
                </div>
                <div class="tieudeduan2">
                    <a style="color: #000;" href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>"><p align="center" style="margin-top:4px; margin-left: 5px;"><?=$row->title_vietnamese;?></p></a></div>
            </div>
        <?php endforeach; unset($row); unset($cat); ?>
    </div>
</div>
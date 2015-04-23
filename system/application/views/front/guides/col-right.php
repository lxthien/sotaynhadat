<!--dmuc ttuc-->
<div class="danhmuctintuc">
    <div class="titledm" style="background-color:#1483d0; width:161px; height:35px; float:right; margin-bottom:5px;">
        <p  style="font-size:14px; font-weight:bold; color:#FFFFFF; margin-top:10px; margin-left:10px; float:left;">Danh mục cẩm nang</p>
    </div>
    <?php foreach($this->guideCate as $row): ?>
        <div class="sreenmenudm" style="width:161px; height:25px; float:right;">
            <div class="menutintuc">
                <a href="<?=$base_url?>cam-nang/<?=$row->name_none?>" title="<?=$row->name_vietnamese;?>">
                    <p  style="margin-left:10px ; margin-top:5px;">
                        <!--<?=strlen($row->name_vietnamese) < 20 ? $row->name_vietnamese : cut_string($row->name_vietnamese, 20).'...';?>-->
                        <?=$row->name_vietnamese;?>
                    </p>
                </a>
            </div>
        </div>
        <div class="line10"></div>
    <?php endforeach; unset($row); ?>
</div>
<!--end dmuc ttuc-->
<!--tin xem nhiu-->
<div class="tinxemnhiu">
    <span class="title-top-box">Tin được xem nhiều</span>
    <?php foreach($newViewMost as $row):
        $cat = new Newscatalogue($row->newscatalogue_id);
        ?>
        <div class="sreentieudedn" style=" width:161px; margin-top:5px; float:left;">
        <div class="noidungtieudetinduocxemnhieu">
                <a style="color: #000;margin-left: 13px;margin-bottom: 10px;" href="<?=$base_url?>cam-nang/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                    <img alt="<?=$row->title_vietnamese;?>" src="<?=image('img/news/'.$row->image, 'news_135_101');?>" />
                    <div class="icon3 icon3-add"></div>
                    <p style="text-align:justify; margin-top:3px; padding: 1px 0px;">
                        <?=$row->title_vietnamese;?>
                    </p>
                </a>
            </div>
    </div>
    <?php endforeach; unset($row); ?>
</div>
<!--end tin xem nhiu-->
<!--tu van -->
<!--div class="tuvanluat">
    <p  style="font-size:14px; font-weight:bold; color:#028287; margin-top:10px; margin-left:40px; float:left;">Tư vấn luật</p>
    <div class="line5"></div>
    <?php $i=0; foreach($this->legalAdvices as $row):
        $i++;
        if($i > 8){
            break;
        }
        ?>
        <div class="sreentieudedn" style=" width:161px; margin-top:5px; float:left;">
            <div class="icon3"></div>
            <div class="noidungtieudetinduocxemnhieu">
                <a style="color: #000;" href="<?=$base_url?>cam-nang/<?=$row->newscatalogue->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                    <p style="text-align:justify; margin-top:-3px; padding: 1px 0px;">
                        <?/*=strlen($row->title_vietnamese) < 60 ? $row->title_vietnamese : cut_string($row->title_vietnamese, 60).'...';*/?>
                        <?=$row->title_vietnamese;?>
                    </p>
                </a>
            </div>
        </div>
    <?php endforeach; unset($row); ?>
</div>
<!--end tu van -->
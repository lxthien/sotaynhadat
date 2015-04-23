<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style=" width:960px;height:20px; float:left; margin-top:12px; margin-bottom: 2px;">
    <?php $i = 0; foreach($this->newsCate as $row): $i++; ?>
        <div class="linkdautrang" style="<?php echo $i==1?'margin-left:10px;':''; ?> width:auto; float:left;">
            <a class="<?php echo $row->name_none == $this->uri->segment(2, '') ? 'linkdautrang-active' : ''; ?>" href="<?=$base_url?>tin-tuc/<?=$row->name_none?>"><?=$row->name_vietnamese;?></a>
        </div>
    <?php endforeach; unset($row); ?>
</div>

<div class="main" style="width:980px;">
    <div class="cotleft" style="width:645px; float:left; margin-bottom:10px;overflow: hidden;">
        <div class="tintuctop" style="width:645px; float:left;  margin-bottom:10px; margin-top:15px;">
            <div style="margin-left:9px;">
                <div>
                    <h2 id="ctl27_ctl01_divSummary"><?=$news->title_vietnamese;?></h2>
                </div>
                <p style="margin-top:5px; margin-bottom:5px; font-style:italic; color:#999999;">Cập nhật <?=get_date_from_sql($news->created);?></p>

                <div class="nutmangxahoi" style="width:645px; height:25px; float:left; margin-bottom:10px; margin-top:10px;">
                    <div style="float: left;">
                        <!-- Button like facebook -->
                        <div class="fb-like" data-href="<?php echo $this->url; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                        <!-- Button like facebook -->
                        <!-- Place this tag where you want the +1 button to render. -->
                        <div class="g-plusone" data-size="medium" data-href="<?php echo $this->url; ?>"></div>
                        <!-- Place this tag where you want the +1 button to render. -->
                        <!-- Button share facebook -->
                        <div class="fb-share-button" data-href="<?php echo $this->url; ?>" data-layout="button"></div>
                        <!-- Button share facebook -->
                        <!-- Place this tag where you want the share button to render. -->
                        <div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php echo $this->url; ?>"></div>
                    </div>
                </div>
                <div align="justify" id="divContents" style="width:635px; line-height: 18px; font-size:14px">
                    <?=$news->full_vietnamese;?>
                </div>
                <div class="nutmangxahoi" style="width:645px; height:25px; float:left; margin-bottom:10px; margin-top:10px;">
                    <div style="float: left;">
                        <!-- Button like facebook -->
                        <div class="fb-like" data-href="<?php echo $this->url; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                        <!-- Button like facebook -->
                        <!-- Place this tag where you want the +1 button to render. -->
                        <div class="g-plusone" data-size="medium" data-href="<?php echo $this->url; ?>"></div>
                        <!-- Place this tag where you want the +1 button to render. -->
                        <!-- Button share facebook -->
                        <div class="fb-share-button" data-href="<?php echo $this->url; ?>" data-layout="button"></div>
                        <!-- Button share facebook -->
                        <!-- Place this tag where you want the share button to render. -->
                        <div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php echo $this->url; ?>"></div>
                    </div>
                    <span style="line-height: 20px;float: right;margin-right: 15px;font-size: 12px; color: #999999;"><?=$news->source;?></span>
                </div>
                <div class="sreentag">
                    <div class="tag"></div>
                    <p style="width:100%;margin-left:60px;margin-top:3px;">
                        <?php $i=0; foreach($tag as $tagSub): $i++;?>
                            <a title="<?=$tagSub;?>" href="<?=$base_url.'tags/'.remove_vn($tagSub)?>"><?=$tagSub;?></a> <?php echo $i<count($tag) ? ',':''; ?>
                        <?php endforeach ?>
                    </p>
                </div>
            </div>
        </div>
        <div style=" background-color:#d3d3d3; margin-left:9px;  float:left;width:635px; margin-bottom:7px; margin-top:5px; height:1px;"></div>
        <p style=" color:#109502; font-size:18px; font-weight:bold; float:left; margin-left:9px;">Các tin khác</p>

        <?php $i=0; $columnCount = 3; foreach ($related_news as $row):
            $cat = new Newscatalogue($row->newscatalogue_id);
            ?>
            <?php if ($i%$columnCount == 0): ?>
                <div class="sreenspduan" style="width:645px; float:left; margin-top:10px;  margin-bottom:10px;">
            <?php endif; ?>
            <?php $i++; ?>
                <div class="sreensp1" style=" width:202px; float:left; margin-left:9px; ">
                    <div class="spduan">
                        <a href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img style="width: 200px; height: 104px;" src="<?php echo image('img/news/'.$row->image, 'news_202_106') ?>" alt="<?=$row->title_vietnamese;?>" width="660" height="360">
                        </a>
                    </div>
                    <div class="titleduan">
                        <a href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <p align="center"><?=$row->title_vietnamese;?></p>
                        </a>
                    </div>
                </div>
            <?php if ($i%$columnCount == 0): ?></div><?php endif; ?>
        <?php endforeach; ?>
        <!-- Để đó khi cần tới --></div>
    </div>
    <div style="width:1px; background:#CCCCCC; height:720px; float:left; margin-left:12px; margin-top:15px;"></div>
    <div class="cotright" style="width: 300px; margin-top:15px; float:right; margin-right:9px; ">
        <div style="width:300px; float:right;margin-bottom: 15px;">
            <?php echo $this->load->view('front/includes/adv_right_s'); ?>
        </div>

        <div
            style="width:300px; height:29px; float:right; background:#109502; font-size:16px; font-weight:bold; color:#FFFFFF; margin-top:0px; margin-bottom:8px;">
            <p style=" margin-left:10px; margin-top:6px;">Tin mới nhất</p>
        </div>
        <div style="width:300px; float:right;  margin-top:10px;">
            <?php
            foreach ($newView as $row):
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreennoibat" style="width:300px;  margin-bottom:20px; float:right;">
                    <div class="boxhinhxemnhieu">
                        <a href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html">
                            <img src="<?=image('img/news/'.$row->image, 'news_115_70');?>" alt="<?=$row->title_vietnamese;?>" width="115" height="70" >
                        </a>
                    </div>
                    <div style=" width:180px; float:right; ">
                        <p class="tieudetinxemnhieu" style="margin-left:3px;">
                            <a href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html"><?=$row->title_vietnamese;?></a>
                        </p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>

        <div
            style="width:300px; height:29px; float:right; background:#109502; font-size:16px; font-weight:bold; color:#FFFFFF; margin-top:0px; margin-bottom:8px;">
            <p style=" margin-left:10px; margin-top:6px;">Tin được xem nhiều </p>
        </div>
        <div style="width:300px; float:right;  margin-top:10px;">
            <?php
            foreach ($newViewMost as $row):
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreennoibat" style="width:300px;  margin-bottom:20px; float:right;">
                    <div class="boxhinhxemnhieu">
                        <a href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html">
                            <img src="<?=image('img/news/'.$row->image, 'news_115_70');?>" alt="<?=$row->title_vietnamese;?>" width="115" height="70" >
                        </a>
                    </div>
                    <div style=" width:180px; float:right; ">
                        <p class="tieudetinxemnhieu" style="margin-left:3px;">
                            <a href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html"><?=$row->title_vietnamese;?></a>
                        </p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
    </div>
</div>

<?=$this->load->view('front/includes/footer')?>
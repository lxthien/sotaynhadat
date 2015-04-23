<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style=" width:960px;height:20px; float:left; margin-top:12px; margin-bottom: 2px;">
    <?php $i = 0; foreach ($this->businessCat as $row): $i++; ?>
        <div class="linkdautrang" style="<?php echo $i==1?'margin-left:10px;':''; ?> width:auto; float:left;">
            <a class="<?php echo $row->name_none == $this->uri->segment(2, '') ? 'linkdautrang-active' : ''; ?>" href="<?=$base_url?>doanh-nghiep/<?=$row->name_none?>"><?=$row->name_vietnamese;?></a>
        </div>
    <?php endforeach; unset($row); ?>
</div>

<div class="main" style="width:980px;">
    <div class="cotleft" style="width:645px; float:left; margin-bottom:10px;">
        <?php $i=0; foreach ($news as $row): $i++; ?>
            <?php if ($i==1): ?>
                <div class="tintuctop" style="width:645px; float:left;  margin-bottom:10px; margin-top:15px;">
                    <div style="width:318px; float:left;">
                        <div class="hinhtoptintuccap2">
                            <a href="<?=$base_url?>doanh-nghiep/<?=$category->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_300_220') ?>" alt="<?=$row->title_vietnamese;?>">
                            </a>
                        </div>
                    </div>
                    <div style="width:318px; margin-left:7px; margin-top:-3px; float:left;">
                        <div class="titletintuctopcap2"><a href="<?=$base_url?>doanh-nghiep/<?=$category->name_none.'/'.$row->title_none?>.html"><p><?=$row->title_vietnamese;?></p></a></div>
                        <p align="justify" style="float:left;  margin-top:10px; width:310px; margin-left:2px; font-size:14px;">
                        <span style="margin-left:0px; font-size:14px; font-weight:lighter;">
                            <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                        </span>
                        </p>
                    </div>
                </div>
                <div class="linedot"></div>
            <?php else: ?>
                <div class="sreentinthitruong">
                    <div class="boxhinhthitruonglon">
                        <a href="<?=$base_url?>doanh-nghiep/<?=$category->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img style="width: 196px; height: 124px;" src="<?php echo image('img/news/'.$row->image, 'news_198_148') ?>" alt="<?=$row->title_vietnamese;?>" />
                        </a>
                    </div>
                    <div class="sreennoidungthitruong" style=" float:left; margin-top:6px; width:430px; margin-left:5px;">
                        <div class="sreentieudethitruong" style="width:430px; float:right; margin-bottom:3px; margin-top:0px; ">
                            <div class="tieudenoibat2">
                                <a style="width: 100%; height: auto;" href="<?=$base_url?>doanh-nghiep/<?=$category->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                    <p style="margin-left:12px; ">
                                        <?=$row->title_vietnamese;?>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div style="width:430px; margin-bottom:10px;float:left;">
                            <p style="color:#999999; font-size:12px; margin-left:12px;">Cập nhật: <?=get_date_from_sql($row->created);?></p>
                        </div>
                        <div class="sreenndtinthitruong" style="width:410px; margin-left:12px; height:70px; float:left;color:#333333;">
                            <p align="justify" style="margin-left:0px; font-size:14px; font-weight:lighter;">
                                <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="linedot"></div>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="phantrang">
            <div class="back">
                <?=$this->pagination->create_links();?>
            </div>
        </div>
    </div>
    <div style="width:1px; background:#CCCCCC; height:720px; float:left; margin-left:12px; margin-top:15px;"></div>

    <div class="cotright" style="width: 300px; margin-top:15px; float:right; margin-right:9px; ">
        <div style="width:300px; height:29px; float:right; background:#109502; font-size:16px; font-weight:bold; color:#FFFFFF; margin-top:0px; margin-bottom:8px;">
            <p style=" margin-left:10px; margin-top:6px;">Tin mới nhất </p>
        </div>
        <div style="width:300px; float:right;  margin-top:10px;">
            <?php
            foreach ($newNews as $row):
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreennoibat" style="width:300px;  margin-bottom:20px; float:right;">
                    <div class="boxhinhxemnhieu">
                        <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html">
                            <img src="<?=image('img/news/'.$row->image, 'news_115_70');?>" alt="<?=$row->title_vietnamese;?>" width="115" height="70" >
                        </a>
                    </div>
                    <div style=" width:180px; float:right; ">
                        <p class="tieudetinxemnhieu" style="margin-left:3px;">
                            <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html"><?=$row->title_vietnamese;?></a>
                        </p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div style="width:300px; height:29px; float:right; background:#109502; font-size:16px; font-weight:bold; color:#FFFFFF; margin-top:0px; margin-bottom:8px;">
            <p style=" margin-left:10px; margin-top:6px;">Tin được xem nhiều</p>
        </div>
        <div style="width:300px; float:right;  margin-top:10px;">
            <?php
            foreach ($newViewMost as $row):
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreennoibat" style="width:300px;  margin-bottom:20px; float:right;">
                    <div class="boxhinhxemnhieu">
                        <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html">
                            <img src="<?=image('img/news/'.$row->image, 'news_115_70');?>" alt="<?=$row->title_vietnamese;?>" width="115" height="70" >
                        </a>
                    </div>
                    <div style=" width:180px; float:right; ">
                        <p class="tieudetinxemnhieu" style="margin-left:3px;">
                            <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html"><?=$row->title_vietnamese;?></a>
                        </p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
    </div>
</div>

<?=$this->load->view('front/includes/footer'); ?>
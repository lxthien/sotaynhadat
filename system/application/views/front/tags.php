<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style=" width:960px;height:20px; float:left; margin-top:12px; margin-bottom: 2px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?php echo $base_url; ?>">Trang chủ</a></div>
    <div class="linkdautrang " style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?php echo $base_url.'tags'; ?>">Tag</a></div>
</div>
<!--main-->

<div class="main" style="width:980px;">
    <div class="cotleft" style="width:645px; float:left; margin-bottom:10px;">
        <?php $i=0; foreach ($news as $row): $i++; ?>
            <?php $cat = new Newscatalogue($row->newscatalogue_id); ?>
            <?php if ($i==1): ?>
                <div class="tintuctop" style="width:645px; float:left;  margin-bottom:10px; margin-top:15px;">
                    <div style="width:318px; float:left;">
                        <div class="hinhtoptintuccap2">
                            <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_300_220') ?>" alt="<?=$row->title_vietnamese;?>">
                            </a>
                        </div>
                    </div>
                    <div style="width:318px; margin-left:7px; margin-top:-3px; float:left;">
                        <div class="titletintuctopcap2"><a style="width: 100%;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html"><p><?=$row->title_vietnamese;?></p></a></div>
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
                        <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img style="width: 196px; height: 124px;" src="<?php echo image('img/news/'.$row->image, 'news_198_148') ?>" alt="<?=$row->title_vietnamese;?>" />
                        </a>
                    </div>
                    <div class="sreennoidungthitruong" style=" float:left; margin-top:6px; width:430px; margin-left:5px;">
                        <div class="sreentieudethitruong" style="width:430px; float:right; margin-bottom:3px; margin-top:0px; ">
                            <div class="tieudenoibat2">
                                <a style="width: 100%; height: auto;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
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
            <p style=" margin-left:10px; margin-top:6px;">Tin mới nhất</p>
        </div>
        <div style="width:300px; float:right;  margin-top:10px;">
            <?php
            foreach ($newNews as $row):
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
<?=$this->load->view('front/includes/footer'); ?>
<!--end main-->
<div class="main invisiable" style="width:960px;float:left;margin-top:5px; margin-left:12px;">
    <!--left-->
    <div class="left">
        <!--tin tuc-->
        <div class="hotnew">
            <div class="titlenew2 title-cat-item">
                <p  style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px;  margin-top:5px;"><?php echo 'Tags';?></p>
            </div>
            <?php $i=0; foreach($news as $row): $i++;
                $cat = new Newscatalogue($row->newscatalogue_id);
            ?>
            <div style="display: none;" class="sreentinthitruong">
                <div class="boxhinhthitruonglon">
                    <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                        <img src="<?=$base_url?>img/news/<?=$row->image?>" />
                    </a>
                </div>
                <div  class="sreennoidungthitruong" style=" float:left; margin-top:8px; width:395px; margin-left:5px;">
                    <div class="sreentieudethitruong" style="width:400px; float:left; margin-bottom:15px; margin-top:0px; ">
                        <div class="tieudenoibat2" >
                            <a style="height: auto; width: auto;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <p style="margin-left:5px; font-size: 18px; ">
                                    <?=$row->title_vietnamese;?>
                                </p>
                            </a>
                        </div>
                        <p style="font-size:14px; color:#999999; margin-left:5px; float:left; width:150px;"><?=get_date_from_sql($row->created);?></p>
                    </div>
                    <div class="sreenndtinthitruong" style="width:380px; float:left;color:#333333;">
                        <p align="justify" style="margin-left:5px;">
                            <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                        </p>
                    </div>
                </div>
            </div>
                <div class="sreentinthitruong cat-item">
                    <div class="boxhinhthitruongnho img-cat-item">
                        <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img src="<?php echo image('img/news/'.$row->image, 'news_198_148') ?>" width="198" />
                        </a>
                    </div>
                    <div class="sreennoidungthitruong cat-item-right">
                        <div class="sreentieudethitruong" style="width:380px; float:left; margin-bottom:5px; margin-top: 0px;">
                            <div class="tieudenoibat3" >
                                <a style="height: auto; width: auto;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                    <p style="margin-left:5px; font-size: 18px; line-height: 20px; margin-bottom: 5px;"><?=$row->title_vietnamese;?></p>
                                </a>
                                <p style="font-size:12px; color:#999999; margin-left:5px; float:left; width:375px; display: block; font-weight: normal;">
                                    <?=$row->newscatalogue->name_vietnamese; ?> &diams; <?=get_date_from_sql($row->created);?>
                                </p>
                            </div>
                        </div>
                        <div class="sreenndtinthitruong" style="width:380px; float:left;color:#333333">
                            <p align="justify" style="margin-left:5px;">
                                <?=strlen($row->short_vietnamese) < 350 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 350).'...';?>
                            </p>
                        </div>
                        <div style="display: none;" class="tag-cat-item">
                            Từ khóa: <a href="#">aaa</a>, <a href="#">bbb</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="phantrang" style="float:left; width:330px; margin-left:280px; height:20px;">
                <div class="back">
                    <?=$this->pagination->create_links();?>
                </div>
            </div>
        </div>
        <!--end tin tuc-->
    </div>
    <!--end left-->
    <!-- right-->
    <div class="right">
        <div class="sreenboxtwen" style="width:147px; float:left;">
            <!--duan-->
            <div class="boxduan2">
                <p  style="font-size:13px; font-weight:bold; color:#028287; margin-top:10px; margin-left:28px; float:left;">Dự án nổi bật</p>
                <div class="line6"></div>
                <?php foreach($this->projectHot as $row):
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                    <div style="width:147px; float:left; margin-bottom:14px;">
                        <div class="boxhinh4">
                            <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_135_101') ?>" />
                            </a>
                        </div>
                        <div class="tieudeduan2"><a style="color: #000;" href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>"><p align="center" style="margin-top:4px;"><?=$row->title_vietnamese;?></p></a></div>
                    </div>
                <?php endforeach; unset($row); unset($cat); ?>
            </div>
            <!--end duan-->
        </div>
        <?=$this->load->view('front/news/col-right')?>
    </div>
    <!--end right-->
    <?=$this->load->view('front/includes/footer')?>
</div>
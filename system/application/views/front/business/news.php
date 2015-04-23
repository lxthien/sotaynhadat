<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style=" width:960px;height:20px; float:left; margin-top:12px; margin-bottom: 2px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?php echo $base_url; ?>">Trang chủ</a></div>
    <div class="linkdautrang " style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?php echo $base_url.'doanh-nghiep'; ?>">Doanh nghiệp</a></div>
</div>


<div class="main" style="width:980px;">
    <div class="cotleft" style="width:645px; float:left; margin-bottom:10px;">
        <div class="tintuctop" style="width:645px; float:left;  margin-bottom:0px; margin-top:15px;">
            <?php $cat = new Newscatalogue($newHotFirst->newscatalogue_id); ?>
            <div style=" width:415px; float:left;">
                <div class="hinhtintuctop">
                    <a href="<?=$base_url.'doanh-nghiep/'.$cat->name_none.'/'.$newHotFirst->title_none?>.html" title="<?php echo $newHotFirst->title_vietnamese;?>">
                        <img src="<?= image('img/news/'.$newHotFirst->image, 'news_415_270'); ?>" alt="<?php echo $newHotFirst->title_vietnamese;?>">
                    </a>
                </div>
                <div class="titletintuctop">
                    <a href="<?=$base_url.'doanh-nghiep/'.$cat->name_none.'/'.$newHotFirst->title_none?>.html" title="<?php echo $newHotFirst->title_vietnamese;?>">
                        <p><?php echo $newHotFirst->title_vietnamese;?></p>
                    </a>
                </div>
                <p align="justify" style="float:left; margin-left:9px; margin-top:10px;font-size:14px; width:410px;">
                    <span style="margin-left:0px; font-size:14px; font-weight:lighter;">
                        <?=strlen($newHotFirst->short_vietnamese) < 450 ? $newHotFirst->short_vietnamese: cut_string($newHotFirst->short_vietnamese, 450).'...';?>
                    </span>
                </p>
            </div>
            <div style="float:right; width:195px; ">
                <?php
                unset($cat);
                foreach($newHot as $row):
                    if($row->id != $newHotFirst->id):
                        $cat = new Newscatalogue($row->newscatalogue_id);
                        ?>
                        <div style="width:195px;margin-bottom:10px; float:right;">
                            <div class="hinhtintuctopcon">
                                <a href="<?=$base_url.'doanh-nghiep/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?=strlen($row->title_vietnamese) < 100 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 100).'...';?>">
                                    <img src="<?= image('img/news/'.$row->image, 'news_195_100'); ?>" alt="<?=strlen($row->title_vietnamese) < 100 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 100).'...';?>">
                                </a>
                            </div>
                            <div class="titletintuccon">
                                <a href="<?=$base_url.'doanh-nghiep/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?=strlen($row->title_vietnamese) < 100 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 100).'...';?>">
                                    <p align="left"><?=strlen($row->title_vietnamese) < 100 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 100).'...';?></p>
                                </a>
                            </div>
                        </div>
                    <?php endif;
                endforeach;
                ?>
            </div>
        </div>

        <p style=" font-size:18px; color:#109502; font-weight:bold; margin-left:9px;">Tin mới cập nhật </p>

        <div style="float:right; width:480px; height:1px; margin-right:1px; background-color:#109502; margin-top:-7px;"></div>

        <?php
        foreach ($newNews as $row):
            $cat = new Newscatalogue($row->newscatalogue_id);
            ?>
            <div class="sreentinthitruong">
                <div class="boxhinhthitruonglon">
                    <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                        <img style="width: 196px; height: 124px;" src="<?php echo image('img/news/'.$row->image, 'news_196_124') ?>" alt="<?=$row->title_vietnamese;?>" width="196" height="124">
                    </a>
                </div>
                <div class="sreennoidungthitruong" style=" float:left; margin-top:6px; width:430px; margin-left:3px;">
                    <div class="sreentieudethitruong" style="width:430px; float:right; margin-bottom:3px; margin-top:0px; ">
                        <div class="tieudenoibat2">
                            <a style="height: auto; width: 100%;" href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <p style="margin-left:12px; "><?=$row->title_vietnamese;?></p>
                            </a>
                        </div>
                    </div>
                    <div style="width:430px;margin-bottom:8px;float:left;margin-top: 3px;">
                        <div style="float:left;">
                            <div class="linktinupdate"><a style="color: #109502;" href="<?php echo $base_url?>doanh-nghiep/<?=$cat->name_none; ?>" title="<?=$cat->name_vietnamese;?>"><p style="margin-left:12px;"><?=$cat->name_vietnamese;?></p></a></div>
                        </div>
                        <p style="color:#999999; font-size:14px; float:left; margin-top:-1px; margin-left:5px; margin-right:5px;">-</p>
                        <p style="color:#999999; font-size:13px; margin-top:0px; float:left;"><?=get_date_from_sql($row->created);?></p>
                    </div>
                    <div class="sreenndtinthitruong"
                         style="width:410px; margin-left:12px; height:70px; float:left;color:#333333;">
                        <p align="justify" style="margin-left:0px; font-size:14px; font-weight:lighter;">
                            <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="linedot"></div>
        <?php endforeach; unset($row); ?>

        <div class="phantrang">
            <div class="back">
                <?=$this->pagination->create_links();?>
            </div>
        </div>

        <div class="phantrang invisiable" style="float:left; width:240px;   margin-left:210px; margin-top:5px; height:20px;">
            <div class="next"><a href=""><p style="margin-left:3px;margin-top:2px;"> << Sau</p></a></div>
            <div class="number"><a href=""><p style="margin-left:7px; margin-top:2px;">1</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">2</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">3</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">4</p></a></div>
            <div class="number"><a href=""><p style="margin-left:6px; margin-top:2px;">5</p></a></div>
            <div class="next"><a href=""><p style="margin-left:3px;margin-top:2px;"> Trước >> </p></a></div>
        </div>
    </div>

    <div style="width:1px; background:#CCCCCC; height:720px; float:left; margin-left:12px; margin-top:15px;"></div>

    <div class="cotright" style="width: 300px; margin-top:15px; float:right; margin-right:9px; ">
        <div style="width:300px; float:right; margin-bottom: 15px;">
            <?php echo $this->load->view('front/includes/adv_right_s'); ?>
        </div>
        <div
            style="width:300px; height:29px; float:right; background:#109502; font-size:16px; font-weight:bold; color:#FFFFFF; margin-top:0px; margin-bottom:8px;">
            <p style=" margin-left:10px; margin-top:6px;">Tin được xem nhiều</p>
        </div>
        <div style="width:300px; float:right;  margin-top:10px;">
            <?php
            foreach ($newViewMost as $row):
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreennoibat" style="width:300px;  margin-bottom:20px; float:right;">
                    <div class="boxhinhxemnhieu">
                        <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img src="<?=image('img/news/'.$row->image, 'news_115_70');?>" title="<?=$row->title_vietnamese;?>" width="115" height="70">
                        </a>
                    </div>
                    <div style=" width:180px; float:right; ">
                        <p class="tieudetinxemnhieu" style="margin-left:3px;">
                            <a href="<?=$base_url?>doanh-nghiep/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>"><?=$row->title_vietnamese;?></a>
                        </p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
    </div>
</div>
<!-- end main-->
<!-- begin footer-->
<?=$this->load->view('front/includes/footer')?>
<!-- end footer-->
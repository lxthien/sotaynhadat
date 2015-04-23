<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="">Tin tức </a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left">
    <!--hotnew-->
    <div class="hotnew">
        <div class="titlenew">
            <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px; margin-top:5px;">Tin nổi bật </p>
        </div>
        <div class="sreentinnoibat" style="width:610px; float:left;">
            <!--cottrainoibat-->
            <?php $cat = new Newscatalogue($newHotFirst->newscatalogue_id); ?>
            <div  class="colleftnoibat"  style="width:297px; float:left;">
                <div class="boxhinhlon">
                    <a href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$newHotFirst->title_none?>.html" title="<?=$newHotFirst->title_vietnamese?>">
                        <img src="<?= image('img/news/'.$newHotFirst->image, 'news_260_219'); ?>" alt="<?=$newHotFirst->title_vietnamese?>" />
                    </a>
                </div>
                <div class="tieudenoibat title-hot-cat" >
                    <a href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$newHotFirst->title_none?>.html" title="<?=$newHotFirst->title_vietnamese?>">
                        <p style="margin-left:20px; margin-top: 5px;">
                            <?php echo $newHotFirst->title_vietnamese;?>
                        </p>
                    </a>
                </div>
                <div class="noidungnoibat content-cat-hot">
                    <p style="text-align:justify; float:left; margin-left:20px;">
                        <?=strlen($newHotFirst->short_vietnamese) < 300 ? $newHotFirst->short_vietnamese: cut_string($newHotFirst->short_vietnamese, 300).'...';?>
                    </p>
                </div>
            </div>
            <!--end cottrainoibat-->
            <!-- cotphainoibat-->
            <div class="colrightnoibat" style="float:left; width:309px;  padding-top:15px;">
                <?php
                unset($cat);
                foreach($newHot as $row):
                    if($row->id != $newHotFirst->id):
                        $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                <div align="justify" class="sreentinkhacnoibat" style="width:309px; height:30px; margin-bottom:10px;  float:left;">
                    <div class="icon4"></div>
                    <div class="noidungtinnoibat">
                        <a href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>">
                            <p style="text-align:justify; margin-top:-3px;">
                                <?=strlen($row->title_vietnamese) < 100 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 100).'...';?>
                            </p>
                        </a>
                    </div>
                </div>
                <?php endif; endforeach; ?>
            </div>
            <!-- end cotphainoibat-->
        </div>
        <?php
            foreach($this->newsCate as $row):
                $news = new Article();
                $news->where(array('recycle'=>0, 'newscatalogue_id'=>$row->id));
                $news->order_by('id', 'desc');
                $news->get(5);
                $newsFirst = $news->limit(1);
        ?>
            <!--tin con 1 -->
            <div class="tinthitruong">
                <p style="font-size:16px; font-weight:bold; color:#FFFFFF; margin-left:12px; margin-top:8px;">
                    <a style="color: #FFF;" href="<?=$base_url.'tin-tuc/'.$row->name_none;?>">
                        <?=$row->name_vietnamese;?>
                    </a>
                </p>
            </div>
            <div class="sreencacmuccon">

                <div class="cottraithitruong" style="width:270px; float:left; ">
                    <div class="sreenhinh+tieude" style=" width:270px; height:100px; float:left;">
                        <div class="hinhthitruong">
                            <a href="<?=$base_url.'tin-tuc/'.$row->name_none.'/'.$newsFirst->title_none?>.html" title="<?=$newsFirst->title_vietnamese?>">
                                <img src="<?=image('img/news/'.$newsFirst->image, 'news_118_98'); ?>" alt="<?php echo $newsFirst->title_vietnamese;?>" />
                            </a>
                        </div>
                        <div class="tieudethitruong">
                            <p  align="justify">
                                <a href="<?=$base_url.'tin-tuc/'.$row->name_none.'/'.$newsFirst->title_none?>.html" title="<?=$newsFirst->title_vietnamese?>">
                                    <?php echo $newsFirst->title_vietnamese;?>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="contentthitruong">
                        <p align="justify">
                            <?=strlen($newsFirst->short_vietnamese) < 200 ? $newsFirst->short_vietnamese: cut_string($newsFirst->short_vietnamese, 200).'...';?>
                        </p>
                    </div>
                </div>

                <div class="cotphaithitruong" style="width:287px;  float:left; margin-left:6px;">
                    <?php
                        foreach($news as $rowNews):
                            if($rowNews->id != $newsFirst->id):
                    ?>
                    <div class="sreentinkhacnoibat" style="width:309px; height:30px; margin-bottom:10px;  float:left;">
                        <div class="icon4"></div>
                        <div class="noidungtinnoibat2">
                            <a  href="<?=$base_url.'tin-tuc/'.$row->name_none.'/'.$rowNews->title_none?>.html" title="<?=$rowNews->title_vietnamese?>">
                                <p style="text-align:justify; margin-top:-3px;">
                                    <?php echo $rowNews->title_vietnamese;?>
                                </p>
                            </a>
                        </div>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
            <!--end tin con 1-->
        <?php endforeach; ?>

    </div>
    <!--end hotnew-->
    </div>
    <!--end left-->
    <!-- right-->
    <div class="right">
        <div class="sreenboxtwen" style="width:147px; float:left;">
            <!--duan-->
            <div class="boxduan2">
                <span class="title-top-box">Dự án nổi bật</span>
                <?php foreach($this->projectHot as $row):
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                    <div style="width:147px; float:left; margin-bottom:5px;">
                        <div class="boxhinh4">
                            <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_135_101') ?>" alt="<?=$row->title_vietnamese;?>" />
                            </a>
                        </div>
                        <div class="tieudeduan2"><a style="color: #000;" href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>"><p align="center" style="margin-top:4px; margin-left: 5px;"><?=$row->title_vietnamese;?></p></a></div>
                    </div>
                <?php endforeach; unset($row); unset($cat); ?>
            </div>
            <!--end duan-->
        </div>
        <div class="sreenboxtwen2" style=" width:168px; float:left;">
            <?=$this->load->view('front/news/col-right')?>
        </div>
    </div>
    <!--end right-->
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
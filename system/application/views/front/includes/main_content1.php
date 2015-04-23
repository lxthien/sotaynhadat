<style type="text/css">
    .hotnew{
        border-right: 1px solid #CCC;
        border-left: 1px solid #CCC;
        border-bottom: 1px solid #CCC;
    }
</style>
<?php //$this->load->view('front/includes/search');?>
<?php $this->load->view('front/includes/top-main');?>
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
<div class="left">
    <div class="hotnew">
        <div class="box-news-mod">
            <h1><span>Nhà đất nổi bật mới nhất</span></h1>
        </div>
        <div class="boxnew" style="width:610px; float:left;  margin-top:10px;">
            <?php $i=0; foreach($estatesVip as $row): $i++;
                if($row->updated != '') $date = $row->updated;
                else $date = $row->created;
            ?>
            <div class="sreentindb" style="width:610px; float:left; margin-bottom:1px;">
                <div class="sreentindb" style="width:610px; height:15px; ">
                    <div class="sreentieude" style=" height:15px; float:left; margin-right:3px; margin-left:20px; ">
                        <div class="tieude">
                            <h3><a style="color: #057200; text-transform: uppercase;" href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                <?=strlen($row->title) < 95 ? $row->title : cut_string($row->title, 95).'...';?>
                            </a></h3>
                        </div>
                    </div>
                    <?php if($row->photo != null): ?>
                        <div class="sreen1" style="width:17px; height:15px; float:left;">
                            <div class="icon">
                                <a style="background: none;" href=""><img src="<?=$base_url?>images/iconcamera.png" alt=""/></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="sreenboxnew" style="width:610px; float:left; margin-top:1px;">
                    <?php if($row->photo != null): ?>
                        <div class="boxhinh">
                            <a href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                <img src="<?=$base_url.$row->photo;?>" />
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="boxhinh">
                            <a href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                <img src="<?=$base_url?>img/project/no-image.jpg" />
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="noidung content-vip" style="width:465px; height:85px; float:left; margin-top:10px;">
                        <p style="text-align:justify;color:#333333; line-height: 18px;">
                            <?=strlen($row->description) < 400 ? $row->description: cut_string2($row->description, 400).' ...';?>
                        </p>
                    </div>
                    <div class="thongtin">
                       <strong>  <p style=" color:#cb0021; float:left;">
                            Giá:
                            <span class="style3">
                                <?php if($row->isPrice == 0): ?>
                                    <?=$row->price_text.' '.getpricetype($row->price_type);?>
                                <?php else: ?>
                                    <?='Thương lượng'?>
                                <?php endif; ?>
                            </span> </strong> 
                        <p style="color:#6e6e6e; float:left; margin-left:20px; line-height: 15px; <?=$row->isArea != 0 ? '':'margin-top: -4px;'?>">
                            Diện tích:
                            <span class="style3">
                                <span class="style3" style="line-height: 15px;">
                                    <?php if($row->isArea == 0): ?>
                                        <?=$row->area_text;?> m<sup>2</sup>
                                    <?php else: ?>
                                        <?='KXĐ'?>
                                    <?php endif; ?>
                                </span>
                            </span>
                        </p>
                        <p style=" color:#6e6e6e; float:left; margin-left:15px;">Hướng: <span class="style3"><?=$row->estatedirection->name;?></span> </p>
                        <p style=" color:#6e6e6e; float:left; margin-left:20px;">Địa điểm: <span class="diadiem"><a href="<?php echo $base_url.$row->estatetype->name_none.'/'.$row->estatedistrict->name_none.'/'.$row->estatecity->name_none; ?>"><?=$row->estatedistrict->name;?></a> </span></p>
                        <p style=" color:#333333; float:right; margin-right:14px;"><?=date('d/m',strtotime($date))?></p>
                    </div>
                </div>
            </div>
            <?php echo $i < $estatesVip->result_count() ? '<div class="line"></div>' : ''; ?>
            <?php endforeach; unset($row); ?>
        </div>
    </div>
    <div class="qc-home-page">
        <img src="<?php echo $base_url.'images/banner-center.gif' ?>" />
    </div>
    <div class="tinrao">
        <div class="box-news-mod">
            <h1><span> Tin rao nhà đất mới nhất</span></h1>
        </div>
        <div class="boxnew" style="width:590px; float:left;  margin-top:0px;">
            <?php $i=0; foreach($estatesNew as $row): $i++;
                if($row->updated != '') $date = $row->updated;
                else $date = $row->created;
            ?>
                <div class="<?= $i%2!=0 ? 'boxtinrao' : 'boxtinrao2'; ?>">
                    <div class="tieuderao">
                        <h3><a style="color:#051c94; margin-left:20px; margin-top:8px; float:left;" href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                            <?=strlen($row->title) < 100 ? $row->title : cut_string($row->title, 100).'...';?>
                        </a></h3>
                    </div>
                    <div class="sreen1" style="width:17px; height:15px; float:left; margin-top: 8px; margin-left: 10px;">
                        <div class="icon">
                            <?php if($row->photo != null): ?>
                                <a style="background: none;" href=""><img src="<?=$base_url?>images/iconcamera.png" alt=""/></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="thongtin">
                        <strong> <p style=" color:#cb0021; float:left;">
                            Giá:
                            <span class="style3">
                                <?php if($row->isPrice == 0): ?>
                                    <?=$row->price_text.' '.getpricetype($row->price_type);?>
                                <?php else: ?>
                                    <?='Thương lượng'?>
                                <?php endif; ?>
                            </span>
                        </p></strong> 
                        <p style=" color:#6e6e6e; float:left; margin-left:20px; line-height: 15px; <?=$row->isArea != 0 ? '':'margin-top: -4px;'?>">
                            Diện tích:
                            <span class="style3">
                                <span class="style3" style="line-height: 15px;">
                                    <?php if($row->isArea == 0): ?>
                                        <?=$row->area_text;?> m<sup>2</sup>
                                        <?php else: ?>
                                            <?='KXD'?>
                                        <?php endif; ?>
                                </span>
                            </span>
                        </p>
                        <p style=" color:#6e6e6e; float:left; margin-left:15px;">Hướng: <?=$row->estatedirection->name;?><span class="style3"></span> </p>
                        <p style=" color:#6e6e6e; float:left; margin-left:20px;">Địa điểm: <span class="diadiem"><a href="<?php echo $base_url.$row->estatetype->name_none.'/'.$row->estatedistrict->name_none.'/'.$row->estatecity->name_none; ?>"><?=$row->estatedistrict->name;?></a></span></p>
                        <p style=" color:#333333; float:right; margin-right:14px;"><?=date('d/m',strtotime($date))?></p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
    </div>
    <div align="justify" class="gioithieu" style="width:612px; height:80px; margin-left:15px; float:left; font-size:13px;">
        <p style="text-align:left;color:#0000;margin-top: 4px;line-height: 20px;font-size: 13px;">
            Bạn đang xem kênh thông tin nhà đất cho thuê và <strong><a style="color: #057200;"href="http://sotaynhadat.vn/nha-dat-ban" title="nhà đất bán">nhà đất bán</a></strong> sôi động tại Việt Nam! <p>
                <p style="text-align: justify;color:#0000;line-height: 20px;">Bạn đang có nhu cầu về nhà đất? Chúng tôi liệt kê đầy đủ thông tin từ nhà đất bán, cho thuê, căn hộ, biệt thự, tin tức, dự án mới nhất đến cẩm nang phong thủy, tư vấn luật <strong><a style="color: #057200;"href="http://sotaynhadat.vn/" title="bất động sản">bất động sản</a></strong>... Để tiết kiệm thời gian, bạn nên dùng công cụ tìm kiếm. Hoặc tuyệt vời hơn, bạn có thể trực tiếp trải nghiệm!<br>
        </p>
    </div>
</div>
<style type="text/css">
    .boxhinh2{
        float: left;
        width: 101px;
        height: 101px;
    }
    .boxhinh2 img{
        width: 100px;
        height: 100px;
    }
    .tieude4{
        float: left;
        width: 180px;
        height: 100px;
    }
    .tieude4 a{
        margin-left: 0px;
        width: 180px;
    }
    .tieude4 a:hover{
        margin-left: 0px;
        width: 180px;
    }
</style>
<div class="right">
    <div style="display: none" class="boxnoibat">
        <div class="titledm" style="background-color:#1483d0; width:312px; height:35px; float:right; margin-bottom:5px;">
            <p  style="font-size:16px; font-weight:bold; color:#FFFFFF; margin-top:8px; margin-left:25px; float:left;">Tin nổi bật</p>
        </div>
        <div class="hot-news-top">
            <ul>
                <?php 
                    foreach($this->newsHot as $row): 
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    $catParent = new Newscatalogue($cat->parentcat_id);
                ?>
                <li>
                    <div  class="sreennoibat" style="width:312px; margin-top:10px; float:left;">
                        <div style="width: 111px; margin-left: 10px;" class="boxhinh2">
                            <a href="<?=$base_url.$catParent->name_none.'/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <img style="width: 109px;" src="<?=$base_url.'img/news/'.$row->image?>" />
                            </a>
                        </div>
                        <div class="tieude4">
                            <a style="height: auto" href="<?=$base_url.$catParent->name_none.'/'.$cat->name_none.'/'.$row->title_none?>.html">
                                <p><?=$row->title_vietnamese;?></p>
                            </a>
                            <p><?=strlen($row->short_vietnamese) < 150 ? $row->short_vietnamese : cut_string($row->short_vietnamese, 150).'...';?></p>
                        </div>
                        <div class="line3"></div>
                    </div>
                </li>
                <?php endforeach; unset($row); ?>
            </ul>
        </div>
        <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
            <div id="container" class="carousel-hot-news">
                <ul id="carousel">
                    <?php $i=0; foreach($this->newsHot as $row): $i++;
                        $cat = new Newscatalogue($row->newscatalogue_id);
                        $catParent = new Newscatalogue($cat->parentcat_id);
                    ?>
                        <li><a href="<?=$base_url.$catParent->name_none.'/'.$cat->name_none.'/'.$row->title_none?>.html"><?=strlen($row->title_vietnamese) < 65 ? $row->title_vietnamese : cut_string($row->title_vietnamese, 65).' ...';?></a></li>
                    <?php endforeach; unset($row); ?>
                </ul>
            </div>
        </div>
    </div>
    <style type="text/css">
        #carousel li{
            width: 100%;
            padding-top: 7px;
            height: 23px;
            border-bottom: 1px solid #CCC;
            padding-left: 10px;
        }
        .hot-news-top{
            width: 100%;
            height: 70px;
        }
    </style>
    <script type="text/javascript" src="<?=base_url();?>images/js/jcarousellite_1.0.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".carousel-hot-news").jCarouselLite({
                start: 1,
                auto: 8000,
                speed: 300,
                vertical: true,
                visible: 5
            });
        });
        $(function() {
            $(".hot-news-top").jCarouselLite({
                start: 0,
                auto: 8000,
                speed: 300,
                vertical: true,
                visible: 1
            });
        });
    </script>
    <?php foreach($this->bannerAdversiting as $row): ?>
    <div class="qc"><a target="_blank" href="<?=$row->link;?>"><img src="<?=$base_url.$row->image?>" /></a></div>
    <?php endforeach; unset($row); ?>
    <div class="sreenboxtwen" style="width:316px; float:left;">
        <div class="nhinrathegioi">
            <span class="title-top-box">Tin đọc nhiều</span>
            <div class="scroll-nice-01">
            <?php $i=0; foreach($newViewMost as $row):
                $cat = new Newscatalogue($row->newscatalogue_id);
                $i++;
                    ?>
                    <?php if($i==1): ?>
                        <div class="boxhinh3">
                            <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
								<img src="<?php echo image('img/news/'.$row->image, 'news_135_101') ?>" />
                            </a>
                        </div>
                        <div class="tieude3">
                            <a style="height: auto; margin-left: 10px; width: 140px;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                                <p style="margin-left:1px; text-align: center;">
                                    <?=$row->title_vietnamese;?>
                                </p>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="sreentieudedn" style=" width:160px; margin-top:5px; float:left;">
                            <div class="icon3"></div>
                            <div class="noidungtieudedn">
                                <a style="height: auto; color: #000;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                                    <p style="text-align:justify; margin-top:-3px; padding: 2px 0px;">
                                        <?=$row->title_vietnamese;?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
            <?php endforeach; unset($row); ?>
            </div>
        </div>
        <div class="boxduan3">
            <span class="title-top-box">Dự án nổi bật</span>
            <div class="scroll-nice-02">
            <?php $i=0; foreach($this->projectHot as $row): $i++;
                $cat = new Newscatalogue($row->newscatalogue_id);
                if($i>4){ break; }
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
    </div>
</div>
<?=$this->load->view('front/includes/footer2')?>
</div>

<script src="<?php echo $base_url; ?>images/js/jquery.nicescroll.min.js"></script>
<script>
    $(document).ready(function() {
        $(".scroll-nice-01").niceScroll({touchbehavior:false,cursorcolor:"#ccc",cursoropacitymax:0.7,cursorwidth:6,background:"#fff",autohidemode:false});
        $(".scroll-nice-02").niceScroll({touchbehavior:false,cursorcolor:"#ccc",cursoropacitymax:0.7,cursorwidth:6,background:"#fff",autohidemode:false});
    });
</script>
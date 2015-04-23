<div class="linktop" style="width:926px;height:20px; float:left; margin-top:8px; margin-left:25px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>" title="Trang chủ">Trang chủ</a></h3></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>tin-tuc" title="Tin tức">Tin tức</a></h3></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>tin-tuc/<?=$category->name_none?>" title="<?=$category->name_vietnamese;?>"><?=$category->name_vietnamese;?></a></h3></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>tin-tuc/<?=$category->name_none.'/'.$news->title_none?>.html" title="<?=$news->title_vietnamese;?>"><?=$news->title_vietnamese;?></a></h3></div>
</div>
<!--main-->
<style type="text/css">
    .hotnew2{
        border-right: none;
        border-left: none;
        border-bottom: none;
    }
</style>
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left2">
        <!--tin tuc-->
        <div class="hotnew2" style="overflow: hidden">
            <div class="sreentinthitruongchitiet">
                <div class="sreentieudethitruong title-news-des">
                    <div class="tieudethitruongchitiet" style="height: auto;" >
                        <h1 style="font-size: 20px;"><?=$news->title_vietnamese;?></h1>
                    </div>
                </div>
                <p style="font-size:12px; font-style:italic; float:left; color:#999999;"><?=$news->source;?> - Ngày đăng: <?=get_date_from_sql($news->created);?></p>
                <div style="line-height: 18px;" class="noidungthitruongchitiet">
                    <?=$news->full_vietnamese;?>
                </div>
            </div>
            <div class="sreentag" >
                <div class="tag"></div>
                <p style="float:left; margin-left:5px;">
                    <?php $i=0; foreach($tag as $tagSub): $i++;?>
                        <a href="<?=$base_url.'tags/'.remove_vn($tagSub)?>"><?=$tagSub;?></a> <?php echo $i<count($tag) ? ',':''; ?>
                    <?php endforeach ?>
                </p>
            </div>
            <div class="line12"></div>
            <!--cac tin khac-->
            <div class="cactinkhac2"	>
                <p style="font-size:16px; font-weight:bold; color:#666666; margin-bottom:10px;"> Các tin khác: </p>
                <?php foreach($related_news as $row):
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                <div class="sreentieudedn" style=" width:500px; height:18px; margin-bottom:3px;  float:left;">
                    <div class="icon3"></div>
                    <div class="sreentinkhacthitruongchitiet" style="width:450px; float:left;">
                        <div class="tinkhacthitruongchitiet">
                            <a style="height: auto; padding: 1px 0px; width: 800px;" href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none?>.html">
                                <h4 style="text-align:justify; margin-top:-3px;font-size: 14px;font-weight: normal;">
                                    <?=$row->title_vietnamese;?> <span style="color:#ccc;" class="style4">(<?=get_date_from_sql($row->created);?>)</span>
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; unset($row); ?>
            </div>
            <!--end cac tin khac-->
        </div>
        <!--end tin tuc-->
    </div>
    <!--end left-->
    <!-- right-->
    <div class="right2">
        <?=$this->load->view('front/news/col-right')?>
    </div>
    <!--end right-->
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
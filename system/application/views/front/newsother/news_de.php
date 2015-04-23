<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url?>" title="Trang chủ">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url.$category->name_none;?>" title="<?=$category->name_vietnamese;?>"><?=$category->name_vietnamese;?></a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url.$category->name_none.'/'.$news->title_none?>.html" title="<?=$news->title_vietnamese;?>"><?=$news->title_vietnamese;?></a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left2">
        <!--tin tuc-->
        <div class="hotnew2" style="overflow: hidden">
            <div class="sreentinthitruongchitiet">
                <div class="sreentieudethitruong">
                    <div class="tieudethitruongchitiet" >
                        <p><?=$news->title_vietnamese;?></p>
                    </div>
                    <p style="font-size:14px; color:#333333; margin-left:5px; margin-top:2px; float:left; font-style: italic; ">(Ngày đăng: <?=date('d-m-Y', $news->created);?>)</p>
                </div>
                <p style="font-size:14px; font-style:italic; width:200px; float:left; color:#999999;"><?=$news->source;?></p>
                <div class="noidungthitruongchitiet">
                    <p align="justify">
                        <?=$news->full_vietnamese;?>
                    </p>
                </div>
            </div>
            <div class="sreentag" >
                <div class="tag"></div>
                <p style="float:left; width:490px; margin-left:5px;"><?=$news->tag?></p>
            </div>
            <div class="line12"></div>
            <!--cac tin khac-->
            <div class="cactinkhac2"	>
                <p style="font-size:16px; font-weight:bold; color:#666666; margin-bottom:10px;"> Các tin khác: </p>
                <?php foreach($related_news as $row): ?>
                    <div class="sreentieudedn" style=" width:500px; height:15px; margin-bottom:3px;  float:left;">
                        <div class="icon3"></div>
                        <div class="sreentinkhacthitruongchitiet" style="width:450px; height:20px; float:left;">
                            <div class="tinkhacthitruongchitiet">
                                <a href="<?=$base_url.$category->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                    <p style="text-align:justify; margin-top:-3px;">
                                        <?=$row->title_vietnamese;?> <span class="style4">(<?=$row->created;?>)</span>
                                    </p>
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
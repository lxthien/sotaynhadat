<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url;?>" title="Sàn nhà đất">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url.$category->name_none;?>" title="<?=$category->name_vietnamese;?>"><?=$category->name_vietnamese;?></a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left">
        <!--tin tuc-->
        <div class="hotnew">
            <div class="titlenew2">
                <p  style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px;  margin-top:5px;"><?=$category->name_vietnamese;?></p>
            </div>
            <?php $i=0; foreach($news as $row): $i++;
                if($i==1):
                ?>
            <div class="sreentinthitruong">
                <div class="boxhinhthitruonglon"><img src="<?=$base_url?>img/news/<?=$row->image?>" /></div>
                <div  class="sreennoidungthitruong" style=" float:left; margin-top:8px; width:395px; margin-left:5px;">
                    <div class="sreentieudethitruong" style="width:340px; height:25px; float:left; margin-bottom:15px; margin-top:0px; ">
                        <div class="tieudenoibat2" >
                            <a href="<?=$base_url.$category->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <p style="margin-left:5px; ">
                                    <?=strlen($row->title_vietnamese) < 50 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 50).'...';?>
                                </p>
                            </a>
                        </div>
                        <p style="font-size:14px; color:#999999; margin-left:5px; float:left; width:150px;"><?=$row->created;?></p>
                    </div>
                    <div class="sreenndtinthitruong" style="width:380px; float:left;color:#333333;">
                        <p align="justify" style="margin-left:5px;">
                            <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="line22"></div>
                    <?php else: ?>
            <div class="sreentinthitruong">
                <div class="boxhinhthitruongnho"><img src="<?=$base_url?>img/news/<?=$row->image?>" width="146" height="103" /></div>
                <div  class="sreennoidungthitruong" style=" float:left; margin-top:0px; width:440px; margin-left:5px;">
                    <div class="sreentieudethitruong" style="width:420px; height:25px; float:left; margin-bottom:15px; margin-top:0px; ">
                        <div class="tieudenoibat3" >
                            <a href="<?=$base_url.$category->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <p  style="margin-left:5px; ">
                                    <?=strlen($row->title_vietnamese) < 50 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 50).'...';?>
                                </p>
                            </a>
                        </div>
                        <p style="font-size:14px; color:#999999; margin-left:5px; float:left; width:150px;"><?=$row->created;?></p>
                    </div>
                    <div class="sreenndtinthitruong" style="width:427px; float:left;color:#333333">
                        <p align="justify" style="margin-left:5px;">
                            <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="line2"></div>
            <?php endif; endforeach; ?>
            <div class="phantrang" style="float:left; width:110px; margin-left:485px; margin-right:8px; height:20px;">
                <div class="back">
                    <?=$this->pagination->create_links();?>
                    <!--<a href=""><p> Back</p></a>
                    <a href=""><p style="margin-left:5px;"> 1</p></a>
                    <a href=""><p style="margin-left:5px;"> 2</p></a>
                    <a href=""><p style="margin-left:5px;"> 3</p></a>
                    <a href=""><p style="margin-left:5px;"> 4</p></a>
                    <a href=""><p style="margin-left:5px;"> Next</p></a>-->
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
                    <div style="width:147px; float:left; height:110px; margin-bottom:14px;">
                        <div class="boxhinh4"><img src="<?=$base_url?>img/news/<?=$row->image;?>" /></div>
                        <div class="tieudeduan2"><a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>"><p align="center" style="margin-top:4px;"><?=$row->title_vietnamese;?></p></a></div>
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
<!--end main-->
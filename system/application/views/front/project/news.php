<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url?>" title="Sàn nhà đất">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url?>du-an">Dự án</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px;  margin-left:12px; ">
<!--left-->
<div class="left">
    <!--du an-->
    <div class="hotnew">
        <div class="titlenew">
            <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px; margin-top:5px;">Dự án nổi bật</p>
        </div>
        <!--san pham-->
        <div class="sreenspduan" style="width:610px; height:auto; float:left; margin-top:10px;  margin-bottom:5px;">
            <?php $i=0; foreach($projectHot as $row): $i++;
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreensp1" style="margin-bottom: 20px; width:163px; float:left; height:240px; margin-left:<?=($i-1)%3==0 ? '20px;' : '40px';?>">
                    <div class="spduan">
                        <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>">
                            <img src="<?php echo image('img/news/'.$row->image, 'news_160_150') ?>" alt="<?=$row->title_vietnamese?>" />
                        </a>
                    </div>
                    <div class="titleduan">
                        <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>"><p><?=$row->title_vietnamese?></p></a>
                        <p  align="left" style="width:160px; color:#336699; float:left; margin-top:3px;">Chủ đầu tư: <?=$row->investors?></p>
                        <p  align="left" style="width:160px;color:#666666;float:left; margin-top:3px">Vị trí: <?=$row->estatecity->name?></p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <!--end san pham-->
        <!--sanpham khac-->
        <div class="duankhac">
            <p style="font-size:16px; font-weight:bold; color:#FFFFFF; margin-left:25px; margin-top:8px;">Dự án khác</p>
        </div>
        <div class="sreenduankhac" style="width:610px; float:left; margin-bottom:5px;">
            <?php $i=0; foreach($project as $row): $i++;
                $cat = new Newscatalogue($row->newscatalogue_id);
            ?>
                <div class="sreenspkhac1" style="margin-bottom: 20px; width:291px; height:116px; float:left; margin-left: <?=$i%2==0 ? '5px' : '20px'?>;">
                    <div class="spkhac">
                        <a style="color: #000;" href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>">
                            <img src="<?php echo image('img/news/'.$row->image, 'news_121_114') ?>" alt="<?=$row->title_vietnamese?>" />
                        </a>
                    </div>
                    <div class="titleduankhac">
                        <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>"><p><?=$row->title_vietnamese?></p>  </a>
                        <p align="left" style=" width:140px; float:left ; margin-top:3px; color:#666666;">Chủ đầu tư: <?=$row->investors?></p>
                        <p  align="left" style=" width:140px; float:left ; margin-top:3px; color:#666666;">Vị trí: <?=$row->estatecity->name?></p>
                    </div>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <!--end sanpham khac-->
    </div>
    <!--end du an-->
</div>
<!--end left-->
    <?=$this->load->view('front/project/col-right')?>
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
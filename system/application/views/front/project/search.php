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
                <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px; margin-top:5px;">Tìm kiếm dự án</p>
            </div>
            <!--san pham-->
            <div class="sreenspduan" style="width:610px; float:left; margin-top:10px;  margin-bottom:5px;">
                <?php $i=0; foreach($estates as $row): $i++;
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                    <div class="sreensp1" style="margin-bottom: 20px; width:163px; float:left; height:240px; margin-left:<?=($i-1)%3==0 ? '20px;' : '40px';?>">
                        <div class="spduan">
                            <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_160_150') ?>" />
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
        </div>
        <!--end du an-->
    </div>
    <!--end left-->
    <?php echo $this->load->view('front/project/col-right')?>
    <?php echo $this->load->view('front/includes/footer')?>
</div>
<!--end main-->
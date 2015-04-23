<div class="linktop" style=" width: 926px;height:20px; float:left; margin-top:8px; margin-left:25px;  ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>" title="Sàn nhà đất">Trang chủ</a></h3></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>du-an" title="Dự án">Dự án</a></h3></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>du-an/<?=$category->name_none?>" title="<?=$category->name_vietnamese?>"><?=$category->name_vietnamese?></a></h3></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><h3 style="font-weight: normal"><a href="<?=$base_url?>du-an/<?=$category->name_none.'/'.$news->title_none?>.html" title="<?=$news->title_vietnamese;?>"><?=$news->title_vietnamese;?></a></h3></div>
</div>
<div class="main" style="width:960px;float:left;margin-top:5px;  margin-left:12px; ">
    <div class="left">
        <div class="hotnew">
            <div class="sreennoidungchitiet" style="width:610px; float:left; margin-bottom:5px;">
                <div class="sreentieudethitruong">
                    <div class="tieudethitruongchitiet" style="margin-left: 15px;" >
                        <h1 style="font-size: 25px; color:#051c94;"><?=$news->title_vietnamese;?></h1>
                    </div>
                </div>
                <div class="noidungchitiet" style="width:560px; height:25px; float:left; margin-left:15px; margin-bottom:5px;">
                    <p style="font-size:16px; font-weight: 600; margin-top:7px; color:#505050;"><strong>Nội dung tóm tắt:</strong></p>
                </div>
                <p style="text-align:justify;color:#333333; margin-left:15px; width:585px; float:left; font-size:14px; line-height: 18px;">
                    <?=$news->short_vietnamese;?>
                </p>
            </div>
            <div class="sreennoidungchitiet" style="width:610px; float:left;">
                <div class="noidungchitiet" style="width:560px; height:25px; float:left; margin-left:15px; margin-bottom:10px;">
                    <p style="font-size:16px; font-weight: 600; margin-top:5px; color:#505050;"><strong>Thông tin dự án:</strong></p>
                </div>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left; font-size:14px;"><strong>Tỉnh/TP</strong>: <span class="style1 style5"> <?=$news->estatecity->name;?></span></p>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left;font-size:14px;"><strong>Quận/Huyện</strong>:  <span class="style1 style6"> <?=$news->estatedistrict->name;?> </span></p>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left;font-size:14px;"><strong>Loại dự án</strong>: <span class="style1 style6"> <?=$news->newscatalogue->name_vietnamese;?> </span></p>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left;font-size:14px;"><strong>Số vốn đầu tư</strong>: <span class="style1 style6"> <?=$news->equity;?> </span> </p>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left;font-size:14px;"><strong>Thời gian khởi công</strong>: <span class="style1 style6"> <?=$news->timeStart;?> </span></p>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left;font-size:14px;"><strong>Thời gian hoàn thành</strong>: <span class="style1 style6"> <?=$news->timeCompleted;?> </span></p>
                <p style="text-align:justify;color:#333333; margin-left:15px; margin-bottom:7px; width:560px; color:#051c94;float:left;font-size:14px;"><strong>Chủ đầu tư</strong>: <span class="style1 style6"> <?=$news->investors;?> </span></p>
            </div>
            <div class="sreenspduan" style="width:583px; float:left; margin-top:10px; margin-bottom:15px; margin-left:15px; line-height: 18px; font-size:14px;">
                <div>
                    <div align="justify">
                        <?=$news->full_vietnamese;?>
                    </div>
                </div>
            </div>
            <div class="sreentag2" >
                <div class="tag"></div>
                <p style="float:left; width:490px; margin-left:5px; color: #cccccc;">
                    <?php foreach($tag as $tagSub): ?>
                        <a href="<?=$base_url.'tags/'.remove_vn($tagSub)?>"><?=$tagSub;?></a> ,
                    <?php endforeach ?>
                </p>
            </div>
            <div class="duankhac">
                <p style="font-size:16px; font-weight:bold; color:#FFFFFF; margin-left:15px; margin-top:8px;">Dự án khác</p>
            </div>
            <div class="sreenduankhac" style="width:610px; float:left; margin-bottom:5px;">
                <?php foreach($related_news as $row):
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                    <div class="sreenspkhac1" style="margin-bottom: 20px; width:291px; height:116px; float:left; margin-left: <?=$i%2==0 ? '5px' : '20px'?>;">
                        <div class="spkhac">
                            <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>">
								<img src="<?php echo image('img/news/'.$row->image, 'news_123_116') ?>" alt="<?=$row->title_vietnamese?>" />
                            </a>
                        </div>
                        <div class="titleduankhac">
                            <h4><a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese?>"><?=$row->title_vietnamese?></a></h4>
                            <p align="left" style=" width:140px; float:left ; margin-top:3px; color:#666666;">Chủ đầu tư: <?=$row->investors?></p>
                            <p  align="left" style=" width:140px; float:left ; margin-top:3px; color:#666666;">Vị trí: <?=$row->estatecity->name?></p>
                        </div>
                    </div>
                <?php endforeach; unset($row); ?>
            </div>
        </div>
    </div>
    <?=$this->load->view('front/project/col-right')?>
    <?=$this->load->view('front/includes/footer')?>
</div>
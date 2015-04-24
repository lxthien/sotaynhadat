<div class="right">
    <div class="boxnoibat">
        <div class="titledm" style="background-color:#0f9502; width:300px; height:30px; float:right; margin-bottom:5px;">
            <p style="font-size:16px; font-weight:bold; color:#FFFFFF; margin-top: 5px; margin-left:25px; float:left;">Danh mục dự án</p>
        </div>
        <?php foreach($this->projectsCate as $row): ?>
            <div class="sreentinnoibat" style="width:300px; height:30px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a href="<?=$base_url?>du-an/<?=$row->name_none?>" title="<?=$row->name_vietnamese;?>">
                        <p style="margin-left:25px; margin-top:9px; font-weight:bold;">
                            <?=strlen($row->name_vietnamese) < 50 ? $row->name_vietnamese : cut_string($row->name_vietnamese, 50).'...';?>
                        </p>
                    </a>
                </div>
            </div>
            <div class="line3"></div>
        <?php endforeach; unset($row); ?>
    </div>
    <div class="boxnoibat boxtimkiemduan">
        <span class="title-top-box">Tìm kiếm dự án</span>
        <form action="<?=$base_url?>tim-kiem-du-an" method="post">
            <div class="sreentimkiemduan" style="width:300px; float:left;">
                <div class="tieudetimkiemduan" style="width:200px; float:left; margin-left:3px; margin-bottom:3px;">
                    <p style="width:200px; float:left; color:#3366CC; margin-left:10px; font-weight:400; font-size:14px;">Tìm kiếm theo danh mục:</p>
                </div>
                <div class="sreenmenuseach" style="float:left; width:280px; margin-top:-5px;margin-left:3px;">
                    <select name="estatetype_id" id="estatetype_id" size="1" style="float:left; margin-right:5px; margin-left:13px; width:270px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                        <option value="0" selected="selected">Chọn danh mục dự án</option>
                        <?php foreach($this->projectsCate as $row): ?>
                            <option <?php /*if($object->estatetype_id == $row->id) echo 'selected="selected"'; */?> value="<?=$row->id;?>"><?=$row->name_vietnamese;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </div>
            </div>
            <div class="sreentimkiemduan" style="width:300px; float:left;">
                <div class="tieudetimkiemduan" style="width:200px; float:left; margin-left:3px; margin-bottom:3px;">
                    <p style="width:200px; float:left; color:#3366CC; margin-left:10px; font-weight:400; font-size:14px;">Tìm kiếm theo Tỉnh/TP:</p>
                </div>
                <div class="sreenmenuseach" style="float:left; width:280px; margin-top:-5px;margin-left:3px;">
                    <select name="estatecity_id" id="estatecity_id" size="1" style="float:left; margin-right:5px; margin-left:13px; width:270px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                        <option value="">Chọn Tỉnh/Thành phố</option>
                        <?php foreach($this->estateProvince as $row): ?>
                            <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </div>
            </div>
            <div class="sreentimkiemduan" style="width:300px; float:left;">
                <div class="tieudetimkiemduan" style="width:200px; float:left; margin-left:3px; margin-bottom:3px;">
                    <p style="width:200px; float:left; color:#3366CC; margin-left:10px; font-weight:400; font-size:14px;">Tìm kiếm theo Quận/Huyện:</p>
                </div>
                <div class="sreenmenuseach" style="float:left; width:280px; margin-top:-5px;margin-left:3px;">
                    <select name="estatedistrict_id" id="estatedistrict_id" size="1" style="float:left; margin-right:5px; margin-left:13px; width:270px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                        <option value="">Chọn Quận/Huyện</option>
                    </select>
                </div>
            </div>
            <div class="sreenbtonseach" style="width:100px; height:34px; margin-left:100px; margin-bottom:10px; float:left;">
                <div class="timkiembduan">
                    <input type="submit" value=""/>
                </div>
            </div>
        </form>
    </div>
    <div class="boxnoibat duannoibat">
        <span class="title-top-box">Dự án nổi bật</span>
        <?php foreach($this->projectHot as $row):
            $cat = new Newscatalogue($row->newscatalogue_id);
            ?>
        <div  class="sreennoibat" style="width:300px; margin-bottom:10px; float:left;">
            <div class="boxhinh6" style="margin-left: 10px;">
                <a href="<?=$base_url;?>du-an/<?=$cat->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                    <img src="<?php echo image('img/news/'.$row->image, 'news_115_91') ?>" alt="<?=$row->title_vietnamese?>" />
                </a>
            </div>
            <div class="tieudeduan">
                <a style="height: auto; color: #000;" href="<?=$base_url;?>du-an/<?=$cat->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                    <p>
                        <?=$row->title_vietnamese;?>
                    </p>
                </a>
            </div>
            <div class="contentduannoibat" style="width:160px; height:25px; float:left; margin-top:-7px; ">
                <p  align="left" style="width:160px; color:#666666; float:left; margin-top:3px;">
                    Chủ đầu tư: <?=$row->investors;?>
                </p>
                <p  align="left" style="width:160px;color:#666666;float:left; margin-top:3px">
                    Vị trí: <?=$row->estatecity->name?>
                </p>
            </div>
        </div>
        <?php endforeach; unset($row); ?>
    </div>
    <div class="tindoanhnhan">
        <span class="title-top-box">Tin dự án</span>
        <div  class="sreennoibat" style="width:300px; height:100px; margin-bottom:10px; float:left;">
            <div class="boxhinh6" style="margin-left: 5px;">
                <a href="<?=$base_url?>tin-tuc/tin-du-an/<?=$this->projectNewsFirst->title_none;?>.html" title="<?=$this->projectNewsFirst->title_vietnamese?>">
                    <img src="<?php echo image('img/news/'.$this->projectNewsFirst->image, 'news_115_91') ?>" alt="<?=$this->projectNewsFirst->title_vietnamese?>" />
                </a>
            </div>
            <div class="tieude2">
                <a style="height: auto; color: #000;" href="<?=$base_url?>tin-tuc/tin-du-an/<?=$this->projectNewsFirst->title_none;?>.html" title="<?=$this->projectNewsFirst->title_vietnamese?>">
                    <p>
                        <?=$this->projectNewsFirst->title_vietnamese;?>
                    </p>
                </a>
            </div>
            <div class="contentnew" style="width:160px; height:25px; float:left;">
                <p style="text-align:justify;color:#333333;">
                    <?=strlen($this->projectNewsFirst->short_vietnamese) < 80 ? $this->projectNewsFirst->short_vietnamese : cut_string($this->projectNewsFirst->short_vietnamese, 80).'...';?>
                </p>
            </div>
        </div>
        <?php foreach($this->projectNews as $row):
            if($row->id != $this->projectNewsFirst->id):
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div class="sreentindoanhnhan" style="width:300px; margin-bottom:5px; float:left;">
                    <div class="icon3"></div>
                    <div class="noidungtindoanhnhan">
                        <a style="height: auto; padding: 2px 0px; color: #000;" href="<?=$base_url?>tin-tuc/<?=$cat->name_none.'/'.$row->title_none;?>.html" title="<?=$row->title_vietnamese?>">
                            <p style="text-align:left; margin-top:-3px; width:290px; ">
                                <?=$row->title_vietnamese;?>
                            </p>
                        </a>
                    </div>
                </div>
        <?php endif; endforeach; unset($row); ?>
    </div>
</div>
<script type="text/javascript" src="http://www.jugbit.com/jquery/jquery.vticker-min.js"></script>
<script type="text/javascript">
    $(function(){
        $('.caroul-news-list').vTicker({
            speed: 300,
            pause: 10000,
            animation: 'fade',
            mousePause: false,
            showItems: 6
        });
        $('.caroul-news').vTicker({
            speed: 300,
            pause: 10000,
            animation: 'fade',
            mousePause: false,
            showItems: 1,
            start: 1
        });
    });
</script>
<div class="top-main">
    <div class="news-home-hot">
        <div id="news-container-first">
            <div class="caroul-news">
                <ul>
                    <?php
                        foreach($this->newsHot as $row):
                        $cat = new Newscatalogue($row->newscatalogue_id);
                        $catParent = new Newscatalogue($cat->parentcat_id);
                    ?>
                    <li>
                        <div class="img-news-home"><a href="<?=$base_url.$catParent->name_none.'/'.$cat->name_none.'/'.$row->title_none?>.html">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_264_164') ?>" />
                            </a>
                        </div>
                        <div class="info-news-home">
                            <a class="title-news-home" style="font-size:16px; color:#051c94; font-weight:bold; line-height:20px;" href="<?=$base_url.$catParent->name_none.'/'.$cat->name_none.'/'.$row->title_none?>.html"><?=$row->title_vietnamese;?></a></a></br>
                            <span class="date-news-home"><?php echo get_date_from_sql($row->created);  ?></span>
                            <p class="short-news-home"> <a style="line-height:18px; color:#333333;">
                                <?=strlen($row->short_vietnamese) < 250 ? $row->short_vietnamese : cut_string($row->short_vietnamese, 250).'...';?> </a>
                            </p>
                        </div>
                    </li>
                    <?php endforeach; unset($row); ?>
                </ul>
            </div>
        </div>
        <div id="news-container">
            <div class="caroul-news-list">
                <ul>
                    <?php $i=0; foreach($this->newsHot as $row): $i++;
                        $cat = new Newscatalogue($row->newscatalogue_id);
                        $catParent = new Newscatalogue($cat->parentcat_id);
                    ?>
                    <li><a style="font-size:13px; color:#051c94; font-weight:bold;" href="<?=$base_url.$catParent->name_none.'/'.$cat->name_none.'/'.$row->title_none?>.html"><?=strlen($row->title_vietnamese) < 103 ? $row->title_vietnamese : cut_string($row->title_vietnamese, 103).'...';?></a></li>
                    <?php endforeach; unset($row); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="search-home">
        <div class="top-search-homepage">
            <form method="post" action="<?php echo $base_url.'tim-kiem'; ?>">
                <input class="text-top-search" type="text" name="value" placeholder="Nhập từ khóa cần tìm..."/>
                <input class="submit-top-search" type="submit" value="Tìm kiếm"/>
            </form>
        </div>
        <div class="toptimkiem"><p style="font-size:16px; font-weight:bold; margin-left:80px; margin-top:10px;">Tìm kiếm bất động sản </p></div>
        <div class="midtimkiem">
            <form action="<?=$base_url?>tim-kiem-bat-dong-san" method="post">
                <div class="sreenboxseach">
                    <div class="boxseach" style=" width:100px;  float:left; margin-top:5px;">
                        <input type="radio" name="estatecatalogue_id" value="1" style="float:left; margin-top:10px;">
                        <p style="font-weight:bold; font-size:14px; color:#109502; float:left; margin-top:8px; margin-left:5px;"> Mua - Bán </p>
                    </div>
                    <div class="boxseach" style=" width:100px;  float:left; margin-top:5px;">
                        <input name="estatecatalogue_id" type="radio" value="2" style="float:left; margin-top:10px;">
                        <p style="font-weight:bold; font-size:14px; color:#109502; float:left; margin-top:8px; margin-left:5px;">Cho Thuê </p>
                    </div>
                </div>
                <div class="frametimkiem" style="width:380px; margin-left:6px; height:40px; float:left;">
                    <div class="formtimkiem">
                        <select name="estatetype_id" id="estatetype_id" style="width:165px; margin-left:5px; float:left; margin-top:5px; height:24px; border:1px solid #FFFFFF;">
                            <option value="" style="margin-top:2px;">Chọn Loại nhà đất</option>
                        </select>
                    </div>
                    <div class="formtimkiem">
                        <select name="estatecity_id" id="estatecity_id" class="estatecity_id" style="width:165px; margin-left:5px; float:left; margin-top:5px; height:24px; border:1px solid #FFFFFF;">
                            <option value="" selected="selected" style="margin-top:2px;">Chọn Tỉnh/TP</option>
                            <?php foreach($estateProvince as $row): ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="frametimkiem" style="width:380px; margin-left:6px; height:40px; float:left;">
                    <div class="formtimkiem">
                        <select name="estatedistrict_id" id="estatedistrict_id" style="width:165px; margin-left:5px; float:left; margin-top:5px; height:24px; border:1px solid #FFFFFF;">
                            <option value="">Chọn Quận/Huyện</option>
                        </select>
                    </div>
                    <div class="formtimkiem">
                        <select name="estatearea_id" id="estatearea_id" style="width:165px; margin-left:5px; float:left; margin-top:5px; height:24px; border:1px solid #FFFFFF;">
                            <option value="" selected="selected">Chọn Diện tích</option>
                            <option value="-1">Không xác định</option>
                            <?php foreach($this->estateareas as $row): ?>
                                <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                </div>
                <div class="frametimkiem" style="width:380px; margin-left:6px; height:40px; float:left;">
                    <div class="formtimkiem">
                        <select name="estateprice_id" id="estateprice_id" style="width:165px; margin-left:5px; float:left; margin-top:5px; height:24px; border:1px solid #FFFFFF;">
                            <option value="" selected="selected">Chọn Mức giá</option>
                        </select>
                    </div>
                    <div class="formtimkiem">
                        <select name="estatedirection_id" id="estatedirection_id" style="width:165px; margin-left:5px; float:left; margin-top:5px; height:24px; border:1px solid #FFFFFF;">
                            <option value="" selected="selected">Chọn Hướng nhà</option>
                            <?php foreach($this->estateDirection as $row): ?>
                                <option value="<?=$row->id?>"><?=$row->name;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                </div>
                <div class="butontimkiemtop"><input class="submit-top-main" type="submit" value="Tìm kiếm"/></div>
                <div class="bottimkiem"></div>
            </form>
        </div>
		<div class="link-post-free"><a href="<?php echo $base_url.'dang-tin-rao-vat-nha-dat-mien-phi' ?>">Đăng tin Bán/Cho thuê miễn phí</a></div>
    </div>
</div>
<div class="cl"></div>
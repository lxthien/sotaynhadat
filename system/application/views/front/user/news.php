<style type="text/css">
    .hotnew{
        border-right: 1px solid #CCC;
        border-left: 1px solid #CCC;
        border-bottom: 1px solid #CCC;
    }
</style>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url?>" title="Trang chủ">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url.$estatesCategoryUrl?>"><?=$estatesCategoryName?></a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
<!--left-->
<div class="left">
    <div class="hotnew border-left-right-none">
        <div class="titlenew-add">
            <span><?php echo $estatesCategoryName; ?></span>
        </div>
        <div class="boxnew" style="width:610px; float:left;  margin-top:10px;">
            <?php if($estates->result_count() > 0){ ?>
                <?php foreach($estates as $row):
                    if($row->updated != '')
                        $date = $row->updated;
                    else
                        $date = $row->created;
                ?>
                <div class="sreentindb" style="width:610px; float:left; margin-bottom:1px;">
                    <div class="sreentindb" style="width:610px; height:15px; ">
                        <div class="sreentieude" style=" height:15px; float:left; margin-right:3px; margin-left:20px; ">
                            <div class="tieude">
                                <a style="<?php if($row->isVip == 1) echo 'color: #109502; text-transform: uppercase;'; ?>" href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                    <p><?php echo strlen($row->title) < 100 ? $row->title : cut_string($row->title, 100).'...';?></p>
                                </a>
                            </div>
                        </div>
                        <div class="sreen1" style="width:17px; height:15px; float:left;">
                            <div class="icon">
                                <?php if($row->photo != ''): ?>
                                    <a style="background: none;" href=""><img src="<?=$base_url?>images/iconcamera.png" alt=""/></a>
                                <?php endif; ?>
                            </div>
                        </div>
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
                        <div class="noidung" style="width:465px; height:85px; float:left; margin-top:10px;">
                            <p style="text-align:justify;color:#333333; line-height: 18px;">
                                <?=strlen(strip_tags($row->description)) < 400 ? strip_tags($row->description): cut_string2(strip_tags($row->description), 400).' ...';?>
                            </p>
                        </div>
                        <div class="thongtin">
                            <strong><p style=" color:#cb0021; float:left;">
                                Giá:
                                <span class="style3">
                                    <?php if($row->isPrice == 0): ?>
										<?=$row->price_text.' '.getpricetype($row->price_type);?>
									<?php else: ?>
										<?='Thương lượng'?>
									<?php endif; ?>
                                </span></strong>
                            <p style=" color:#6e6e6e; float:left; margin-left:20px; line-height: 15px; <?=$row->isArea != 0 ? '':'margin-top: -4px;'?>">
                                Diện tích:
                                <span class="style3" style="line-height: 15px;">
                                    <span class="style3">
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
                <div class="line"></div>
                <?php endforeach; unset($row); ?>
                <div class="phantrang" style="float:left; width: 312px; margin-left: 290px; margin-right:8px; height:20px; margin-bottom: 8px;">
                    <div class="back">
                        <?=$this->pagination->create_links();?>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="sreentindb" style="width:610px; float:left; margin-bottom:1px; text-align: center; padding: 10px 0px;">
                    Chưa có bài viết cho danh mục này
                </div>
            <?php } ?>
        </div>
    </div>
    <!--end hotnew-->
</div>
<!--end left-->
    <?=$this->load->view('front/estates/col-right');?>
    <?=$this->load->view('front/includes/footer');?>
</div>
<!--end main-->
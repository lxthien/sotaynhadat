<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url;?>" title="Trang chủ">Trang chủ</a></div>
    <!--<p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?/*=$base_url.$cat_type->name_none*/?>" title="<?/*=$cat_type->name;*/?>"><?/*=$cat_type->name;*/?></a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?/*=$base_url.$cat_type->name_none*/?>" title="<?/*=$cat_type->name;*/?>"><?/*=$cat_type->name;*/?></a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?/*=$base_url.$estatesCategoryUrl.'/'.$type->name_none;*/?>"><?=$type->name;?></a></div>-->
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left">
        <!--hotnew-->
        <div class="hotnew">
            <div class="titlenew">
                <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px;  margin-top:5px;">Thống kê</p>
            </div>
            <div class="boxnew" style="width:610px; float:left;  margin-top:10px;">
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
                                    <a style="<?php if($row->isVip == 1) echo 'color: #109502;'; ?>" href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                        <p><?=strlen($row->title) < 100 ? $row->title : cut_string($row->title, 100).'...';?></p>
                                    </a>
                                </div>
                            </div>
                            <div class="sreen1" style="width:17px; height:15px; float:left;">
                                <div class="icon">
                                    <?php if($row->photo != null): ?>
                                        <img src="<?=$base_url?>images/iconcamera.png" alt="camera icon"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="sreenboxnew" style="width:610px; float:left; margin-top:1px;">
                            <?php if($row->photo != null): ?>
                                <div class="boxhinh">
                                    <a href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                        <img alt="<?php echo $row->title; ?>" src="<?php echo image($row->photo, 'estate_120_95') ?>" />
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="boxhinh">
                                    <a href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                        <img alt="<?php echo $row->title; ?>" src="<?=$base_url?>images/no-image.png" />
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="noidung" style="width:465px; height:85px; float:left; margin-top:10px;">
                                <p style="text-align:justify;color:#333333; line-height: 18px;">
                                    <?=strlen(strip_tags($row->description)) < 400 ? strip_tags($row->description): cut_string(strip_tags($row->description), 400).' ...';?>
                                </p>
                            </div>
                            <div class="cl"></div>
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
                                    Diện tích :
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
                                <p style=" color:#6e6e6e; float:left; margin-left:15px;">Hướng:
                                    <?php if( $row->estatedirection_id != 0 ): ?>
                                        <?=$row->estatedirection->name;?>
                                    <?php else: ?>
                                        <?php echo 'KXD'; ?>
                                    <?php endif; ?>
                                    <span class="style3"></span>
                                </p>
                                <p style=" color:#6e6e6e; float:left; margin-left:20px;">Địa điểm : <span class="diadiem"><a href=""><?=$row->estatedistrict->name;?></a> </span></p>
                                <p style=" color:#333333; float:right; margin-right:14px;"><?=date('d/m',strtotime($date))?></p>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                <?php endforeach; unset($row); ?>
                <div class="phantrang" style="float:left ; width:312px; margin-left:215px; margin-right:8px; height:20px;">
                    <div class="back">
                        <?=$this->pagination->create_links();?>
                    </div>
                </div>
            </div>
        </div>
        <!--end hotnew-->
    </div>
    <!--end left-->
    <?=$this->load->view('front/estates/col-right-default');?>
    <?=$this->load->view('front/includes/footer');?>
</div>
<!--end main-->
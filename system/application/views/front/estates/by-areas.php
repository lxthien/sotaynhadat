<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>

<div class="linktop">
    <div class="linkdautrang"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang"><a class="linkdautrang-active" href="javascript:void(0)" title="Thống kê theo diện tích">Thống kê theo diện tích</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left estates">
        <!--hotnew-->
        <div class="hotnew">
            <div class="titlenew-add">
                <span>Thống kê theo diện tích</span>
            </div>
            <div class="boxnew">
                <?php foreach($estates as $row):
                    ?>
                    <div class="sreentindb <?php if($row->isVip == 1): ?>vip<?php endif; ?>">
                        <?php if($row->isVip == 1): ?><img class="icon-vip" src="<?=$base_url?>images/icon-vip.png" alt="Tin Vip"/><?php endif; ?>
                        <div class="sreentindb">
                            <div class="sreentieude">
                                <div class="tieude">
                                    <a href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title;?>">
                                        <?php echo strlen($row->title) < 100 ? $row->title : cut_string($row->title, 100).'...';?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="sreenboxnew">
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
                            <div class="noidung">
                                <p class="row">
                                <span class="area">
                                    <?php if($row->isArea == 0): ?>
                                        <?=$row->area_text;?> m<sup>2</sup>
                                    <?php else: ?>
                                        <?='KXĐ'?>
                                    <?php endif; ?>
                                </span>
                                <span class="price">
                                    <?php if($row->isPrice == 0): ?>
                                        <?=$row->price_text.' '.getpricetype($row->price_type);?>
                                    <?php else: ?>
                                        <?='Thương lượng'?>
                                    <?php endif; ?>
                                </span>
                                    <?php if($row->estateuser->mobile != ''): ?>
                                        <span class="phone">
                                        <img src="<?php echo $base_url.'images/icon-phone.png' ?>" style="height: 15px; vertical-align: middle;"/><?=$row->estateuser->mobile;?>
                                    </span>
                                    <?php endif; ?>
                                </p>
                                <p class="row-2"><a href="<?php echo $base_url.$row->estatetype->name_none.'/'.$row->estatedistrict->name_none.'/'.$row->estatecity->name_none; ?>"><?=$row->estatedistrict->name;?> | <?=$row->estatecity->name;?></a></p>
                                <p class="des">
                                    <?=strlen(strip_tags($row->description)) < 400 ? strip_tags($row->description): cut_string2(strip_tags($row->description), 400).' ...';?>
                                </p>
                                <p class="date"><?php echo date('d/m/Y',strtotime($row->created)); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="line <?php if($row->isVip == 1): ?>line-vip<?php endif; ?>"></div>
                <?php endforeach; unset($row); ?>
                <div class="phantrang">
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
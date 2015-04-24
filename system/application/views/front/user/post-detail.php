<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>

<div class="linktop">
    <div class="linkdautrang"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang"><a href="<?=$base_url.$cate->name_none?>" title="<?=$cate->name;?>"><?=$cate->name;?></a></div>
    <div class="linkdautrang"><a class="linkdautrang-active" href="<?=$base_url.$cate->name_none.'/'.$o->estatetype->name_none;?>" title="<?=$o->estatetype->name?>"><?=$o->estatetype->name?></a></div>
</div>

<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
<div class="left">
    <h1 style="margin-left:10px; margin-top:5px; font-size:17px; font-weight:bold; color:#000000;"><?=ucfirst($o->title);?></h1>
    <div class="location-estate" style="padding: 3px 0; float: left; width: 100%; margin-bottom: 10px;">
        <div style="margin-left: 10px; margin-right: 30px; float: left;">
            <p style="float:left; margin-top:5px;">
                <span class="bold" style="color: #a50000;">Quận/Huyện: </span>
                <a style="color: #666674;" href="<?php echo $base_url.$o->estatetype->name_none.'/'.$o->estatedistrict->name_none.'/'.$o->estatecity->name_none; ?>"><?=$o->estatedistrict->name;?></a>
            </p>
        </div>
        <div style="margin-left: 15px; float: left;">
            <p style="float:left; margin-top:5px;">
                <span class="bold" style="color: #a50000;">Tỉnh/TP: </span>
                <a style="color: #666674;" href="<?php echo $base_url.$o->estatecatalogue->name_none.'-'.$o->estatecity->name_none; ?>"><?=$o->estatecity->name;?></a>
            </p>
        </div>
    </div>

    <div class="hotnew">
        <div class="sreennoidungchitiet" style="width:610px; float:left; margin-bottom:5px;">
            <div class="developper-detail" style="color:#000000;width:100%;float:left;line-height: 20px;text-align: justify;font-size:13px;margin-top: 5px;">
                <?=$o->description;?>
            </div>
            <link type="text/css" href="<?=$base_url?>images/js/pikachu/bottom.css" rel="stylesheet" />
            <script type="text/javascript" src="<?=$base_url?>images/js/pikachu/jquery.jcarousel.min.js"></script>
            <script type="text/javascript" src="<?=$base_url?>images/js/pikachu/jquery.pikachoose.min.js"></script>
            <script language="javascript">
                $(document).ready(
                    function (){
                        $("#pikame").PikaChoose({carousel:true});
                        $('.pika-stage a[href*="img"]').fancybox();
                    });
            </script>
            <?php if($o->photo != null): ?>
            <div class="slide-nha-dat">
                <ul id="pikame" class="jcarousel-skin-pika">
                    <li><a href="javascript:void(0)"><img alt="<?php echo $o->title; ?>" src="<?php echo image($o->photo, 'slide_580_380') ?>" /></a></li>
                    <?php if($photo->result_count() > 0): ?>
                    <?php foreach($photo as $row): ?>
                    <li><a href="javascript:void(0)"><img alt="<?php echo $o->title; ?>" src="<?php echo image($row->name, 'slide_580_380') ?>"/></a></li>
                    <?php endforeach ?>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php if( $o->tag != '' ): ?>
            <div class="sreentag" >
                <div class="tag"></div>
                <p style="float:left; width:490px; margin-left:5px; color:#333333; font-weight:bold;">
                    <?php $i=0; foreach($tag as $tagSub): $i++; ?>
                        <a href="<?=$base_url.'tags-dang-tin/'.remove_vn($tagSub)?>.html"><?=$tagSub;?></a> <?php echo $i<count($tag) ? ',':''; ?>
                    <?php endforeach ?>
                </p>
            </div>
            <?php endif; ?>
        </div>
        <div class="sreennoidungchitiet" style="width:610px; float:left; margin-bottom:7px;">
            <h3 class="info-basic">Thông tin cơ bản</h3>
            <div class="line21"></div>
            <div class="sreenttin add-left-right" style="width:610px;float:left;">
                <div class="add-left">
                    <div class="social-detail">
                        <span><a href="javascript:void(0)"><img src="<?php echo $base_url.'images/icon-save.png' ?>" alt=""/> &nbsp;Lưu tin</a></span>
                        <span><a href="javascript:window.print()"><img src="<?php echo $base_url.'images/icon-print.png' ?>" alt=""/> &nbsp;In tin</a></span>
                        <span><a href="javascript:void(0)"><img src="<?php echo $base_url.'images/icon-share.png' ?>" alt=""/> &nbsp;Chia sẻ tin</a>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$base_url.$cate->name_none.'/'.$o->estatecity->name_none.'/'.$o->title_none?>.html" target="_blank">Chia sẻ qua Facebook</a></li>
                                <li><a href="https://plus.google.com/share?url=<?=$base_url.$cate->name_none.'/'.$o->estatecity->name_none.'/'.$o->title_none?>.html" target="_blank">Chia sẻ qua Google +</a></li>
                            </ul>
                        </span>
                    </div>
                    <div class="tinh add-left-item">
                        <p style="float:left; margin-top:7px; font-size: 14px;">
                            <span>Loại nhà đất: </span>
                            <span class="style4"><?=$o->estatetype->name?></span></p>
                    </div>
                    <div class="ms add-left-item">
                        <p style="float:left; margin-top:7px; font-size: 14px;">
                            <span>Mã số tin: </span>
                            <span class="style4"><?=$o->code;?></span></p>
                    </div>
                    <?php if($o->address != ''): ?>
                        <div class="tinh add-left-item">
                            <p style="float:left; margin-top:7px; font-size: 14px;">
                                <span>Địa chỉ: </span>
                                <span class="style4"><?=$o->address;?></span>
                            </p>
                        </div>
                    <?php endif; ?>
                    <div class="ms add-left-item">
                        <?php if($o->estatearea_id !=0): ?>
                            <p style="float:left; margin-top:7px; width: 130px; font-size: 14px;">
                                <span>Diện tích: </span>
                                <?php if($o->area_text != 0):?>
                                    <span style="line-height: 10px;" class="style4"><?=$o->area_text;?> m<sup>2</sup></span>
                                <?php else: ?>
                                    <?='Ko XD'?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                        <p style="float:left; margin-top:7px; width: 130px; font-size: 14px;">
                            <span>Giá: </span>
                            <?php if($o->price_text != 0):?>
                                <span class="style4"><?=$o->price_text.' '.getpricetype($o->price_type);?></span>
                            <?php else: ?>
                                <?='Thương lượng'?>
                            <?php endif; ?>
                        </p>
                    </div>
                    <?php if($o->estatedirection_id != 0 || $o->legally != ''): ?>
                    <div class="tinh add-left-item">
                        <?php if($o->estatedirection_id != 0): ?>
                        <p style="float:left; margin-top:7px; width: 130px; font-size: 14px;">
                            <span>Hướng: </span>
                            <span class="style4"><?=$o->estatedirection->name;?></span>
                        </p>
                        <?php endif; ?>
                        <?php if($o->legally != ''): ?>
                            <p style="float:left; margin-top:7px; width: 130px; font-size: 14px;">
                                <span>Pháp lý: </span>
                                <span class="style4"><?=$o->legally;?></span>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($o->article_id !=0):
                        $project = new Article($o->article_id);
                        ?>
                        <div class="ms add-left-item">
                            <p style="float:left; margin-top:7px; font-size: 14px;">
                                <span>Thuộc dự án: </span>
                            <span class="style4">
                                <a class="of-project" href="<?=base_url().'du-an/'.$project->newscatalogue->name_none.'/'.$o->article->title_none;?>.html" title="<?=$o->article->title_vietnamese;?>">
                                    <?=$o->article->title_vietnamese;?>
                                </a>
                            </span>
                            </p>
                        </div>
                    <?php endif; ?>
                    <div class="ms add-left-item">
                        <p style="float:left; margin-top:5px; font-size: 14px;"><span>Ngày đăng tin: </span><?=date('d-m-Y', strtotime($o->created));?></p>
                    </div>
                    <?php if($o->isReals == 1): ?>
                        <img style="margin-left: -6px;" src="<?php echo $base_url.'images/chinh-chu.png' ?>" alt=""/>
                    <?php endif; ?>
                </div>
                <div class="add-right">
                    <h3>Thông tin liên hệ</h3>
                    <div class="right-contact-customer">
                        <?php if($o->isFree == 0): ?>
                            <div class="ttinleft" style="float:left;">
                                <p style="text-align:justify;margin-bottom:8px;color:#292929;float:left;font-size:16px;width: 100%;"><span class="style1 bold"><?php echo ucfirst($o->estateuser->name);?></span></p>
                                <?php if($o->estateuser->mobilePhone !=''): ?>
                                <?php endif; ?>
                                <?php if($o->estateuser->mobile !=''): ?>
                                    <p style="text-align:justify;color:#292929;margin-bottom:7px;float:left;font-size:15px;width: 100%;">
                                        <span class="style5 bold"><img src="<?php echo $base_url . 'images/icon-telephone.png' ?>"/></span> <span class="style1"><?=$o->estateuser->mobile;?></span>
                                    </p>
                                <?php endif; ?>
                                <p style="text-align:justify;margin-bottom:7px;color:#292929;float:left;font-size:15px;width: 100%;">
                                    <span class="style5 bold"><img src="<?php echo $base_url.'images/icon-email.png' ?>"/> </span> <span class="style1"><?=$o->estateuser->email;?></span>
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="ttinleft">
                                <?php if($o->name_contact !=''): ?><p style="text-align:justify;margin-bottom:7px; width:260px; color:#292929;float:left;font-size:16px;"><span class="style1 bold"><?=$o->name_contact;?></span></p><?php endif; ?>
                                <?php if($o->address_contact !=''): ?><p style="margin-bottom:7px; width:260px; color:#292929;float:left;"><span class="style5" style="margin-right: 3px;"><img src="<?php echo $base_url . 'images/icon-address.png' ?>"/></span><?=$o->address_contact;?></p><?php endif; ?>
                                <?php if($o->phone_contact !=''): ?><p style="text-align:justify;margin-bottom:7px; width:260px; color:#292929;float:left;"><span class="style5 bold"><img src="<?php echo $base_url . 'images/icon-telephone.png' ?>"/></span> <span class="style1"><?=$o->phone_contact;?></span></p><?php endif; ?>
                                <?php if($o->mobile_contact !=''): ?><p style="text-align:justify;margin-bottom:7px; width:260px; color:#292929;float:left;"><span class="style5 bold"><img src="<?php echo $base_url . 'images/icon-telephone.png' ?>"/></span> <span class="style1"><?=$o->mobile_contact;?></span></p><?php endif; ?>
                                <?php if($o->email_contact !=''): ?><p style="text-align:justify;margin-bottom:7px; width:260px; color:#292929;float:left;"><span class="style5 bold"><img src="<?php echo $base_url.'images/icon-email.png' ?>"/></span> <span class="style1"><?=$o->email_contact;?></span></p><?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="cl"></div>
        <!-- ---------------------------------------------------------------------------------------------------------------- -->
        <div class="news-related">
            <h3>Các tin khác</h3>
        </div>
        <div class="cl"></div>
        <?php foreach($estates_vip as $row):
            if($row->updated != '') $date = $row->updated;
            else $date = $row->created;
            ?>
            <div class="sreentindb vip">
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
                            <img alt="<?php echo $row->title; ?>" src="<?php echo image($row->photo, 'estate_120_95') ?>" />
                        </div>
                    <?php else: ?>
                        <div class="boxhinh">
                            <img alt="<?php echo $row->title; ?>" src="<?=$base_url?>img/project/no-image.jpg" />
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
                                <img src="<?php echo $base_url.'images/icon-telephone.png' ?>" style="height: 14px; vertical-align: top;"/><?=$row->estateuser->mobile;?>
                            </span>
                            <?php endif; ?>
                        </p>
                        <p class="row-2">
                            <a href="<?php echo $base_url.$row->estatetype->name_none.'/'.$row->estatedistrict->name_none.'/'.$row->estatecity->name_none; ?>"><?=$row->estatedistrict->name;?></a>
                            <a href="javascript:void(0)">|</a>
                            <a href="<?php echo $base_url.$row->estatecatalogue->name_none.'-'.$row->estatecity->name_none; ?>"><?=$row->estatecity->name;?></a>
                        </p>
                        <p style="text-align:justify;color:#333333; line-height: 18px;">
                            <?=strlen(strip_tags($row->description)) < 300 ? strip_tags($row->description): cut_string2(strip_tags($row->description), 300).' ...';?>
                        </p>
                        <p class="date"><?php echo date('d/m/Y',strtotime($date)); ?></p>
                    </div>
                </div>
            </div>
            <div class="line <?php if($row->isVip == 1): ?>line-vip<?php endif; ?>"></div>
        <?php endforeach; unset($row); ?>

        <?php foreach($estates_related_type_city_area as $row):
            if($row->updated != '') $date = $row->updated;
            else $date = $row->created;
            ?>
        <div class="sreentindb">
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
                        <img alt="<?php echo $row->title; ?>" src="<?php echo image($row->photo, 'estate_120_95') ?>" />
                    </div>
                <?php else: ?>
                    <div class="boxhinh">
                        <img alt="<?php echo $row->title; ?>" src="<?=$base_url?>img/project/no-image.jpg" />
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
                                <img src="<?php echo $base_url.'images/icon-telephone.png' ?>" style="height: 14px; vertical-align: top;"/><?=$row->estateuser->mobile;?>
                            </span>
                        <?php endif; ?>
                    </p>
                    <p class="row-2">
                        <a href="<?php echo $base_url.$row->estatetype->name_none.'/'.$row->estatedistrict->name_none.'/'.$row->estatecity->name_none; ?>"><?=$row->estatedistrict->name;?></a>
                        <a href="javascript:void(0)">|</a>
                        <a href="<?php echo $base_url.$row->estatecatalogue->name_none.'-'.$row->estatecity->name_none; ?>"><?=$row->estatecity->name;?></a>
                    </p>
                    <p style="text-align:justify;color:#333333; line-height: 18px;">
                        <?=strlen(strip_tags($row->description)) < 300 ? strip_tags($row->description): cut_string2(strip_tags($row->description), 300).' ...';?>
                    </p>
                    <p class="date"><?php echo date('d/m/Y',strtotime($date)); ?></p>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <?php endforeach; unset($row); ?>

        <?php foreach($estates_related_area_price as $row):
            if($row->updated != '') $date = $row->updated;
            else $date = $row->created;
            ?>
        <div class="sreentindb">
            <?php if($row->isVip == 1): ?><img class="icon-vip" src="<?=$base_url?>images/icon-vip.png" alt="Tin Vip"/><?php endif; ?>
            <div class="sreentindb" style="width:610px; height:15px; ">
                <div class="sreentieude" style=" height:15px; float:left; margin-right:3px; margin-left:20px; ">
                    <div class="tieude">
                        <h4><a style="<?php if($row->isVip == 1) echo 'color: #109502; text-transform: uppercase;'; ?>" href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="<?=$row->title?>">
                                <?=strlen($row->title) < 100 ? $row->title : cut_string($row->title, 100).'...';?>
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="sreen1" style="width:17px; height:15px; float:left;">
                    <div class="icon">
                        <?php if($row->photo != null): ?>
                            <a style="background: none;" href=""><img src="<?=$base_url?>images/iconcamera.png" alt=""/></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="sreenboxnew">
                <?php if($row->photo != null): ?>
                    <div class="boxhinh">
                        <img alt="<?php echo $row->title; ?>" src="<?php echo image($row->photo, 'estate_120_95') ?>" />
                    </div>
                <?php else: ?>
                    <div class="boxhinh">
                        <img alt="<?php echo $row->title; ?>" src="<?=$base_url?>img/project/no-image.jpg" />
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
                                <img src="<?php echo $base_url.'images/icon-telephone.png' ?>" style="height: 14px; vertical-align: middle;"/><?=$row->estateuser->mobile;?>
                            </span>
                        <?php endif; ?>
                    </p>
                    <p class="row-2">
                        <a href="<?php echo $base_url.$row->estatetype->name_none.'/'.$row->estatedistrict->name_none.'/'.$row->estatecity->name_none; ?>"><?=$row->estatedistrict->name;?></a>
                        <a href="javascript:void(0)">|</a>
                        <a href="<?php echo $base_url.$row->estatecatalogue->name_none.'-'.$row->estatecity->name_none; ?>"><?=$row->estatecity->name;?></a>
                    </p>
                    <p style="text-align:justify;color:#333333; line-height: 18px;">
                        <?=strlen(strip_tags($row->description)) < 300 ? strip_tags($row->description): cut_string2(strip_tags($row->description), 300).' ...';?>
                    </p>
                    <p class="date"><?php echo date('d/m/Y',strtotime($date)); ?></p>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <?php endforeach; unset($row); ?>
    </div>
</div>
<div class="right">
    <?php echo $this->load->view('front/includes/adv_right'); ?>

    <div class="boxtimkiembds boxnoibat">
        <span class="title-top-box">Tìm kiếm bất động sản</span>
        <div class="sreenboxseach2" style=" width:300px;  margin-bottom:20px; float:left;">
            <form action="<?=$base_url?>tim-kiem-bat-dong-san" method="post">
                <div class="boxseach" style=" width:100px; float:left; margin-left:55px;">
                    <label>
                        <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="1"/>
                        <p style="font-weight:bold; font-size:14px; color:#CC0000; float:left; margin-top:8px; margin-left:5px;">Mua - Bán</p>
                    </label>
                </div>
                <div class="boxseach" style=" width:100px; margin-left:5px;  float:left;">
                    <label>
                        <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="2"/>
                        <p style="font-weight:bold; font-size:14px; color:#CC0000; float:left; margin-top:8px; margin-left:5px;">Cho Thuê</p>
                    </label>
                </div>
                <div class="sreenseachtimkiembds1 formtimkiem" style="width:300px; height:25px; float:left; margin-bottom:3px; background: none; margin-left: 0;">
                    <select name="estatetype_id" id="estatetype_id" size="1" style="float:left; margin-right:5px; margin-left:8px; width:140px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                        <option value="" selected="selected">Chọn Loại nhà đất</option>
                    </select>
                    <select name="estatecity_id" id="estatecity_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;">
                        <option value="">Chọn Tỉnh/TP</option>
                        <?php foreach($this->estateProvince as $row): ?>
                            <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </div>
                <div class="sreenseachtimkiembds1" style="width:300px; height:25px; float:left; margin-bottom:3px;">
                    <select name="estatedistrict_id" id="estatedistrict_id" size="1" style="float:left; width:140px; margin-right:5px; margin-left:8px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;" >
                        <option value="">Chọn Quận/Huyện</option>
                    </select>
                    <select name="estatearea_id" id="estatearea_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;" >
                        <option value="" selected="selected">Chọn Diện tích</option>
                        <option value="-1">Không xác định</option>
                        <?php foreach($this->estateareas as $row): ?>
                            <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </div>
                <div class="sreenseachtimkiembds1" style="width:300px; height:25px; float:left; margin-bottom:13px;">
                    <select name="estateprice_id" id="estateprice_id" size="1" style="float:left; width:140px; margin-right:5px; margin-left:8px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;" >
                        <option value="" selected="selected">Chọn Mức giá</option>
                    </select>
                    <select name="estatedirection_id" id="estatedirection_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;" >
                        <option value="" selected="selected">Chọn Hướng nhà</option>
                        <?php foreach($this->estateDirection as $row): ?>
                            <option value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </div>
                <div class="timkiembds2">
                    <input type="submit" value=""/>
                </div>
            </form>
        </div>
    </div>
    <?php if( display_static_by_area($this->estateareas, $o) > 0 ): ?>
    <div class="boxnoibat">
        <span class="title-top-box">Thống kê theo diện tích</span>
        <?php foreach($this->estateareas as $row): ?>
            <?php if( count_static_by_area($o->estatetype->name_none, $o->estatedistrict->name_none, $row->url) >= 10 ): ?>
                <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
                    <div class="tinkhacnoibat">
                        <a style="height: auto;" href="<?=$base_url.'thong-ke-theo-dien-tich/'.$o->estatetype->name_none.'/'.$o->estatedistrict->name_none.'/'.$row->url;?>" title="<?=$o->title.' '.$row->label;?>">
                            <p style="margin-left:10px; margin-top:9px; font-weight:normal;">
                                <?=$o->estatetype->name.' '.$o->estatedistrict->name.' '.$row->label;?>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="line3"></div>
            <?php endif; ?>
        <?php endforeach; unset($row); ?>
    </div>
    <?php endif; ?>
    <?php if( display_static_by_price($estatePrices, $o) > 0 ): ?>
    <div class="boxnoibat">
        <span class="title-top-box">Thống kê theo mức giá</span>
        <?php foreach($estatePrices as $row): ?>
            <?php if( count_static_by_price($o->estatetype->name_none, $o->estatedistrict->name_none, $row->url) >= 10 ): ?>
                <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
                    <div class="tinkhacnoibat">
                        <a style="height: auto;" href="<?=$base_url.'thong-ke-theo-muc-gia/'.$o->estatetype->name_none.'/'.$o->estatedistrict->name_none.'/'.$row->url;?>" title="<?=$o->title.' '.$row->label;?>">
                            <p style="margin-left:10px; margin-top:9px; font-weight:normal;"><?=$o->estatetype->name.' '.$o->estatedistrict->name.' '.$row->label;?></p>
                        </a>
                    </div>
                </div>
                <div class="line3"></div>
            <?php endif; ?>
        <?php endforeach; unset($row); ?>
    </div>
    <?php endif; ?>
</div>
    <?=$this->load->view('front/includes/footer')?>
</div>
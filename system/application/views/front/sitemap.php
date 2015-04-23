<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url?>" title="Trang chủ">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url?>site-map.html">Sitemap</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
<!--left-->
<div class="left">
    <!--gioi thieu-->
    <div class="hotnew">
        <div class="titlenew">
            <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px; margin-top:5px;">Sitemap</p>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px; margin-top:25px; margin-left:22px;">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;"><p style="width:250px; height:15px;"><a href="<?=$base_url?>">Trang chủ</a></p> </div>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px;margin-left:22px;">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>nha-dat-ban">Nhà đất bán</a></p>
            </div>
            <?php $i=0; foreach($this->typeHouseSale as $row): $i++; ?>
                <div class="linksite" style="margin-left:20px;margin-bottom:6px; font-size:14px; ">
                    <p style=" width:300px; height:15px;"> <a href="<?=$base_url?>nha-dat-ban/<?=$row->name_none;?>">  - <?=$row->name;?></a></p>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px;margin-left:22px;">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>nha-dat-cho-thue">Nhà đất cho thuê</a></p>
            </div>
            <?php $i=0; foreach($this->typeHouseLease as $row): $i++; ?>
                <div class="linksite" style="margin-left:20px;margin-bottom:6px; font-size:14px; ">
                    <p style=" width:300px; height:15px;"> <a href="<?=$base_url?>nha-dat-cho-thue/<?=$row->name_none;?>">  - <?=$row->name;?></a></p>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px; margin-left:22px;">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>nhu-cau-nha-dat">Nhu cầu nhà đất</a></p>
            </div>
            <?php $i=0; foreach($this->typeHouseDemand as $row): $i++; ?>
                <div class="linksite" style="margin-left:20px;margin-bottom:6px; font-size:14px; ">
                    <p style=" width:300px; height:15px;"> <a href="<?=$base_url?>nhu-cau-nha-dat/<?=$row->name_none;?>">  - <?=$row->name;?></a></p>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px; margin-left:22px; ">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>tin-tuc">Tin tức</a></p>
            </div>
            <?php $i=0; foreach($this->newsCate as $row): $i++; ?>
                <div  class="linksite" style="margin-left:20px;margin-bottom:6px; font-size:14px; ">
                    <p style=" width:300px; height:15px;">
                        <a href="<?=$base_url?>tin-tuc/<?=$row->name_none;?>">  - <?=$row->name_vietnamese;?></a>
                    </p>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px; margin-left:22px;">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>du-an">Dự án</a></p>
            </div>
            <?php $i=0; foreach($this->projectsCate as $row): $i++; ?>
                <div  class="linksite" style="margin-left:20px;margin-bottom:6px; font-size:14px; ">
                    <p style=" width:300px; height:15px;">
                        <a href="<?=$base_url?>du-an/<?=$row->name_none;?>">  - <?=$row->name_vietnamese;?></a>
                    </p>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px; margin-left:22px; ">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>cam-nang">Cẩm nang</a></p>
            </div>
            <?php $i=0; foreach($this->guideCate as $row): $i++; ?>
                <div  class="linksite" style="margin-left:20px;margin-bottom:6px; font-size:14px; ">
                    <p style=" width:300px; height:15px;">
                        <a href="<?=$base_url?>cam-nang/<?=$row->name_none;?>">  - <?=$row->name_vietnamese;?></a>
                    </p>
                </div>
            <?php endforeach; unset($row); ?>
        </div>
        <div class="noidunggioithieu" style="  width:563px; padding-bottom:20px;margin-left:22px;">
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>trang-ca-nhan">Trang thành viên</a></p>
            </div>
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>gioi-thieu.html">Giới thiệu</a></p>
            </div>
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>quy-dinh-su-dung.html">Quy định sử dụng</a></p>
            </div>
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>huong-dan-dang-tin.html">Hướng dẫn đăng tin</a></p>
            </div>
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>bang-gia-quang-cao-tin-vip.html">Bảng giá quảng cáo</a></p>
            </div>
            <div class="linksite2" style="margin-bottom:10px; font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>site-map.html">Sitemap</a></p>
            </div>
            <div class="linksite2" style="font-size:15px;">
                <p style="width:250px; height:15px;"><a href="<?=$base_url?>lien-he.html">Liên hệ - Góp ý</a></p>
            </div>
        </div>
    </div>
    <!--end gioi thieu-->
</div>
<!--end left-->
    <?=$this->load->view('front/project/col-right')?>
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
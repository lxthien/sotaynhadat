<!-- foter-->
<div class="menufoter">
    <div class="sreenmenufoter"  style="width:950px; margin:0px auto; color:#0c7102; height:33px; ">
        <div class="home1" style="color:#0c7102;">
            <a href="<?=$base_url?>" title="Mua bán Nhà đất">
                <p style=" margin-left:12px; margin-top:9px;">Trang chủ</p>
            </a>
        </div>
        <div class="gt">
            <a href="<?=$base_url?>gioi-thieu.html" title="Giới thiệu">
                <p style=" margin-top:9px;">Giới thiệu</p>
            </a>
        </div>
        <div class="gt">
            <a href="<?=$base_url?>quy-dinh-su-dung.html" title="Quy định sử dụng">
                <p style="margin-top:9px;">Quy định sử dụng</p>
            </a>
        </div>
        <div class="gt">
            <a href="<?=$base_url?>huong-dan-dang-tin.html" title="Hướng dẫn đăng tin">
                <p style="margin-top:9px;">Hướng dẫn đăng tin</p>
            </a>
        </div>
        <div class="gt">
            <a href="<?=$base_url?>bang-gia-quang-cao-tin-vip.html" title="Bảng giá quảng cáo - Tin Vip">
                <p style="margin-top:9px;">Bảng giá dịch vụ</p>
            </a>
        </div>
        <div class="gt">
            <a href="<?=$base_url?>site-map.html">
                <p style="margin-top:9px;">Sitemap</p>
            </a>
        </div>
        <div class="gt">
            <a href="<?=$base_url?>lien-he.html" title="Liên hệ - Góp ý">
                <p style="margin-top:9px;">Liên hệ - Góp ý</p>
            </a>
        </div>
    </div>
</div>
<!-- link foter-->
<div class="sreenlink" style="width:980px; background-color:#fefdfd; float:left; padding-bottom: 15px;">
    <div class="sreenbox1" style=" float:left; width:160px; margin-top:15px; margin-left:22px;">
        <div class="box1">
            <?php
            $landcategories = new Landcategory(1);
            $lands = new Land();
            $lands->where('landcategory_id', $landcategories->id);
            $lands->order_by('position','asc');
            $lands->get(9);
            ?>
            <p align="left" style="color:#0c7102; font-size:15px; margin-bottom:-5px; font-weight:bold;">
                <?=$landcategories->name;?>
            </p>
            <div class="line8"></div>
            <?php foreach($lands as $row): ?>
                <div class="ndlink">
                    <a style="height: auto; line-height: 18px; padding: 1px 0px;" href="<?=$row->link;?>">
                        <p><?=$row->name;?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="sreenbox1" style=" float:left; width:160px; margin-top:15px; margin-left:92px;">
        <div class="box1">
            <?php
                $landcategories = new Landcategory(2);
                $lands = new Land();
                $lands->where('landcategory_id', $landcategories->id);
                $lands->order_by('position','asc');
                $lands->get(9);
            ?>
            <p align="left" style="color:#0c7102; font-size:15px; margin-bottom:-5px; font-weight:bold;">
                <?=$landcategories->name;?>
            </p>
            <div class="line8"></div>
            <?php foreach($lands as $row): ?>
            <div class="ndlink">
                <a style="height: auto; line-height: 18px; padding: 1px 0px;" href="<?=$row->link;?>">
                    <p><?=$row->name;?></p>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="sreenbox3and4" style="float:left; margin-top:15px; margin-left:92px; width:160px; ">
        <div class="box3">
            <?php
            $landcategories = new Landcategory(3);
            $lands = new Land();
            $lands->where('landcategory_id', $landcategories->id);
            $lands->order_by('position','asc');
            $lands->get(5);
            ?>
            <p align="left" style="color:#0c7102; font-size:15px; margin-bottom:-5px; font-weight:bold;">
                <?=$landcategories->name;?>
            </p>
            <div class="line8"></div>
            <?php foreach($lands as $row): ?>
                <div class="ndlink">
                    <a style="height: auto; line-height: 18px; padding: 1px 0px;" href="<?=$row->link;?>">
                        <p><?=$row->name;?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="sreenbox3and4" style="float:left; width:160px; margin-top:15px; margin-left:92px;">
        <div class="box3">
            <?php
            $landcategories = new Landcategory(5);
            $lands = new Land();
            $lands->where('landcategory_id', $landcategories->id);
            $lands->order_by('position','asc');
            $lands->get(5);
            ?>
            <p align="left" style="color:#0c7102; font-size:15px; margin-bottom:-5px; font-weight:bold;">
                <?=$landcategories->name;?>
            </p>
            <div class="line8"></div>
            <?php foreach($lands as $row): ?>
                <div class="ndlink">
                    <a style="height: auto;line-height: 18px; padding: 1px 0px;" href="<?=$row->link;?>">
                        <p><?=$row->name;?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="line9"></div>
<!-- link foter-->
<div class="sreenadd" style="width:980px; background-color:#d0d0d0; float:left;">
    <div style="float:left; font-size:14px; width: 940px; margin: 10px 20px; text-align: center;">
        <?=getconfigkey('addressCompany')?>
    </div>
	<!--
    <div class="support">
        <div class="s1"><a target="_blank" href="<?=getconfigkey('account_facebook')?>"></a></div>
        <div class="s2"><a target="_blank" href="<?=getconfigkey('account_twitter')?>"></a></div>
        <div class="s3"><a target="_blank" href="<?=getconfigkey('account_youtube')?>"></a></div>
        <div class="s4"><a target="_blank" href="<?=getconfigkey('account_google_plus')?>"></a></div>
        <div class="s5"><a target="_blank" href="<?=getconfigkey('account_google_plus')?>"></a></div>
    </div>
	-->
</div>
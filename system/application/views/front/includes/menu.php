<!--menu-->
<div class="header-menu">
    <div id="page-navigative-menu">
        <div class="sreenmenu" style="margin:0px auto; width:948px; height:35px;">
            <div class="sreenhome">
                <div class="home"><h2><a class="<?=$this->menu_active == 'home' ? 'active' : '';?>" href="<?=$base_url;?>"></a></h2></div>
            </div>
            <ul class="dropdown-navigative-menu">
                <li class="lv0 <?=$this->menu_active == 'nha-dat-ban' ? 'active' : '';?>" style="font-size:15px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>nha-dat-ban" class="haslin ">Nhà đất bán</a></h2>
                    </div>
                    <ul>
                        <?php $i=0; foreach($this->typeHouseSale as $row): $i++; ?>
                            <li class="lv1" <?php if($i>1) echo 'style="margin-top:-2px;"';?>>
                                <a href="<?=$base_url?>nha-dat-ban/<?=$row->name_none;?>" class="haslink "><?=$row->name;?></a>
                            </li>
                        <?php endforeach; unset($row); ?>
                    </ul>
                </li>
                <li class="lv0  <?=$this->menu_active == 'nha-dat-cho-thue' ? 'active' : '';?>" style="font-size:16px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>nha-dat-cho-thue" class="haslin ">Nhà đất cho thuê</a></h2>
                    </div>
                    <ul>
                        <?php $i=0; foreach($this->typeHouseLease as $row): $i++; ?>
                            <li class="lv1" <?php if($i>1) echo 'style="margin-top:-2px;"';?>>
                                <a href="<?=$base_url?>nha-dat-cho-thue/<?=$row->name_none;?>" class="haslink "><?=$row->name;?></a>
                            </li>
                        <?php endforeach; unset($row); ?>
                    </ul>
                </li>
                <li class="dropdown-navigative-menu2 <?=$this->menu_active == 'project' ? 'active' : '';?>" style="font-size:15px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>du-an" class="haslin ">Dự án</a></h2>
                    </div>
                    <ul>
                        <?php $i=0; foreach($this->projectsCate as $row): $i++; ?>
                            <li class="lv1" <?php if($i>1) echo 'style="margin-top:-2px;"';?>>
                                <a href="<?=$base_url?>du-an/<?=$row->name_none;?>" class="haslink "><?=$row->name_vietnamese;?></a>
                            </li>
                        <?php endforeach; unset($row); ?>
                    </ul>
                </li>
                <li class="dropdown-navigative-menu2 <?=$this->menu_active == 'news' ? 'active' : '';?>" style="font-size:15px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>tin-tuc" class="haslin ">Tin tức</a></h2>
                    </div>
                    <ul>
                        <?php $i=0; foreach($this->newsCate as $row): $i++; ?>
                            <li class="lv1" <?php if($i>1) echo 'style="margin-top:-2px;"';?>>
                                <a href="<?=$base_url?>tin-tuc/<?=$row->name_none;?>" class="haslink "><?=$row->name_vietnamese;?></a>
                            </li>
                        <?php endforeach; unset($row); ?>
                    </ul>
                </li>
                <li class="dropdown-navigative-menu2  <?=$this->menu_active == 'company' ? 'active' : '';?>" style="font-size:15px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?php echo $base_url; ?>doanh-nghiep" class="haslin ">Doanh nghiệp</a></h2>
                    </div>
                    <ul>
                        <?php $i=0; foreach($this->businessCat as $row): $i++; ?>
                            <li class="lv1" <?php if($i>1) echo 'style="margin-top:-2px;"';?>>
                                <a href="<?=$base_url?>doanh-nghiep/<?=$row->name_none;?>" class="haslink "><?=$row->name_vietnamese;?></a>
                            </li>
                        <?php endforeach; unset($row); ?>
                    </ul>
                </li>
                <li class="dropdown-navigative-menu2 <?=$this->menu_active == 'guide' ? 'active' : '';?>" style="font-size:15px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>cam-nang" class="haslin" title="Cẩm nang">Cẩm nang</a></h2>
                    </div>
                    <ul>
                        <?php $i=0; foreach($this->guideCate as $row): $i++; ?>
                            <li class="lv1" <?php if($i>1) echo 'style="margin-top:-2px;"';?>>
                                <a href="<?=$base_url?>cam-nang/<?=$row->name_none;?>" class="haslink "><?=$row->name_vietnamese;?></a>
                            </li>
                        <?php endforeach; unset($row); ?>
                    </ul>
                </li>
                <li class="dropdown-navigative-menu2" style="font-size:15px;">
                    <div class="sreen1" style=" height:35px; float:left;">
                        <?php if($this->session->userdata('userLoginFlag') == 1): ?>
                            <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>dang-tin" class="haslin" title="Đăng tin">Đăng tin</a></h2>
                        <?php else: ?>
                            <h2 style="font-size: 15px; margin-top: 4px;"><a href="<?=$base_url?>dang-tin-rao-vat-nha-dat-mien-phi" class="haslin" title="Đăng tin">Đăng tin</a></h2>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end menu-->
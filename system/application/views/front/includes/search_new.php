<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;">
        <a href="<?=$base_url;?>" title="Sàn nhà đất">Trang chủ</a>
    </div>
</div>
<!--main-->
<style type="text/css">
    .hotnew{
        border-right: none;
        border-left: none;
        border-bottom: none;
    }
</style>
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left">
        <!--tin tuc-->
        <div class="hotnew">
            <div class="titlenew2 title-cat-item">
                <p  style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px;  margin-top:5px;"><?php echo "Kết quả tìm kiếm cho: ".$this->session->userdata('value');?></p>
            </div>
            <?php $i=0; foreach($news as $row): $i++;
                $cat = new Newscatalogue($row->newscatalogue_id);
                ?>
                <div style="display: none;" class="sreentinthitruong">
                    <div class="boxhinhthitruonglon">
                        <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img src="<?=$base_url?>img/news/<?=$row->image?>" />
                        </a>
                    </div>
                    <div  class="sreennoidungthitruong" style=" float:left; margin-top:8px; width:395px; margin-left:5px;">
                        <div class="sreentieudethitruong" style="width:400px; float:left; margin-bottom:15px; margin-top:0px; ">
                            <div class="tieudenoibat2" >
                                <a style="height: auto; width: auto;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                    <p style="margin-left:5px; font-size: 18px; ">
                                        <?=$row->title_vietnamese;?>
                                    </p>
                                </a>
                            </div>
                            <p style="font-size:14px; color:#999999; margin-left:5px; float:left; width:150px;"><?=get_date_from_sql($row->created);?></p>
                        </div>
                        <div class="sreenndtinthitruong" style="width:380px; float:left;color:#333333;">
                            <p align="justify" style="margin-left:5px;">
                                <?=strlen($row->short_vietnamese) < 300 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 300).'...';?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sreentinthitruong cat-item">
                    <div class="boxhinhthitruongnho img-cat-item">
                        <a href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                            <img src="<?php echo image('img/news/'.$row->image, 'news_198_148') ?>" width="198" />
                        </a>
                    </div>
                    <div class="sreennoidungthitruong cat-item-right">
                        <div class="sreentieudethitruong" style="width:380px; float:left; margin-bottom:5px; margin-top: 0px;">
                            <div class="tieudenoibat3" >
                                <a style="height: auto; width: auto;" href="<?=$base_url.$cat->parentcat->name_none.'/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                    <p style="margin-left:5px; font-size: 18px; line-height: 20px; margin-bottom: 5px;"><?=$row->title_vietnamese;?></p>
                                </a>
                                <p style="font-size:12px; color:#999999; margin-left:5px; float:left; width:375px; display: block; font-weight: normal;">
                                    <?=$row->newscatalogue->name_vietnamese; ?> &diams; <?=get_date_from_sql($row->created);?>
                                </p>
                            </div>
                        </div>
                        <div class="sreenndtinthitruong" style="width:380px; float:left;color:#333333">
                            <p align="justify" style="margin-left:5px;">
                                <?=strlen($row->short_vietnamese) < 350 ? $row->short_vietnamese: cut_string($row->short_vietnamese, 350).'...';?>
                            </p>
                        </div>
                        <div style="display: none;" class="tag-cat-item">
                            Từ khóa: <a href="#">aaa</a>, <a href="#">bbb</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="phantrang" style="float:left; width:330px; margin-left:280px; height:20px;">
                <div class="back">
                    <?=$this->pagination->create_links();?>
                </div>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="sreenboxtwen" style="width:147px; float:left;">
            <div class="boxduan2">
                <span class="title-top-box">Dự án nổi bật</span>
                <?php foreach($this->projectHot as $row):
                    $cat = new Newscatalogue($row->newscatalogue_id);
                    ?>
                    <div style="width:147px; float:left; margin-bottom:14px;">
                        <div class="boxhinh4">
                            <a href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>">
                                <img src="<?php echo image('img/news/'.$row->image, 'news_135_101') ?>" />
                            </a>
                        </div>
                        <div class="tieudeduan2"><a style="color: #000;" href="<?=$base_url?>du-an/<?=$cat->name_none.'/'.$row->title_none?>.html" title="<?=$row->title_vietnamese;?>"><p align="center" style="margin-top:4px;"><?=$row->title_vietnamese;?></p></a></div>
                    </div>
                <?php endforeach; unset($row); unset($cat); ?>
            </div>
        </div>
        <?=$this->load->view('front/news/col-right')?>
    </div>
    <?=$this->load->view('front/includes/footer')?>
</div>
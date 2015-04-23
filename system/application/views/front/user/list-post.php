<link rel="stylesheet" href="<?php echo $base_url.'images/css/style-new-282015.css'; ?>"/>
<div class="linktop" style="width:960px;height:20px; float:left;margin-top:12px; margin-bottom:0px;">
    <div class="linkdautrang" style="margin-left:5px; width:auto; float:left;"><a href="<?=$base_url;?>">Trang chủ</a></div>
    <div class="linkdautrang" style=" width:auto; float:left;"><a class="linkdautrang-active" href="<?=$base_url;?>chinh-sua-tin-da-dang">Sửa / xóa tin đã đăng</a></div>
</div>

<?php echo $this->load->view('front/user/navi-functions')?>

<div style="width:920px; float:left; border:1px solid #CCCCCC; height:auto; border-top:none; margin-bottom:15px; margin-left:9px; padding: 20px;">
    <div class="righttv" style="width:920px; margin-bottom:-16px; float:left; margin-left:0px;">
        <div style="width: 920px; margin: 0 auto;">
            <span style=" display: block; text-align: center; margin-bottom: 0px; color: <?=$type==1 ? 'red' : 'blue';?>"><?=$msg;?></span>
            <p style="text-align:center;color:#0000;margin-top:0px;font-size: 13px;">Tại trang quản lý tin đăng, Bạn có thể xóa tin, sửa tin để Up tin. </p>
            </br>
            <div class="filler-estate">
                <form action="<?php echo $base_url.'chinh-sua-tin-da-dang';?>" method="post">
                    <span class="bl fl">Hình thức:</span>
                    <select class="fl estatecatalogue_id" name="estatecatalogue_id" id="estatecatalogue_id">
                        <option value="0">Chọn hình thức</option>
                        <option value="1">Nhà đất bán</option>
                        <option value="2">Nhà đất cho thuê</option>
                    </select>
                    <span class="bl fl">Danh mục:</span>
                    <select class="fl estatetype_id" name="estatetype_id" id="estatetype_id">
                        <option value="">Chọn Phân mục</option>
                    </select>
                    <span class="bl fl">Mức giá:</span>
                    <select class="fl estateprice_id" name="estateprice_id" id="estateprice_id">
                        <option value="">Chọn Mức giá</option>
                    </select>
                    <input class="fl" type="submit" value="Tìm kiếm"/>
                </form>
            </div>
            <table class="list-post" style="border-width: 0px; border-collapse: collapse; width: 100%;">
                <tr style="height: 20px; border-bottom: 1px dotted #e2e2e2;">
                    <th width="3%" style="text-align: left;">TT</th>
                    <th width="25%" style="text-align: left;">Tiêu đề</th>
                    <th width="15%" style="text-align: left;">Diện tích</th>
                    <th width="15%" style="text-align: left;">Giá</th>
                    <th width="20%" style="text-align: left;">Địa chỉ</th>
                    <th width="10%" style="text-align: left;">Ngày đăng</th>
                    <th width="6%">Tác vụ</th>
                </tr>
                <?php $i=0; foreach($estates as $row): $i++;?>
                    <tr style="border-bottom: 1px dotted #e2e2e2;">
                        <td><?=$i;?></td>
                        <td><a style="color: #0A6D00; font-weight: bold;" href="<?=$base_url?>chinh-sua-tin/<?=$row->id?>"><?=$row->title;?></a></td>
                        <td>
                            <?php if($row->isArea == 0): ?>
                                <?=$row->estatearea->label;?>
                            <?php else: ?>
                                <?='Thương lượng'?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($row->isPrice == 0): ?>
                                <?=$row->estateprice->label;?>
                            <?php else: ?>
                                <?='Thương lượng'?>
                            <?php endif; ?>
                        </td>
                        <td><?=$row->address;?></td>
                        <td><?=date('d-m-Y', strtotime($row->created));?></td>
                        <td style="text-align: center;">
                            <a href="<?=$base_url?>chinh-sua-tin/<?=$row->id?>" title="Sửa tin">
                                <img src="<?=$base_url?>images/edit.gif" alt="Sửa"/>
                            </a>
                            <a href="<?=$base_url?>xoa-tin/<?=$row->id?>" title="Xóa tin" onclick='return confirm ("Bạn có muốn xóa đối tượng này không ?")'>
                                <img src="<?=$base_url?>images/action_delete.gif" alt="Xóa"/>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="7"><?php echo $this->pagination->create_links(); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!--main-->
<div class="main" style="width:980px;">
    <div class="cotleft" style="width:645px; float:left; margin-bottom:10px;">
        <p style=" font-size:18px; color:#109502; font-weight:bold; margin-left:9px;">Bạn nên xem </p>
        <div style="float:right; width:515px; height:1px; background-color:#109502; margin-top:-7px;"></div>
        <?php foreach($this->newsPrivate as $row): ?>
            <?php $cat = new Newscatalogue($row->newscatalogue_id); ?>
            <div class="sreentinthitruong">
                <div class="boxhinhthitruonglon">
                    <a target="_blank" href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?php echo $row->title_vietnamese;?>">
                        <img alt="<?php echo $row->title_vietnamese;?>" style="width: auto; height: auto;" src="<?= image('img/news/'.$row->image, 'news_196_124'); ?>" width="196" height="124">
                    </a>
                </div>
                <div  class="sreennoidungthitruong" style=" float:left; margin-top:6px; width:430px; margin-left:5px;">
                    <div class="sreentieudethitruong" style="width:430px; float:right; margin-bottom:3px; margin-top:0px; ">
                        <div class="tieudenoibat2" >
                            <a target="_blank" style="width: 100%;height: auto;" href="<?=$base_url.'tin-tuc/'.$cat->name_none.'/'.$row->title_none?>.html" title="<?php echo $row->title_vietnamese;?>">
                                <p  style="margin-left:12px; "><?php echo $row->title_vietnamese;?></p>
                            </a>
                        </div>
                    </div>
                    <div style="width:430px; margin-bottom:10px;float:left;">
                        <p style="color:#999999; font-size:13px; margin-left:12px;">Cập nhật: <?=get_date_from_sql($row->created);?></p>
                    </div>
                    <div class="sreenndtinthitruong" style="width:410px; margin-left:12px; height:70px; float:left;color:#333333;">
                        <p align="justify" style="margin-left:0px; font-size:14px; font-weight:lighter;">
                            <?=strlen($row->short_vietnamese) < 200 ? $row->short_vietnamese : cut_string($row->short_vietnamese, 250).'...';?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="linedot"></div>
        <?php endforeach; ?>
    </div>
    <div style="width:1px; background:#CCCCCC; height:520px; float:left; margin-left:12px; margin-top:15px;"></div>
    <div class="cotright" style="width: 300px; margin-top:14px; float:right; margin-right:9px; ">
        <?php echo $this->load->view('front/includes/adv_right_s'); ?>
    </div>
</div>
<!--end main-->
<?=$this->load->view('front/includes/footer')?>

<style type="text/css">
    .pagin{
        float: right;
    }
    .list-post tr:nth-child(2n){
        background-color: #e9e9e9;
    }
    .filler-estate{
        width: 910px;
        height: 30px;
        padding-left: 10px;
        padding-top: 5px;
        margin: 5px 0;
        background-color: #e9e9e9;
    }
    .bl{
        display: block;
    }
    .filler-estate span{
        line-height: 25px;
        margin-right: 10px;
        font-weight: bold;
    }
    .filler-estate select{
        margin-right: 10px;
        width: 187px;
        height: 25px;
    }
    .filler-estate input[type="submit"]{
        width: 110px;
        height: 25px;
        cursor: pointer;
    }
</style>
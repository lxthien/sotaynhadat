<script type="text/javascript">
    $(document).ready(function(){
        $("#postGuide").accordion({
            //heightStyle: "content",
            active: false,
            collapsible: true,
            autoHeight: false
        }); 
    });
</script>
<style type="text/css">
#postGuide h3
{
    cursor: pointer;
    margin-top: 10px;
}
</style>
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:auto; float:left;"><a href="<?=$base_url?>">Trang chủ</a></div>
    <p style="float:left; margin-left:5px; margin-right:5px;">-</p>
    <div class="link" style=" width:auto; float:left;"><a href="<?=$base_url.'huong-dan-dang-tin'?>.html" title="Hướng dẫn đăng tin">Hướng dẫn đăng tin</a></div>
</div>
<!--main-->
<div class="main" style="width:960px;float:left;margin-top:5px; margin-left:12px; ">
    <!--left-->
    <div class="left">
        <!--gioi thieu-->
        <div class="hotnew">
            <div class="titlenew">
                <p style="color:#FFFFFF; font-weight:bold; float:left; font-size:16px; margin-top:5px;">
                    Hướng dẫn đăng tin
                </p>
            </div>
            <br />
            <div id="postGuide" class="noidunggioithieu" style="width:563px;  margin-top:25px; margin-left:22px; margin-bottom:10px; line-height: 23px;">
                <?php $i=0; foreach($news as $row): $i++; ?>
                    <h3><?=$i.'. '.$row->title_vietnamese;?></h3>
                    <div class="content"><?=$row->full_vietnamese;?></div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--end gioi thieu-->
    </div>
    <!--end left-->
    <!-- right-->
    <div class="right">
        <!-- tin xem nhieu-->
        <div class="boxnoibat">
            <p  style="font-size:16px; font-weight:bold; color:#028287; margin-top:10px; margin-left:25px; float:left;">Tin xem nhiều</p>
            <div class="line20"></div>
            <?php foreach($newViewMost as $row): ?>
            <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a style="height: auto;" href="<?=$base_url.'cam-nang/'.$row->newscatalogue->name_none.'/'.$row->title_none?>.html">
                        <p style="margin-left:25px; margin-top:9px; font-weight:bold;">
                            <?=$row->title_vietnamese;?>
                        </p>
                    </a>
                </div>
            </div>
            <div class="line3"></div>
            <?php endforeach; unset($row); ?>
        </div>
        <!-- end tin xem nhieu-->
        <!-- tim kiem bds-->
        <div class="boxtimkiembds">
            <p  style="font-size:16px; font-weight:bold; color:#028287; margin-top:10px; margin-left:79px; float:left;">Tìm kiếm bất động sản</p>
            <div class="line4"></div>
            <div class="sreenboxseach2" style=" width:310px;  margin-bottom:20px; float:left;">
                <form action="<?=$base_url?>tim-kiem-bat-dong-san" method="post">
                    <div  class="boxseach"  style=" width:100px; float:left; margin-left:60px;">
                        <label>
                            <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="1"/>
                            <p style="font-weight:bold; font-size:14px; color:#CC0000; float:left; margin-top:8px; margin-left:5px;">Mua - Bán</p>
                        </label>
                    </div>
                    <div class="boxseach"  style=" width:100px; margin-left:5px;  float:left;">
                        <label>
                            <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="2"/>
                            <p style="font-weight:bold; font-size:14px; color:#CC0000; float:left; margin-top:8px; margin-left:5px;">Cho Thuê</p>
                        </label>
                    </div>
                    <div class="sreenseachtimkiembds1" style="width:310px; height:25px; float:left; margin-bottom:3px;">
                        <select name="estatetype_id" id="estatetype_id" size="1" style="float:left; margin-right:5px; margin-left:13px; width:140px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                            <option value="" selected="selected">Chọn Loại nhà đất</option>
                            <?php /*foreach($this->estateCatalogues as $row):
                                $estatetype = new Estatetype();
                                $estatetype->order_by('position', 'asc');
                                $estatetype->where('estatecatalogue_id', $row->id);
                                $estatetype->get();
                                */?><!--
                                <option disabled="disabled" value=""><?/*=$row->name;*/?></option>
                                <?php /*foreach($estatetype as $rowType): */?>
                                <option <?php /*if($object->estatetype_id == $rowType->id) echo 'selected="selected"'; */?> value="<?/*=$rowType->id;*/?>">..........<?/*=$rowType->name;*/?></option>
                            <?php /*endforeach; unset($rowType); */?>
                            --><?php //endforeach; unset($row); ?>
                        </select>
                        <select name="estatecity_id" id="estatecity_id" size="1" style="float:left; width:140px; margin-right:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;">
                            <option value="">Chọn Tỉnh/TP</option>
                            <?php foreach($this->estateProvince as $row): ?>
                                <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </div>
                    <div class="sreenseachtimkiembds1" style="width:310px; height:25px; float:left; margin-bottom:3px;">
                        <select name="estatedistrict_id" id="estatedistrict_id" size="1" style="float:left; width:140px; margin-right:5px; margin-left:13px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;" >
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
                    <div class="sreenseachtimkiembds1" style="width:310px; height:25px; float:left; margin-bottom:13px;">
                        <select name="estateprice_id" id="estateprice_id" size="1" style="float:left; width:140px; margin-right:5px; margin-left:13px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;" >
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
        <!--end tim kiem bds-->
        <!-- qc-->
        <?php echo $this->load->view('front/includes/adv_right_s'); ?>
        <!-- end qc-->
    </div>
    <!--end right-->
    <?=$this->load->view('front/includes/footer')?>
</div>
<!--end main-->
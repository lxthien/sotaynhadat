<!--seach-->
<div class="bgseach"   style="width:961px; height:75px; float:left; background-color:#e1e1e1; margin-left:11px; border-bottom:1px  #999999 solid" >
    <form action="<?=$base_url?>tim-kiem-bat-dong-san" method="post">
        <div class="sreenboxseach" style="  height:30px; margin-left:25px; float:left; ">
            <div  class="boxseach"  style=" width:100px; float:left; margin-top:5px;">
                <label>
                    <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="1"/>
                    <p style="font-weight:bold; font-size:14px; color:#109502; float:left; margin-top:8px; margin-left:5px;">Mua - Bán</p>
                </label>
            </div>
            <div  class="boxseach"  style=" width:100px;  float:left; margin-top:5px;">
                <label>
                    <input type="radio" style="float:left; margin-top:10px;" name="estatecatalogue_id" value="2"/>
                    <p style="font-weight:bold; font-size:14px; color:#109502; float:left; margin-top:8px; margin-left:5px;">Cho Thuê</p>
                </label>
            </div>
        </div>
        <div class="sreenseachtimkiembds1" style="width:920px; height:25px; float:left; margin-bottom:10px; margin-left:25px;">
            <select name="estatetype_id" id="estatetype_id" size="1" style="float:left; margin-right:5px; margin-left:13px; width:130px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
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
            <select class="estatecity_id" name="estatecity_id" id="estatecity_id" size="1" style="float:left; width:122px;margin-left:5px;  height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;">
                <option value="" selected="selected">Chọn Tỉnh/TP</option>
                <?php foreach($estateProvince as $row): ?>
                    <option value="<?=$row->id?>"><?=$row->name?></option>
                <?php endforeach; ?>
            </select>
            <select name="estatedistrict_id" id="estatedistrict_id" size="1" style="float:left; width:135px; margin-left:5px; height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                <option value="">Chọn Quận/Huyện</option>
            </select>
            <select name="estatearea_id" id="estatearea_id" size="1" style="float:left; width:120px; margin-left:5px; height:23px; margin-bottom:5px; margin-top:10px;  border:1px  #CCCCCC solid;">
                <option value="" selected="selected">Chọn Diện tích</option>
                <option value="-1">Không xác định</option>
                <?php foreach($this->estateareas as $row): ?>
                    <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                <?php endforeach; unset($row); ?>
            </select>
            <select name="estateprice_id" id="estateprice_id" size="1" style="float:left; width:120px; margin-left:5px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                <option value="" selected="selected">Chọn Mức giá</option>
            </select>
            <select name="estatedirection_id" id="estatedirection_id" size="1" style="float:left; width:135px; margin-left:5px;  height:23px; margin-top:10px; margin-bottom:5px;  border:1px  #CCCCCC solid;">
                <option value="" selected="selected">Chọn Hướng nhà</option>
                <?php foreach($this->estateDirection as $row): ?>
                    <option value="<?=$row->id?>"><?=$row->name;?></option>
                <?php endforeach; unset($row); ?>
            </select>
            <div class="btonseach">
                <input type="submit" value=""/>
            </div>
        </div>
    </form>
</div>
<!--end seach-->
<div class="linktop" style=" width:600px;height:20px; float:left; margin-top:8px; margin-left:25px; margin-bottom:10px; ">
    <div class="link" style="margin-left:10px; width:60px; float:left;"><a href="<?=$base_url?>">Trang chủ</a></div>
</div>
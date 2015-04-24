<div class="boxtimkiembds">
    <span class="title-top-box">Tìm kiếm bất động sản</span>
    <div class="sreenboxseach2" style=" width:300px;  margin-bottom:20px; float:left;">
        <form action="<?=$base_url?>tim-kiem-bat-dong-san" method="post">
            <div  class="boxseach" style="width:100px; float:left; margin-left: 55px;">
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
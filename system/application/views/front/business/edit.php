<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<div class="grid_15" id="textcontent">
    <form id="form" class="table_input" action="<?=$base_url;?>admin/estates/edit/<?=$object->id;?>" method="post">
    <table class="table_input">
        <tr>
            <td><label for="name">Hình thức:</label></td>
            <td>
                <select name="estatecatalogue_id" id="estatecatalogue_id" class="smallInput medium">
                    <option value="0" selected="selected">Chọn Hình thức</option>
                    <?php foreach($estateCategory as $row): ?>
                        <option <?php if($object->estatecatalogue_id == $row->id) echo 'selected="selected"';?> value="<?=$row->id?>"><?=$row->name?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Loại:</label></td>
            <td>
                <input type="hidden" name="estatetype_selected" value="<?=$o->estatetype_id?>"/>
                <select name="estatetype_id" id="estatetype_id" class="smallInput medium">
                    <option value="0" selected="selected">Chọn Loại</option>
                    <?php foreach($estateType as $row): ?>
                        <option <?php if($object->estatetype_id == $row->id) echo 'selected="selected"';?> value="<?=$row->id?>"><?=$row->name?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name"></label></td>
            <td>
                <label><input <?php if($object->isArea == 0) echo 'checked="checked"'; ?> name="IsArea" value="0" type="radio"/> Có diện tích</label>
                <label><input <?php if($object->isArea == 1) echo 'checked="checked"'; ?> name="IsArea" type="radio" value="1"/> Không xác định</label>
            </td>
        </tr>
        <tr>
            <td><label for="name">Diện tích:</label></td>
            <td><input type="text" name="area_text" value="<?=$object->area_text;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Chọn mức diện tích:</label></td>
            <td>
                <select name="estatearea_id" id="estatearea_id" class="smallInput medium">
                    <option value="" selected="selected">Chọn diện tích</option>
                    <?php foreach($estateAreas as $row): ?>
                        <option <?php if($object->estatearea_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                    <?php endforeach; unset($row); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Pháp lý:</label></td>
            <td>
                <select name="legally" id="legally" class="smallInput medium">
                    <option <?php if($object->legally == '') echo 'selected="selected"';?> value="">Chọn loại</option>
                    <option <?php if($object->legally == 'Bìa hồng') echo 'selected="selected"';?> value="Bìa hồng">Bìa hồng</option>
                    <option <?php if($object->legally == 'Bìa đỏ') echo 'selected="selected"';?> value="Bìa đỏ">Bìa đỏ</option>
                    <option <?php if($object->legally == 'Hợp đồng góp vốn') echo 'selected="selected"';?> value="Hợp đồng góp vốn">Hợp đồng góp vốn</option>
                    <option <?php if($object->legally == 'Hợp đồng') echo 'selected="selected"';?> value="Hợp đồng">Hợp đồng</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Hướng:</label></td>
            <td>
                <select name="estatedirection_id" id="estatedirection_id" class="smallInput medium">
                    <option value="0" selected="selected">Chọn Hướng nhà</option>
                    <?php foreach($estateDirection as $row): ?>
                        <option <?php if($object->estatedirection_id == $row->id) echo 'selected="selected"';?> value="<?=$row->id?>"><?=$row->name?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Nhập giá:</label></td>
            <td>
                <input style="float: left" type="text" name="price_text" value="<?=$object->price_text;?>" class="smallInput small" />
                <select style="float: left; margin-left: 10px; height: 28px;" class="price-type smallInput small" name="price_type">
                    <option <?=$object->price_type==1?'selected="selected"':'';?> value="1">Triệu</option>
                    <option <?=$object->price_type==2?'selected="selected"':'';?> value="2">Tỷ</option>
                    <option <?=$object->price_type==3?'selected="selected"':'';?> value="3">Cây vàng</option>
                    <option <?=$object->price_type==4?'selected="selected"':'';?> value="4">USD</option>
                    <option <?=$object->price_type==5?'selected="selected"':'';?> value="5">USD/m2</option>
                    <option <?=$object->price_type==6?'selected="selected"':'';?> value="6">Trăm nghìn/m2</option>
                    <option <?=$object->price_type==7?'selected="selected"':'';?> value="7">Triệu/m2</option>
                    <option <?=$object->price_type==8?'selected="selected"':'';?> value="8">Chỉ vàng/m2</option>
                    <option <?=$object->price_type==9?'selected="selected"':'';?> value="9">Cây vàng/m2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Chọn mức giá:</label></td>
            <td>
                <select name="estateprice_id" class="smallInput medium">
                    <option value="">Chọn mức giá:</option>
                    <?php foreach($estatePrices as $row): ?>
                        <option <?php if($object->estateprice_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->label;?></option>
                    <?php endforeach; unset($row); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Tỉnh/ Thành phố:</label></td>
            <td>
                <select name="estatecity_id" class="smallInput medium">
                    <option value="">Tỉnh/ Thành phố:</option>
                    <?php foreach($estateCities as $row): ?>
                        <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                    <?php endforeach; unset($row); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Quận/ Huyện:</label></td>
            <td>
                <select name="estatedistrict_id" class="smallInput medium">
                    <option value="">Chọn Quận/ Huyện:</option>
                    <?php foreach($estateDictricts as $row): ?>
                        <option <?php if($object->estatedistrict_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                    <?php endforeach; unset($row); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">Địa chỉ:</label></td>
            <td><input type="text" name="address" value="<?=$object->address;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Hình ảnh:</label></td>
            <td>
                <img src="<?=$base_url.$object->photo;?>" style="height: 100px;" alt=""/>
            </td>
        </tr>
        <tr>
            <td><label for="name">Tiêu đề:</label></td>
            <td><input type="text" name="title" value="<?=$object->title;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Mô tả:</label></td>
            <td>
                <textarea style="height: 200px;" name="description" class="smallInput medium"><?=$object->description;?></textarea>
                <script type="text/javascript">
                    editor_description=CKEDITOR.replace( 'description',
                        {
                            toolbar : [],
                            height:200
                        });
                </script>
            </td>
        </tr>
        <tr>
            <td><label for="name">Tag:</label></td>
            <td><input type="text" name="tag" value="<?=$object->tag;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Dự án:</label></td>
            <td>
                <select name="article_id" id="article_id" class="smallInput medium">
                    <option value="0">Chọn Dự Án</option>
                    <?php foreach($project as $row): ?>
                        <option <?php if($object->article_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->title_vietnamese?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="button_bar">
                <?php create_form_button('submit_button button_ok','Lưu');?>
                <div class="clear">
            </div>
        </div></td>
        </tr>
    </table>
    </form>
</div>
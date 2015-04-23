<div style="position: relative;">
<h2>Thông tin chung</h2>


<table class="table_input">
    <!--
    <tr>
        <td><label for="name">Kích hoạt:</label></td>
        <td><input <?php if($object->active==1) echo 'checked="checked"' ?> name="isActive" type="checkbox" value="1" /></td>
    </tr>
    -->
    <tr>
        <td><label for="name">Hình đại diện:</label></td>
        <td><input name="logo" type="file" /></td>
    </tr>               
    <tr >
     	<td>
		<label for="name">Danh mục:</label></td>
        <td>
            <div id="categoryArea">
                <select name="productcat_id" id="" class="smallInput small fl">
                    <?php $i=0; foreach($productCat as $row): $i++;?>
                        <option <?php if($object->productcat_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name_vietnamese?></option>
                    <?php endforeach;?>
                </select>
            </div>                
		</td>
    </tr>
    <tr>
     	<td>
        <label for="name">Nhà sản xuất:</label></td>
        <td>
            <input type="text" name="productmanufacture" value="<?=$object->productmanufacture;?>" class="smallInput medium fl" />
		</td>
    </tr>
    <tr>
     	<td>
			<label for="name">Năm sản xuất:</label></td>
        <td><input  type="text" id="origin"  class="smallInput medium fl"  name="origin" value="<?=$object->origin;?>" /></td>
    </tr>
    <tr>
     	<td>
			<label for="name">Bảo hành:</label></td>
        <td><input  type="text" id="warranty"  class="smallInput medium fl"  name="warranty" value="<?=$object->warranty;?>" /></td>
    </tr>
    <!--
    <tr>
        <td><label for="name">Nguyên hộp gồm có:</label></td>
        <td><textarea  name="inBox"  class="smallInput medium" /><?=$object->inBox;?></textarea></td>
    </tr>
    <tr>
     	<td>
			<label for="name">Màu sắc:</label></td>
        <td><input  type="text" id="color"  class="smallInput medium fl"  name="color" value="<?=$object->color;?>" /></td>
    </tr>
    <tr>
     	<td><label for="name">Phong cách:</label></td>
        <td>
            <select class="smallInput medium fl" name="style">
                <option <?php if($object->style == 1) echo 'selected="selected"';?> value="1">Hiện đại</option>
                <option <?php if($object->style == 2) echo 'selected="selected"';?> value="2">Cổ điển</option>
                <option <?php if($object->style == 3) echo 'selected="selected"';?> value="3">Nhiệt đới</option>
                <option <?php if($object->style == 4) echo 'selected="selected"';?> value="4">Trần thấp</option>
                <option <?php if($object->style == 5) echo 'selected="selected"';?> value="5">Lưu lượng gió cao</option>
                <option <?php if($object->style == 6) echo 'selected="selected"';?> value="6">Truyền thống</option>
            </select>
        </td>
    </tr>
    -->
    <tr>
     	<td>
			<label for="name">Giá chính thức:<span style="color: red;">*</span></label>
                <span class="spanPrice"></span></td>
        <td>
            <input  type="text" id="price"  class="smallInput small fl" style="width: 100px;" name="price" value="<?=$object->price;?>" />
            <!--
            <span class="fl" style="padding-left:5px;padding-right: 5px;">Hiển thị:</span> 
            <input  type="text" id="priceText"  class="smallInput medium fl" style="width: 200px;"  name="priceText" value="<?=$object->priceText;?>" />
            <span class="fl" style="padding-left:5px;padding-right: 5px;">Gạch ngang:</span>
            <input type="checkbox" class="fl" name="isLinePrice" value="1" <?php if($object->isLinePrice == 1) echo 'checked="checked"';?> />
            <span class="fl" style="padding-left:5px;padding-right: 0px;">Màu:</span>
            <input type="text" name="priceColor" class="smallInput small fl" style="width: 100px;" value="<?=$object->priceColor;?>"  />
            <label for="price" generated="true" style="display: block;padding-top: 5px;clear: both;" class="error"></label>
            -->
        </td>
    </tr>
    <tr id="saleOffPrice" style="height:60px;">
        <td>
            <label for="name">Giá khuyến mãi:</label>
            <span class="spanSaleOffPrice"></span>
        </td>
        <td>    
            <input  type="text" name="saleOffPrice" class="smallInput small fl" style="width: 100px;" value="<?=$object->saleOffPrice?>" />
            <!--
            <span class="fl" style="padding-left:5px;padding-right: 5px;">Hiển thị:</span>
            <input  type="text" name="saleOffPriceText" style="width: 200px;"  class="smallInput medium fl" value="<?=$object->saleOffPriceText?>" />
            <span class="fl" style="padding-left:5px;padding-right: 5px;">Gạch ngang:</span>
            <input class="fl" type="checkbox" name="isLinePriceSaleOff" value="1" <?php if($object->isLinePriceSaleOff == 1) echo 'checked="checked"';?> />
            <span class="fl" style="padding-left:5px;padding-right: 0px;">Màu:</span>
            <input type="text" name="saleOffPriceColor" class="smallInput small fl" style="width: 100px;" value="<?=$object->saleOffPriceColor;?>"  />
            <label for="saleOffPrice" generated="true" style="display: block;padding-top: 5px;clear: both;" class="error"></label>
            -->
        </td>
    </tr>
    <tr>
        <td><label for="name">Giảm giá:</label></td>
        <td><input <?php if($object->isSale==1) echo 'checked="checked"' ?> name="isSale" type="checkbox"  value="1" /></td>
    </tr>
    <!--
    <tr>
        <td><label for="name">Sản phẩm mới:</label></td>
        <td><input <?php if($object->isNew==1) echo 'checked="checked"' ?> name="isNew" type="checkbox" value="1" /></td>
    </tr>
    <tr>
        <td><label for="name">Sản phẩm độc đáo:</label></td>
        <td><input <?php if($object->isGift==1) echo 'checked="checked"' ?> name="isGift" type="checkbox" value="1" /></td>
    </tr> 
    <tr>
        <td><label for="name">Hàng đã sử dụng(Used):</label></td>
        <td><input <?php if($object->isUsed==1) echo 'checked="checked"' ?> name="isUsed" type="checkbox"  value="1" /></td>
    </tr>
   <tr>
        <td><label for="name">Sản phẩm nổi bật:</label></td>
        <td><input <?php if($object->isHot==1) echo 'checked="checked"' ?> name="isHot" type="checkbox" value="1" /></td>
    </tr>
    -->
    <tr>
        <td>
            <label for="name">Cân nặng:</label></td>
        <td><input  type="text" id="weight"  class="smallInput medium fl"  name="weight" value="<?=$object->weight;?>" /></td>
    </tr>
    <tr>
        <td>
            <label for="name">Chất liệu:</label></td>
        <td><input  type="text" id="materials"  class="smallInput medium fl"  name="materials" value="<?=$object->materials;?>" /></td>
    </tr>
    <tr>
        <td>
            <label for="name">Màu sắc:</label></td>
        <td><input  type="text" id="color"  class="smallInput medium fl"  name="color" value="<?=$object->color;?>" /></td>
    </tr>
    <tr>
        <td>
            <label for="name">Kích thước:</label></td>
        <td><input  type="text" id="size"  class="smallInput medium fl"  name="size" value="<?=$object->size;?>" /></td>
    </tr>
    <tr>
        <td><label for="name">Sản phẩm độc đáo:</label></td>
        <td><input <?php if($object->isGift==1) echo 'checked="checked"' ?> name="isGift" type="checkbox" value="1" /></td>
    </tr>
    <tr>
        <td><label for="name">SEO - title:</label></td>
        <td><input type="text" name="seo_title" value="<?=$object->seo_title;?>" class="smallInput big" /></td>
    </tr>
    <tr>
        <td><label for="name">SEO - Description:</label></td>
        <td><textarea  name="seo_description"  class="smallInput big"><?=$object->seo_description;?></textarea></td>
    </tr>
    <tr>
        <td><label for="name">SEO - Keyword:</label></td>
        <td><textarea  name="seo_keyword"  class="smallInput big"><?=$object->seo_keyword;?></textarea></td>
    </tr>
    
    <tr>
        <td><label for="name">Search Key:</label></td>
        <td><textarea  name="searchKey"  class="smallInput big"><?=$object->searchKey;?></textarea></td>
    </tr>
    <?php if($object->exists()){?>
    <tr>
        <td><label for="name">Người tạo:</label></td>
        <td><?=$object->creator;?>(<?=get_date_from_sql($object->created);?>)</td>
    </tr>
    <tr>
        <td><label for="name">Người cập nhật cuối:</label></td>
        <td><?=$object->updator;?>(<?=get_date_from_sql($object->updated);?>)</td>
    </tr>
    <?php } ?>
</table>
</div>
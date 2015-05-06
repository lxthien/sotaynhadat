<div class="grid_15" id="textcontent"> 
    <form id="form" class="table_input" action="<?=$base_url;?>admin/estatecatalogues/edit/<?php echo $object->id==''?0:$object->id; ?>" method="post">
    <table class="table_input">
        <tr>
            <td><label for="name">Hình thức nhà đất:</label></td>
            <td><input type="text" name="name" value="<?=$object->name;?>" class="smallInput medium" /></td>
        </tr>
        <tr style="display: none;">
            <td><label for="name">Hình thức cha:</label></td>
            <td>
                <select name="parentcat_id" class="smallInput medium">
                    <option value="0">Danh mục cha</option>
                    <?php foreach($estatesCatalogue as $row): ?>
                        <option <?php if($object->parentcat_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                    <?php endforeach; unset($row); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">SEO (Title):</label></td>
            <td><input type="text" name="title" value="<?=$object->title;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">SEO (Description):</label></td>
            <td>
                <textarea name="description" class="smallInput medium" style="height: 80px;"><?=$object->description;?></textarea>
            </td>
        </tr>
        <tr>
            <td><label for="name">SEO (Keyword):</label></td>
            <td><input type="text" name="keyword" value="<?=$object->keyword;?>" class="smallInput medium" /></td>
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
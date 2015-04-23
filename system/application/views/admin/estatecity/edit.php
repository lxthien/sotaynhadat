<div class="grid_15" id="textcontent"> 
    <form id="form" class="table_input" action="<?=$base_url;?>admin/estatecitys/edit/<?php echo $object->id==''?0:$object->id; ?>" method="post">
    <table class="table_input">
        <tr>
            <td><label for="name">Tên Thành phố/Tỉnh:</label></td>
            <td><input type="text" name="name" value="<?=$object->name;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Tỉnh thành mặc định:</label></td>
            <td>
                <input type="checkbox" id="isDefault" name="isDefault" value="1" <?php if($object->isDefault == 1) echo 'checked="checked"'; ?> class="smallInput medium" />
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
<div class="grid_15" id="textcontent"> 
    <form id="form" class="table_input" action="<?=$base_url;?>admin/estateareas/edit/<?php echo $object->id==''?0:$object->id; ?>" method="post">
    <table class="table_input">
        <tr>
            <td><label for="name">Nhãn:</label></td>
            <td><input type="text" name="label" value="<?=$object->label;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Từ:</label></td>
            <td><input type="text" name="from" value="<?=$object->from;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Đến:</label></td>
            <td><input type="text" name="to" value="<?=$object->to;?>" class="smallInput medium" /></td>
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
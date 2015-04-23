<div class="grid_15" id="textcontent"> 
    <form id="form" class="table_input" action="<?=$base_url;?>admin/estatedirections/edit/<?php echo $object->id==''?0:$object->id; ?>" method="post">
    <table class="table_input">
        <tr>
            <td><label for="name">Hướng:</label></td>
            <td><input type="text" name="name" value="<?=$object->name;?>" class="smallInput medium" /></td>
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
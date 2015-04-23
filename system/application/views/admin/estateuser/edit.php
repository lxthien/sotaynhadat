<div class="grid_15" id="textcontent"> 
    <form id="form" class="table_input" action="<?=$base_url;?>admin/estateusers/edit/<?=$object->id;?>" method="post">
    <table class="table_input">
        <tr>
            <td><label for="name">Username:</label></td>
            <td><input type="text" name="username" value="<?=$object->username;?>" class="smallInput medium" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><label for="name">Email:</label></td>
            <td><input type="text" name="email" value="<?=$object->email;?>" class="smallInput medium" disabled="disabled" /></td>
        </tr>
        <tr><td>&nbsp;</td><td><label for="name">Thêm/ sửa</label></td></tr>
        <tr>
            <td><label for="name">Tên thành viên:</label></td>
            <td><input type="text" name="name" value="<?=$object->name;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Điện thoại cố định:</label></td>
            <td><input type="text" name="mobilePhone" value="<?=$object->mobilePhone;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Điện thoại di động:</label></td>
            <td><input type="text" name="mobile" value="<?=$object->mobile;?>" class="smallInput medium" /></td>
        </tr>
        <tr>
            <td><label for="name">Reset mật khẩu:</label></td>
            <td><input type="checkbox" name="resetPassword" value="1"/></td>
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
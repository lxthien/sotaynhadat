<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<div class="grid_15" id="textcontent">
    <form id="form" class="table_input" enctype="multipart/form-data" action="<?=$base_url;?>admin/showrooms/edit/<?=$object->id;?>" method="post">
        <label for="name">Tên(Tiếng Việt):</label>
        <input type="text" name="name_vietnamese" value="<?=$object->name_vietnamese;?>" class="smallInput wide" />
        <label for="name">Tên(Tiếng Anh):</label>
        <input type="text" name="name_english" value="<?=$object->name_english;?>" class="smallInput wide" />
        <label for="name">Thể loại:</label>
        <select name="kind" class="smallInput wide" id="">
            <option <?php if($object->kind == 1) echo 'selected="selected"'; ?> value="1">Nhà xưởng</option>
            <option <?php if($object->kind == 2) echo 'selected="selected"'; ?> value="2">Showroom</option>
        </select>
        <label for="name"><img src="<?=$base_url.$object->image?>" width="80" alt=""/></label>
        <label for="name">Hình đại diện:</label>
        <input type="file" name="image" value="<?=$object->image;?>" class="smallInput wide" />
        <label for="name">Keyword:</label>
        <input type="text" name="keyword" value="<?=$object->keyword;?>" class="smallInput wide" />
        <?php if($object->id == 3):?>
            <label for="name">Video youtube:</label>
            <input type="text" name="video" value="<?=$object->video;?>" class="smallInput wide" />
        <?php endif; ?>
        <label for="name">Mô tả:</label>
        <textarea name="description" class="smallInput wide"><?=$object->description;?></textarea>
        <label for="name">Mô tả chi tiết(Tiếng Việt):</label>
        <textarea name="txtDescription_vietnamese" class="smallInput wide"><?=$object->txtDescription_vietnamese;?></textarea>
        <script type="text/javascript">
            editor_<?=$row_lang->short;?>=CKEDITOR.replace( 'txtDescription_vietnamese',
                {
                    toolbar : [
                        ['Source', '-', 'Cut', 'Copy', 'Paste', '-', 'TextColor', 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', 'Outdent', 'Indent', '-', 'Link', 'Unlink', 'Anchor', '-' ],
                        ['Styles', 'Format', 'Font', 'FontSize', '-', 'Image', 'Flash', 'Table', 'HorizontalRule','MediaEmbed','flvPlayer']],
                    height:300,
                    filebrowserBrowseUrl : '<?=$base_url;?>resource/kfm/'
                });
        </script>
        <label for="name">Mô tả chi tiết(Tiếng Anh):</label>
        <textarea name="txtDescription_english" class="smallInput wide"><?=$object->txtDescription_english;?></textarea>
        <script type="text/javascript">
            editor_<?=$row_lang->short;?>=CKEDITOR.replace( 'txtDescription_english',
                {
                    toolbar : [
                        ['Source', '-', 'Cut', 'Copy', 'Paste', '-', 'TextColor', 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', 'Outdent', 'Indent', '-', 'Link', 'Unlink', 'Anchor', '-' ],
                        ['Styles', 'Format', 'Font', 'FontSize', '-', 'Image', 'Flash', 'Table', 'HorizontalRule','MediaEmbed','flvPlayer']],
                    height:300,
                    filebrowserBrowseUrl : '<?=$base_url;?>resource/kfm/'
                });
        </script>
        <label for="name">Danh sách hình ảnh:</label>
        <?php foreach($photos as $row): ?>
        <label for="name">
            <img src="<?=$base_url.$row->image?>" alt="<?=$row->name;?>" width="80" height="80"/>
            <a href="<?=$this->admin_url.'showroomphotos/delete/'.$row->id; ?>">Xóa hình ảnh</a>
        </label>
        <?php endforeach ?>
        </tr>
        <div class="button_bar">
            <?php create_form_button('submit_button button_ok','Lưu dữ liệu');?>
            <div class="clear"></div>
        </div>
    </form>
</div>
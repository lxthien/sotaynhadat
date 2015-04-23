<div class="grid_15" id="textcontent">             	
         <form id="frm" class="table_input" action="<?=$base_url;?>admin/banners/edit/<?=$banner->bannercat_id;?>/<?php echo $banner->id != '' ? $banner->id : 0; ?>" method="post" enctype="multipart/form-data">
                        <table class="table_input">
                            <tr>
                             	<td>
                        			<label for="name">File đã nhập:</label></td>
                                <td>
                                <?php
                                    if (strpos($banner->image, 'swf')) {
                                        $sizeFlash = getimagesize($base_url.$banner->image);
                                ?>
                                        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                                                codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
                                                width="355" height="<?php echo (355*$sizeFlash[1])/$sizeFlash[0]; ?>" >
                                            <param name="movie" value="<?php echo $base_url.$banner->image; ?>" />
                                            <embed src="<?php echo $base_url.$banner->image; ?>"
                                                   width="355" height="<?php echo (355*$sizeFlash[1])/$sizeFlash[0]; ?>"
                                                   name="mymoviename" type="application/x-shockwave-flash"
                                                   pluginspage="http://www.macromedia.com/go/getflashplayer">
                                            </embed>
                                        </object>
                                <?php } else {?>
                                    <img src="<?=image($banner->image,'product_cart')?>" />
                                <?php } ?>
                            </tr>
                            <tr id="fileupload">
                             	<td>
                        			<label for="name">Chọn hình:</label></td>
                                <td><input type="file" name="image" class="smallInput medium" /></td>
                            </tr>
                            <tr>
                             	<td><label for="title">Tên:</label></td>
                                <td><input type="text" name="name" class="smallInput medium" value="<?=$banner->name?>" /></td>
                            </tr>
                            <tr>
                                <td><label for="title">Nội dung:</label></td>
                                <td><textarea name="content" id="" cols="30" rows="10" class="smallInput medium"><?=$banner->content?></textarea></td>
                            </tr>
                            <tr>
                             	<td>
                        			<label for="title">Link:</label></td>
                                <td><input type="text" name="link" class="smallInput medium" value="<?=$banner->link?>" /></td>
                            </tr>
                            <!--
                            <tr>
                             	<td>
                        			<label for="title">Rộng(dành cho banner flash):</label></td>
                                <td><input type="text" name="width" class="smallInput medium" value="<?=$banner->width?>" /></td>
                            </tr>
                            <tr>
                             	<td>
                        			<label for="title">Cao(dành cho banner flash):</label></td>
                                <td><input type="text" name="height" class="smallInput medium" value="<?=$banner->height?>" /></td>
                            </tr>
                            -->
                        </table>
                        <div class="button_bar"><?php create_form_button('submit_button button_save','Save');?></div>
       	<div style="padding-top:50px;"></div>
		</form>
</div>
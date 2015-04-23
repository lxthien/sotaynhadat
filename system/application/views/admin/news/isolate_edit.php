<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>images/js/jquery.blockUI236.js"></script>
<!--facy box-->
<script type="text/javascript" src="<?= $base_url?>js/main.js"></script>
<!--facy box-->
<script type="text/javascript" language="javascript">
function show_copy()
{
			$.blockUI({message: $('#copy_box'),
							css:{
								width: $('#copy_box').css('width'),							
								left: ((screen.width - 300) / 2) + 'px',					
								cursor:'default',
								border:  '3px solid #aaa' 
							
							},
							overlayCSS:  { 
								cursor:'default'
							}
			});  
			$('.blockOverlay').attr('title', 'Close').click($.unblockUI);
}
function getcontent()
{
	return editor_vietnamese.getData();
}
	$().ready(function(){
	   
       var i = 1;
       $(".addImage").live('click',function(){
            i++;
            var tr_item =$('<tr>'
             	+'<td style="width: 125px;"><label for="name">Hình slide (600 x 400 px):</label></td>'
                +'<td style="width: 125px;"><input type="file" name="image'+i+'"  /></td>'
                +'<td style="width: 100px;"><input type="text" name="name'+i+'" /></td>'
                +'<td><a href="" class="addImage">Thêm hình</a> | <a href="" class="deleteImage">Xóa</a></td>'
                +'<input type="hidden" value="'+i+'" name="numfile[]" /></tr>');
            $(".addslide").append(tr_item);
            return false;
       });
       $(".deleteImage").live('click',function(){
            $(this).parents("tr").remove();
            return false;
       });
       
       
		$('#fileupload').hide();
        $('#newbanner').attr("checked",false);
		$('#newbanner').click(function(){
			if($(this).prop("checked")== false)
				$('#fileupload').hide();
			else
				$('#fileupload').show();
		});
		//$('#container_language').tabs();
		//$('.container_gioithieu').tabs();
		
		$('#form').submit(function (){
			var title=$(':text[name="title"]').val();
			var tag=$(':text[name="tag"]').val();
			var im=$(':file[name="image"]').val();
		
			if(title=="")
			{
					alert("Vui lòng nhập tiêu đề");
					return false;
			}
			if($('#newbanner').attr('checked')==true)
			{
				if(im=="")
				{
						alert("Vui lòng nhập hình đại diện");
						return false;
				}
				else
				{
						len=im.length;
						dot_position=im.lastIndexOf(".");
						tag_file=im.substring(dot_position+1,len);
						tag_list="jpg gif png JPG GIF PNG";
						if(tag_list.indexOf(tag_file)==-1)
						{
								alert("tagfile:"+tag_file+"Hình đại diện chỉ thuộc 1 trong kiểu file : jpg,gif,png");
								return false;
						}			
				}
			}
			
			if(editor_vietnamese.getData()=="")
			{
					alert("Vui lòng nhập nội dung đầy đủ");
					return false;
			}
			
			return true;
			
		});
	//show block ui	
		$('.xemtruoc').each(function (){
			$(this).click(function(){
		
			var news_title=$('input[name="title_vietnamese"]').val();
			var news_content= getcontent();
			$('.title-news').text(news_title);
			$('.content-news').html(news_content);
			$.blockUI({message: $('#review_box'),
							css:{
								width: $('#review_box').css('width'),
								top: '2%',
								left: ((screen.width - 750) / 2) + 'px',
								top: '2%',
								cursor:'default',
								border:  '3px solid #aaa' 
							
							},
							overlayCSS:  { 
								cursor:'default'
							}
			});  
			$('.blockOverlay').attr('title', 'Close').click($.unblockUI);

		});
		});
		
	});
	
</script>
<style type="text/css">
#review_box{
	width:690px;
	display:none;
	height:500px;
	overflow:auto;
	padding:15px;
}
.news-sub-left{
	width:658px;
	margin:0 auto;
	background-color:#FFF;
	display:inline;
}
.news-box-content{
	width:642px;
	height:inherit;
	border-top:0;
}
.title-news{
	color:#000000;
	font-family:Times New Roman;
	font-size:20px;
	font-weight:bold;
	padding-bottom:20px;
}
.news-box{
	width:650px;
	border:1px #6aa511 solid;
}
input[type="text"] {
		display:inherit !important;
	}
	form label {
	display:inherit !important;
	}
	.error{
		color:red;
	}
	.success{
		color:#0F0;
	}

    /*.cke_dialog_tab{
        display: inline-block !important;
    }
    .cke_dialog_ui_file{
        height: 315px !important;
    }
    .cke_dialog_ui_labeled_content{
        height: 315px !important;
    }*/
</style>

<div class="grid_15" id="textcontent">
    <form id="form" class="table_input" action="<?=$base_url;?>admin/cnews/isolate_edit/<?=$currentcatalogue->id;?>/<?php echo $object->id==''?0:$object->id; ?>" method="post" enctype="multipart/form-data">
        <table class="table_input">
            <tr >
                <td>
                    <label for="name">Danh mục:<span style="color:red">*</span></label></td>
                <td><select name="newscatalogue" class="smallInput big">
                        <?php foreach($newscatalogue as $row): ?>
                            <option value="<?=$row->id;?>" <?php if($row->id==$currentcatalogue->id) echo 'selected="selected"';?> ><?php echo $row->name_vietnamese;?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Hình đại diện<span style="color:red">*</span></label></td>
                <td><img src="<?=image($object->dir.$object->image,'news_160');?>" width="127" /></td>
            </tr>
            <input type="hidden" name="imagelink" value="<?=$object->image;?>" />
            <input type="hidden" name="dir" value="<?=$object->dir;?>" />
            <tr >
                <td>
                    <label for="name">Chọn đại diện:</label></td>
                <td><input type="file" name="image" class="smallInput medium" /></td>
            </tr>
            <tr>
                <td>
                    <label for="name">Tags:</label></td>
                <td><input type="text" name="tag" class="smallInput big" value="<?=$object->tag;?>" /></td>
            </tr>
            <?php
                if(
                    $currentcatalogue->id != 84 &&
                    $currentcatalogue->id != 85 &&
                    $currentcatalogue->id != 86 &&
                    $currentcatalogue->id != 87 &&
                    $currentcatalogue->id != 88 &&
                    $currentcatalogue->id != 89
                ):
                ?>
            <tr>
                <td>
                    <label for="name">Nguồn tin:</label></td>
                <td><input type="text" name="source" class="smallInput big" value="<?=$object->source;?>" /></td>
            </tr>
                <?php endif; ?>
            <tr>
                <td><label for="name">Tin nổi bật:</label></td>
                <td><input <?php if($object->hot ==1) echo 'checked="checked"' ?> type="checkbox" name="hot" value="1" /></td>
            </tr>
            <tr>
                <td><label for="name">Tin nổi bật (Trang chủ):</label></td>
                <td><input <?php if($object->hotHome ==1) echo 'checked="checked"' ?> type="checkbox" name="hotHome" value="1" /></td>
            </tr>
        <?php
            if(
                $currentcatalogue->id == 84 ||
                $currentcatalogue->id == 85 ||
                $currentcatalogue->id == 86 ||
                $currentcatalogue->id == 87 ||
                $currentcatalogue->id == 88 ||
                $currentcatalogue->id == 89
            ):
        ?>
            <tr>
                <td><label for="name">Tỉnh/Thành phố:</label></td>
                <td>
                    <select name="estatecity_id" id="estatecity_id" class="smallInput big">
                        <option value="">--- Chọn Tỉnh/ Thành phố ---</option>
                        <?php foreach($estatecity as $row): ?>
                            <option <?php if($object->estatecity_id == $row->id) echo 'selected="selected"'; ?> value="<?=$row->id?>"><?=$row->name;?></option>
                        <?php endforeach; unset($row); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="name">Quận/Huyện:</label></td>
                <td>
                    <input type="hidden" name="estatedistrict_selected" value="<?=$object->estatedistrict_id?>"/>
                    <select name="estatedistrict_id" id="estatedistrict_id" class="smallInput big">
                        <option value="">--- Chọn Quận / Huyện ---</option>
                    </select>
                </td>
            </tr>
            <!--<tr>
                <td><label for="name">Loại dự án:</label></td>
                <td>
                    <select name="estatetype_id" id="estatetype_id" class="smallInput big">
                        <option value="">--- Chọn Loại dự án ---</option>
                        <?php /*foreach($estatecate as $row):
                            $estatetype = new Estatetype();
                            $estatetype->order_by('position', 'asc');
                            $estatetype->where('estatecatalogue_id', $row->id);
                            $estatetype->get();
                            */?>
                            <option disabled="disabled" value=""><?/*=$row->name;*/?></option>
                            <?php /*foreach($estatetype as $rowType): */?>
                                <option <?php /*if($object->estatetype_id == $rowType->id) echo 'selected="selected"'; */?> value="<?/*=$rowType->id;*/?>">..........<?/*=$rowType->name;*/?></option>
                            <?php /*endforeach; unset($rowType); */?>
                        <?php /*endforeach; unset($row); */?>
                    </select>
                </td>
            </tr>-->
            <tr>
                <td><label for="name">Vốn đầu tư:</label></td>
                <td><input type="text" name="equity" class="smallInput big" value="<?=$object->equity;?>" /></td>
            </tr>
            <tr>
                <td><label for="name">Thời gian khởi công:</label></td>
                <td><input type="text" name="timeStart" class="smallInput big" value="<?=$object->timeStart;?>" /></td>
            </tr>
            <tr>
                <td><label for="name">Thời gian hoàn thành:</label></td>
                <td><input type="text" name="timeCompleted" class="smallInput big" value="<?=$object->timeCompleted;?>" /></td>
            </tr>
            <tr>
                <td><label for="name">Chủ đầu tư:</label></td>
                <td><input type="text" name="investors" class="smallInput big" value="<?=$object->investors;?>" /></td>
            </tr>
        <?php endif; ?>
        </table>
        <div id="container_language" style="margin-top:10px;">
        	<?php foreach($sitelanguage as $row_lang):?>  
          	<div id="<?=$row_lang->short;?>">  
                <table class="table_input">
					<tr>
						<td width="120;">
							<label for="name">Tiêu đề (<?=$row_lang->name?>):<span style="color:red">*</span></label></td>
						<td>
                            <textarea name="title_<?=$row_lang->short;?>" class="smallInput big" ><?=$object->{"title_".$row_lang->short};?></textarea></td>
					</tr>
                    <tr>
                     	<td>
                			<label for="name">Description (<?=$row_lang->name?>):</label></td>
                        <td><textarea style="height: 70px;" name="short_<?=$row_lang->short;?>" class="smallInput big"><?=$object->{"short_".$row_lang->short}?></textarea></td>
                    </tr>
                </table>
                <div class="container_gioithieu" style="margin-top:10px;">
					<!--
					<ul>
						<li ><a href="#full_<?//=$row_lang->short;?>"><span>Full</span></a></li>     
					</ul>
					-->
					<div id="full_<?=$row_lang->short;?>">
						<div><textarea  name="txtFull_<?=$row_lang->short;?>"><?php echo $object->{'full_'.$row_lang->short};?></textarea>
							<script type="text/javascript">
								editor_<?=$row_lang->short;?>=CKEDITOR.replace( 'txtFull_<?=$row_lang->short;?>',
								{
									toolbar : [ 
									['Source', '-', 'Cut', 'Copy', 'Paste', '-', 'TextColor', 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', 'Outdent', 'Indent', '-', 'Link', 'Unlink', 'Anchor', '-' ],
									['Styles', 'Format', 'Font', 'FontSize', '-', 'Image', 'Flash', 'Table', 'HorizontalRule','MediaEmbed','flvPlayer']],
									height:500,
									filebrowserBrowseUrl : '<?=$base_url;?>resource/kfm/',
                                    filebrowserUploadUrl : '<?=$base_url;?>resource/uploadcode/ckupload.php'
								});
							</script>
						</div> 
					</div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
        <div class="clear"></div>
    <div class="button_bar">
    <br /><br />
    <?php create_form_button('button xemtruoc','Xem trước');?>
    <?php create_form_button('submit_button button_ok','Save');?>
    <?php create_form_button('reset_button button_notok','Reset');?>
    </div>
    </form>
</div>
<div id="review_box" style="display:none;">
	<div class="news-sub-left" >
		<div class="news-box" style="height:auto;">
			<div class="news-box-content" style="height:auto;padding-top:5px;">
				<div class="title-news" style="text-align:left;"></div>
				<div class="content-news" style="text-align:left;"></div>
			
			</div>
		</div>
	</div>
</div>
<div id="copy_box" style="display:none">
	<?php if($object->exists()) $this->load->view('admin/news/copy_form');?>
</div>

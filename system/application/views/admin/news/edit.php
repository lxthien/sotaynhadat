<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>images/js/jquery.blockUI236.js"></script>
<script type="text/javascript">
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
		$('#fileupload').hide();
		$('#newbanner').click(function(){
			if($(this).attr("checked")==false)
				$('#fileupload').hide();
			else
				$('#fileupload').show();
		});
		$('#container_language').tabs();
		$('.container_gioithieu').tabs();
		
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
			if(tag=="")
			{
					alert("Vui lòng nhập Tag");
					return false;
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
</style>

<div class="grid_15" id="textcontent">
             	
                    <form id="form" class="table_input" action="<?=$base_url;?>admin/cnews/edit/<?=$currentcatalogue->id;?>/<?=$object->id;?>" method="post" enctype="multipart/form-data">
                    
                        <table class="table_input">
                        	                  
                            <tr >
                             	<td>
                        			<label for="name">Danh mục:</label></td>
                                <td><select name="newscatalogue" class="smallInput big">
								<?php foreach($newscatalogue as $row): ?>
                                <option value="<?=$row->id;?>" <?php if($row->id==$currentcatalogue->id) echo 'selected="selected"';?> ><?php echo $row->name_vietnamese;?></option>
                                <?php endforeach;?>
									</select>
								</td>
                            </tr>
                            <tr>
                            	<td><label>Hình đại diện</label></td>
                                <td><img src="<?=$object->dir.($object->old_id==1?$row->image:filenameplus($object->image,'medium'));?>" width="127" /></td>
                            </tr>
                            <input type="hidden" name="imagelink" value="<?=$object->image;?>" >
                            <input type="hidden" name="dir" value="<?=$object->dir;?>" >
                 			<tr>
                            	<td>Chọn hình :</td>
                                <td><input type="checkbox" id="newbanner" name="newimage"  value="1"/></td>
                            </tr>
                            <tr id="fileupload">
                             	<td>
                        			<label for="name">Chọn đại diện:</label></td>
                                <td><input type="file" name="image" class="smallInput medium" /></td>
                            </tr>
                           
                            <tr>
                             	<td>
                        			<label for="name">Tác giả:</label></td>
                                <td><input type="text" name="author" class="smallInput big" value="<?=$object->author;?>" /></td>
                            </tr>
                            <tr>
                             	<td>
                        			<label for="name">Tag:</label></td>
                                <td><input type="text"  class="smallInput big"  name="tag" value="<?=$object->tag;?>" /></td>
                            </tr>
                            <?php if($this->logged_in_user->adminrole->id  ==  1) { ?>
                                <tr>
                                    <td>
                                        <label for="name">Navigation:</label></td>
                                    <td><input type="text" name="navigation" class="smallInput big" value="<?=$object->navigation;?>" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="name">Menu active:</label></td>
                                    <td><input type="text"  class="smallInput big"  name="menu_active" value="<?=$object->menu_active;?>" /></td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <label for="name">Old:</label></td>
                                    <td><input type="checkbox" value="1" <?php if($object->old_id == 1) echo "checked";?> /></td>
                                </tr>
                            <?php } ?>
                          
                            <tr>
                            	<td><label for="parent"> Topic: </label> </td>
                                <td><select name="newstopic" class="smallInput big" >
                                            <option value="0">No-topic</option>
                                        <?php foreach($newstopic as $row) : ?>
                                            <option value="<?=$row->id;?>" <?php if($row->id==$object->newstopic_id) echo 'selected="selected"';?>><?php echo $row->name;?></option>
                                        <?php endforeach;?>
                                        </select></td>
                            </tr>
                        </table>
                   <div id="container_language" style="margin-top:10px;">
                                        <ul>
                                         <?php foreach($sitelanguage as $row_lang):?>  
                                            <li ><a href="#<?=$row_lang->short;?>"><span><?=$row_lang->name;?></span></a></li>     
                                         <?php endforeach;?>
                                        </ul>
                                   
										  <?php foreach($sitelanguage as $row_lang):?>  
                                          	 <div id="<?=$row_lang->short;?>">  
                                                    <table class="table_input">
                                                     <tr>
                                                                <td>
                                                                    <label for="name">Tiêu đề:</label></td>
                                                                <td><input type="text" name="title_<?=$row_lang->short;?>" class="smallInput big" value="<?=$object->{"title_".$row_lang->short};?>" /></td>
                                                            
                                                      </tr>
                                                      </table>   
                                                    <div class="container_gioithieu" style="margin-top:10px;">
                                                                <ul>
                                                                    <li ><a href="#full_<?=$row_lang->short;?>"><span>Full</span></a></li>     
                                                                    <li ><a href="#short_<?=$row_lang->short;?>"><span>Short</span></a></li>  
                                                                </ul>
                                                                <div id="full_<?=$row_lang->short;?>">
                                                                            
                                                                        <div><textarea  name="txtFull_<?=$row_lang->short;?>"><?php echo $object->{'full_'.$row_lang->short};?></textarea>
                                                                       <script type="text/javascript">
                                                                            //<![CDATA[
                                                            
                                                                                // This call can be placed at any point after the
                                                                                // <textarea>, or inside a <head><script> in a
                                                                                // window.onload event handler.
                                                            
                                                                                // Replace the <textarea id="editor"> with an CKEditor
                                                                                // instance, using default configurations.
                                                                                editor_<?=$row_lang->short;?>=CKEDITOR.replace( 'txtFull_<?=$row_lang->short;?>',
                                                                                                  {
                                                                                                        toolbar : 'Full',
                                                                                                        height:500,
                                                                                                         filebrowserBrowseUrl : '<?=$base_url;?>resource/kfm/'
                                                                                                         
                                                                                                         
                                                                                                    });
                                                                                
                                                            
                                                            
                                                                            //]]>
                                                                        </script>
                                                                        </div> 
                                                                      
                                                                 
                                                                </div>
                                                                <div id="short_<?=$row_lang->short;?>">
                                                                        
                                                                        <div align="center"><textarea  name="txtShort_<?=$row_lang->short;?>" class="smallInput" style="height:500px;width:99%" ><?php echo $object->{'short_'.$row_lang->short};?></textarea>
                                                                      
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

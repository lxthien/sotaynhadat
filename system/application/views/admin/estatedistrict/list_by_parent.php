<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
    <form name="myform" id="myform" method="post" >
    <input type="hidden" name="city_id" value="<?=$this->uri->segment(4,0)?>" />
    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
		<thead>
			<tr>
            	<th width="50">Số thứ tự</th>
            	<th width="500">Quận/Huyện</th>
            	<th width="50"><div align="center">Công cụ</div></th>
                <th width="100"><div align="center">Vị trí</div></th>
            </tr>
		</thead>
		<tbody>
			<?php $i=$this->uri->segment(5,0);foreach($districts as $row):$i++;?>
            <tr>
                <td><div align="center"><?=$i?></div></td>
                <td><a href="<?=$base_url?>admin/estatewards/list_by_parent/<?=$row->id?>"><?=$row->name?></a></td>
                <td>
                    <?php
                        echo create_link_table('edit_icon',$base_url.'admin/estatedistricts/edit_by_parent/'.$city->id.'/'.$row->id,'edit');
                        echo create_link_table('delete_icon',$base_url.'admin/estatedistricts/delete_by_parent/'.$city->id.'/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                    ?>
                </td>
                <td>
                    <div align="center">
                        <input type="text" style="width:50px;" value="<?=$row->position;?>" name="position_<?=$row->id;?>" />
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">
                    <div style="float:right;"><?php create_form_button('submit_button button_ok','Cập nhật');?></div>
                </td>
            </tr>            
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
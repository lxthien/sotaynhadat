<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
    <form name="myform" id="myform" method="post" action="<?=$base_url;?>admin/estatetypes/updatePosition" >
    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
		<thead>
			<tr>
            	<th width="50">Số thứ tự</th>
            	<th width="400">Loại</th>
            	<th width="100">Position</th>
            	<th width="50"><div align="center">Action</div></th>
            </tr>
		</thead>
		<tbody>
			<?php $i=$this->uri->segment(5,0);foreach($types as $row):$i++;?>
            <tr>
                <td><div align="center"><?=$i?></div></td>
                <td><?=$row->name?></td>
                <td>
                    <input type="hidden" name="idList[]" value="<?=$row->id;?>" />
                    <div align="left"><input type="text" name="positionList[]" style="width: 40px;" value="<?=$row->position;?>" /></div>
                </td>
                <td>
                    <?php
                        echo create_link_table('edit_icon',$base_url.'admin/estatetypes/edit_by_parent/'.$catalogue->id.'/'.$row->id,'edit');
                        echo create_link_table('delete_icon',$base_url.'admin/estatetypes/delete_by_parent/'.$catalogue->id.'/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2">
                    <?php echo $this->pagination->create_links();?>
                </td>
                <td colspan="2">
                    <?php if(!$isSearch) { ?>
                        <div align="left"><input type="submit" name="update" value="Update" /></div>
                    <?php } ?>
                </td>
            </tr>            
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
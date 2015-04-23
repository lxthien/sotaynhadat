<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
    <form name="myform" id="myform" method="post" >
    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
		<thead>
			<tr>
            	<th width="50">Số thứ tự</th>
            	<th width="500">Loại</th>
            	<th width="50"><div align="center">Action</div></th>
            </tr>
		</thead>
		<tbody>
			<?php $i=$this->uri->segment(4,0);foreach($types as $row):$i++;?>
            <tr>
                <td><div align="center"><?=$i?></div></td>
                <td><?=$row->name?></td>
                <td>
                    <?php
                        echo create_link_table('edit_icon',$base_url.'admin/estatetypes/edit/'.$row->id,'edit');
                        echo create_link_table('delete_icon',$base_url.'admin/estatetypes/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">
                    <?php echo $this->pagination->create_links();?>
                </td>
            </tr>            
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
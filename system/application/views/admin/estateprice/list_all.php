<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
    <form name="myform" id="myform" method="post" action="<?=$base_url;?>admin/estateprices/updatePosition" >
    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
		<thead>
			<tr>
            	<th width="50">Số thứ tự</th>
            	<th width="150"><?=$menu_active?></th>
                <th width="100"><div align="right">Từ</div></th>
                <th width="100"><div align="right">Đến</div></th>
                <th width="80"><div align="right">Vị trí</div></th>
            	<th width="50"><div align="center">Action</div></th>
            </tr>
		</thead>
		<tbody>
            <?php foreach($estatecatalogues as $row_parent):?>
            <tr>
                <td><div align="center"></div></td>
                <td><?=$row_parent->name?></td>
                <td><div align="right"></div></td>
                <td><div align="right"></div></td>
                <td width="80"><div align="right"></div></td>
                <td><div align="center"></div></td>
            </tr>
    			<?php $i=$this->uri->segment(4,0);foreach($prices as $row):$i++;
                    if($row->estatecatalogue_id == $row_parent->id) {
                ?>
                <tr>
                    <td><div align="center"><?=$i?></div></td>
                    <td>..........<?=$row->label?></td>
                    <td><div align="right"><?=number_format($row->from)?> VND</div></td>
                    <td><div align="right"><?=number_format($row->to)?> VND</div></td>
                    <td>
                        <div align="center">
                            <input type="hidden" name="idList[]" value="<?=$row->id;?>" />
                            <div align="center"><input type="text" name="positionList[]" style="width: 40px;" value="<?=$row->position;?>" /></div>
                        </div>
                    </td>
                    <td><div align="center">
                        <?php
                            echo create_link_table('edit_icon',$base_url.'admin/estateprices/edit/'.$row->id,'edit');
                            echo create_link_table('delete_icon',$base_url.'admin/estateprices/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                        ?></div>
                    </td>
                </tr>
                <?php } endforeach; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">
                    <?php echo $this->pagination->create_links();?>
                </td>
                <td colspan="2">
                    <?php if(!$isSearch) { ?>
                        <div align="center"><input type="submit" name="update" value="Update" /></div>
                    <?php } ?>
                </td>
            </tr>             
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
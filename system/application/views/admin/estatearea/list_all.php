<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
    <form name="myform" id="myform" method="post" action="<?=$base_url;?>admin/estateareas/updatePosition" >
        <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
                <tr>
                    <th width="50">Số thứ tự</th>
                    <th width="200"><?=$menu_active?></th>
                    <th width="100">Từ</th>
                    <th width="100">Đến</th>
                    <th width="100">Vị trí</th>
                    <th width="50"><div align="center">Action</div></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=$this->uri->segment(4,0);foreach($areas as $row):$i++;?>
                <tr>
                    <td><div align="center"><?=$i?></div></td>
                    <td><?=$row->label?></td>
                    <td><?=$row->from?> m<sup>2</sup></td>
                    <td><?=$row->to?> m<sup>2</sup></td>
                    <td>
                        <input type="hidden" name="idList[]" value="<?=$row->id;?>" />
                        <div align="center"><input type="text" name="positionList[]" style="width: 40px;" value="<?=$row->position;?>" /></div>
                    </td>
                    <td>
                        <?php
                            echo create_link_table('edit_icon',$base_url.'admin/estateareas/edit/'.$row->id,'edit');
                            echo create_link_table('delete_icon',$base_url.'admin/estateareas/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                        ?>
                    </td>
                </tr>
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
     
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
            	<th width="50"><div align="center">TT</div></th>
            	<th width="500">Tên</th>
            	<th width="50"><div align="center">Action</div></th>
            </tr>
		</thead>
		<tbody>
			<?php $i=$this->uri->segment(4,0);foreach($catalogues as $row): $i++;

                ?>
            <tr>
                <td><div align="center"><?=$i?></div></td>
                <td><a href="<?=$base_url?>admin/lands/list_by_parent/<?=$row->id?>"><?=$row->name?></a></td>
                <td>
                    <div align="center">
                        <?php
                            echo create_link_table('edit_icon',$base_url.'admin/landcategories/edit/'.$row->id,'Sửa');
                        ?>
                    </div>
                </td>
            </tr>
            <?php
                foreach($estatesCatalogue as $rowSub):
                    if($rowSub->parentcat_id == $row->id):
                ?>
                <tr>
                    <td><div align="center"><?=$i?></div></td>
                    <td><a href="<?=$base_url?>admin/estatetypes/list_by_parent/<?=$row->id?>">...........<?=$rowSub->name?></a></td>
                    <td>
                        <?php
                        echo create_link_table('edit_icon',$base_url.'admin/estatecatalogues/edit/'.$rowSub->id,'edit');
                        ?>
                    </td>
                </tr>
            <?php endif; endforeach; endforeach; ?>
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
     
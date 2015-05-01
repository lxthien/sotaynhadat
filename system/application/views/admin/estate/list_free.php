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
            	<th width="50"><div align="right">Mã tin</div></th>
            	<th width="50"><div align="left"><input type="text" name="searchKey" id="searchKey" value="" class="input medium" /></div></th>
            </tr>
		</thead>
		<tbody>
            <tr>
            	<td width="50"></td>
            	<td width="50"><div align="left"><input type="submit" name="btnSubmit" value="Tìm kiếm" /></div></td>
            </tr>             
		</tbody>
	</table>
    </form>
</div>
<div class="portlet-content nopadding">
    <form name="myform" id="myform" method="post" >
    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
		<thead>
			<tr>
            	<th width="20">TT</th>
            	<th width="30"><div align="center">Mã tin</div></th>
                <th width="120"><?=$menu_active?></th>
                <th width="80">Menu</th>
                <th width="80">Phone</th>
            	<th width="80"><div align="center">Active</div></th>
            	<th width="50"><div align="center">Vip</div></th>
            	<th width="50"><div align="center">CC</div></th>
                <th width="50"><div align="center">Ngày tạo</div></th>
                <th width="50"><div align="center">Công cụ</div></th>
            </tr>
		</thead>
		<tbody>
			<?php $i=$this->uri->segment(4,0);foreach($estates as $row):$i++;?>
            <tr>
                <td><div align="center"><?=$i?></div></td>
                <td>
                    <div align="center">
                        <?=$row->code?>
                    </div>   
                </td>
                <td><?=$row->title?> <?php if($row->photo != null): ?><img title="Có hình đại diện" src="<?php echo base_url().'images/iconcamera.png'; ?>"/><?php endif; ?> <?php if ($row->article_id > 0): ?><img title="Có dự án" style="width: 15px;" src="<?php echo base_url().'images/projects.png'; ?>"/><?php endif; ?></td>
                <td><?=$row->estatetype->name; ?></td>
                <td><?=$row->mobile_contact; ?></td>
                <td>
                    <div align="center">
                        <?php if($row->active==0)
                            echo create_link_table('approve_icon',$this->admin_url.'estates/active/'.$row->id,'Vô hiệu');
                        else
                            echo create_link_table('reject_icon',$this->admin_url.'estates/active/'.$row->id,'Kích hoạt');
                        ?>
                    </div>
                </td>
                <td>
                    <div align="center">
                        <?php if($row->isVip==1)
                            echo create_link_table('approve_icon',$this->admin_url.'estates/hot/'.$row->id,'Vô hiệu');
                        else
                            echo create_link_table('reject_icon',$this->admin_url.'estates/hot/'.$row->id,'Kích hoạt');
                        ?>
                    </div>
                </td>
                <td>
                    <div align="center">
                        <?php if($row->isReals==1)
                            echo create_link_table('approve_icon',$this->admin_url.'estates/reals/'.$row->id,'Vô hiệu');
                        else
                            echo create_link_table('reject_icon',$this->admin_url.'estates/reals/'.$row->id,'Kích hoạt');
                        ?>
                    </div>
                </td>
                <td>
                    <div align="center">
                        <?=date('d/m/y',strtotime($row->created))?>
                    </div>   
                </td>
                <td>
                    <div align="center">
                    <?php
                        echo create_link_table('edit_icon',$base_url.'admin/estates/editFree/'.$row->id,'edit');
                        echo create_link_table('delete_icon',$base_url.'admin/estates/delete/'.$row->id.'/free/list','delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                    ?>
                    </div>
                </td>
                
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="10">
                    <?php echo $this->pagination->create_links();?>
                </td>
            </tr>             
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
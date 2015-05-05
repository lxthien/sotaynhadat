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
            	<th width="20">TT</th>
            	<th width="80"><?=$menu_active?></th>
            	<th width="80"><div align="center">Điện thoại</div></th>
                <th width="80"><div align="center">Di động</div></th>
                <th width="80"><div align="left">Email</div></th>
                <!--<th width="50"><div align="center">Vip</div></th>-->
                <th width="50"><div align="center">Tổng số tin</div></th>
                <th width="50"><div align="center">Công cụ</div></th>
            </tr>
		</thead>
		<tbody>
			<?php $i=$this->uri->segment(4,0);foreach($estateusers as $row):$i++;?>
            <tr>
                <td><div align="center"><?=$i?></div></td>
                <td><a href="<?php echo $this->admin_url.'estateusers/listEstates/'.$row->id; ?>" title="Xem danh sách tin đã đăng"><?=$row->firstname.' '.$row->name;?></a></td>
                <td>
                    <div align="center">
                        <?=$row->mobilePhone; ?>
                    </div>   
                </td>
                <td>
                    <div align="center">
                        <?=$row->mobile; ?>
                    </div>   
                </td>
                <td>
                    <div align="left">
                        <?=$row->email?>
                    </div>   
                </td>
                <!--
                <td>
                    <div align="center">
                        <select name="">
                            <option value="0">Không</option>
                            <option value="1">1 Tin</option>
                            <option value="3">3 Tin</option>
                            <option value="5">5 Tin</option>
                            <option value="10">10 Tin</option>
                        </select>
                    </div>
                </td>
                -->
                <td>
                    <div align="center">
                        <?=$row->estate->where('estateuser_id', $row->id)->get()->result_count();?>
                    </div>
                </td>
                <td>
                    <div align="center">
                    <?php
                    if($row->active==1)
                        echo create_link_table('approve_icon',$this->admin_url.'estateusers/active/'.$row->id,'Vô hiệu');
                    else
                        echo create_link_table('reject_icon',$this->admin_url.'estateusers/active/'.$row->id,'Kích hoạt');
                        echo create_link_table('edit_icon',$base_url.'admin/estateusers/edit/'.$row->id, 'edit');
                        echo create_link_table('delete_icon',$base_url.'admin/estateusers/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                    ?>
                    </div>
                </td>
                
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="7">
                    <?php echo $this->pagination->create_links();?>
                </td>
            </tr>             
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
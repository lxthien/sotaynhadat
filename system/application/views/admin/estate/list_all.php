<script type="text/javascript" src="<?= $base_url?>js/main.js"></script>
<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
    <form action="<?php echo $base_url.'admin/estates/search/'; ?>" name="myform" id="myform" method="get" >
        <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <tbody>
                <tr>
                    <td>
                        <div align="left">Mã tin</div>
                        <div align="left"><input style="width: 85px;" type="text" name="searchKey" id="searchKey" value="" class="input" /></div>
                    </td>
                    <td>
                        <div align="left">Chọn thành viên</div>
                        <select style="width: 145px;" class="fl estateuser_id" name="estateuser_id" id="estateuser_id">
                            <option value="">Chọn thành viên</option>
                            <?php foreach ($estateusers as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </td>
                    <td>
                        <div align="left">Hình thức</div>
                        <select style="width: 145px;" class="fl estatecatalogue_id" name="estatecatalogue_id" id="estatecatalogue_id">
                            <option value="">Chọn hình thức</option>
                            <option value="1">Nhà đất bán</option>
                            <option value="2">Nhà đất cho thuê</option>
                        </select>
                    </td>
                    <td>
                        <div align="left">Menu</div>
                        <select style="width: 145px;" class="fl estatetype_id" name="estatetype_id" id="estatetype_id">
                            <option value="">Chọn Phân mục</option>
                        </select>
                    </td>
                    <td>
                        <div align="left">Mức giá</div>
                        <select style="width: 145px;" class="fl estateprice_id" name="estateprice_id" id="estateprice_id">
                            <option value="">Chọn Mức giá</option>
                        </select>
                    </td>
                    <td>
                        <div align="left">Mức diện tích</div>
                        <select style="width: 145px;" class="fl estatearea_id" name="estatearea_id" id="estatearea_id">
                            <option value="">Chọn Mức diện tích</option>
                            <?php foreach ($estateareas as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->label; ?></option>
                            <?php endforeach; unset($row); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="50"></td>
                    <td colspan="4"><div align="left"><input type="submit" value="Tìm kiếm" /></div></td>
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
            	<th width="80"><div align="center">Thành viên</div></th>
            	<th width="50"><div align="center">Tin Vip</div></th>
            	<th width="50"><div align="center">Chính chủ</div></th>
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
                <td><?=$row->title?> <?php if($row->photo != null): ?><img title="Có hình đại diện" src="<?php echo base_url().'images/iconcamera.png'; ?>"/><?php endif; ?> <?php if($row->Estate_photo->result_count() > 0): ?><img title="Có danh sách hình slide" src="<?php echo base_url().'images/slides_stack.png'; ?>"/><?php endif; ?> <?php if ($row->article_id > 0): ?><img title="Có dự án" style="width: 15px;" src="<?php echo base_url().'images/projects.png'; ?>"/><?php endif; ?></td>
                <td><?=$row->estatetype->name?></td>
                <td>
                    <div align="center">
                        <a href="<?php echo $this->admin_url.'estateusers/listEstates/'.$row->estateuser->id; ?>"><?=$row->estateuser->where('id',$row->estateuser_id)->get()->name?></a>
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
                        echo create_link_table('edit_icon',$base_url.'admin/estates/edit/'.$row->id,'edit');
                        echo create_link_table('delete_icon',$base_url.'admin/estates/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                    ?>
                    </div>
                </td>
                
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="9">
                    <?php echo $this->pagination->create_links();?>
                </td>
            </tr>             
		</tbody>
	</table>
    </form>
</div>
</div>
</div>
     
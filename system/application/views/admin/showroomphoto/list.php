<?php $this->load->helper('get_date_from_sql');?>
<?php $this->session->set_flashdata(array('redirect_link'=>$this->uri->uri_string()));?>
<div id="portlets">
<div class="column"> 
</div>
<div class="portlet">
<div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
<div class="portlet-content nopadding">
<form name="myform" id="myform" method="post" >
   <?php $seg=$this->uri->segment(4,0);?>
	<table class="datatable" width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet" >
   	  <tr>
        <th width="3%"><div align="center">ID</div></th>
        <th width="8%"><div align="center"><input type="checkbox" name="checkall" value="" id="checkall" onclick="checkallinput('checkall','checkinput')"/></div></th>
        <th width="30%"><div align="left">Image</div></th>
        <th width="35%"><div align="left">Thông tin</div></th>
        <th width="15%"><div align="center">Hình đại diện</div></th>
        <th width="30%"><div align="center">Công cụ</div></th>
      </tr>
        <?php $i=$this->uri->segment(5,0); foreach($productphotos as $row):$i++;?>
        <tr>
            <td widtd="6%"><div align="center"><?=$i;?></div></td>
            <td><div align="center"><input type="checkbox" class="checkinput" value="<?=$row->id?>" name="checkinput[]" /></div></td>
            <td widtd="68%"><img width="100px" height="100px" src="<?=$base_url?>img/products/<?=$row->path;?>" alt="Hình" /></td>
            <td><div align="left">URL:img/products/sdsff<br />caption_vietnamese: <br />caption_english:</div></td>
            <td widtd="68%">
           		<div align="center"><?php
                                if($row->isDefault == 1) 
                                    echo create_link_table('approve_icon',$this->admin_url.'productphotos/setDefault/'.$row->id,'Chọn đại diện');
                                else
                                    echo create_link_table('reject_icon',$this->admin_url.'productphotos/setDefault/'.$row->id,'Tắt đại diện');?></div>
			</td>
            <td widtd="26%">
              <div align="center">
                <?php
					echo create_link_table('edit_icon',$this->admin_url.'productphotos/edit/'.$row->id,'Edit News');
					echo create_link_table('delete_icon',$this->admin_url.'productphotos/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")'); ?></div>		</td>
        </tr>	
        <?php endforeach;?>
        <tr class="footer">
            <td colspan="4">
                <?php echo create_link_table('delete_inline','javascript:void(0);','Xóa chọn','actionallinput("recycle","myform","'.$this->admin_url.'products/recycle/0/1","checkinput")','Delete all');?>
                <?php echo create_link_table('approve_inline','javascript:void(0);','Kích hoạt','actionallinput("active","myform","'.$this->admin_url.'products/active/0/1","checkinput")','Kích hoạt');?>
                <?php echo create_link_table('reject_inline','javascript:void(0);','Vô hiệu','actionallinput("deactive","myform","'.$this->admin_url.'products/active/0/0","checkinput")','Vô hiệu');?>
            </td>
            <td colspan="3" align="right">
                <!--  PAGINATION START  -->             
                <?php echo $this->pagination->create_links();?>
                <!--  PAGINATION END  -->       
          </td>
        </tr>
    </table>
    
                       

   	<div style="padding-top:20px;"></div>
</form>
</div>
</div>
</div>
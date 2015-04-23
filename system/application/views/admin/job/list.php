<?php $this->load->helper('get_date_from_sql');?>
<?php $this->session->set_flashdata(array('redirect_link'=>$this->uri->uri_string()));?>
<script type="text/javascript">
    $().ready(function(){
       copySpecDialog_init(); 
    });
</script>
<div id="portlets">
    <div class="column"></div>
     <div class="portlet">
        <div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" />Tìm kiếm</div>
        <div class="portlet-content nopadding">
            <form action="<?=$base_url;?>admin/jobs" method="post" >
                <div>
                    <table class="table_input">
                        <tr>
                            <td>Tên công việc</td>
                            <td><input name="search_name" class="smallInput big" value="<?=$searchKey;?>"/></td>
                        </tr>   
                    </table>
                </div>
                <div class="clear"></div>
                <div class="button_bar">
                    <?php create_form_button('submit_button button_ok','Tìm kiếm');?>
                    <br />
                </div>
                <div class="clear" style="height: 20px;"></div>
            </form>
        </div>
     </div>
</div>
<div id="portlets">
    <div class="column"></div>
    <div class="portlet">
        <div class="portlet-header fixed">
            <img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?>
        </div>
    	<div class="portlet-content nopadding">
            <form name="myform" id="myform" method="post" action="<?=$base_url;?>admin/job/updatePosition" >
               <?php $seg=$this->uri->segment(4,0);?>
            	<table class="datatable" width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet" >
                    <tr>
                        <th width="3%"><div align="center">TT</div></th>
                        <th width="3%"><div align="center"><input type="checkbox" name="checkall" value="" id="checkall" onclick="checkallinput('checkall','checkinput')"></div></th>
                        <th width="20%"><div align="left">Tên công việc</div></th>
                        <th width="20%"><div align="left">Nhà tuyển dụng</div></th>
                        <th width="20%"><div align="left">Danh mục công việc</div></th>
                        <th width="20%"><div align="left">Phương thức làm việc</div></th>
                        <th width="10%"><div align="center">Công cụ</div></th>
                    </tr>
                    <?php $i=0; foreach($jobs as $row): $i++;?>
                    <tr style="cursor: pointer;" onclick="window.location.href = 'javascript:void(0)'">
                        <td widtd="3%"><div align="center"><?php echo $i;?></div></td>
                        <td widtd="3%"><div align="center"><input type="checkbox" class="checkinput" value="<?=$row->id?>" name="checkinput[]" /></div></td>
                        <td widtd="20%"><a href="javascript:void(0)"><?php echo $row->name_vietnamese;?><span style="color:#9C3">(<?=get_from_datetime($row->created);?>)</span></a></td>
                        <td widtd="20%"><?= $row->recruiter->where('id', $row->recruiter_id)->get()->name;?></td>
                        <td widtd="20%"><?= $row->jobscat->where('id', $row->jobscat_id)->get()->name_vietnamese;?></td>
                        <td widtd="20%"><?= $row->jobsmethod->where('id', $row->jobsmethod_id)->get()->name_vietnamese;?></td>
                        <td widtd="10%">
                            <div align="center">
                            <?php 
            					//echo create_link_table('edit_icon',$this->admin_url.'experiences/edit/'.$row->id,'Edit News');
            					echo create_link_table('delete_icon',$this->admin_url.'jobs/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")'); ?>
                            </div>
                        </td>
                    </tr>	
                    <?php endforeach;?>
                    <tr class="footer">
                        <td colspan="6"></td>
                        <td colspan="1" align="right">
                            <div align="center"></div>
                        </td>
                    </tr>
                </table>
               	<div style="padding-top:20px;"></div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('admin/products/dialog/copyProductSpecDialog');?>
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
            <form action="<?=$base_url;?>admin/jobsmethods" method="post" >
                <div>
                    <table class="table_input">
                        <tr>
                            <td>Tên phương thức làm việc</td>
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
            <form name="myform" id="myform" method="post" action="<?=$base_url;?>admin/jobsmethods/updatePosition" >
               <?php $seg=$this->uri->segment(4,0);?>
            	<table class="datatable" width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet" >
                    <tr>
                        <th width="3%"><div align="center">TT</div></th>
                        <th width="3%"><div align="center"><input type="checkbox" name="checkall" value="" id="checkall" onclick="checkallinput('checkall','checkinput')"></div></th>
                        <th width="50%"><div align="left">Tên phương thức làm việc</div></th>
                        <th width="10%"><div align="center">Position</div></th>
                        <th width="34%"><div align="center">Công cụ</div></th>
                    </tr>
                    <?php $i=0; foreach($jobmethods as $row): $i++;?>
                    <tr style="cursor: pointer;" onclick="window.location.href = '<?=$this->admin_url.'jobsmethods/edit/'.$row->id;?>'">
                        <td widtd="3%"><div align="center"><?php echo $i;?></div></td>
                        <td widtd="3%"><div align="center"><input type="checkbox" class="checkinput" value="<?=$row->id?>" name="checkinput[]" /></div></td>
                        <td widtd="50%"><a href="<?=$this->admin_url.'jobsmethods/edit/'.$row->id;?>"><?php echo $row->name_vietnamese;?><span style="color:#9C3">(<?=get_from_datetime($row->created);?>)</span></a></td>
                        <td >
                            <input type="hidden" name="idList[]" value="<?=$row->id;?>" />
                            <div align="center">
                                <input type="text" name="positionList[]" style="width: 40px;" value="<?=$row->position;?>" />
                            </div>
                        </td>
                        <td widtd="34%">
                            <div align="center">
                            <?php 
            					echo create_link_table('edit_icon',$this->admin_url.'jobsmethods/edit/'.$row->id,'Edit News');
            					echo create_link_table('delete_icon',$this->admin_url.'jobsmethods/delete/'.$row->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")'); ?>
                            </div>
                        </td>
                    </tr>	
                    <?php endforeach;?>
                    <tr class="footer">
                        <td colspan="3"></td>
                        <td colspan="1" align="right">
                            <div align="center"><input type="submit" name="update" value="Update" /></div>
                        </td>
                        <td></td>
                    </tr>
                </table>
               	<div style="padding-top:20px;"></div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('admin/products/dialog/copyProductSpecDialog');?>
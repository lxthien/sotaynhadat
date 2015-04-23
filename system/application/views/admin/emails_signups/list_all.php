<div id="portlets">
    <div class="column"></div>
    <div class="portlet">
        <div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /><?=$title_table;?></div>
        <div class="portlet-content nopadding">
            <form name="myform" id="myform" method="post" >
                <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
                    <thead>
                    <tr>
                        <th width="100"><div align="center">Số thứ tự</div></th>
                        <th width="500">Email đăng ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$this->uri->segment(4,0);foreach($o as $row): $i++;?>
                        <tr>
                            <td><div align="center"><?=$i?></div></td>
                            <td><a href="javascript:void(0);"><?=$row->email?></a></td>
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

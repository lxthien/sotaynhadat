<div id="portlets">
    <div class="column">
    </div>
    <div class="portlet">
        <div class="portlet-header fixed"><img src="<?=$this->admin_images;?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> <?=$title_table;?></div>
        <div class="portlet-content nopadding"></div>
        <div class="portlet-content nopadding">
            <form name="myform" id="myform" method="post" >
                <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
                    <thead>
                    <tr>
                        <th width="20">TT</th>
                        <th width="250"><div align="center">Tiêu đề</div></th>
                        <th width="100"><div align="center">Giá</div></th>
                        <th width="100"><div align="center">Diện tích</div></th>
                        <th width="50"><div align="center">Menu</div></th>
                        <th width="50"><div align="center">Ngày tạo</div></th>
                        <th width="50"><div align="center">Công cụ</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$this->uri->segment(4,0); foreach($estates as $row):$i++;?>
                        <tr>
                            <td><div align="center"><?=$i?></div></td>
                            <td>
                                <div align="left">
                                    <a href="<?=$base_url.$row->estatecatalogue->name_none.'/'.$row->estatecity->name_none.'/'.$row->title_none?>.html" title="Xem chi tiết" target="_blank"><?=$row->title?></a>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?=$row->price_text.' '.getpricetype($row->price_type);?>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?=$row->area_text;?> m<sup>2</sup>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?=$row->estatetype->name?>
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
                                    echo create_link_table('edit_icon',$base_url.'admin/estates/edit/'.$row->id.'/user/'.$estateuser->id,'edit');
                                    echo create_link_table('delete_icon',$base_url.'admin/estates/delete/'.$row->id.'/user/'.$estateuser->id,'delete','return confirm ("Bạn có muốn xóa đối tượng này không ?")');
                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
     
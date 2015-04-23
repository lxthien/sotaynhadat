<tr style="height: 20px; border-bottom: 1px dotted #e2e2e2;">
    <th width="3%" style="text-align: left;">TT</th>
    <th width="25%" style="text-align: left;">Tiêu đề</th>
    <th width="15%" style="text-align: left;">Diện tích</th>
    <th width="15%" style="text-align: left;">Giá</th>
    <th width="20%" style="text-align: left;">Địa chỉ</th>
    <th width="10%" style="text-align: left;">Ngày đăng</th>
    <th width="6%">Tác vụ</th>
</tr>
<?php $i=0; foreach($estates as $row): $i++;?>
    <tr style="border-bottom: 1px dotted #e2e2e2;">
        <td><?=$i;?></td>
        <td><a style="color: #0A6D00; font-weight: bold;" href="<?=$base_url?>chinh-sua-tin/<?=$row->id?>"><?=$row->title;?></a></td>
        <td>
            <?php if($row->isArea == 0): ?>
                <?=$row->estatearea->label;?>
            <?php else: ?>
                <?='Thương lượng'?>
            <?php endif; ?>
        </td>
        <td>
            <?php if($row->isPrice == 0): ?>
                <?=$row->estateprice->label;?>
            <?php else: ?>
                <?='Thương lượng'?>
            <?php endif; ?>
        </td>
        <td><?=$row->address;?></td>
        <td><?=date('d-m-Y', strtotime($row->created));?></td>
        <td style="text-align: center;">
            <a href="<?=$base_url?>chinh-sua-tin/<?=$row->id?>" title="Sửa tin">
                <img src="<?=$base_url?>images/edit.gif" alt="Sửa"/>
            </a>
            <a href="<?=$base_url?>xoa-tin/<?=$row->id?>" title="Xóa tin">
                <img src="<?=$base_url?>images/action_delete.gif" alt="Xóa"/>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
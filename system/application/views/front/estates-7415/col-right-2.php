<div class="right">
    <?php echo $this->load->view('front/widget/search-estates'); ?>
    <div class="boxnoibat">
        <span class="title-top-box"><?=$type->name;?></span>
        <?php foreach($this->estateProvince as $row): ?>
            <?php if( count_estate_by_type_and_city( $row->id, $type->id ) >= 10 ): ?>
                <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
                    <div class="tinkhacnoibat">
                        <a style="height: auto;" href="<?=$base_url.$type->name_none.'/'.$row->name_none;?>" title="<?php echo $type->name; ?> tại <?php echo $row->name; ?>">
                            <p style="margin-left:10px; margin-top:9px; font-weight:normal;"><?php echo $type->name; ?> tại <?php echo $row->name; ?></p>
                        </a>
                    </div>
                </div>
                <div class="line3"></div>
            <?php endif; ?>
        <?php endforeach; unset($row); ?>
    </div>
</div>
<div class="right">
    <?php if($this->uri->segment(1, '') == 'nha-dat-ban'): ?>
        <?php echo $this->load->view('front/includes/nha-dat-ban-tai'); ?>
    <?php else: ?>
        <?php echo $this->load->view('front/includes/nha-dat-cho-thue-tai'); ?>
    <?php endif; ?>

    <div class="boxnoibat">
        <span class="title-top-box">Danh mục <?php echo $estatesCategoryName; ?></span>
        <?php if( $this->uri->segment(1) == 'nha-dat-ban' ): ?>
            <?php $i=0; foreach($this->typeHouseSale as $row): $i++; ?>
            <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a style="height: auto;" href="<?=$base_url?>nha-dat-ban/<?=$row->name_none;?>" title="<?=$row->name;?>">
                        <p style="margin-left:10px; margin-top:9px; font-weight:normal;"><?=$row->name;?></p>
                    </a>
                </div>
            </div>
            <div class="line3"></div>
            <?php endforeach; unset($row); ?>
        <?php endif; ?>
        <?php if( $this->uri->segment(1) == 'nha-dat-cho-thue' ): ?>
            <?php $i=0; foreach($this->typeHouseLease as $row): $i++; ?>
            <div class="sreentinnoibat" style="width:312px; float:left; margin-bottom:3px;">
                <div class="tinkhacnoibat">
                    <a style="height: auto;" href="<?=$base_url?>nha-dat-cho-thue/<?=$row->name_none;?>" title="<?=$row->name;?>">
                        <p style="margin-left:10px; margin-top:9px; font-weight:normal;"><?=$row->name;?></p>
                    </a>
                </div>
            </div>
            <div class="line3"></div>
            <?php endforeach; unset($row); ?>
        <?php endif; ?>
    </div>
    <?php echo $this->load->view('front/widget/search-estates'); ?>
</div>
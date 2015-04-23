<div id="top_advertise">
    <?php foreach($this->banner as $row): ?>
	<div class="fl">
		
            <?php
                $path = pathinfo($base_url.$row->image);
                if($path['extension'] == 'swf') {
            ?>
                <object type="application/x-shockwave-flash" data="<?=$base_url.$row->image?>" width="<?=$row->width;?>" height="<?=$row->height;?>">
                    <param name="movie" value="<?=$base_url.$row->image?>" />
                    <param name="quality" value="high"/>
                    <param name="wmode" value="transparent"/>
                </object>
            <?php } else {?>
                <a href="<?=$row->link;?>"><img src="<?=image($row->image,'banner_top');?>" /></a>
            <?php } ?>
        
	</div>
    <?php endforeach; ?>
	<div class="clr"></div>
</div>
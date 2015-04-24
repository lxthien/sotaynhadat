<div class="boxnoibat adv-right">
	<?php foreach($this->bannerAdversiting as $row): ?>
		<?php if (strpos($row->image, 'swf')):
			$sizeFlash = getimagesize($base_url.$row->image); ?>
			<div class="qc">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
						codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
						width="300" height="<?php echo (300*$sizeFlash[1])/$sizeFlash[0]; ?>" >
					<param name="movie" value="<?php echo $base_url.$row->image; ?>" />
					<embed src="<?php echo $base_url.$row->image; ?>"
						   width="300" height="<?php echo (300*$sizeFlash[1])/$sizeFlash[0]; ?>"
						   name="mymoviename" type="application/x-shockwave-flash"
						   pluginspage="http://www.macromedia.com/go/getflashplayer">
					</embed>
				</object>
			</div>
		<?php else: ?>
			<div class="qc"><a target="_blank" href="<?=$row->link;?>"><img src="<?=$base_url.$row->image?>" /></a></div>
		<?php endif; ?>
	<?php endforeach; unset($row); ?>
</div>
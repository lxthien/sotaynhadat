<div>
	<?php $this->load->view('front/includes/breadcrumb') ?>
	<div class="main_separate"></div>
	
	<div class="">
		<div class="news_left fl">
			<!-- news -->
			<div>
				<h2 class="news_h2"><?=$cat_name?></h2>
				<div class="bg_news_under"></div>
				<?php $i = 1; foreach($cat_news as $row): ?>
					<div class="news_ln news_ln_cat">
						<div class="fl news_de_img">
							<a href="<?=$base_url."tin-tuc/d/".$row->{'title_none'}?>" title="<?=$row->{'title_vietnamese'}?>">
								<img alt="<?=$row->{'title_vietnamese'}?>" src="<?=image($row->dir.$row->image,'news_160');?>" width="160" />
							</a>
						</div>
						<div class="fl news_ln_txt">
							<div>
								<a href="<?=$base_url."tin-tuc/d/".$row->{'title_none'}?>" title="<?=$row->{'title_vietnamese'}?>" class="news_link font_bold">
									<?=$row->{'title_vietnamese'}?>
								</a>
							</div>
							<div class="news_de_txt">
								<?=cut_string($row->{'full_vietnamese'},250).' ...';?>
							</div>
							<div class="news_view_more"><a href="<?=$base_url."tin-tuc/d/".$row->{'title_none'}?>" title="<?=$row->{'title_vietnamese'}?>">Chi tiết</a></div>
						</div>
						<div class="clr"></div>
					</div>
				<?php $i++; endforeach; ?>
			</div>
			<div class="clr"></div>
			<?php echo $this->pagination->create_links();?>
		</div>
		
		<div class="news_right fl">
			<h2 class="news_h2" style="color: #000;">Tin xem nhiều nhất</h2>
			<div class="bg_news_under"></div>
			<ul class="right_news_ul">
				<?php foreach($links_counter as $row): ?>
					<li>
						<a href="<?=$base_url."tin-tuc/d/".$row->{'title_none'}?>" title="<?=$row->{'title_vietnamese'}?>" class="news_link"><?=$row->{'title_vietnamese'};?></a>
						<span class="right_grey_date">(<?=get_date_from_sql($row->created) ?>)</span>
					</li>
				<?php endforeach; ?>
			</ul>
			
			<br /><br />
			<h2 class="news_h2" style="color: #000;">Tin di động việt</h2>
			<div class="bg_news_under"></div>
			<ul class="right_news_ul">
				<?php foreach($ddv_news as $row): ?>
					<li>
						<a href="<?=$base_url."tin-tuc/d/".$row->{'title_none'}?>" title="<?=$row->{'title_vietnamese'}?>" class="news_link">
							<?=$row->{'title_vietnamese'}?>
						</a>
						<span class="right_grey_date">(<?=get_date_from_sql($row->created) ?>)</span>
					</li>
				<?php endforeach; ?>
			</ul>
			
			<br /><br />
			<h2 class="news_h2" >Video On <img src="<?=$base_url?>images/icon_youtube.png" /><span></span></h2>
			<div class="bg_news_under"></div>
			<?php foreach($videos as $row): ?>
				<div class="right_youtube">
					<?=$row->{'full_vietnamese'}?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	
	<div class="clr"></div>
</div>


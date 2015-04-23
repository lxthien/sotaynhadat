<div id="footer_f">
	<div class="title">
		<div class="f_hotline txt fl">Tin tức</div>
		<div class="f_accessories txt fl">Sản phẩm</div>
		<div class="txt fl">liên kết</div>
		<div class="clr"></div>
	</div>
	
	<div class="footer_links">
		<div class="f_hotline f_height fl">
            <?php
                $footerNews = new Article();
                $footerNews->where('recycle',0);
                $footerNews->where('active',1);
                $footerNews->where('newscatalogue_id',58);
                $footerNews->order_by('created', 'DESC');
                $footerNews->get_paged(0,5,TRUE);
            ?>
            <?php foreach($footerNews as $row):?>
            <div style="height: 21px;width: 185px;overflow: hidden;float:left;clear:both;"><a href="<?=$base_url."tin-tuc/d/".$row->{'title_none'}?>" title="<?=$row->title_vietnamese;?>">&raquo; <?=$row->title_vietnamese;?></a></div>
            <span style="color: #fff;">...</span>
            <?php endforeach;?>
			<div class="clr"></div>
		</div>
		<div class="f_accessories fl">
                    <?php $countChild = $this->productFooter->result_count();?>
           
				
                     <?php $i=0; foreach($this->productFooter as $row):$i++;?>
                     <?php if($i == 1) echo "<ul class='fl'>";?>						
							<li><a href="<?=$base_url.$row->link;?>" title="<?=$row->name;?>" ><?=$row->name;?></a></li>							
					 <?php if($i == round($countChild/2)) echo "</ul><ul class='fl'>";?>
                    <?php endforeach;?>
                    <?php echo "</ul>";?>
			
			<div class="clr"></div>
		</div>
		<div class="f_social fl">
			<ul class="fl">
                <?php foreach($this->relation as $row):?>
				<li><a title="<?=$row->name;?>" href="<?=$row->link;?>"><?=$row->name;?></a></li>
                <?php endforeach;?>
				
				
			</ul>
			<div class="old fr"><a href="<?=$base_url;?>kho-may-cu" title="Kho máy cũ"><img src="<?=$base_url?>images/old_product.jpg" /></a></div>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
	</div>
</div>
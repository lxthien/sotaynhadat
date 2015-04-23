<!-- Apply blue theme as default for all tiles -->
		<div id="tiles" >
			<div class="fl" style="width: 278px; height: 402px">
				<!-- Sliding Tile that shows 100% of the back tile every 3 seconds -->
				<div class="blue live-tile" data-stops="100%" data-speed="750" data-delay="3000">
					<div>
                        <a href="<?=$metro1->link;?>" title="<?=$metro1->title;?>">
    						<span class="tile-title" ><?=$metro1->title;?></span>
    						<img src="<?=image($metro1->img, "product_home_metroBig");?>" alt="<?=$metro1->title;?>" />
                        </a>
					</div>
					<div class="txt_desc" ><a href="<?=$metro1->link;?>" title="<?=$metro1->title;?>"><?=$metro1->title;?></a></div>
				</div>
				<div class="clr"></div>
				<div class="list-tile .metro-small" style="margin-top: 2px;">
					<ul class="flip-list fourTiles" data-mode="flip-list" data-delay="3000">
						<li>
							<div>
                                <a href="<?=$metro2->link;?>" title="<?=$metro2->title;?>">
							     	<span style="width: 118px;" class="tile-title"><?=$metro2->title;?></span>
								    <img src="<?=image($metro2->img, "product_home_metroSmall");?>"  alt="<?=$metro2->title;?>" />
                                </a>
							</div>
							<div class="mango"><a href="<?=$metro2->link;?>" title="<?=$metro2->title;?>"><?=$metro2->title;?></a></span></div>
						</li>
						<li data-direction="horizontal" style="margin-left:2px;">
							<div>
                                <a href="<?=$metro3->link;?>" title="<?=$metro3->title;?>">
    								<span  class="tile-title exclude"><?=$metro3->title;?></span>
    								<img src="<?=image($metro3->img, "product_home_metroSmall");?>" alt="<?=$metro3->title;?>" />
                                </a>
							</div>
						
						
							<div class="magenta"><a href="<?=$metro3->link;?>" title="<?=$metro3->title;?>"><?=$metro3->title;?></a></span></div>
							
						</li>
					</ul>
				</div>
				<div class="clr"></div>
			</div>
			<div class="fl" style="width: 278px; height: 402px;margin-left:2px;">
				<!-- Green Flip List that triggers every 3 seconds -->
				<div class="list-tile metro-small">
					<ul class="flip-list fourTiles" data-mode="flip-list" data-delay="3000">
						<li>
							<div>
                                <a href="<?=$metro4->link;?>" title="<?=$metro4->title;?>">
    								<span  class="tile-title"><?=$metro4->title;?></span>
    								<img src="<?=image($metro4->img, "product_home_metroSmall");?>"  alt="<?=$metro4->title;?>" />
                                </a>
							</div>
							<div class="green"><a href="<?=$metro4->link;?>" title="<?=$metro4->title;?>"><?=$metro4->title;?></a></span></div>
						</li>
						<li data-direction="horizontal" style="margin-left: 2px;">
							<div>
                                <a href="<?=$metro5->link;?>" title="<?=$metro5->title;?>">
								    <span class="tile-title"><?=$metro5->title;?></span>
								    <img src="<?=image($metro5->img, "product_home_metroSmall");?>" alt="<?=$metro5->title;?>" />
                                </a>
							</div>
							<div class="orange"><a href="<?=$metro5->link;?>" title="<?=$metro5->title;?>"><?=$metro5->title;?></a></div>
						</li>
					</ul>
				</div>
				<div class="clr"></div>
				<!-- Red Flip Tile that flips every 4 seconds -->
				<div class="live-tile small-276" data-mode="flip" data-delay="4000" style="margin-top: 2px;">
					<div>
                        <a style="width: 260px;" href="<?=$metro6->link;?>" title="<?=$metro6->title;?>">
    						<span class="tile-title"><?=$metro6->title;?></span>
    						<img src="<?=image($metro6->img, "product_home_metroBig");?>" alt="<?=$metro6->title;?>" />
                        </a>
					</div>
					<div class="txt_desc red"><a  href="<?=$metro6->link;?>" title="<?=$metro6->title;?>"><?=$metro6->title;?></a></div>
				</div>
				<div class="clr"></div>
				
			</div>
			<div class="clr"></div>
			
			
			<!-- Green Static Tile -->
			<!--
			<div class="green live-tile exclude">
				<span class="tile-title">static tile (figure 2d)</span>
				<p>Static tiles can take advantage of theming too!</p>
			</div>
			-->
		</div>
		<!-- Activate live tiles -->
		<script type="text/javascript">
			// apply regular slide universally unless .exclude class is applied
			// NOTE: The default options for each liveTile are being pulled from the 'data-' attributes
			$(".live-tile, .flip-list").not(".exclude").liveTile();
		</script>
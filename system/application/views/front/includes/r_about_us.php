<div class="aboutus_r fr">
	<div>
		<div class="aboutus_r_title"><?=lang('typical_project')?></div>
		<ul>
            <?php foreach($project as $row): ?>
                <li><a href="<?=site_url(gen_seo_url(lang('project'))."/d/".$row->name_none);?>"><?=$row->{'name_'.getlanguage()};?></a></li>
            <?php endforeach; ?>
		</ul>
		<br /><br />
		<div class="aboutus_r_title"><?=lang('market_info')?></div>
		<table class='tb_exim' cellspacing="0" cellpadding="0">
			<tr><th class='tbPrAlternateHeader upper_letters' colspan='6'><?=lang('currency_table')?></th></tr>
			<tr >
				<th class="tb_exim_title" ><?=lang('currency_type')?></th>
				<th class="tb_exim_title" ><?=lang('bid')?></th>
				<th class="tb_exim_title" ><?=lang('ask')?></th>
				<th class="tb_exim_title" ><?=lang('transfer')?></th>
			</tr>
			<?php
				foreach($exim->Exrate as $Exrate){
					if (in_array($Exrate['CurrencyCode'], $list)) {
						$number_buy = (float)$Exrate['Buy'];      
						$number_sell = (float)$Exrate['Sell'];   
						$number_transfer = (float)$Exrate['Transfer'];   
						
						$Buy = number_format($number_buy,0, ',', '.');
						$Sell = number_format($number_sell,0, ',', '.');
						$Transfer = number_format($number_transfer,0, ',', '.');
				
						echo"   <tr>";
							echo"   <th style=' text-align: left'><div>".$list_name[strval($Exrate['CurrencyCode'])]."</div></th>";
							echo"   <th style=' text-align: right'><div>".$Buy."</div></th>";
							echo"   <th style=' text-align: right'><div>".$Sell."</div></th>";
							echo"   <th style=' text-align: right'><div>".$Transfer."</div></th>";
						echo"   </tr>";
					}
				}
			?>
		</table>
		
		<br /><br />
		<div class="aboutus_r_title"><?=lang('estate_info')?></div>
		<div style="text-align: center;"><img class="bds_img" src="<?=$base_url?>images/1.png" /></div>
		<br /><br />
	</div>
</div>
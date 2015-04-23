
<div id='inline_content' style='padding:10px; background:#fff;'>
	<p><strong><center>HỖ TRỢ ONLINE</center></strong></p>
	<br />
	<p>
		<div class="online_yahoo fl">
            <?php
            $yahoo1 = trim(getconfigkey('yahoo1'));
            if($yahoo1 != "")
            {
                $yahoo1 = explode(";",$yahoo1);
                if($yahoo1[1] != null)
                {
                    echo '<div class="online_line">';
                    echo '<span><a href="ymsgr:sendim?'.$yahoo1[1].'"><img src="http://opi.yahoo.com/online?u='.$yahoo1[1].'&m=g&t=1"/></a></span>';
                    echo '<span>&nbsp;&nbsp;'.$yahoo1[0].'</span>';
                    echo '</div>';
                }
            }
            $yahoo2 = trim(getconfigkey('yahoo2'));
            if($yahoo2 != "")
            {
                $yahoo2 = explode(";",$yahoo2);
                if($yahoo2[1])
                {
                    echo '<div class="online_line">';
                    echo '<span><a href="ymsgr:sendim?'.$yahoo2[1].'"><img src="http://opi.yahoo.com/online?u='.$yahoo2[1].'&m=g&t=1"/></a></span>';
                    echo '<span>&nbsp;&nbsp;'.$yahoo2[0].'</span>';
                    echo '</div>';
                }
            }
            $yahoo3 = trim(getconfigkey('yahoo3'));
            if($yahoo3 != "")
            {
                $yahoo3 = explode(";",$yahoo3);
                if($yahoo3[1])
                {
                    echo '<div class="online_line">';
                    echo '<span><a href="ymsgr:sendim?'.$yahoo3[1].'"><img src="http://opi.yahoo.com/online?u='.$yahoo3[1].'&m=g&t=1"/></a></span>';
                    echo '<span>&nbsp;&nbsp;'.$yahoo3[0].'</span>';
                    echo '</div>';
                }
            }
			?>
				
				
		
		</div>
		<div class="online_skype fl">
			<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
            <?php
            $skype1 = trim(getconfigkey('skype1'));
            if($skype1 != "")
            {
                $skype1 = explode(";",$skype1);
                if($skype1[1] != null)
                {
                    echo '<div class="online_line">';
                    echo '<span class="fl"><a href="skype:'.$skype1[1].'?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_white_124x52.png" style="border: none;" width="84" height="32" alt="Skype Me™!" /></a></span>';
                    echo '<span class="fl">'.$skype1[0].'</span>';
                    echo '<span class="clr"></span>';
                    echo '</div>';
                }
            }
            $skype2 = trim(getconfigkey('skype2'));
            if($skype2 != "")
            {
                $skype2 = explode(";",$skype2);
                if($skype2[1] != null)
                {
                    echo '<div class="online_line">';
                    echo '<span class="fl"><a href="skype:'.$skype2[1].'?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_white_124x52.png" style="border: none;" width="84" height="32" alt="Skype Me™!" /></a></span>';
                    echo '<span class="fl">'.$skype2[0].'</span>';
                    echo '<span class="clr"></span>';
                    echo '</div>';
                }
            }
            $skype3 = trim(getconfigkey('skype3'));
            if($skype3 != "")
            {
                $skype3 = explode(";",$skype3);
                if($skype3[1] != null)
                {
                    echo '<div class="online_line">';
                    echo '<span class="fl"><a href="skype:'.$skype3[1].'?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_white_124x52.png" style="border: none;" width="84" height="32" alt="Skype Me™!" /></a></span>';
                    echo '<span class="fl">'.$skype3[0].'</span>';
                    echo '<span class="clr"></span>';
                    echo '</div>';
                }
            }
            ?>
		
		</div>
		<div class="clr"></div>
	</p>
</div>

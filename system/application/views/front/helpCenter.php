<link type="text/css" href="<?=$base_url;?>images/js/jqueryui/css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$base_url;?>images/js/jqueryui/js/jquery-ui-1.8.24.custom.min.js"></script>
<script type="text/javascript">
    $(function() {
        $( ".helpCenter" ).accordion({
            collapsible: true,
            active :false,
            heightStyle:"auto"
        });
    });
    function closeAllHelp()
    {
        $( ".helpCenter" ).accordion({
            active :false
        });
    }
</script>
<style type="text/css">
.helpCenter h3{
    background: none;
    border:0;
    padding-left:30px;
    color:blue;
    font-weight: 600;
}
.helpCenter .ui-accordion-content{
    border:0;
}
</style>
<div>
	<?php $this->load->view('front/includes/breadcrumb') ?>
	<div class="main_separate"></div>
	<div class="social_share">
		<div class="fr">
			<!-- Place this tag where you want the +1 button to render. -->
			<div class="g-plusone" data-size="medium"></div>

			<!-- Place this tag after the last +1 button tag. -->
			<script type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</div>
		<div class="fr">
			<!-- Tweet Button -->
			<if condition="in_array($forum['forumid'], array(1,2))">
			<else />
			<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="YOUR-TWITTER-USERNAME">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</if>
			<!-- / Tweet Button -->
		</div>
		<div class="fr social_share_fb">
			<!-- Facebook Share Button --> <if condition="in_array($forum['forumid'], array(1,2))"> <else /> <a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> </if> <!-- / Facebook Share Button --> 
		</div>
		<div class="clr"></div>
	</div>
	<h1>Giúp đỡ</h1>
	<div class="news_box">
		<div class="news_box_detail helpCenter">
            <?php foreach($news as $row):?>
		    <h3><?=$row->title_vietnamese;?></h3>
            <div style="display: none;">
                <?=$row->full_vietnamese;?>
                <div class="clr"></div>
                <div class="fr"><a href="javascript:void(0)" onclick="closeAllHelp()" />(X)Đóng</a></div>
            </div>
            <?php endforeach;?>
			
		</div>
        <div class="clr"></div>
	</div>
	
	
	<div class="clr"></div>
</div>


<link type="text/css" href="<?=$base_url?>images/js/pikachu/bottom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$base_url?>images/js/pikachu/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?=$base_url?>images/js/pikachu/jquery.pikachoose.min.js"></script>
<script language="javascript">
    $(document).ready(
        function (){
            $("#pikame").PikaChoose({carousel:true});
            $('.pika-stage a[href*="img"]').fancybox();
        });
</script>

<div class="col-right main-article fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=lang('factory')?></h1></div>
            <span class="line730"></span>
            <div class="cl"></div>
            <span class="description">
                <div class="description-showroom">
                    <span class="description-showroom-detail"><?=lang('detail')?></span>
                    <span>
                        <?=$showrooms->{'txtDescription_'.getlanguage()};?>
                    </span>
                </div>
                <div class="slide-showroom">
                    <ul id="pikame" class="jcarousel-skin-pika">
                        <?php foreach($showroomphotos as $row): ?>
                        <li><a title="abc" href=""><img src="<?=$base_url.$row->image?>" alt="<?=$row->name?>"/></a><span><?=$row->name?></span></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="video-factory description-showroom">
                    <span class="description-showroom-detail">Video</span>
                    <object width="730" height="400" onload="YoutubeGalleryAutoResizePlayer1();" type="application/x-shockwave-flash" data="http://www.youtube-nocookie.com/v/<?=$showrooms->video;?>?version=3&amp;vq=hd720&amp;autoplay=0&amp;hl=en&amp;fs=1&amp;showinfo=0&amp;iv_load_policy=3&amp;rel=0&amp;loop=1&amp;border=0&amp;color1=DA892E&amp;color2=141414&amp;controls=1&amp" id="youtubegalleryplayerid_1">
                        <param value="youtubegalleryplayerid_1" name="id" />
                        <param value="http://www.youtube-nocookie.com/v/?version=3&amp;autoplay=0&amp;hl=en&amp;fs=1&amp;showinfo=0&amp;iv_load_policy=3&amp;rel=0&amp;loop=1&amp;border=0&amp;color1=DA892E&amp;color2=141414&amp;controls=1&amp" name="movie" />
                        <param value="transparent" name="wmode" />
                        <param value="true" name="allowFullScreen" />
                        <param value="always" name="allowscriptaccess" />
                        <param value="" name="playlist">
                    </object>
                </div>
            </span>
        </div>
    </div>
</div>
<script src="<?=base_url()?>images/js/woothemes-flexslider/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function() {
        // The slider being synced must be initialized first
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
</script>
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
            <div class="titleconstructioncol2"><h1>Showrooms</h1></div>
            <span class="line730"></span>
            <div class="cl"></div>
            <span class="description">
                <div class="slide-showroom">
                    <ul id="pikame" class="jcarousel-skin-pika">
                        <?php foreach($showroomphotos as $row): ?>
                        <li><a href=""><img src="<?=$base_url.$row->image?>" alt="<?=$row->name?>"/></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="description-showroom">
                    <span class="description-showroom-detail"><?=lang('detail')?></span>
                    <span>
                        <?=$showrooms->{'txtDescription_'.getlanguage()};?>
                    </span>
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
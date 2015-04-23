<link rel="stylesheet" href="<?= $base_url?>images/js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= $base_url?>images/js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= $base_url?>images/js/nivo-slider/style.css" type="text/css" media="screen" />

<div id="slide">
    <div class="slide">
        <div class="main-slide">
            <div class="main-lide-images">
                <div id="wrapper">
                    <div class="slider-wrapper theme-default">
                        <div id="slider" class="nivoSlider">
                            <?php foreach($this->banner as $row) :?>
                                <a href="<?=$row->link?>"><img src="<?= $base_url.$row->image?>" title="<span style='font-size: 15px; font-weight: 600; text-transform: uppercase; margin-bottom: 20px;'><?=$row->name?></span>
                                                                                          <span style='margin-bottom: 25px;'><?=strlen($row->content) < 100 ? $row->content : cut_string($row->content, 100).' ...';?></span>
                                                                                          <a href='<?=$row->link?>'><?=lang('detail')?></a>" data-thumb="images/toystory.jpg"  /></a>
                            <?php endforeach ?>
                            <a href="#"><img src="<?= $base_url?>images/slide.jpg" title="<span style='font-size: 15px; font-weight: 600; text-transform: uppercase; margin-bottom: 20px;'>Examples of Text</span>
                                                                                          <span style='margin-bottom: 25px;'>Typography is often a deciding factor in the success of a design. Its importance cannot be overstated. Effective typogy can be ac categories below.</span>
                                                                                          <a href='#'><?=lang('detail')?></a>" data-thumb="images/toystory.jpg"  /></a>
                            <a href="#"><img src="<?= $base_url?>images/slide.jpg" title="<span style='font-size: 15px; font-weight: 600; text-transform: uppercase; margin-bottom: 20px;'>Examples of Text</span>
                                                                                          <span style='margin-bottom: 25px;'>Typography is often a deciding factor in the success of a design. Its importance cannot be overstated. Effective typogy can be ac categories below.</span>
                                                                                          <a href='#'><?=lang('detail')?></a>" data-thumb="images/toystory.jpg"  /></a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="<?= $base_url?>images/js/nivo-slider/jquery.nivo.slider.js"></script><script type="text/javascript" src="<?= $base_url?>images/js/nivo-slider/jquery.nivo.slider.js"></script>
                <script type="text/javascript">
                    $(window).load(function() {
                        $('#slider').nivoSlider();
                    });
                </script>
            </div>
        </div>
    </div>
</div>

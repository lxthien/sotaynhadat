<!--<link type="text/css" href="<?/*=$base_url*/?>images/js/pikachu/bottom.css" rel="stylesheet" />
<script type="text/javascript" src="<?/*=$base_url*/?>images/js/pikachu/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?/*=$base_url*/?>images/js/pikachu/jquery.pikachoose.min.js"></script>
<script language="javascript">
    $(document).ready(
        function (){
            $("#pikame").PikaChoose({carousel:true});
            $('.pika-stage a[href*="img"]').fancybox();
        });
</script>-->
<script src='<?=$base_url?>images/js/zoom-slider/jquery.elevateZoom-2.5.5.min.js'></script>
<link type="text/css" href="<?=$base_url?>images/js/zoom-slider/style.css" rel="stylesheet" />

<div class="col-right fl">
    <div class="groupcol2">
        <div class="constructioncol2 main-slide-and-info">
            <div class="titleconstructioncol2"><h1><a href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCat->url_vietnamese : $base_url.'vi/'.$productCat->url_english; ?>"><?=$productCat->{'name_'.$this->language}?></a> &gt; <a href="<?= $this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCat->url_vietnamese.'/'.$product->url_vietnamese.'.html' : $base_url.'en/'.$productCat->url_english.'/'.$product->url_english.'.html';?>"><?=$product->{'name_'.$this->language}?></a></h1></div>
            <span class="line730"></span>
            <div class="slide-and-info slide-and-info-one">
                <div class="slide-and-info-left fl">
                    <!--<ul id="pikame" class="jcarousel-skin-pika">
                        <?php /*foreach($productPhotos as $row): */?>
                            <li><a href=""><img src="<?/*=$base_url.$row->path*/?>" alt="<?/*=$product->name_vietnamese*/?>"/></a></li>
                        <?php /*endforeach; */?>
                    </ul>-->
                    <div class="zoom-slider">
                        <!--image default-->
                        <img style="border:1px solid #e8e8e6;" id="zoom_03" src="<?=image($productPhotosActive->path, 'slide_big')?>"
                             data-zoom-image="<?=image($productPhotosActive->path, 'slide_zoom')?>"
                             width="350"  />
                        <!--image default-->
                        <div id="gallery_01" style="width:500px; float:left; ">
                            <?php $i=0; foreach($productPhotos as $row): $i++;
                                ?>
                                <a href="<?= $i==1 ? '#' : 'tester';?>" class="elevatezoom-gallery <?= $i==1 ? 'active' : '';?>"
                                    <?= $i==1 ? 'data-update=""' : '';?>
                                    data-image="<?=image($row->path, 'slide_big')?>"
                                    data-zoom-image="<?=image($row->path, 'slide_zoom')?>">
                                    <img src="<?=image($row->path, 'slide_thumnails')?>" width="87"  />
                                </a>
                            <?php endforeach; ?>
                            <!--<a  href="#" class="elevatezoom-gallery"
                                data-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image2.png"
                                data-zoom-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image2.jpg"
                                ><img src="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image2.png" width="87"  />
                            </a>
                            <a href="tester" class="elevatezoom-gallery"
                               data-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image3.png"
                               data-zoom-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image3.jpg">
                                <img src="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image3.png" width="78"  />
                            </a>
                            <a href="tester" class="elevatezoom-gallery"
                               data-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image4.png"
                               data-zoom-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image4.jpg"
                               class="slide-content"
                                ><img src="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image4.png" width="87"  />
                            </a>
                            <a href="tester" class="elevatezoom-gallery"
                               data-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image4.png"
                               data-zoom-image="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image4.jpg"
                               class="slide-content"
                                ><img src="http://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image4.png" width="87"  />
                            </a>-->
                        </div>
                    </div>
                </div>
                <div class="slide-and-info-right fl">
                    <span>
                        <a href="<?= $this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCat->url_vietnamese.'/'.$product->url_vietnamese.'.html' : $base_url.'en/'.$productCat->url_english.'/'.$product->url_english.'.html';?>">
                            <?=$product->{'name_'.$this->language}?>
                        </a>
                    </span>
                    <span class="product-des"><?=$product->{'des_'.$this->language}?></span>
                    <span class="info-detail"><span><?=lang('productCode')?>: </span><span><?=$product->productCode?></span></span>
                    <span class="info-detail"><span><?=lang('manufacturer')?>: </span><span><?=$product->productmanufacture;?></span></span>
                    <span class="info-detail"><span><?=lang('productionYear')?>: </span><span><?=$product->origin?></span></span>
                    <span class="info-detail"><span><?=lang('warranty')?>: </span><span><?=$product->warranty?></span></span>
                    <span class="info-detail"><span><?=lang('weight')?>: </span><span><?=$product->weight?></span></span>
                    <span class="info-detail"><span><?=lang('materials')?>: </span><span><?=$product->materials?></span></span>
                    <span class="info-detail"><span><?=lang('color')?>: </span><span><?=$product->color?></span></span>
                    <span class="info-detail"><span><?=lang('size')?>: </span><span><?=$product->size?></span></span>
                    <span class="info-detail"><span><?=lang('price')?>: </span><span class="price"><?=$product->price/*.number_format($product->price, ',')*/.' VND'?></span></span>
                    <?php if($product->isSale == 1): ?>
                    <span class="info-detail"><span><?=lang('saleoffPrice')?>: </span><span class="price"><?=$product->saleOffPrice/*number_format($product->saleOffPrice, ',')*/.' VND'?></span></span>
                    <?php endif ?>
                    <span class="info-detail"><span><?=lang('updated')?>: </span><span><?=get_date_from_sql($product->updated);?></span></span>
                    <span class="info-detail"><span><?=lang('amountViewer')?>: </span><span><?=$product->view;?></span></span>
                    <div class="add-to-cart">
                        <form action="<?=$base_url.$this->lang->lang()?>/home/addCart" method="post">
                            <input type="hidden" name="id" value="<?=$product->id?>"/>
                            <input type="hidden" name="qty" value="1"/>
                            <input type="submit" value=""/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cl"></div>
        <div class="constructioncol2 main-info-des">
            <div class="titleconstructioncol2">
                <h1><?=lang('product-detail')?></h1>
            </div>
            <span class="line730"></span>
            <div class="slide-and-info">
                <div class="product-detail">
                    <?=$product->{'txtDescription_'.$this->language}?>
                </div>
            </div>
        </div>
        <div class="cl"></div>
        <div class="constructioncol2">
            <div class="titleconstructioncol2">
                <h1><?=lang('related-products')?></h1>
            </div>
            <span class="line730"></span>
            <div class="slide-and-info list-related">
                <?php $i=0; foreach($productSame as $row): $i++;
                    $productCatUrl = new Productcat($row->productcat_id);
                    ?>
                <div class="list-related-item <?=$i%4==0 ? 'list-related-item-break' : '';?>">
                    <div class="img-list-related-item">
                        <a href="<?= $this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCatUrl->url_vietnamese.'/'.$row->url_vietnamese.'.html' : $base_url.'en/'.$productCatUrl->url_english.'/'.$row->url_english.'.html';?>" title="<?=$row->{'name_'.$this->language}?>"><img src="<?=$base_url.$row->image?>" width="171" height="150" alt="<?=$row->{'name_'.$this->language}?>"/></a>
                    </div>
                    <div class="name-list-related-item">
                        <a href="<?= $this->lang->lang() == 'vi' ? $base_url.'vi/'.$productCatUrl->url_vietnamese.'/'.$row->url_vietnamese.'.html' : $base_url.'en/'.$productCatUrl->url_english.'/'.$row->url_english.'.html';?>" title="<?=$row->{'name_'.$this->language}?>"><?=$row->{'name_'.$this->language}?></a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#zoom_03").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active"});
        $("#zoom_03").bind("click", function(e) {
            var ez =   $('#zoom_03').data('elevateZoom');
            ez.closeAll(); //NEW: This function force hides the lens, tint and window
            $.fancybox(ez.getGalleryList());
            return false;
        });
    });
</script>
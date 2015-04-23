<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="<?=$base_url?>images/js/gallery_view/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="<?=$base_url?>images/js/gallery_view/js/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="<?=$base_url?>images/js/gallery_view/js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="<?=$base_url?>images/js/gallery_view/css/jquery.galleryview-3.0-dev.css" />
<!-- Lastly, call the galleryView() function on your unordered list(s) -->
<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView({
		transition_speed: 2000, 		//INT - duration of panel/frame transition (in milliseconds)
		transition_interval: 4000, 		//INT - delay between panel/frame transitions (in milliseconds)
		easing: 'swing', 				//STRING - easing method to use for animations (jQuery provides 'swing' or 'linear', more available with jQuery UI or Easing plugin)
		show_panels: true, 				//BOOLEAN - flag to show or hide panel portion of gallery
		show_panel_nav: false, 			//BOOLEAN - flag to show or hide panel navigation buttons
		enable_overlays: true, 			//BOOLEAN - flag to show or hide panel overlays
		
		panel_width: 640, 				//INT - width of gallery panel (in pixels)
		panel_height: 360, 				//INT - height of gallery panel (in pixels)
		panel_animation: 'slide', 		//STRING - animation method for panel transitions (crossfade,fade,slide,none)
		panel_scale: 'crop', 			//STRING - cropping option for panel images (crop = scale image and fit to aspect ratio determined by panel_width and panel_height, fit = scale image and preserve original aspect ratio)
		overlay_position: 'bottom', 	//STRING - position of panel overlay (bottom, top)
		pan_images: true,				//BOOLEAN - flag to allow user to grab/drag oversized images within gallery
		pan_style: 'drag',				//STRING - panning method (drag = user clicks and drags image to pan, track = image automatically pans based on mouse position
		pan_smoothness: 15,				//INT - determines smoothness of tracking pan animation (higher number = smoother)
		start_frame: 1, 				//INT - index of panel/frame to show first when gallery loads
		show_filmstrip: true, 			//BOOLEAN - flag to show or hide filmstrip portion of gallery
		show_filmstrip_nav: true, 		//BOOLEAN - flag indicating whether to display navigation buttons
		enable_slideshow: false,			//BOOLEAN - flag indicating whether to display slideshow play/pause button
		autoplay: false,				//BOOLEAN - flag to start slideshow on gallery load
		show_captions: true, 			//BOOLEAN - flag to show or hide frame captions	
		filmstrip_size: 3, 				//INT - number of frames to show in filmstrip-only gallery
		filmstrip_style: 'scroll', 		//STRING - type of filmstrip to use (scroll = display one line of frames, scroll filmstrip if necessary, showall = display multiple rows of frames if necessary)
		filmstrip_position: 'bottom', 	//STRING - position of filmstrip within gallery (bottom, top, left, right)
		frame_width: 164, 				//INT - width of filmstrip frames (in pixels)
		frame_height: 90, 				//INT - width of filmstrip frames (in pixels)
		frame_opacity: 0.5, 			//FLOAT - transparency of non-active frames (1.0 = opaque, 0.0 = transparent)
		frame_scale: 'crop', 			//STRING - cropping option for filmstrip images (same as above)
		frame_gap: 5, 					//INT - spacing between frames within filmstrip (in pixels)
		show_infobar: true,				//BOOLEAN - flag to show or hide infobar
		infobar_opacity: 1				//FLOAT - transparency for info bar
		});
	});
</script>
<style type="text/css">
.mainarticle{
    background: url("<?=$base_url?>images/bgbody.jpg") !important;
}
</style>
<!-- End process add css and js gallary view to website -->
<div class="col2 fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1 style="font-size: 15px"><a title="<?=$galleriesCat->name?>" href="<?=$base_url.$this->lang->lang()?>/gallery/<?=$galleriesCat->id?>"><?=$galleriesCat->name?></a></h1></div>
            <div class="mainarticle">
                <div class="slide-product">
                    <ul id="myGallery">
                        <?php foreach($banner as $row): ?>
                		<li><img data-frame="<?=$base_url.$row->image?>" src="<?=$base_url.$row->image?>" />
                		<?php endforeach ?>
                	</ul>
                </div>
            </div>
        </div>
    </div>
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1>Hình ảnh khác<?php //lang('galleries')?></h1></div>
            <?php 
            foreach($galleriesSame as $row):
            $banner = new banner();
            $banner->where('bannercat_id',$row->id);
            $banner->get();
            ?>
            <div class="listgalleries">
                <div class="imglistgalleries">
                    <a title="<?=$row->name?>" href="<?=$base_url.$this->lang->lang()?>/gallery/<?=$row->id?>">
                        <img src="<?=$base_url.$banner->image?>" alt="<?=$row->name?>" height="360" />
                    </a>
                </div>
                <div class="deslistgalleries">
                    <a title="<?=$row->name?>" href=""><?=$row->name?></a>
                    <p><?=$row->description?></p>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
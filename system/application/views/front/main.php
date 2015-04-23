<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=$this->page_title;?></title>
<meta name="description" content="<?=$this->page_description;?>"/>
<meta name="keywords" content="<?=$this->page_keyword;?>"/>	
<meta name="robots" content="noydir, noodp, follow"/>
<meta http-equiv="audience" content="general"/>
<meta name="resource-type" content="document"/>
<meta name="abstract" content="Thông tin nhà đất Việt Nam"/>
<meta name="classification" content="Bất động sản Việt Nam"/>
<meta name="area" content="Nhà đất và bất động sản"/>
<meta name="placename" content="Việt Nam"/>
<meta name="author" content="SotayNhadat.vn"/>
<meta name="copyright" content="©2013 SotayNhadat.vn"/>
<meta name="owner" content="SotayNhadat.vn"/>
<meta name="generator" content="SotayNhadat.vn"/>
<meta name="distribution" content="Global"/>
<meta name="revisit-after" content="1 days"/>


<link href="<?=$base_url;?>images/css/style.css?v=100" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?=$base_url;?>favicon.png" />
<!-- Begin add jquery and jquery ui to website -->
<script type="text/javascript" src="<?=$base_url?>images/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$base_url?>images/js/jquery-ui-1.8.18.min.js"></script>
<!-- End add jquery and jquery ui to website -->
<!-- Begin facy box-->
<script type="text/javascript" src="<?= $base_url?>images/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?= $base_url?>images/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $base_url?>images/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<!-- End facy box-->
<!--Begin carouFredSel-->
<!--<script type="text/javascript" src="<?/*=base_url()*/?>images/js/jquery.carouFredSel-5.6.4-packed.js"></script>-->
<!--End carouFredSel-->

<!--Begin jquey simplyscroll-->
<!--<script type="text/javascript" src="<?/*=$base_url;*/?>images/js/simplyscroll/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="<?/*=$base_url;*/?>images/js/simplyscroll/jquery.simplyscroll.css" media="all" type="text/css" />-->
<!--End jquey simplyscroll-->

<!--facy box-->
<script type="text/javascript" src="<?= $base_url?>images/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $base_url?>images/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<!--facy box-->

<!--facy box-->
<script type="text/javascript" src="<?= $base_url?>js/main.js"></script>
<!--facy box-->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-44376357-1', 'sotaynhadat.vn');
    ga('send', 'pageview');

</script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=397129657010987";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="sreenwrap <?php echo $this->menu_active == 'home' ? 'homepage' : ''; ?>" style="width:980px; margin:0px auto;">
    <div class="wrap" style="background: #fff; width:980px; height:auto; float:left;">
        <?php $this->load->view('front/includes/header');?>
        <?php $this->load->view('front/includes/menu');?>
        <?php //$this->load->view('front/includes/slide');?>
        <?php //$this->load->view('front/includes/slide-word');?>
        <?php $this->load->view($view);?>
        <?php //$this->load->view('front/includes/footer');?>
    </div>
</div>
</body>
</html>

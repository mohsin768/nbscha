<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="<?php echo $site_name; ?>">
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="keywords" content="<?php echo $meta_keywords; ?>">
<title><?php echo $meta_title;?> - <?php echo $site_name; ?></title>

<!-- Favicon and Touch Icons -->
<link href="<?php echo frontend_assets_url('public/images/favicon/favicon-32x32.png'); ?>" rel="shortcut icon" type="image/png">

<!-- Stylesheet -->
<link href="<?php echo frontend_assets_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo frontend_assets_url('css/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo frontend_assets_url('css/animate.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo frontend_assets_url('css/css-plugin-collections.css'); ?>" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?php echo frontend_assets_url('css/menuzord-skins/menuzord-rounded-boxed.css'); ?>" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?php echo frontend_assets_url('css/style-main.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?php echo frontend_assets_url('css/preloader.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?php echo frontend_assets_url('css/custom-bootstrap-margin-padding.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?php echo frontend_assets_url('css/responsive.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<link href="<?php echo frontend_assets_url('css/style.css'); ?>" rel="stylesheet" type="text/css">

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?php echo frontend_assets_url('css/revolution-slider/css/settings.css'); ?>" rel="stylesheet" type="text/css"/>
<link  href="<?php echo frontend_assets_url('css/revolution-slider/css/layers.css'); ?>" rel="stylesheet" type="text/css"/>
<link  href="<?php echo frontend_assets_url('css/revolution-slider/css/navigation.css'); ?>" rel="stylesheet" type="text/css"/>
<link  href="<?php echo frontend_assets_url('css/jquery.multiselect.css'); ?>" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?php echo frontend_assets_url('css/colors/theme-skin-color-set-1.css'); ?>" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?php echo frontend_assets_url('js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?php echo frontend_assets_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo frontend_assets_url('js/bootstrap.min.js'); ?>"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo frontend_assets_url('js/jquery-plugin-collection.js'); ?>"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?php echo frontend_assets_url('js/revolution-slider/js/jquery.themepunch.tools.min.js'); ?>"></script>
<script src="<?php echo frontend_assets_url('js/revolution-slider/js/jquery.themepunch.revolution.min.js'); ?>"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NQZRQB335Q"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NQZRQB335Q');
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
	.section-content .breadcrumb {
	    padding: 25px 0px 0px 15px;
	    margin-bottom: 0px;
	    list-style: none;
	    background-color: transparent;
	    border-radius: 4px;
	    float: right;
	    font-size: 15px;
	    font-weight: 600;
	}
	section.inner-header.divider.parallax.layer-overlay.overlay-dark-5{
		background-image: url('public/header-bar-img.jpg')!important;
	}
</style>
<style>
  div#rs-1-layer-1 {
      font-size: 90px!important;
  }

  .post .entry-content {
      height: 180px;
      overflow: hidden;
      text-overflow: ellipsis;
  }
  form#volunteer_apply_form {
      padding: 30px 30px 72px!important;
  }
  .text-white a {
    color: #fff !important;
  }
  .project .project-details {
      height: 84px;
  }
  h4.entry-title.text-white.text-capitalize.m-0 a {
      color: #000!important;
  }
  .board-cl  .project .project-details {
      height: auto!important;
  }
  .bc-op {
      background: rgba(31, 56, 107, 0.75) !important;
      padding: 15px!important;
      border-radius: 30px;
      margin: 25px 0 0 0!important;
  }
  @media(min-width: 767px){
  	.md-img{
  		width: 230px; height: 140px;
  	}
  	.post-thumb.thumb.home-thumb {
  	    width: 347px;
  	    height: 247px;
  	}
  	.post-thumb.thumb.home-thumb img{
  	  height: 247px;
  	}
  }
  @media(max-width: 767px){
  	#playbtnimg { display: none; }
  }
</style>
</head>
<body class="">
	<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="images/preloaders/5.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>

  <?php echo $header; ?>
 <!-- Start main-content -->
 <div class="main-content">
  <?php echo $banner; ?>
  <?php echo $content_top; ?>
  <?php echo $content; ?>
  <?php echo $content_bottom; ?>
 </div>
 <!-- end main-content -->

  <?php echo $footer; ?>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
	<!-- end wrapper -->

	<!-- Footer Scripts -->
  <script src="<?php echo frontend_assets_url('js/jquery.multiselect.js'); ?>"></script>
	<!-- JS | Custom script for all pages -->

	<script src="<?php echo frontend_assets_url('js/custom.js'); ?>"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
	      (Load Extensions only on Local File Systems !
	       The following part can be removed on Server for On Demand Loading) -->
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.actions.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.carousel.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.migration.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.navigation.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.parallax.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo frontend_assets_url('js/revolution-slider/js/extensions/revolution.extension.video.min.js'); ?>"></script>
		<script>
		$(document).click(function(e){
		if(e.target.className =="chk-txt" || e.target.className=="chk-txt sim-sr" || e.target.className =="overSelect" || e.target.className==""){ }else{ $("#checkboxes").css("display","none"); $("#checkboxesadvance").css("display","none"); }
		console.log(e.target.className);
		});
	</script>
	</body>
</html>

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
<link  href="<?php echo frontend_assets_url('css/revolution-slider/css/navigation.css'); ?> rel="stylesheet" type="text/css"/>

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

  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-white-f1 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5">
                <li> <i class="fa fa-phone text-theme-colored"></i> Call Us at <a href="#">(506) 639-4478</a> </li>
                <li> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="info@nbscha.com">info@nbscha.com</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget no-border m-0">
              <div class="pull-right flip sm-pull-none sm-text-center">
                <a href="javaScript:;" onclick="window.open('https://nbscha.ca/covid-statment','_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,left=350,width=650,height=650')"><b style="color: #ff0000">Covid-19 Statement</b></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
              <img src="images/care_logo.png" alt="">
            </a>
            <ul class="menuzord-menu">
              <li class="active"><a href="index.html">HOME</a>
              <li class=""><a href="about.html">ABOUT</a>
              <li class=""><a href="residences.html">RESIDENCES</a>
              <li class=""><a href="board.html">BOARD</a>
              <li class=""><a href="sponsors.html">SPONSORS</a>
              <li class=""><a href="events.html">NEWS</a>
              <li class=""><a href="contact.html">CONTACT</a></li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

 <!-- Start main-content -->
 <div class="main-content">
   <!-- Section: home -->
   <section id="home">

     <!-- Slider Revolution Start -->
     <div class="rev_slider_wrapper">
       <div class="rev_slider" data-version="5.0">
         <ul>

           <!-- SLIDE 1 -->
           <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
	            <!-- MAIN IMAGE -->
	            <img src="images/slide/c1.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
	            <!-- LAYERS -->

	            <!-- LAYER NR. 1 -->
	            <div class="tp-caption tp-resizeme text-uppercase  bg-theme-colored-transparent text-white font-raleway border-left-theme-color-2-6px border-right-theme-color-2-6px pl-30 pr-30"
	               id="rs-2-layer-1"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['-90']"
	               data-fontsize="['28']"
	               data-lineheight="['54']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1000"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;">Welcome to the NBSCHA
	            </div>

	            <!-- LAYER NR. 2 -->
	            <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
	               id="rs-2-layer-2"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['-20']"
	               data-fontsize="['48']"
	               data-lineheight="['70']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1000"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;">When you are not able. let us be of assistance
	            </div>

	            <!-- LAYER NR. 3 -->
	            <div class="tp-caption tp-resizeme text-white text-center bc-op"
	               id="rs-2-layer-3"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['50']"
	               data-fontsize="['16']"
	               data-lineheight="['28']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1400"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;"><b>Providing the right services for special care to welcome<br>the residents to their new homes.</b>
	            </div>
           </li>

           <!-- SLIDE 2 -->
           <li data-index="rs-2" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide 2" data-description="">
	            <!-- MAIN IMAGE -->
	            <img src="images/slide/c2.jpg"  alt=""  data-bgposition="center 40%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
	            <!-- LAYERS -->

	            <!-- LAYER NR. 1 -->
	            <div class="tp-caption tp-resizeme text-uppercase  bg-theme-colored-transparent text-white font-raleway border-left-theme-color-2-6px border-right-theme-color-2-6px pl-30 pr-30"
	               id="rs-2-layer-1"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['-90']"
	               data-fontsize="['28']"
	               data-lineheight="['54']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1000"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;">Join Our Network
	            </div>

	            <!-- LAYER NR. 2 -->
	            <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
	               id="rs-2-layer-2"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['-20']"
	               data-fontsize="['48']"
	               data-lineheight="['70']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1000"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;">Become a Member
	            </div>

	            <!-- LAYER NR. 3 -->
	            <div class="tp-caption tp-resizeme text-white text-center bc-op"
	               id="rs-2-layer-3"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['50']"
	               data-fontsize="['16']"
	               data-lineheight="['28']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1400"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;"><b>Get listed on our website and access membership<br> benefits by registering your home.</b>
	            </div>



           </li>

           <!-- SLIDE 3 -->
           <li data-index="rs-3" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-description="">
                <!-- MAIN IMAGE -->
             	<img src="images/slide/c3.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
             	<!-- LAYERS -->

             	<!-- LAYER NR. 1 -->
	            <div class="tp-caption tp-resizeme text-uppercase  bg-theme-colored-transparent text-white font-raleway border-left-theme-color-2-6px border-right-theme-color-2-6px pl-30 pr-30"
	               id="rs-2-layer-1"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['-90']"
	               data-fontsize="['28']"
	               data-lineheight="['54']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1000"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;">New Brunswick Special Care Homes
	            </div>

	            <!-- LAYER NR. 2 -->
	            <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
	               id="rs-2-layer-2"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['-20']"
	               data-fontsize="['48']"
	               data-lineheight="['70']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1000"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;"> Browse our homes
	            </div>

	             <!-- LAYER NR. 3 -->
	            <div class="tp-caption tp-resizeme text-white text-center bc-op"
               		id="rs-2-layer-3"

	               data-x="['center']"
	               data-hoffset="['0']"
	               data-y="['middle']"
	               data-voffset="['50']"
	               data-fontsize="['16']"
	               data-lineheight="['28']"
	               data-width="none"
	               data-height="none"
	               data-whitespace="nowrap"
	               data-transform_idle="o:1;s:500"
	               data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
	               data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
	               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
	               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
	               data-start="1400"
	               data-splitin="none"
	               data-splitout="none"
	               data-responsive_offset="on"
	               style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;">If you are interested in reserving a home,<br> please contact the owner directly by phone or email.
	            </div>


	            </div>
            </li>

         </ul>
       </div>
       <!-- end .rev_slider -->
     </div>
     <!-- end .rev_slider_wrapper -->
     <script>
       $(document).ready(function(e) {
         $(".rev_slider").revolution({
           sliderType:"standard",
           sliderLayout: "auto",
           dottedOverlay: "none",
           delay: 5000,
           navigation: {
               keyboardNavigation: "off",
               keyboard_direction: "horizontal",
               mouseScrollNavigation: "off",
               onHoverStop: "off",
               touch: {
                   touchenabled: "on",
                   swipe_threshold: 75,
                   swipe_min_touches: 1,
                   swipe_direction: "horizontal",
                   drag_block_vertical: false
               },
             arrows: {
               style:"zeus",
               enable:true,
               hide_onmobile:true,
               hide_under:600,
               hide_onleave:true,
               hide_delay:200,
               hide_delay_mobile:1200,
               tmp:'',
               left: {
                 h_align:"left",
                 v_align:"center",
                 h_offset:30,
                 v_offset:0
               },
               right: {
                 h_align:"right",
                 v_align:"center",
                 h_offset:30,
                 v_offset:0
               }
             },
             bullets: {
               enable:true,
               hide_onmobile:true,
               hide_under:600,
               style:"metis",
               hide_onleave:true,
               hide_delay:200,
               hide_delay_mobile:1200,
               direction:"horizontal",
               h_align:"center",
               v_align:"bottom",
               h_offset:0,
               v_offset:30,
               space:5,
               tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
             }
           },
           responsiveLevels: [1240, 1024, 778],
           visibilityLevels: [1240, 1024, 778],
           gridwidth: [1170, 1024, 778, 480],
           gridheight: [650, 768, 960, 720],
           lazyType: "none",
           parallax: {
               origo: "slidercenter",
               speed: 1000,
               levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
               type: "scroll"
           },
           shadow: 0,
           spinner: "off",
           stopLoop: "on",
           stopAfterLoops: 0,
           stopAtSlide: -1,
           shuffle: "off",
           autoHeight: "off",
           fullScreenAutoWidth: "off",
           fullScreenAlignForce: "off",
           fullScreenOffsetContainer: "",
           fullScreenOffset: "0",
           hideThumbsOnMobile: "off",
           hideSliderAtLimit: 0,
           hideCaptionAtLimit: 0,
           hideAllCaptionAtLilmit: 0,
           debugMode: false,
           fallbacks: {
               simplifyAll: "off",
               nextSlideOnWindowFocus: "off",
               disableFocusListener: false,
           }
         });
       });
     </script>
     <!-- Slider Revolution Ends -->

   </section>

   <!-- Section: home-boxes -->
   <section>
     <div class="container pt-0 pb-0">
       <div class="section-content">
         <div class="row equal-height-inner home-boxes" data-margin-top="-100px">
           <div class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay1">
             <div class="sm-height-auto bg-theme-colored">
               <div class="text-center pt-30 pb-30">
                 <i class="fa fa-user text-white font-64 pb-10"></i>
                 <div class="p-10">
                   <h4 class="text-uppercase text-white mt-0">Membership</h4>
                   <p class="text-white">Owners/Operators join our network<br>of special care homes</p>
                   <a href="https://nbscha.ca/register_member" class="btn btn-border btn-circled btn-transparent btn-sm">Join Us Now</a>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay2">
             <div class="sm-height-auto bg-theme-colored-darker2">
               <div class="text-center pt-30 pb-30">
                 <i class="fa fa-comments-o text-white font-64 pb-10"></i>
                 <div class="p-10">
                   <h4 class="text-uppercase text-white mt-0">Questions?</h4>
                   <p class="text-white">Considering a special care home?<br>Here is a good place to start</p>
                   <a href="faq" class="btn btn-border btn-circled btn-transparent btn-sm">Get help</a>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay3">
             <div class="sm-height-auto bg-theme-colored-darker3">
               <div class="text-center pt-30 pb-30">
                 <i class="fa fa-book fa-fw text-white font-64 pb-10"></i>
                 <div class="p-10">
                   <h4 class="text-uppercase text-white mt-0">Residences</h4>
                   <p class="text-white">Explore key information on our<br>homes and available vacancies</p>
                   <a href="https://nbscha.ca/residences" class="btn btn-border btn-circled btn-transparent btn-sm">Find Us Now</a>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay4">
             <div class="sm-height-auto bg-theme-colored-darker4">
               <div class="text-center pt-30 pb-30">
                 <i class="fa fa-mobile text-white font-64 pb-10"></i>
                 <div class="p-10">
                   <h4 class="text-uppercase text-white mt-0">Member Login</h4>
                   <p class="text-white">Are you a member?<br>Login to get your latest updates.</p>
                   <a href="https://nbscha.ca/user_login" target="_blank" class="btn btn-border btn-circled btn-transparent btn-sm">Find Us Now</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>


   <!-- Section: About -->
   <section id="about">
     <div class="container pb-70">
       <div class="section-content">
         <div class="row">
           <div class="col-md-8 col-sm-12">
             <h2 class="text-uppercase mt-0">Welcome to the New Brunswick Special <span class="text-theme-color-2">Care Home</span>&nbsp;Association Inc.</h2>
             <p class="lead">We promote and develop awareness throughout New Brunswick of the great service our special care homes provide</p>
             <p>The New Brunswick Special Care Home Association is here to assist licensed members in providing quality, cost-effective services for seniors and adults with special needs who require 24-hour care and supervision, in cooperation with the Department of Social Development. We advocate for this vital sector on a regular basis to bring key issues to the forefront.  Our Board of Directors is committed to improving our association services and partnerships with key stakeholders and other partners in Long Term Care.  Our website also provides an opportunity for the public, discharge planners, social workers and others to access details about our members’ homes and their unique services.</p>
             <div class="row mt-30">
               <div class="col-sm-4 col-md-4">
                 <img class="img-fullwidth mb-sm-30 md-img" src="public/images/front_1.jpg" alt="">
               </div>
                <div class="col-sm-4 col-md-4">
                 <img class="img-fullwidth mb-sm-30 md-img" src="public/images/front_2.jpg" alt="">
               </div>
                <div class="col-sm-4 col-md-4">
                 <img class="img-fullwidth mb-sm-30 md-img" src="public/images/front_3.jpg" alt="">
               </div>
             </div>

           </div>
           <div class="col-xs-12 col-sm-6 col-md-4 pl-40 pl-sm-20 mr-sm-20">
             <h3 class="text-uppercase line-bottom mt-sm-30 mt-0"> <span class="text-theme-colored">RESOURCE LINKS</span></h3>
             <div class="bxslider bx-nav-top p-0 m-0">
             	                                	                  <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                   <div class="pricing  maxwidth400">
                     <div class="row">
                       <div class="icon-box icon-box-effect mb-0 mt-0 p-15 bg-theme-colored border-bottom-3px">
                         <a href="javaScript:;" class="icon mb-0 mr-0 pull-left flip">
                           <img src="public/images/1620552325-16097aa85ba453.png" style="width: 50px; height: 50px; padding-top: 15px;">
                         </a>
                         <div class="ml-80">
                            <h5 class="icon-box-title mt-15 mb-5 text-white text-left"><strong><a href="https://www.gnb.ca/socialdevelopment" target="_blank">Department of Social Development</a></strong></h5>
                            <p class="text-white text-left" style="padding-right:20px;">Great resource for youth, families, seniors and persons w/disabilities.<a target="_blank" class="font-15 pl-10 text-white" href="javaScript:;"><!--  read more... --></a></p>
                         </div>
                       </div>
                     </div>
                   </div>
                  </div>
                                                  	                  <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                   <div class="pricing  maxwidth400">
                     <div class="row">
                       <div class="icon-box icon-box-effect mb-0 mt-0 p-15 bg-theme-colored border-bottom-3px">
                         <a href="javaScript:;" class="icon mb-0 mr-0 pull-left flip">
                           <img src="public/images/1620552481-16097ab2152a67.png" style="width: 50px; height: 50px; padding-top: 15px;">
                         </a>
                         <div class="ml-80">
                            <h5 class="icon-box-title mt-15 mb-5 text-white text-left"><strong><a href="https://www.gnb.ca/" target="_blank">Government of New Brunswick</a></strong></h5>
                            <p class="text-white text-left" style="padding-right:20px;">Find out the latest news, information and links pertaining to the New Brunswick Government.<a target="_blank" class="font-15 pl-10 text-white" href="javaScript:;"><!--  read more... --></a></p>
                         </div>
                       </div>
                     </div>
                   </div>
                  </div>
                                                  	                  <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                   <div class="pricing  maxwidth400">
                     <div class="row">
                       <div class="icon-box icon-box-effect mb-0 mt-0 p-15 bg-theme-colored border-bottom-3px">
                         <a href="javaScript:;" class="icon mb-0 mr-0 pull-left flip">
                           <img src="public/images/1620552778-16097ac4abcf7e.png" style="width: 50px; height: 50px; padding-top: 15px;">
                         </a>
                         <div class="ml-80">
                            <h5 class="icon-box-title mt-15 mb-5 text-white text-left"><strong><a href="https://www.worksafenb.ca/" target="_blank">Workplace Health and Safety</a></strong></h5>
                            <p class="text-white text-left" style="padding-right:20px;">A great resource for workers and employers from Workplace health &amp; Safety. As well as all the latest news and updates.<a target="_blank" class="font-15 pl-10 text-white" href="javaScript:;"><!--  read more... --></a></p>
                         </div>
                       </div>
                     </div>
                   </div>
                  </div>
                                                  	                  <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                   <div class="pricing  maxwidth400">
                     <div class="row">
                       <div class="icon-box icon-box-effect mb-0 mt-0 p-15 bg-theme-colored border-bottom-3px">
                         <a href="javaScript:;" class="icon mb-0 mr-0 pull-left flip">
                           <img src="public/images/1620552790-16097ac56ac4b3.png" style="width: 50px; height: 50px; padding-top: 15px;">
                         </a>
                         <div class="ml-80">
                            <h5 class="icon-box-title mt-15 mb-5 text-white text-left"><strong><a href="http://laws.gnb.ca/en/showfulldoc/cs/P-5.05//20210114" target="_blank">Pay Equity Act</a></strong></h5>
                            <p class="text-white text-left" style="padding-right:20px;">Full Pay Equity Act publication posted by the Justice and Office of the Attorney General.<a target="_blank" class="font-15 pl-10 text-white" href="javaScript:;"><!--  read more... --></a></p>
                         </div>
                       </div>
                     </div>
                   </div>
                  </div>

             </div>
           </div>
         </div>
       </div>
     </div>
   </section>


   <!-- Diver: Video Background  -->
   <section class="divider parallax layer-overlay pt-10 pb-20 overlay-theme-colored-9" data-bg-img="" data-parallax-ratio="0.7">
     <div class="container pt-60 pb-50">
       <!-- Section Content -->
       <div class="section-content">
         <div class="row">
           <div class="col-md-6 p-20 pt-0">
             <h3 class="text-white text-uppercase font-30 font-weight-600 mt-0 mb-20">How NBSCHA works for you?</h3>
             <p class="text-white lead p-5 pl-0 text-left">The association does for its members what they cannot easily do for themselves. The Group Benefit program has been helpful to many and has potential to improve and expand. Working with government on wage, per diem, and issues of standards is a very important role that no individual home can do.</p>
             <p class="text-white lead text-left">
														The re-branding as illustrated in these videos is yet another major element of service.  The new corporate structure of the association represents a commitment to strengthen its organization in its drive to become increasingly strong as a support to individual homes.  Enhanced and expanded education, group purchasing, collaboration with government and other associations is yet another role.  The association becomes stronger as more service providers get involved.</p>
           </div>
           <div class="col-md-6">
             <div class="fluid-video-wrapper">
               <!-- <iframe width="100%" height="371" src="https://nbscha.ca/public/video/NBSCHA-MASTER-Sept-8-2020.mp4?rel=0" allowfullscreen></iframe> -->
               <img src="https://nbscha.ca/public/btnplaybtn.png" id="playbtnimg" style="             width: 100px;
                   position: absolute;
                   left: 40%;
                   top: 35%;
               ">
               <video id="mediavid" width="100%" height="371" controls="" name="media"><source src="https://nbscha.ca/public/video/nbcsha-quality.mp4" type="video/mp4"></video>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>





      <!-- Section: Blog -->
   <section id="blog">
     <div class="container pb-70">
       <div class="section-title mb-20 text-center">
         <div class="row">
           <div class="col-md-8 col-md-offset-2">
             <h2 class="mt-0 line-height-1 text-uppercase">Recent  <span class="text-theme-color-2"> News</span></h2>
             <p>Please see below the latest news and articles our association regards as very important information to our staff and clients. We will be updating frequently. Keep checking back for more updates!</p>
           </div>
         </div>
       </div>
       <div class="section-content">
         <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-4">
               <article class="post clearfix mb-sm-30">
                 <div class="entry-header">
                   <div class="post-thumb thumb home-thumb">
                   	                   		                   		                   		<!-- <iframe src="https://www.youtube.com/embed/LmIV2L4xVqs" width="370" height="247"></iframe> -->
                   		 <img src="https://img.youtube.com/vi/LmIV2L4xVqs/mqdefault.jpg" alt="" class="img-responsive img-fullwidth" width="370" height="247">
                   		                   	                   </div>
                 </div>
                 <div class="entry-content p-20 pr-10">
                   <div class="entry-meta mt-0 no-bg no-border">
                     <div class="event-content">
                       <h4 class="entry-title text-white text-capitalize m-0"><a href="#" style="pointer-events: none; cursor: none;">NBSCHA Affordable. Quality. No...</a></h4>
                     </div>
                   </div>
                   <p class="mt-10">New Brunswick Special Care Home Association offers over 400 homes with up to 1000 available beds. Affordable quality health care available right now. <a href="news-details.html" class="text-theme-colored font-15 pl-20"> Read More →</a></p>
                   <div class="clearfix"></div>
                 </div>
                <div class="bg-theme-colored p-5 text-center pt-10 pb-10">
                  <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-calendar mr-5 text-white"></i>31&nbsp;March</span>
                   <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-user mr-5 text-white"></i>posted by NBSCHA</span>
                </div>
               </article>
              </div>
                     </div>
       </div>
     </div>
   </section>


 </div>
 <!-- end main-content -->
<script>
	window.mobileCheck = function() {
	  let check = false;
	  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	  return check;
	};
	if(mobileCheck){
		var vid = document.getElementById("mediavid");
		vid.addEventListener('play',function(){
			$("#playbtnimg").hide();
		});
		vid.addEventListener('pause',function(){
			$("#playbtnimg").show();
		});
	}

</script>

	<!-- Footer -->
<footer id="footer" class="footer bg-black-222" data-bg-img="images/footer-bg.png">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-15" alt="" src="images/logo_footer.png">
            <p class="font-16 mb-10">The New Brunswick Special Care Home Association Inc. aims to assist members in providing quality, cost effective services for seniors, mental health residents, and adults with disabilities in cooperation with the Department of Social Development.</p>
            <ul class="styled-icons icon-dark mt-20">
              <!-- <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li> -->
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
                                          <article class="post media-post clearfix pb-0 mb-10">
                <!-- <a href="https://nbscha.ca/event-detail?id=21" class="post-thumb"><img alt="" src="https://nbscha.ca/public/" style="width: 80px; height: 55px;"></a> -->
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="news-details.html">NBSCHA Affordable. Quality. No...</a></h5>
                  <p class="post-date mb-0 font-12">31&nbsp;March</p>
                </div>
              </article>
                          </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Resources</h5>
            <ul class="list-border">
                                            <li><a href="https://www.gnb.ca/socialdevelopment" target="_blank">Department of Social Development</a></li>
                              <li><a href="https://www.gnb.ca/" target="_blank">Government of New Brunswick</a></li>
                              <li><a href="https://www.worksafenb.ca/" target="_blank">Workplace Health and Safety</a></li>
                              <li><a href="http://laws.gnb.ca/en/showfulldoc/cs/P-5.05//20210114" target="_blank">Pay Equity Act</a></li>
                          </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Contact</h5>
            <ul class="list-border">
              <li><a href="#">(506) 639-4478</a></li>
              <li><a href="#">info@nbscha.com</a></li>
              <li><a href="#" class="lineheight-20">527 Dundonald Street, Suite 176 Fredericton, New Brunswick E3B 1X5</a></li>
            </ul>
            <p class="font-16 text-white mb-5 mt-15">Want To Hear From Us?</p>
            <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
              <input type="hidden" name="_token" value="E6wKJ3XoRj1fUT597IzVbKWI2aM0IySP2Q2xgERn">              <label class="display-block" for="mce-EMAIL"></label>
              <div class="input-group">
                <input type="email" value="" name="email" placeholder="Your Email"  class="form-control" data-height="37px" id="mce-EMAIL">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>
                </span>
              </div>
            </form>

            <!-- Mailchimp Subscription Form Validation-->
            <script type="text/javascript">
              $('#footer-mailchimp-subscription-form').submit(function(e){
                e.preventDefault();
                $.ajax({
                  type : 'POST',
                  url: 'https://nbscha.ca/send-subscriber-email',
                  data: $('#footer-mailchimp-subscription-form').serialize(),
                  success : mailChimpCallBack
                });
              });

              function mailChimpCallBack(resp) {
                  // Hide any previous response text
                  var $mailchimpform = $('#footer-mailchimp-subscription-form'),
                      $response = '';
                  $mailchimpform.children(".alert").remove();
                  if (resp.result === 'success') {
                      $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.message + '</div>';
                  } else if (resp.result === 'error') {
                      $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.message + '</div>';
                  }
                  $mailchimpform.prepend($response);
              }
            </script>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">Copyright &copy;2022 NBSCHA. All Rights Reserved</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                <!-- <li>
                  <a href="faq">FAQ</a>
                </li>
                <li>|</li>
                <li>
                  <a href="site-map">Site Map</a>
                </li>
                <li>|</li>
                <li>
                  <a href="contact">Contact</a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
	<!-- end wrapper -->

	<!-- Footer Scripts -->
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
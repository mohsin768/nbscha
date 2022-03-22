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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- CSS | Theme Color -->
<link href="<?php echo frontend_assets_url('css/colors/theme-skin-color-set-1.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo frontend_assets_url('css/custom.css'); ?>" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="<?php echo frontend_assets_url('js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?php echo frontend_assets_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo frontend_assets_url('js/bootstrap.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $this->settings['RECAPTCHA_SITE_KEY']; ?>"></script>
<script>
    var siteBaseUrl = '<?php echo site_url('/'); ?>';
    var captchaSiteKey = '<?php echo $this->settings['RECAPTCHA_SITE_KEY']; ?>';
</script>
</head>
<body class="">
	<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="<?php echo frontend_assets_url('images/preloaders/5.gif'); ?>">
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
	</body>
</html>

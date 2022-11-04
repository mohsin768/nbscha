<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo common_assets_url('images/favicon.png'); ?>" type="image/png" />
        <title><?php echo $this->config->item('site_name'); ?> - Member Application</title>
        <!-- Bootstrap -->
        <link href="<?php echo common_assets_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo common_assets_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo common_assets_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?php echo common_assets_url('vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo common_assets_url('build/css/custom.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo admin_assets_url('css/celiums.css'); ?>" rel="stylesheet">
    </head>
    <body class="login">
        <div class="">
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right"> 
                        <li class="nav-item" style="padding: 0px 15px;">
                            <select id="language-switch" name="language">
                                <?php foreach($this->languages_pair as $languageCode => $langaugeName): $default=false; if($languageCode == $this->member_language){ $default=true; }?>
                                    <option <?php echo set_select('lanaguage',$languageCode,$default); ?> value="<?php echo $languageCode; ?>"><?php echo $langaugeName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <li class="nav-item">
                        <?php echo translate('INTERFACE_LANGUAGE','Interface Language','member');?>
                        </li>  
                    </ul>
                </nav>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div class="login-logo"><img src="<?php echo common_assets_url('images/logo.png'); ?>" /></div>
                <?php echo $content; ?>
                <div class="separator">
                </div>
                <div class="login-footer">
                    <p>&copy; <?php echo date('Y'); ?> All Rights Reserved. <br/><?php echo $this->config->item('site_name'); ?></p>
                </div>
            </section>
        </div>
        </div>
        </div>
        <div class="clearfix"></div>
    </body>
    <script src="<?php echo common_assets_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script>
        $(document).ready(function(){
            $('#language-switch').change(function(){
                var languageCode = $(this).val();
                var switchURL = '<?php echo member_url('language/switch/')?>'+languageCode;
                window.location.href = switchURL;
            });
        });
    </script>
</html>

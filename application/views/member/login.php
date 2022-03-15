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
        <div>
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
    </body>
</html>

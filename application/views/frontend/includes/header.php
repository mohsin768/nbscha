
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
                    <ul class="list-inline text-right sm-text-center">
                    <?php $i=0; foreach($top_menu as $menuItem): $i++;?>
                    <li>
                        <a href="<?php echo $menuItem['url']; ?>" class="text-white"><b style="color: #ff0000"><?php echo $menuItem['name']; ?></b></a>
                    </li>
                    <?php if($i !='1'){ ?>
                    <li class="text-white" style="color: #ff0000">|</li>
                    <?php } ?>
                    <?php endforeach; ?>
                    </ul>     
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
                <a class="menuzord-brand pull-left flip" href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo frontend_assets_url('images/care_logo.png'); ?>" alt="">
                </a>
                <ul class="menuzord-menu">
                    <?php foreach($main_menu as $menuItem):?>
                    <li><a href="<?php echo $menuItem['url']; ?>"><?php echo $menuItem['name']; ?></a>
                    <?php endforeach; ?>

                </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
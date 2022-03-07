<header id="header" class="header-area">
    <div class="elkevent-mobile-nav">
        <div class="logo">
            <a href="<?php echo site_url('/'); ?>"><img src="<?php echo frontend_assets_url('img/logo.png'); ?>" alt="logo"></a>
        </div>
    </div>

    <div class="elkevent-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?php echo site_url('/'); ?>"><img src="<?php echo frontend_assets_url('img/logo.png'); ?>" alt="logo"></a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    <?php foreach($main_menu as $menuItem):?>
                        <li class="nav-item"><a href="<?php echo $menuItem['url']; ?>" class="nav-link"><?php echo $menuItem['name']; ?></a></li>
                    <?php endforeach; ?>
                    </ul>

                    <div class="others-option">
                        <ul>
                            <?php foreach($top_menu as $menuItem):?>
                            <li>
                                <a href="<?php echo $menuItem['url']; ?>" class="btn btn-primary"><?php echo $menuItem['name']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<?php /*
<header id="navigation">  
    <div class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('/'); ?>"><img class="img-responsive roa-logo" src="<?php echo frontend_assets_url('images/logo.png'); ?>" alt="Logo"></a>
            </div>
            <nav class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php foreach($main_menu as $menuItem):?>
                    <li class="dropdown <?php echo $menuItem['status']; ?>">
                        <a href="<?php echo $menuItem['url']; ?>"><?php echo $menuItem['name']; ?> <?php if(count($menuItem['submenu'])>0){ ?> <i class="fa fa-angle-down"></i> <?php } ?>
                            <?php if($menuItem['level']=='0'){ ?>
                            <div class="equalizer">
                                <span class="bar bar-1"></span>
                                <span class="bar bar-2"></span>
                                <span class="bar bar-3"></span>
                                <span class="bar bar-4"></span>
                                <span class="bar bar-5"></span>
                                <span class="bar bar-6"></span>
                                <span class="bar bar-7"></span>
                                <span class="bar bar-8"></span>
                                <span class="bar bar-9"></span>
                                <span class="bar bar-10"></span>
                            </div>
                            <?php } ?>
                        </a>
                        <?php if(count($menuItem['submenu'])>0){ ?>
                        <ul class="sub-menu menu fadeInUp" role="menu">	
                            <?php foreach($menuItem['submenu'] as $subMenuItem):?>
                            <li><a href="<?php echo $subMenuItem['url']; ?>"><?php echo $subMenuItem['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <a href="<?php echo site_url('register'); ?>" class="btn btn-primary">Register now!</a> 
        </div><!-- container -->
    </div><!-- navbar -->                                
</header><!-- Header --> 
*/ ?>
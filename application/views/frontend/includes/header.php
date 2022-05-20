
<!-- Header -->
<header id="header" class="header">
    <div class="header-top bg-white-f1 sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                <div class="widget no-border m-0">
                    <ul class="list-inline sm-text-center mt-5">
                      <li>Monday - Saturday 8AM -7PM</li>

                    </ul>
                </div>
                </div>
                <div class="col-md-5">
                <div class="widget no-border m-0">
                    <div class="pull-right flip sm-pull-none sm-text-center">
                    <ul class="list-inline text-right sm-text-center">
                      <li> <i class="fa fa-phone text-theme-colored"></i> <?php echo translate('HEADER_CALLUS','Call Us at');?> <a href="tel:+<?php echo preg_replace("/[^0-9]/", "", $this->settings['CONTACT_PHONE']); ?>"><?php echo $this->settings['CONTACT_PHONE']; ?></a> </li>
                      <li> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="mailto:<?php echo $this->settings['CONTACT_EMAIL']; ?>"><?php echo $this->settings['CONTACT_EMAIL']; ?></a> </li>
                    <?php $i=0; foreach($this->languages_pair as $code => $name): if( $code!= $this->site_language){ $i++;?>
                    <li>
                        <a href="<?php echo language_url($code); ?>" class=""><b><?php echo $name; ?></b></a>
                    </li>
                    <?php if($i !='1'){ ?>
                    <li class="">|</li>
                    <?php }} ?>
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
                    <li <?php if($menuItem['url']==$current_url){ ?>class="active"<?php } ?>><a href="<?php echo $menuItem['url']; ?>"><?php echo $menuItem['name']; ?></a>
                    <?php endforeach; ?>
                    <?php $i=0; foreach($top_menu as $menuItem): $i++;?>
                    <li>
                        <a href="<?php echo $menuItem['url']; ?>" class="text-white covid-button"><b><?php echo $menuItem['name']; ?></b></a>
                    </li>
                    <?php if($i !='1'){ ?>
                    <li class="text-white" style="color: #ff0000">|</li>
                    <?php } ?>
                    <?php endforeach; ?>

                </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

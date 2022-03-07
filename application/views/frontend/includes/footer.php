<section class="subscribe-area">
    <div class="container">
        <div class="subscribe-inner">
            <span>Want Something Extra?</span>
            <h2>Sign Up For Our Newsletter</h2>

            <form class="newsletter-form" data-toggle="validator">
                <input type="email" class="form-control" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                <button class="btn btn-primary" type="submit">Subscribe</button>
                <div id="validator-newsletter" class="form-result"></div>
            </form>
        </div>
    </div>
</section>
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-footer-widget">
                    <?php echo $footer_left; ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="single-footer-widget">
                    <?php echo $footer_right; ?>

                    <ul class="social-links">
                        <?php if($facebook!=''){ ?>
                        <li><a href="<?php echo $facebook; ?>" class="facebook" target="_blank"><i class="icofont-facebook"></i></a></li>
                        <?php } ?>
                        <?php if($twitter!=''){ ?> 
                        <li><a href="<?php echo $twitter; ?>" class="twitter" target="_blank"><i class="icofont-twitter"></i></a></li>
                        <?php } ?>
                        <?php if($linkedin!=''){ ?> 
                        <li><a href="<?php echo $linkedin; ?>" class="linkedin" target="_blank"><i class="icofont-linkedin"></i></a></li>
                        <?php } ?>
                        <?php if($instagram!=''){ ?> 
                        <li><a href="<?php echo $instagram; ?>" class="instagram" target="_blank"><i class="icofont-instagram"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="copyright-area">
                    <div class="logo">
                        <a href="<?php echo site_url('/'); ?>">
                            <img src="<?php echo frontend_assets_url('img/logo.png'); ?>" alt="logo">
                        </a>
                    </div>
                     <ul>
                     <?php foreach($footer_menu as $menuItem):?>
                        <li><a href="<?php echo $menuItem['url']; ?>"><?php echo $menuItem['name']; ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                    <p><i class="icofont-copyright"></i> <?php echo date('Y'); ?>, <?php echo $this->settings['SITE_NAME']; ?>. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="back-to-top">Top</div>
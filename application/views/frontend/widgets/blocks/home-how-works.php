<section class="divider parallax layer-overlay pt-10 pb-20 overlay-theme-colored-9" data-bg-img="" data-parallax-ratio="0.7">
    <div class="container pt-60 pb-50">
    <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-6 p-20 pt-0">
                    <?php echo $content; ?>
                </div>
                <div class="col-md-6">
                    <?php if($video){ ?>    
                    <div class="fluid-video-wrapper">
                        <img src="<?php echo frontend_assets_url('public/btnplaybtn.png'); ?>" id="playbtnimg" style=" width: 100px; position: absolute;left: 40%;top: 35%;">
                        <video id="mediavid" width="100%" height="371" controls="" name="media"><source src="<?php echo $video; ?>" type="video/mp4"></video>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
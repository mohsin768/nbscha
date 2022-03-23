<section class="divider parallax layer-overlay overlay-theme-color-sky" data-bg-img="<?php echo $background; ?>">
    <div class="container pt-60 pb-70">
    <div class="section-title text-center">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-uppercase text-white line-bottom-center mt-0"><?php echo $title; ?> <span class="text-theme-color-2"><?php echo $subtitle; ?></span></h2>
            <div class="title-flaticon">
            <i class="flaticon-charity-alms"></i>
            </div>
            <?php echo $content; ?>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="owl-carousel-1col  style2 dots-white" data-dots="false" data-duration="17000">
            <?php if(is_array($testimonials) && count($testimonials)>0){ ?>
            <?php $i=0; foreach($testimonials as $testimonial): $i++; ?>
            <div class="item">
            <div class="testimonial bg-theme-color-2 p-30 pb-20 mt-50">
                <h4 class="author text-white mt-0 mb-0"></h4>
                <h6 class="title text-white mt-0 mb-15"></h6>
                <?php echo $testimonial['message']; ?>
            </div>
            </div>
            <?php endforeach; } ?>
        </div>
        </div>
    </div>
    </div>
</section>
<section class="divider parallax layer-overlay" data-bg-img="<?php echo $background; ?>" data-parallax-ratio="0.7">
    <div class="container pt-70 pb-60">
    <div class="row">
        <?php if(is_array($facts) && count($facts)>0){ ?>
        <?php $i=0; foreach($facts as $fact): $i++; ?>
        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
        <div class="funfact text-center">
            <i class="fa <?php echo $fact['icon_class']; ?> mt-5 text-white"></i>
            <h2 data-animation-duration="2000" data-value="<?php echo $fact['number']; ?>" class="animate-number text-white mt-0 font-38 font-weight-500"><?php echo $fact['number']; ?></h2>
            <h4 class="text-white text-uppercase"><?php echo $fact['name']; ?></h4>
        </div>
        </div>
        <?php endforeach; } ?>
    </div>
    </div>
</section>
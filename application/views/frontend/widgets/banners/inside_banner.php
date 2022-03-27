<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo $banner; ?>">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
            <div class="col-md-12">
                <h2 class="title text-white text-center"><?php echo $title; ?></h2>
                <ol class="breadcrumb text-left text-black mt-10">
                <li class="text-gray-silver"><a href="<?php echo site_url('/'); ?>">Home</a></li>
                <?php if($parentSlug!='' && $parentTitle!=''){ ?>
                <li class="text-gray-silver"><a href="<?php echo site_url($parentSlug); ?>"><?php echo $parentTitle; ?></a></li>
                <?php }?>
                <li class="active text-gray-silver"><?php echo $breadcrumbTitle; ?></li>
                </ol>
            </div>
            </div>
        </div>
    </div>
</section>

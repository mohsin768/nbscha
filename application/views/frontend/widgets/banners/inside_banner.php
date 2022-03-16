<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
            <div class="col-md-12">
                <h2 class="title text-white text-center"><?php echo $title; ?></h2>
                <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                <li class="active text-gray-silver"><?php echo $title; ?></li>
                </ol>
            </div>
            </div>
        </div>
    </div>
</section>
<?php
/*<div class="page-title-area item-bg1" <?php if($banner!=''){ ?>style="background-image:url('<?php echo $banner; ?>');"<?php } ?>>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <span><?php echo $subtitle; ?></span>
        <ul>
            <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
            <li><?php echo $title; ?></li>
        </ul>
    </div>
</div>
*/
?>

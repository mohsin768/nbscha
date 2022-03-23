<section id="mission">
    <div class="container-fluid pt-0 pb-0">
    <div class="row equal-height">
        <div class="col-sm-12 col-md-6 xs-pull-none bg-theme-colored wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
        <div class="pt-60 pb-40 pl-90 pr-160 p-md-30">
            <h2 class="title text-white text-uppercase line-bottom mt-0 mb-30"><?php echo $title; ?></h2>
            <div class="icon-box clearfix m-0 p-0 pb-10">
            <a href="#" class="icon icon-lg pull-left flip sm-pull-none">
                <i class="fa fa-wheelchair text-white font-60"></i>
            </a>
            <div class="ml-120 ml-sm-0">
                <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">ADVOCATE</h4>
                <p class="text-white">We are dedicated to protecting the rights of our workers and advocate for equitable wages and benefits for our workers.</p>
            </div>
            </div>
            <div class="icon-box clearfix m-0 p-0 pb-10">
            <a href="#" class="icon icon-lg pull-left flip sm-pull-none">
                <i class="fa fa-user text-white font-60"></i>
            </a>
            <div class="ml-120 ml-sm-0">
                <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">EDUCATE</h4>
                <p class="text-white">We aim to provide standardized education and training that is in line with the needs and demands of our industry.</p>
            </div>
            </div>
            <div class="icon-box clearfix m-0 p-0 pb-10">
            <a href="#" class="icon icon-lg pull-left flip sm-pull-none">
                <i class="fa fa-money text-white font-60"></i>
            </a>
            <div class="ml-120 ml-sm-0">
                <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">IMPROVE</h4>
                <p class="text-white">We work with the government and other stakeholders on special projects in order to improve the sector as a whole.</p>
            </div>
            </div>
            <div class="icon-box clearfix m-0 p-0 pb-10">
            <a href="#" class="icon icon-lg pull-left flip sm-pull-none">
                <i class="fa fa-pencil fa-fw text-white font-60"></i>
            </a>
            <div class="ml-120 ml-sm-0">
                <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">INFORM</h4>
                <p class="text-white">We work with various government departments to ensure appropriate standards and regulations are implemented while communicating directly with the sector. </p>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 p-0 md-re">
        <?php if($video){ ?>    
        <div class="fluid-video-wrapper">
            <img src="public/btnplaybtn.png" id="playbtnimg" style=" width: 100px; position: absolute;left: 40%;top: 35%;">
            <video controls="" id="mediavid" name="media"><source src="<?php echo $video; ?>" type="video/mp4"></video>
        </div>
        <?php } ?>
        </div>
    </div>
    </div>
</section>
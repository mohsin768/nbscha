<section id="mission">
    <div class="container-fluid pt-0 pb-0">
    <div class="row equal-height">
        <div class="col-sm-12 col-md-6 xs-pull-none bg-theme-colored wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
        <div class="pt-60 pb-40 pl-90 pr-160 p-md-30">
            <h2 class="title text-white text-uppercase line-bottom mt-0 mb-30"><?php echo $title; ?></h2>
            <?php if(is_array($blocks) && count($blocks)>0){ ?>
            <?php $i=0; foreach($blocks as $block): $i++; ?>     
            <div class="icon-box clearfix m-0 p-0 pb-10">
            <?php if($block['icon_class']){ ?>
            <a href="#" class="icon icon-lg pull-left flip sm-pull-none">
                <i class="fa <?php echo $block['icon_class']; ?> text-white font-60"></i>
            </a>
            <?php } ?>
            <div class="ml-120 ml-sm-0">
                <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1"><?php echo $block['title']; ?></h4>
                <p class="text-white"><?php echo $block['caption_title']; ?></p>
            </div>
            </div>
            <?php endforeach; }?>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 p-0 md-re">
        <?php if($video){ ?>    
        <div class="fluid-video-wrapper">
            <img src="<?php echo frontend_assets_url('public/btnplaybtn.png'); ?>" id="playbtnimg" style=" width: 100px; position: absolute;left: 40%;top: 35%;">
            <video controls="" id="mediavid" name="media"><source src="<?php echo $video; ?>" type="video/mp4"></video>
        </div>
        <?php } ?>
        </div>
    </div>
    </div>
</section>
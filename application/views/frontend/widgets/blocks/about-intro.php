<section id="about">
    <div class="container pb-70">
    <div class="section-content">
        <div class="row">
        <div class="col-md-8 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
            <?php echo $content; ?>
            <?php if($image!=''){ ?>
            <img src="<?php echo $image; ?>" class="img-fluid" style="max-height: 358px;">
            <?php } ?>
        </div>
        <?php if(is_array($blocks) && count($blocks)>0){ ?>
        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="border-10px p-10 pt-0 pb-0 mt-30">
                <?php foreach($blocks as $block): ?>
                <div class="icon-box icon-left iconbox-theme-colored pb-0 pt-30">
                    <?php if($block['icon_class']){ ?>
                    <a style="pointer-events: none;" class="icon  icon-bordered icon-circled icon-border-effect mr-20 mt-10 effect-circled pull-left flip" href="<?php echo $block['link_url']; ?>">
                    <i class="fa fa-home"></i>
                    </a>
                    <?php } ?>
                    <a href="<?php echo $block['link_url']; ?>"><h5 class="icon-box-title mb-5" style="cursor: pointer!important;"><?php echo $block['title']; ?></h5></a>
                    <p class="text-gray"><?php echo $block['caption_title']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
    </div>
</section>
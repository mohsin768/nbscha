<section class="about-area-three ptb-120 <?php echo $class; ?>">
    <div class="container">
        <div class="row h-100 align-items-center">
            <?php if($image!=''){ ?>
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="<?php echo $image; ?>" class="about-img1" alt="<?php echo $title; ?>">
                </div>      
            </div>
            <?php } ?>
            <div class="<?php if($image!=''){ ?>col-lg-6<?php } else {?>col-lg-12<?php } ?>">
                <div class="about-content">
                    <span><?php echo $subtitle ?></span>
                    <h2><?php echo $title ?></h2>
                    <?php echo $content ?>
                    <div class="btn-box">
                        <?php if($primary_link_title!='' && $primary_link_url!=''){ ?>
                        <a href="<?php echo $primary_link_url; ?>" class="btn btn-primary"><?php echo $primary_link_title; ?></a>
                        <?php } ?>
                        <?php if($attachment_link_title!='' && $attachment!=''){ ?>
                        <a href="<?php echo $attachment; ?>" class="btn btn-secondary"><?php echo $attachment_link_title; ?></a>
                        <?php } ?>
                        <?php if($secondary_link_title!='' && $secondary_link_url!=''){ ?>
                        <a href="<?php echo $secondary_link_url; ?>" class="btn btn-primary"><?php echo $secondary_link_title; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
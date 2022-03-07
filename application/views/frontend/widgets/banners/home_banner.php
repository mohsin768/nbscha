<div class="home-slides owl-carousel owl-theme">
    <?php 
    foreach($sliders as $slider): 
        $image = '';
        if($slider['image']!=''){
            $image = frontend_uploads_url('sliders/images/'.$slider['image']);
        }
    ?>
        
    <div class="main-banner <?php if($image==''){ echo "item-bg3"; } ?>"<?php if($image!=''){ ?> style="background-image:url('<?php echo $image; ?>');"<?php } ?>>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                <div class="main-banner-content banner-content-center">
                        <?php echo $slider['body']; ?>
                        <div class="button-box">
                            <?php if($slider['link_url']!='' && $slider['link_title']!=''){ ?>
                            <a href="<?php echo $slider['link_url']; ?>" class="btn btn-primary"><?php echo $slider['link_title']; ?></a>
                            <?php } ?>
                            <?php 
                            $videoUrl = '';
                            if($slider['video']!=''){
                                $videoUrl = $slider['video'];
                            } else {
                                if($slider['youtube_video']!=''){
                                    $videoUrl = $slider['youtube_video'];
                                }
                            }
                            if($videoUrl!=''){
                            ?>
                            <a href="<?php echo $videoUrl; ?>" class="video-btn popup-youtube"><i class="icofont-ui-play"></i> Watch Pormo Video</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape1"><img src="<?php echo frontend_assets_url('img/shapes/1.png'); ?>" alt="shape1"></div>
        <div class="shape2 rotateme"><img src="<?php echo frontend_assets_url('img/shapes/2.png'); ?>" alt="shape2"></div>
        <div class="shape3 rotateme"><img src="<?php echo frontend_assets_url('img/shapes/3.png'); ?>" alt="shape3"></div>
        <div class="shape4"><img src="<?php echo frontend_assets_url('img/shapes/4.png" alt="shape4'); ?>"></div>
    </div>
    <?php endforeach; ?>
</div>
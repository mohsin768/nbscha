<div class="festival-schedule instagram">
    <?php if($title){ ?>
    <div class="section-title">
        <h1><?php if($subtitle){ echo $subtitle; } ?></h1>
        <h2><?php echo $title;  ?></h2>
    </div>
    <?php } ?>                   
    <ul>
        <?php if(isset($instagram_feeds) && count($instagram_feeds)>0){ foreach($instagram_feeds as $instagram_feed):
        $instaImage = imageCropOnFly(frontend_uploads_path('instagram'),$instagram_feed['image'],'200','200'); 
        $instaMessage = character_limiter(strip_tags($instagram_feed['message']), 120);
        ?>
        <li class="festival-info ">
            <div class="festival-image">
                <div class="image-overlay"></div>
                <img  class="img-responsive" src="<?php echo $instaImage; ?>" alt="Image">                                      
            </div>
            <div class="text-left">
                <h5><?php echo $instaMessage; ?></h5>
            </div>
        </li>
        <?php endforeach; } ?>
    </ul>
    <a href="<?php echo $link; ?>" target="_blank" class="btn btn-default pull-right">View Instagram<i class="fa fa-chevron-circle-right"></i></a>
</div>
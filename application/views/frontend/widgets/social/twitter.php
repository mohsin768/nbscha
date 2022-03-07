<div class="twitter-feed section-padding <?php if($background!=''){ echo 'bg-image'; } else { echo 'bg-white'; }?> <?php echo $class; ?>" style="background-image:<?php if($background!=''){ echo "url('".$background."')";} else { echo 'none'; } ?>;">
    <div class="container">      
        <?php if($title){ ?>
        <div class="section-title">
            <i class="fa fa-twitter"></i>
            <h1><?php if($subtitle){ echo $subtitle; } ?></h1>
            <h2><?php echo $title;  ?></h2>
        </div>
        <?php } ?>
        <div class="twitter-slider">
            <?php if(isset($twitter_feeds) && count($twitter_feeds)>0){ foreach($twitter_feeds as $twitter_feed): ?>
            <div class="feed-content">
                <p><?php echo $twitter_feed['message'];?></p>
                <h4><a href="<?php echo $twitter_feed['link'];?>" target="_blank"><?php echo $twitter_feed['user'];?></a> - <?php echo $twitter_feed['date'];?></h4>
            </div>
            <?php endforeach; } ?>
        </div>
    </div><!-- container -->
</div><!-- twitter feed -->
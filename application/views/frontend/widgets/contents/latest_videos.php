<?php if(count($videos)>0){ ?>
<section class="blog-area blog-section ptb-120 bg-image">
    <div class="container">
        <div class="section-title">
            <span><?php echo $subtitle; ?></span>
            <h2><?php echo $title; ?></h2>

            <div class="bg-title">
                <?php echo $inset_title; ?>
            </div>
            <?php if($primary_link_title!='' && $primary_link_url!=''){ ?>
            <a href="<?php echo $primary_link_url ?>" class="btn btn-primary"><?php echo $primary_link_title ?></a>
            <?php } ?>

            <div class="bar"></div>
        </div>

        <div class="row">
            <?php foreach($videos as $video): ?>
            <?php 
                $image = frontend_assets_url('img/blog1.jpg');
                if($video['image']!=''){
                    $image = frontend_uploads_url('videos/images/'.$video['image']);
                }
            ?>    
            <div class="col-lg-6 col-md-6">
                <div class="single-blog-card">
                    <a class="popup-youtube"  href="<?php echo $video['video_url']; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $video['title']; ?>"></a>
                    <div class="blog-post-content">
                        <h3><a class="popup-youtube" href="<?php echo $video['video_url']; ?>"><?php echo $video['title']; ?></a></h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php } ?>
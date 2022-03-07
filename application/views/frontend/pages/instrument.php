<div class="entry-post">
    <?php 
    $bannerImage = frontend_assets_url('images/blog/10.jpg'); 
    if(isset($instrument->banner) && $instrument->banner!=''){ 
        $bannerImage = imageCropOnFly(frontend_uploads_path('instruments/banners'),$instrument->banner,'1140','760','bannerthumb');
    }
    ?>
    <div class="entry-thumbnail">
        <img  class="img-responsive" src="<?php echo $bannerImage; ?>" alt="<?php echo $instrument->title; ?>">
    </div>
    <div class="post-content">
        <div class="entry-title">
            <h1><?php echo $instrument->name; ?></h1>
        </div> 
    </div>
</div>
<div class="entry-summary">
    <?php echo $instrument->content; ?>
</div>
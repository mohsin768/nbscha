<?php 
    $bannerImage = frontend_assets_url('images/blog/10.jpg'); 
    if(isset($blog->banner) && $blog->banner!=''){ 
        $bannerImage = imageCropOnFly(frontend_uploads_path('blogs/banners'),$blog->banner,'1140','760','bannerthumb');
    }
?>
<div class="entry-post blog-post-page">
    <div class="entry-thumbnail">
        <img  class="img-responsive" src="<?php echo $bannerImage; ?>" alt="<?php echo $blog->title; ?>">
    </div>
    <div class="post-content">
        <div class="time">
            <a href="#"><?php echo date('d',strtotime($blog->publish_date)); ?> <span><?php echo date('M',strtotime($blog->publish_date)); ?></span></a>
        </div>
        <div class="entry-title">
            <h1><?php echo $blog->title; ?></h1>
        </div> 
        <ul class="entry-meta list-inline">
            <li><a href="#"><i class="fa fa-user"></i>By <?php echo $blog->author; ?> </a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i><?php echo date('M d, Y',strtotime($blog->publish_date)); ?></a></li>
            <li><a href="#"><i class="fa fa-folder-o"></i><?php echo $blog->category; ?></a></li>
        </ul>
    </div>
</div>
<div class="blog-social list-inline">
    <div class="sharethis-inline-share-buttons"></div>
</div>
<div class="entry-summary">
    <?php echo $blog->content; ?>
</div>



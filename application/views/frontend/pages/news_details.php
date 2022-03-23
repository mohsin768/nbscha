<section>
<div class="container">
    <div class="row">
    <div class="col-md-12">
      <?php if(isset($news->youtube_video) && $news->youtube_video!=''){ ?>  
      <iframe src="<?php echo $news->youtube_video; ?>"></iframe>
      <?php } else { ?>
      <?php if($news->image!=''){ $newsImage = frontend_uploads_url('news/images/'.$news->image); ?>
      <img src ="<?php echo $newsImage; ?>" alt="<?php echo $news->title; ?>" />  
      <?php } } ?>
    </div>
    </div>
    <div class="row mt-60">
    <div class="col-md-12">
        <h4 class="mt-0 title_color"><?php echo $news->title; ?></h4>
        <div class="row post-area-cl">
        <div class="col">
            <div class="post-meta">
                <span><i class="fa fa-shopping-bag"></i><a href="<?php echo news_category_url($category->slug); ?>"><?php echo $category->name; ?></a> </span>
                <span><i class="fa fa-user"></i> posted by <a href="#"><?php echo $news->author; ?></a> </span>
                <span><i class="fa fa-calendar"></i> <?php echo date('d F',strtotime($news->publish_date)); ?></span>
            </div>
            </div>
        </div>
        <div class="row post-area-cl pt-10">
            <?php echo $news->body; ?>
        </div>

    </div>
    </div>
</div>
</section>
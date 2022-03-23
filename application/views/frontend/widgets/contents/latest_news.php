<section id="blog">
    <div class="container pb-70">
    <div class="section-title mb-20 text-center">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="mt-0 line-height-1 text-uppercase"><?php echo $title; ?>  <span class="text-theme-color-2"> <?php echo $subtitle; ?></span></h2>
            <?php echo $content; ?>
        </div>
        </div>
    </div>
    <div class="section-content">
        <div class="row">
            <?php if(is_array($news) && count($news)>0){ ?>
            <?php $i=0; foreach($news as $newsitem): $i++; ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post clearfix mb-sm-30">
                    <div class="entry-header">
                        <?php if($newsitem['image']!=''){ $newsImage = frontend_uploads_url('news/images/'.$newsitem['image']); ?>
                        <div class="post-thumb thumb home-thumb">
                            <img src="<?php echo $newsImage; ?>" alt="" class="img-responsive img-fullwidth" width="370" height="247">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="entry-content p-20 pr-10">
                        <div class="entry-meta mt-0 no-bg no-border">
                            <div class="event-content">
                            <h4 class="entry-title text-white text-capitalize m-0">
                                <a href="<?php echo news_url($newsitem['id']); ?>" style="pointer-events: none; cursor: none;"><?php echo $newsitem['title']; ?></a>
                            </h4>
                            </div>
                        </div>
                        <p class="mt-10">
                            <?php echo $newsitem['summary']; ?><a href="<?php echo news_url($newsitem['slug']); ?>" class="text-theme-colored font-15 pl-20"> Read More →</a>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="bg-theme-colored p-5 text-center pt-10 pb-10">
                        <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-calendar mr-5 text-white"></i><?php echo date('d F',strtotime($newsitem['publish_date'])); ?></span>
                        <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-user mr-5 text-white"></i>posted by <?php echo $newsitem['author']; ?></span>
                    </div>
                </article>
            </div>
            <?php endforeach; } ?>
        </div>
    </div>
    </div>
</section>
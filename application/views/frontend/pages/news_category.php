<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if(is_array($news) && count($news)>0){ ?>
                <?php $i=0; foreach($news as $newsitem): $i++; ?>
                <div class="upcoming-events bg-white-f3 mb-20">
                    <div class="row">
                        <div class="col-sm-4 pr-0 pr-sm-15">
                            <?php if($newsitem['image']!=''){ $newsImage = frontend_uploads_url('news/images/'.$newsitem['image']); ?>
                            <div class="thumb p-15">
                            <img src="<?php echo $newsImage; ?>" alt="<?php echo $newsitem['title']; ?>" class="img-fullwidth">
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-4 pl-0 pl-sm-15">
                            <div class="event-details p-15 mt-20">
                                <h4 class="media-heading text-uppercase font-weight-500"><b><?php echo $newsitem['title']; ?></b></h4>
                                <p><?php echo $newsitem['summary']; ?></p>
                                <a href="<?php echo news_url($newsitem['slug']); ?>" class="btn btn-flat btn-dark btn-theme-colored btn-sm"><?php echo translate('READ_MORE','Read More');?> <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="event-count p-15 mt-15">
                                <ul>
                                <li><i class="fa fa-calendar"></i> <?php echo date('d F',strtotime($newsitem['publish_date'])); ?></li>
                                <li><i class="fa fa-user"></i> <?php echo translate('POSTED_BY','posted by');?>  <a href="#"><?php echo $newsitem['author']; ?></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; } else { ?>
                    <?php echo translate('NO_NEWS','No news items to display');?>.
                <?php } ?>
            </div>
            <div class="col-md-4">
                 <div class="sidebar sidebar-right mt-sm-30">
                    <div class="widget">
                        <h5 class="widget-title line-bottom"><?php echo translate('CATEGORIES','Categories');?></h5>
                        <div class="categories">
                            <ul class="list list-border angle-double-right">
                            <?php foreach($categories as $category): ?>
                            <li><a href="<?php echo news_category_url($category['slug']); ?>"><?php echo $category['name']; ?><span>(<?php echo $categoryCount[$category['id']]; ?>)</span></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="text-uppercase line-bottom mt-sm-30 mt-0"> <span class="text-theme-colored"><?php echo translate('RESOURCES','RESOURCES');?></span></h5>
                        <div class="latest-posts">
                            <div class="bxslider bx-nav-top p-0 m-0">
                            <?php foreach($links as $link): ?>
                                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                                    <div class="pricing  maxwidth400">
                                        <div class="row">
                                            <div class="icon-box icon-box-effect mb-0 mt-0 p-15 bg-theme-colored border-bottom-3px">
                                                <a href="<?php echo $link['link_url']; ?>" class="icon mb-0 mr-0 pull-left flip">
                                                <?php if($link['image']!=''){ $linkImage = frontend_uploads_url('links/images/'.$link['image']); ?>
                                                    <img src="<?php echo $linkImage; ?>" style="width: 50px; height: 50px; padding-top: 15px;">
                                                <?php } else { ?>
                                                    <i class="fa fa-stethoscope text-white font-48"></i>
                                                <?php } ?>
                                                </a>
                                                <div class="ml-80">
                                                    <h5 class="icon-box-title mt-15 mb-5 text-white text-left"><strong><a href="<?php echo $link['link_url']; ?>" target="_blank"><?php echo $link['name']; ?></a></strong></h5>
                                                    <p class="text-white text-left" style="padding-right:20px;"><?php echo $link['summary']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

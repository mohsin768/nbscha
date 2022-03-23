<section id="about">
    <div class="container pb-70">
        <div class="section-content">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <?php echo $content; ?>
                    <?php if($gallery!=''){ 
                        $gimages = explode(',',$gallery); 
                        if(is_array($gimages) && count($gimages)>0){
                    ?>
                    <div class="row mt-30">
                        <?php foreach($gimages as $gimage): $gimageUrl = frontend_uploads_url('widgets/gallery/'.$gimage); ?>
                        <div class="col-sm-4 col-md-4">
                            <img class="img-fullwidth mb-sm-30 md-img" src="<?php echo $gimageUrl; ?>" alt="NBSCHA">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 pl-40 pl-sm-20 mr-sm-20">
                    <h3 class="text-uppercase line-bottom mt-sm-30 mt-0"> <span class="text-theme-colored">RESOURCE LINKS</span></h3>
                    <div class="bxslider bx-nav-top p-0 m-0">
                        <?php foreach($links as $link): ?>
                        <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                            <div class="pricing  maxwidth400">
                                <div class="row">
                                    <div class="icon-box icon-box-effect mb-0 mt-0 p-15 bg-theme-colored border-bottom-3px">
                                        <?php if($link['image']!=''){ $linkImage = frontend_uploads_url('links/images/'.$link['image']); ?>
                                        <a href="<?php echo $link['link_url']; ?>" class="icon mb-0 mr-0 pull-left flip">
                                            <img src="<?php echo $linkImage; ?>" style="width: 50px; height: 50px; padding-top: 15px;">
                                        </a>
                                        <?php } ?>
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
</section>
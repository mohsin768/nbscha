<section id="experts">
    <div class="container pt-70 pb-70">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333"><?php echo $title; ?> <span class="text-theme-color-2"><?php echo $subtitle; ?></span></h2>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="row multi-row-clearfix board-cl">
            <div class="col-md-12">
                <div class="row">
                    <?php if(count($boardMembers)>0){ ?>
                    <?php $i=0; foreach($boardMembers as $boardMember): $i++; ?>
                    <div class="item col-md-4">
                        <div class="project mb-30 border-2px">
                            <?php if($boardMember['photo']!=''){ $boardMemberImage = frontend_uploads_url('teams/'.$boardMember['photo']); ?>
                            <div class="thumb">
                                <img class="img-fullwidth" alt="<?php echo $boardMember['name']; ?>" src="<?php echo $boardMemberImage; ?>">
                                <div class="hover-link">
                                </div>
                            </div>
                            <?php } ?>
                            <div class="project-details p-0">
                                <div class="border-bottom-2px pt-10 pb-10 bg-theme-color-2">
                                    <h4 class="font-weight-700 text-uppercase text-center mt-10"><a href="<?php echo board_url($boardMember['slug']); ?>" class="text-white"><?php echo $boardMember['position']; ?></a></h4>
                                </div>
                                <p class="p-30 pb-10 text-center"><b class="p-name"><?php echo $boardMember['name']; ?></b><b><br><?php echo $boardMember['email']; ?></b></p>

                                <a href="<?php echo board_url($boardMember['slug']); ?>" class="btn btn-default font-14 btn-circled btn-dark btn-theme-colored mt-0 ml-120 mb-30 hvr-bounce-to-left no-border">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; } ?>
                </div>
            </div>
        </div>
    </div>    
</section>
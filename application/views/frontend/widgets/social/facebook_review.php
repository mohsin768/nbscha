<div class="facebook-reviews section-padding <?php if($background!=''){ echo 'bg-image'; } else { echo 'bg-white'; }?> <?php echo $class; ?>" style="background-image:<?php if($background!=''){ echo "url('".$background."')";} else { echo 'none'; } ?>;">
    <div class="container">
        <?php if($title){ ?>
        <div class="section-title">
            <h1><?php if($subtitle){ echo $subtitle; } ?></h1>
            <h2><?php echo $title;  ?></h2>
        </div>
        <?php } ?>
        <!-- <div class="facebook-reviews-slider">

        </div> -->

<div class="instrument-content">
        <div class="container">
            <div class="row">
                <div class="review-slider">
                    <?php
                    if(isset($reviews) && count($reviews)>0){
                        foreach($reviews as $review):
                            $albumImage = "";
                            if(isset($review['image']) && $review['image']!=''){
                                $albumImage = imageCropOnFly(frontend_uploads_path('reviews/images'),$review['image'],'270','310');
                            }
                            // $alblumUrl = ntfroend_review_url($review['slug']);
                            $alblumUrl="";
                    ?>
                    <div class="review-item cbp-item">
                                         <div class="review-content">

                                           <div class="feed-content">
                                                <p><?php echo $review['body'];?></p>
                                                <?php if($albumImage != ""){ ?>
                                                <div class="review-image"><img src="<?php echo $albumImage;?>" title="" alt="review image"></div>
                                                <?php
                                                    }
                                                ?>
                                                <h4> 
                                                <?php echo $review['name'];?>
                                                <?php if(isset($review['position']) && $review['position']!=''){ ?>
                                                , <?php echo $review['position'];?>
                                                <?php } ?>
                                            </h4>
                                            </div>


                                <div class="album-icons">
                                   <!--  <i class="fa fa-music"></i> -->
                                </div>
                            </a>
                        </div>
                        <!-- <h2>Review On</h2> -->

                    </div>
                    <?php
                            endforeach;
                        }
                    ?>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- reviews content -->


    </div><!-- container -->
</div><!-- twitter feed -->

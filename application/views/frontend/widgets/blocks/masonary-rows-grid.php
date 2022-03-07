<?php if(count($contents)>0){ ?>
<section class="why-choose-us-two">
    <div class="row m-0 h-100 align-items-center">
            <?php $i=0; foreach($contents as $content): $i++; ?>
            <div class="col-lg-4 col-md-6 p-0">
                <div class="why-choose-img">
                    <img src="<?php if($content['image']!=''){ echo $content['image'];  } else { echo frontend_assets_url('img/why-choose-img1.jpg'); }?>" alt="<?php echo $content['title']; ?>">
                </div>
            </div>

            <div class="col-lg-4 col-md-6 p-0">
                <div class="why-choose-content">
                    <h3><?php echo $content['title']; ?></h3>
                    <p><?php echo $content['summary']; ?></p>
                    <?php if($content['link_url']!='' && $content['link_title']!=''){ ?>
                    <a href="<?php echo $content['link_url']; ?>"><?php echo $content['link_title']; ?><i class="icofont-long-arrow-right"></i></a>
                    <?php } ?>
                    <span><?php echo sprintf('%02d', $i); ?></span>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</section>
<?php } ?>
<?php if(count($sponsors)>0){ ?>
<section id="upcoming-events" class="divider parallax layer-overlay overlay-white-8" data-bg-img="">
    <div class="container pb-50 pt-80">
    <div class="section-content">
        <div class="row">
            <?php $i=0; foreach($sponsors as $sponsor): $i++; ?>
            <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="schedule-box maxwidth500 bg-light mb-30">
            <?php if($sponsor['image']!=''){ $sponsorImage = frontend_uploads_url('sponsors/'.$sponsor['image']); ?>
            <div class="thumb">
                <img class="img-fullwidth" alt="<?php echo $sponsor['title']; ?>" src="<?php echo $sponsorImage; ?>">
                <div class="overlay">
                <a href="<?php echo $sponsor['website']; ?>"><i class="fa fa-calendar mr-5"></i></a>
                </div>
            </div>
            <?php } ?>
            <div class="schedule-details clearfix p-15 pt-10">
                <h5 class="font-16 title"><a href="<?php echo $sponsor['website']; ?>"><?php echo $sponsor['title']; ?></a></h5>
                <?php echo $sponsor['description']; ?>
                <div class="mt-10">
                <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="<?php echo $sponsor['website']; ?>" target="_blank">Visit Website</a>
                </div>
            </div>
            </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>
<?php } ?>
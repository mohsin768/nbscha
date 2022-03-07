<div class="row video-text">
    <div class="col-md-6 no-padding">
        <div class="content-image">
            <img src="<?php echo $image; ?>" alt="Rock of Ages" />
            <a class="roa-play-button popup-modal" href="#content-video-<?php echo $id; ?>"><span>Play</span></a>
            <div id="content-video-<?php echo $id; ?>" class="white-popup-block mfp-hide content-video-content-wrap">
                <div class="video-close-button"><a class="roa-close-button popup-modal-dismiss" href="#"><i class="fa fa-close"></i></a></div>
                <div class="content-video-content">
                <video poster="<?php echo $image; ?>" id="content-video-id-<?php echo $id; ?>" class="content-video" controls="">
                    <source src="<?php echo $video; ?>" type="video/mp4" autostart="false">
                </video>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 no-padding">
        <div class="content-info ">
        <?php echo $content; ?>
        </div>
    </div>
</div>
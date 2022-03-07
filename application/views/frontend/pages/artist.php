<?php 
    $artistImage = frontend_assets_url('images/artists/18.jpg'); 
    if(isset($artist->image) && $artist->image!=''){ 
        $artistImage = imageCropOnFly(frontend_uploads_path('artists/images'),$artist->image,'360','543','largethumb');
    }
    $artistVideo = '';
    if(isset($artist->video) && $artist->video!=''){ 
        $artistVideo = frontend_uploads_url('artists/videos/'.$artist->video); 
    }
    $artistName = (isset($artist->name) && $artist->name!='')?$artist->name:'';
    $artistPosition = (isset($artist->position) && $artist->position!='')?$artist->position:'';
    $artistBio = (isset($artist->bio) && $artist->bio!='')?$artist->bio:'';
?>
<div class="row artist-page">
    <div class="col-sm-4">
        <div class="artist-image">
            <img class="img-responsive" src="<?php echo $artistImage; ?>" alt="Image">
            <?php if($artistVideo!=''){ ?>
                <a class="roa-play-button popup-modal" href="#artist-video"><span>Play</span></a>
                <div id="artist-video" class="white-popup-block mfp-hide content-video-content-wrap artists">
                    <div class="video-close-button"><a class="roa-close-button popup-modal-dismiss" href="#"><i class="fa fa-close"></i></a></div>
                    <div class="content-video-content">
                    <video id="artist-video-id" class="content-video" controls="">
                        <source src="<?php echo $artistVideo; ?>" type="video/mp4" autostart="false">
                    </video>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="artist-info">
            <h1><?php echo $artistName; ?></h1> 
            <h4><?php echo $artistPosition; ?></h4>
            <?php echo $artistBio; ?>                     
        </div>
    </div>
</div><!-- row -->
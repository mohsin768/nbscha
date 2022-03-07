<div class="gallery-section section-padding  <?php if($background!=''){ echo 'bg-image'; } else { echo 'bg-white'; }?> <?php echo $class; ?>" style="background-image:<?php if($background!=''){ echo "url('".$background."')";} else { echo 'none'; } ?>;">
    <div class="container">
        <div class="row">
            <?php foreach($widgets as $widget): ?>
            <div class="col-sm-6">
            <?php echo $widget; ?>
            </div>
            <?php endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- gallery section --> 
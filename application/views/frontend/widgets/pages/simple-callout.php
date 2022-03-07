<section class="cta-area">
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-lg-8">
                <span><?php echo $subtitle ?></span>
                <h3><?php echo $title ?></h3>
            </div>

            <div class="col-lg-4 text-end">
                <?php if($primary_link_title!='' && $primary_link_url!=''){ ?>
                <a href="<?php echo $primary_link_url ?>" class="btn btn-secondary"><?php echo $primary_link_title ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
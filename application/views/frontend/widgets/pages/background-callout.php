<section class="buy-tickets-area ptb-120">
<div class="buy-tickets">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6">
        <div class="section-title">
            <span><?php echo $subtitle ?></span>
            <h2><?php echo $title ?></h2>
            <?php echo $content ?>
        </div>
        </div>
        <div class="col-lg-6">
            <?php if($primary_link_title!='' && $primary_link_url!=''){ ?>
            <div class="buy-ticket-btn"><a class="btn btn-primary" href="<?php echo $primary_link_url ?>"><?php echo $primary_link_title ?></a></div>
            <?php } ?>
        </div>
    </div>
    </div>
</div>
</section>
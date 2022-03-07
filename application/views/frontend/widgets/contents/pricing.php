<?php if(count($tickets)>0){ ?>
<section class="pricing-area ptb-120 bg-image">
    <div class="container">
        <div class="section-title">
            <span><?php echo $subtitle; ?></span>
            <h2><?php echo $title; ?></h2>

            <div class="bg-title">
            <?php echo $inset_title; ?>
            </div>

            <div class="bar"></div>
        </div>

        <div class="row">
            <?php foreach($tickets as $ticket): ?>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-plan">
                    <h3><?php echo $ticket['title']; ?> <span><sup>$</sup><?php echo $ticket['price']; ?></span></h3>

                    <?php echo $ticket['body']; ?>
                    <?php if($ticket['link_url']!='' && $ticket['link_title']!=''){ ?>
                    <a href="<?php echo $ticket['link_url']; ?>" class="btn btn-primary"><?php echo $ticket['link_title']; ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</section>
<?php } ?>
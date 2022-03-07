<?php if(count($contents)>0){ ?>
<section class="schedule-area bg-image ptb-120">
    <div class="container">
        <div class="section-title">
            <span><?php echo $subtitle ?></span>
            <h2><?php echo $title ?></h2>

            <div class="bg-title">
            <?php echo $inset_title ?>
            </div>
            <?php if($primary_link_title!='' && $primary_link_url!=''){ ?>
            <a href="<?php echo $primary_link_url ?>" class="btn btn-primary"><?php echo $primary_link_title ?></a>
            <?php } ?>
            <div class="bar"></div>
        </div>

        <div class="row">
            <div class="schedule-slides owl-carousel owl-theme">
                <div class="col-lg-12 col-md-12">
                    <div class="schedule-slides-item">
                        <?php foreach($contents as $content): ?>
                        <div class="single-schedule">
                            <div class="schedule-date">
                                <div class="d-table">
                                    <div class="d-table-cell">
                                    <?php echo $content['caption_title']; ?>
                                        <span><?php echo $content['caption_subtitle']; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="schedule-content">
                                <div class="schedule-info">
                                    <h3><?php echo $content['title']; ?></h3>
                                    <ul>
                                        <li><?php echo $content['summary']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="btn-box">
                        <?php if($attachment_link_title!='' && $attachment!=''){ ?>
                        <a href="<?php echo $attachment; ?>" class="btn btn-primary"><?php echo $attachment_link_title; ?></a>
                        <?php } ?>
                        <?php if($secondary_link_title!='' && $secondary_link_url!=''){ ?>
                        <a href="<?php echo $secondary_link_url; ?>" class="btn btn-secondary"><?php echo $secondary_link_title; ?></a>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="shape1"><img src="<?php echo frontend_assets_url('img/shapes/1.png'); ?>" alt="shape1"></div>
    <div class="shape2 rotateme"><img src="<?php echo frontend_assets_url('img/shapes/2.png'); ?>" alt="shape2"></div>
    <div class="shape3 rotateme"><img src="<?php echo frontend_assets_url('img/shapes/3.png'); ?>" alt="shape3"></div>
    <div class="shape4"><img src="<?php echo frontend_assets_url('img/shapes/4.png'); ?>" alt="shape4"></div>
</section>
<?php } ?>
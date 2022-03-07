<?php if(count($packages)>0){ $firstPackage = '0'; ?>
<section class="schedule-area bg-image ptb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab">
                    <ul class="tabs">
                        <?php $i=0; foreach($packages as $package): $i++; if($i=='1'){ $firstPackage = $package['id']; } ?>
                        <li><a href="#0" data-package-id="<?php echo $package['id']; ?>">
                            <?php echo $package['title']; ?>
                            <span><?php echo $package['caption']; ?></span>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="tab_content">
                        <div class="tabs_item">
                            <ul class="accordion" id="exhibitors-list">
                                
                            </ul>
                        </div>
                        <div class="load-more-wrap btn-box">
                            <a id="exhibitors-load-more" class="btn btn-primary" href="#0">Load More</a>
                        </div>
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
<script id="no-exhibitors-tpl" type="text/template">
    <li class="no-items accordion-item">
        <div class="accordion-title">
            <div class="schedule-info">
                No exhibitors to display
            </div>
        </div>
    </li>
</script>
<script id="exhibitors-item-tpl" type="text/template">
    <li class="accordion-item">
        <div class="accordion-title">
            {{#logo}}
            <div class="author">
                <img src="<?php echo frontend_uploads_url('exhibitors/logos'); ?>/{{ logo }}" data-toggle="tooltip" data-placement="top" title="{{ name }}" alt="{{ name }}">
            </div>
            {{/logo}}
            <div class="schedule-info">
                <h3>{{ name }}</h3>

                <ul>
                    <li><i class="icofont-user-suited"></i> {{ room }}</li>
                    <li><i class="icofont-wall-clock"></i> {{ location }}</li>
                </ul>
            </div>
        </div>
    </li>
</script>
<?php } ?>

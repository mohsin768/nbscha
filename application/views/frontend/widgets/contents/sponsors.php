<?php if(count($sponsors)>0){ ?>
<section class="partner-area ptb-120">
    <div class="container">
        <div class="section-title">
            <span><?php echo $subtitle ?></span>
            <h2><?php echo $title ?></h2>

            <?php if($primary_link_title!='' && $primary_link_url!=''){ ?>
            <a href="<?php echo $primary_link_url ?>" class="btn btn-primary"><?php echo $primary_link_title ?></a>
            <?php } ?>

            <div class="bar"></div>
        </div>

        <div class="row">
            <?php 
            $catCount = 0; $i=0;
            foreach($categories as $id => $name): $i++;
                $sponsorRows = (isset($categorized_sponsors[$id]))?$categorized_sponsors[$id]:array();
                if(count($sponsorRows)>0){
                    $catCount++;
            ?>
            <?php if($catCount>1) { ?>
            <div class="col-lg-12">
                <div class="border"></div>
            </div>
            <?php } ?>
            <div class="col-lg-12">
                <div class="partner-title <?php if($i%2=='1'){?>platinum-sponsor<?php } else { ?>gold-sponsor<?php } ?>">
                    <h3><?php echo $name; ?></h3>
                </div>
            </div>
            <div class="partner-slides owl-carousel owl-theme">
                <?php 
                foreach($sponsorRows as  $sponsorRow): 
                    $logo = '';
                    if($sponsorRow['logo']!=''){
                        $logo = frontend_uploads_url('sponsors/logos/'.$sponsorRow['logo']);
                    }
                ?>
                <div class="col-lg-12 col-md-12">
                    <div class="partner-item">
                        <a href="<?php echo $sponsorRow['link_url']; ?>">
                            <img src="<?php echo $logo; ?>" alt="<?php echo $sponsorRow['name']; ?>" />
                            <img src="<?php echo $logo; ?>" alt="<?php echo $sponsorRow['name']; ?>" />
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php 
                }
            endforeach; 
            ?>
        </div>
    </div>
</section>
<?php } ?>
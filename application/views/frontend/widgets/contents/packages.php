<?php if(count($packages)>0){ ?>
<section class="why-choose-us">
    <div class="row m-0">
        <?php foreach($packages as $package): ?>
        <div class="col-lg-3 col-md-6 p-0">
            <div class="single-box">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="content">
                            <div class="icon">
                            <?php if($package['icon_class']!=''){ ?>
                                <i class="<?php echo $package['icon_class']; ?>"></i>
                            <?php } ?>    
                            </div>
                            <h3><?php echo $package['title']; ?></h3>
                            <p><?php echo $package['summary']; ?></p>
                            <a href="<?php echo site_url('packages/'.$package['slug']); ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <ul class='slideshow'>
        <?php foreach($packages as $package): ?>
        <li><span <?php if($package['image']!='') { ?>style="background-image:url('<?php echo $package['image']; ?>');"<?php } ?>></span></li>
        <?php endforeach; ?>
    </ul>
</section>
<?php } ?>
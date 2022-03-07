<?php if(count($contents)>0){ ?>
<section class="why-choose-us">
    <div class="row m-0">
        <?php foreach($contents as $content): ?>
        <div class="col-lg-3 col-md-6 p-0">
            <div class="single-box">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="content">
                            <div class="icon">
                            <?php if($content['icon_class']!=''){ ?>
                                <i class="<?php echo $content['icon_class']; ?>"></i>
                            <?php } ?>    
                            </div>
                            <h3><?php echo $content['title']; ?></h3>
                            <p><?php echo $content['summary']; ?></p>
                            <?php if($content['link_url']!='' && $content['link_title']!=''){ ?>
                            <a href="<?php echo $content['link_url']; ?>" class="btn btn-primary"><?php echo $content['link_title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>

    <ul class='slideshow'>
        <?php foreach($contents as $content): ?>
        <li><span <?php if($content['image']!='') { ?>style="background-image:url('<?php echo $content['image']; ?>');"<?php } ?>></span></li>
        <?php endforeach; ?>
    </ul>
</section>
<?php } ?>
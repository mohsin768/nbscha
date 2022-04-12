<?php 
if(is_array($blocks) && count($blocks)>0){ 
    $themes = array('1'=>'bg-theme-colored','2'=>'bg-theme-colored-darker2','3'=>'bg-theme-colored-darker3','4'=>'bg-theme-colored-darker4');
?>
<section>
    <div class="container pt-0 pb-0">
    <div class="section-content">
        <div class="row equal-height-inner home-boxes" data-margin-top="-100px">
            <?php $i=0; foreach($blocks as $block): $i++; ?>
            <div class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay<?php echo $i; ?>">
                <div class="sm-height-auto <?php if(isset($themes[$i])){ echo $themes[$i]; } else { echo 'bg-theme-colored'; } ?>">
                <div class="text-center pt-30 pb-30">
                    <?php if($block['icon_class']!=''){ ?>
                    <i class="fa <?php echo $block['icon_class']; ?> text-white font-64 pb-10"></i>
                    <?php } ?>
                    <div class="p-10">
                    <h4 class="text-uppercase text-white mt-0"><?php echo $block['title']; ?></h4>
                    <p class="text-white"><?php echo $block['caption_title']; ?></p>
                    <a href="<?php echo $block['link_url']; ?>" class="btn btn-border btn-circled btn-transparent btn-sm"><?php echo $block['link_title']; ?></a>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach; ?>    
        </div>
    </div>
    </div>
</section>
<?php } ?>
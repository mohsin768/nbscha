<?php if(count($statistics)>0){ ?>
<section class="funfacts-area ptb-120" <?php if($image!=''){ ?> style="background-image:url('<?php echo $image; ?>');"<?php } ?>>
    <div class="container">
        <div class="row">
            <?php foreach($statistics as $statistic): ?>
            <div class="col-lg-3 col-md-3">
                <div class="funFact">
                    <div class="icon">
                        <i class="<?php echo $statistic['icon_class']; ?>"></i>
                    </div>
                    <h3 class="odometer" data-count="<?php echo $statistic['number']; ?>">00</h3>
                    <p><?php echo $statistic['title']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php } ?>
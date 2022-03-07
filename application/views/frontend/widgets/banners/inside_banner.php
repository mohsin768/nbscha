<div class="page-title-area item-bg1" <?php if($banner!=''){ ?>style="background-image:url('<?php echo $banner; ?>');"<?php } ?>>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <span><?php echo $subtitle; ?></span>
        <ul>
            <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
            <li><?php echo $title; ?></li>
        </ul>
    </div>
</div>
<?php /*
<div class="breadcrumb bg-image" <?php if($banner!=''){ ?>style="background-image:url('<?php echo $banner; ?>');"<?php } ?>>
    <div class="overlay"></div>
    <div class="page-title">
        <h1><?php echo $subtitle; ?></h1>
        <h2><?php echo $title; ?></h2>
    </div>
</div><!-- breadcrumb --> 
*/ ?>
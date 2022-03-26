<table class="table table-striped jambo_table popup-view-table">
    <tr>
        <td>
          <h6><?php echo $news->title;?></h6>
        </td>
        <td style="text-align:right;">
        <em><i class="fa fa-calendar"></i> <?php echo date('M j, Y', strtotime($news->publish_date)); ?></em>
        </td>
    </tr>
    <?php if($news->author!='') { ?>
    <tr>
        <td colspan="2">
            <i class="fa fa-user"></i>  <?php echo $news->author;?>
        </td>
    </tr>
    <?php } ?>

    <tr>
        <td colspan="2">
            <?php echo $categories[$news->category];?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
          <strong><?php echo $news->summary;?></strong>
        </td>
    </tr>
    <?php if($news->image!='') { ?>
      <tr>
          <td colspan="2">
              <?php if($news->image!='') echo '<img style="max-width:100%" src="'.base_url('public/uploads/news/images/'.$news->image).'" />'; else echo '<img height="50px;" src="'.common_assets_url('images/no-image.png').'" />'; ?>
          </td>
      </tr>
    <?php } ?>
    <?php if($news->video!='') { ?>
    <tr><td colspan="2" ><video width="100%" height="400" controls>
          <source src="<?php echo base_url('public/uploads/news/videos/'.$news->video);?>" type="video/mp4">
        </video></td></tr>
    <?php } ?>


    <tr>
        <td colspan="2">
            <?php echo $news->body;?>
        </td>
    </tr>
</table>

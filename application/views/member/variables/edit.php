<div id="variableUpdateModal" class="modal fade"  role="dialog" aria-labelledby="MaterialsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title" id="statusLabel">Update - Variable  <small >Manual: <?php echo $manual->title;?></small></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

<div class="validation-errors red"></div>
            <?php
              $attributes = array('class' => 'form-vertical', 'id' => 'member-variable-update');
              echo form_open('',$attributes);
              ?>
              <input type="hidden" name="desc_id" value="<?php echo $variable->desc_id;?>" />
              <input type="hidden" name="var_id" value="<?php echo $variable->id;?>" />
              <input type="hidden" name="variable_type" value="<?php echo $variable->variable_type;?>" />

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Original Value</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                         <?php echo $variable->variable_value; ?>
                    </div>
                  <div class="clearfix"></div>
              </div>
              <div class="form-group" id="custom-price">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                      Custom Value
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <?php if($variable->variable_type=='text'){?>
                        <input type="text"  id="member_value" name="member_value"  value="<?php echo $variable->member_value; ?>" class="form-control col-md-12 col-xs-12">
                      <?php } elseif($variable->variable_type=='textarea'){?>
                        <textarea id="member_value" name="member_value"  class="form-control col-md-12 col-xs-12" ><?php echo $variable->member_value; ?></textarea>
                      <?php } elseif($variable->variable_type=='editor'){?>
                        <?php echo $this->ckeditor->editor("member_value",html_entity_decode($variable->member_value)); ?>
                      <?php } ?>
                    </div>
                  <div class="clearfix"></div>
              </div>

              <?php echo form_close(); ?>
       </div>

      <div class="modal-footer">
          <div class="message" style="font-weight:bold;color:green;"></div>
        <button type="button" class="btn btn-success" id="submit-variable-update-button" >Submit</button>
        <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cancel</button>
      <div class="clearfix"></div>
     </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  customprice();
  $("#original-price").on('click', function () {
    customprice();
   });
});
  function customprice(){
    if ($("#original-price").prop('checked')) {
          $('#custom-price').hide();
       } else {
            $('#custom-price').fadeIn();
       }
  }
</script>

<div id="variableUpdateModal" class="modal fade"  role="dialog" aria-labelledby="MaterialsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="statusLabel">Update - Course <small style="float:right;margin-top:8px"># <?php echo $variable->variable_title;?></small></h4>
      </div>
      <div class="modal-body">

<div class="validation-errors red"></div>
            <?php
              $attributes = array('class' => 'form-vertical', 'id' => 'franchise-variable-update');
              echo form_open('',$attributes);
              ?>
              <input type="hidden" name="relation_id" value="<?php echo $variable->relation_id;?>" />

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                      Use Original Price ( <?php echo $variable->variable_fees. 'CAD'; ?>)

                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="original-price" name="variable_original_fees" <?php echo ($variable->variable_original_fees=='1')?'checked':''; ?> type="checkbox"  value="1" />
                    </div>
                  <div class="clearfix"></div>
              </div>
              <div class="form-group" id="custom-price">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                      Franchise Price
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" step="0.1" id="variable_fees" name="variable_custom_fees"  value="<?php echo $variable->variable_custom_fees; ?>" class="form-control col-md-12 col-xs-12">
                    </div>
                  <div class="clearfix"></div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo form_error('status'); ?>
                      <div id="status" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default <?php if($variable->franchise_variable_status=='1') { echo 'active'; } ?>">
                              <input type="radio" required="required" name="franchise_variable_status" value="1" <?php if($variable->franchise_variable_status=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Active &nbsp;
                          </label>
                          <label class="btn btn-default <?php if($variable->franchise_variable_status=='0') { echo 'active'; } ?>">
                              <input type="radio" required="required" name="franchise_variable_status" value="0" <?php if($variable->franchise_variable_status=='0') { echo 'checked="checked"'; } ?> /> Inactive
                          </label>
                      </div>
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

<div id="residenceVacancyModal" class="modal fade"  role="dialog" aria-labelledby="transferLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="statusLabel">Residence Vacancy - <?php echo $residence->name;?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

        <div class="validation-errors red"></div>
        <?php
          $attributes = array('class' => 'form-vertical', 'id' => 'residence-vacancy');
          echo form_open('',$attributes);
          ?>
          <input type="hidden" name="id" value="<?php echo $residence->id;?>" />

          <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="label">Maximum Allowed</label>
              <div class="col-md-8 col-sm-8 col-xs-12"><?php echo $residence->beds_count;?></div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="label">Current Vacancy</label>
              <div class="col-md-8 col-sm-8 col-xs-12"><?php echo $residence->vacancy;?></div>
              <div class="clearfix"></div>
          </div>

          <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="label">New Vacancy<span>*</span></label>

              <div class="col-md-8 col-sm-8 col-xs-12"><input type="number" class="form-control col-md-7 col-xs-12" name="vacancy" min="0" step="1" max="<?php echo $residence->beds_count;?>" value="<?php echo $residence->vacancy;?>"></div>
              <div class="clearfix"></div>
          </div>
          <?php echo form_close(); ?>
       </div>

      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="submit-update-vacancy-btn" >Submit</button>
      <button type="button" class="btn btn-default autoclose" data-dismiss="modal">Cancel</button>
     </div>
    </div>
  </div>
</div>

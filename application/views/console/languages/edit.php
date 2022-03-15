<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Language</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'page-edit');
                echo form_open_multipart(admin_url_string('languages/edit/'.$language->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $language->id; ?>" />

                <div class="form-group">
      			  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
      			  </label>
      			  <div class="col-md-6 col-sm-6 col-xs-12">
      			  <?php echo form_error('name'); ?>
      				<input type="text" id="name" name="name" required="required" value="<?php echo $language->name; ?>" class="form-control">
      			  </div>
              <div class="clearfix"></div>
      			</div>
      			<div class="form-group">
      			  <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">Label
      			  </label>
      			  <div class="col-md-6 col-sm-6 col-xs-12">
      			  <?php echo form_error('label'); ?>
      				<input type="text" id="label" name="label" required="required" value="<?php echo $language->label; ?>" class="form-control">
      			  </div>
              <div class="clearfix"></div>
      			</div>
      			<div class="form-group">
      			  <label class="col-form-label col-md-3 col-sm-3 label-align" for="class">Class
      			  </label>
      			  <div class="col-md-6 col-sm-6 col-xs-12">
      			  <?php echo form_error('class'); ?>
      				<input type="text" id="class" name="class"  value="<?php echo $language->class; ?>" class="form-control">
      			  </div>
              <div class="clearfix"></div>
      			</div>

                <div class="form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php echo form_error('status'); ?>
                    <div id="status" class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default <?php if($language->status=='1') { echo 'active'; } ?>">
                        <input type="radio" required="required" name="status" value="1" <?php if($language->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                      </label>
                      <label class="btn btn-default <?php if($language->status=='0') { echo 'active'; } ?>">
                        <input type="radio" required="required" name="status" value="0" <?php if($language->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                      </label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('pages/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

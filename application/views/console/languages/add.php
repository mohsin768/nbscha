<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Language</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'page-add');
                echo form_open_multipart(admin_url_string('languages/add'),$attributes);
                ?>

                  <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo form_error('name'); ?>
                      <input type="text" id="name" name="name" required="required" value="<?php echo set_value('name'); ?>" class="form-control">
                    </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">Label
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo form_error('label'); ?>
                      <input type="text" id="label" name="label" required="required" value="<?php echo set_value('label'); ?>" class="form-control">
                    </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="class">Class
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo form_error('class'); ?>
                      <input type="text" id="class" name="class"  value="<?php echo set_value('class'); ?>" class="form-control">
                    </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="code">Code<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo form_error('code'); ?>
                      <input type="text" id="code" name="code" required="required" value="<?php echo set_value('code'); ?>" class="form-control">
                    </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo form_error('status'); ?>
                      <div id="status" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary <?php if(set_value('status')=='1') { echo 'active'; } ?>">
                          <input type="radio" required="required" name="status" value="1" <?php if(set_value('status')=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Enabled &nbsp;
                        </label>
                        <label class="btn btn-secondary <?php if(set_value('status')=='0') { echo 'active'; } ?>">
                          <input type="radio" required="required" name="status" value="0" <?php if(set_value('status')=='0') { echo 'checked="checked"'; } ?> /> Disabled
                        </label>
                      </div>
                    </div>
                      <div class="clearfix"></div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <a class="btn btn-primary" href="<?php echo admin_url('languages/overview'); ?>">Cancel</a>
                      </div>
                  </div>
          <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

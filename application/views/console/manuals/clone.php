<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Clone Manual</h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('manuals/overview'); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'manual-clone');
                echo form_open_multipart(admin_url_string('manuals/clone/'.$manual->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $manual->id; ?>" />
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="version">Version<span class="lang_label">(All Languages)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('version'); ?>
                        <input type="text" id="version" required name="version" value="<?php echo (set_value('version')!='')?set_value('version'):''; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('manuals/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      $(document).ready(function() {
          $("a[class=image-preview]").fancybox();
      });
  </script>

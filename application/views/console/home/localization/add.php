
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Localization</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'localization-add');
                echo form_open_multipart(admin_url_string('home/addlocalization'),$attributes);
                ?>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="lang_key">Key<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('lang_key'); ?>
                        <input type="text" id="lang_key" name="lang_key" required="required" value="<?php echo set_value('lang_key'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="lang_value">Value<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('lang_value'); ?>
                        <input type="text" id="lang_value" name="lang_value" required="required" value="<?php echo set_value('lang_value'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('home/dashboard'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Role</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'categories-add');
                echo form_open(admin_url_string('users/addrole'),$attributes);
                ?>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo set_value('name'); ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if(set_value('status')=='1') { echo 'active'; } ?>">
                                <input type="radio" required="required" name="status" value="1" <?php if(set_value('status')=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if(set_value('status')=='0') { echo 'active'; } ?>">
                                <input type="radio" required="required" name="status" value="0" <?php if(set_value('status')=='0') { echo 'checked="checked"'; } ?> /> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('users/roles'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Change Password for <?php echo $user->fullname; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'changepwd-add');
                echo form_open(admin_url_string('home/changepwd'),$attributes);
                ?>
                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Old Password<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('passold'); ?>
                        <input type="password" id="passold" name="passold" required="required" value="<?php echo set_value('passold'); ?>" class="form-control">
                        <input type="hidden"  name="salt" value="<?php echo $user->salt; ?>" >
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('password'); ?>
                        <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" required="required" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="confpassword">Confirm Password<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('confpassword'); ?>
                        <input type="password" id="confpassword" value="<?php echo set_value('confpassword'); ?>" name="confpassword" required="required" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('home/'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
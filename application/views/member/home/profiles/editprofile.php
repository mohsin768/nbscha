<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Profile</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'profile-edit');
                echo form_open(member_url_string('home/editprofile'),$attributes);?>
                <input type="hidden" name="mid" value=" <?php echo $user->mid; ?>" />
                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first_name">First Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('first_name'); ?>
                        <input type="text" id="first_name" name="first_name" required="required" value="<?php echo $user->first_name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last_name">Last Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('last_name'); ?>
                        <input type="text" id="last_name" name="last_name" required="required" value="<?php echo $user->last_name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('email'); ?>
                        <input type="email" id="email" name="email" required="required" value="<?php echo $user->email; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('phone'); ?>
                        <input type="text" id="phone" name="phone" required="required" value="<?php echo $user->phone; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo member_url('home/dashboard'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
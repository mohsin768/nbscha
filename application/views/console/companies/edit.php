<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Company (<?php echo $company->name; ?>)</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open(admin_url_string('companies/edit/'.$company->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $company->id; ?>" />
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo $company->name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('email'); ?>
                        <input type="email" id="email" name="email" required="required" value="<?php echo $company->email; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="contact_number">Contact Number<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('contact_number'); ?>
                        <input type="text" id="contact_number" name="contact_number" required="required" value="<?php echo $company->contact_number; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="access_token">Access Token<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('access_token'); ?>
                        <input type="text" id="access_token" name="access_token" required="required" value="<?php echo $company->access_token; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($company->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($company->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($company->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($company->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('companies/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

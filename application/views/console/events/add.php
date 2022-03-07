<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Event</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'events-add');
                echo form_open_multipart(admin_url_string('events/add'),$attributes);
                ?>
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="question">Title<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo set_value('title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
        
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="start_date">Start Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('start_date'); ?>
                        <input type="text" id="start_date" name="start_date" value="<?php echo set_value('start_date'); ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="end_date">End Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('end_date'); ?>
                        <input type="text" id="end_date" name="end_date" value="<?php echo set_value('end_date'); ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
        
                <div class="ln_solid"></div>          
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('events/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
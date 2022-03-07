<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Event</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'events-edit');
                echo form_open_multipart(admin_url_string('events/edit/'.$event->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $event->id; ?>" />
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="question">Title<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo $event->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
        
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="start_date">Start Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('start_date'); ?>
                        <input type="text" id="start_date" name="start_date" value="<?php echo date('d-m-Y',strtotime($event->start_date)); ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="end_date">End Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('end_date'); ?>
                        <input type="text" id="end_date" name="end_date" value="<?php echo date('d-m-Y',strtotime($event->end_date)); ?>" class="date-picker form-control">
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

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Reviews</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'testimonial-add');
                echo form_open_multipart(admin_url_string('reviews/add'),$attributes);
                ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo set_value('name'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="position">Position
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('position'); ?>
                        <input type="text" id="position" name="position" value="<?php echo set_value('position'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="body">Body<span class="required">*</span>
                    </label>
                   <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('body'); ?>
                        <?php echo $this->ckeditor->editor("body",html_entity_decode(set_value('body'))); ?>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
               <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo form_error('image'); ?>
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
              
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="date"> Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('date'); ?>
                        <input type="date-picker" id="date" name="date" value="<?php echo set_value('date'); ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
             
                
               
                     <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if(set_value('status')=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if(set_value('status')=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-secondary <?php if(set_value('status')=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
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
                        <a class="btn btn-primary" href="<?php echo admin_url('reviews/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
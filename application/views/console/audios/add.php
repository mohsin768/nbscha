<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Audios</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'audios-add');
                echo form_open_multipart(admin_url_string('audios/add'),$attributes);
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
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="artist">Artist</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('artist'); ?>
                        <input type="text" id="artist" name="artist" value="<?php echo set_value('artist'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="audio">Audio
                    <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo form_error('audio'); ?>
                        <input id="audio" name="audio" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="sort_order">Sort order
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('sort_order'); ?>
                        <input type="text" id="sort_order" name="sort_order" value="<?php echo set_value('sort_order'); ?>" class="form-control">
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
                        <a class="btn btn-primary" href="<?php echo admin_url('audios/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
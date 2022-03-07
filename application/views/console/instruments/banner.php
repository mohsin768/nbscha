<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Instrument Banner</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'instrument-banner');
                echo form_open_multipart(admin_url_string('instruments/banner/'.$instrument->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $instrument->id; ?>" />
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Banner Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" value="<?php echo $instrument->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Banner Sub Title
                    <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('subtitle'); ?>
                        <input type="text" id="subtitle" name="subtitle" value="<?php echo $instrument->subtitle; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                    Banner Image<br/> <?php if($instrument->banner_image!='') { echo $instrument->banner_image; } ?>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="banner_image" name="banner_image" class="form-control" style="padding:0px;"  type="file">
                    <?php if($instrument->banner_image!='') { ?>
                    Remove banner image? <input  name="remove_banner_image"   type="checkbox" value="1">
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('instruments/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

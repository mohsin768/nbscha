<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Instrument SEO</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'instrument-seo');
                echo form_open_multipart(admin_url_string('instruments/seo/'.$instrument->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $instrument->id; ?>" />
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="slug">URL Slug<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('slug'); ?>
                        <input type="text" id="slug" name="slug" required="required" value="<?php echo $instrument->slug; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="meta_title">Meta title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('meta_title'); ?>
                        <input type="text" id="meta_title" name="meta_title" value="<?php echo $instrument->meta_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="meta_desc">Meta description
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('meta_desc'); ?>
                        <textarea class="form-control" id="meta_desc" name="meta_desc"><?php echo $instrument->meta_desc; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="meta_keywords">Meta keywords
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('meta_keywords'); ?>
                        <input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo $instrument->meta_keywords; ?>" class="form-control">
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

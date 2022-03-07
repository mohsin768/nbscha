<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Page SEO</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <span><a class="btn btn-secondary btn-sm" href="<?php echo admin_url('packages/overview'); ?>" ><i class="fa fa-backward" aria-hidden="true"></i> &nbsp;Back</a></span> 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'package-seo');
                echo form_open_multipart(admin_url_string('packages/seo/'.$package->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $package->id; ?>" />
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="slug">URL Slug<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('slug'); ?>
                        <input type="text" id="slug" name="slug" required="required" value="<?php echo $package->slug; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="meta_title">Meta Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('meta_title'); ?>
                        <input type="text" id="meta_title" name="meta_title" value="<?php echo $package->meta_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="meta_desc">Meta Description
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('meta_desc'); ?>
                        <textarea id="meta_desc" name="meta_desc" class="form-control"><?php echo $package->meta_desc; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="meta_keywords">Meta Keywords
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('meta_keywords'); ?>
                        <input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo $package->meta_keywords; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('packages/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Page</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'page-edit');
                echo form_open_multipart(admin_url_string('pages/edit/'.$page->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $page->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo $page->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Sub Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('subtitle'); ?>
                        <input type="text" id="subtitle" name="subtitle" value="<?php echo $page->subtitle; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Image<br/> <?php if($page->banner_image!='') { echo $page->banner_image; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                        <?php if($page->banner_image!='') { ?>
                        Remove Banner Image? <input  name="remove_banner_image"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Video <br/> <?php if($page->banner_video!='') { echo $page->banner_video; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                        <?php if($page->banner_video!='') { ?>
                        Remove Banner Video? <input  name="remove_banner_video"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if($page->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($page->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-secondary <?php if($page->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($page->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('pages/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

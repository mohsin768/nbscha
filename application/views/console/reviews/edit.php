<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Review</h2>
                <div class="clearfix"></div>
            </div>
                <div class="x_content">
                    <br />
                    <?php
                    $attributes = array('class' => 'form-vertical form-label-left', 'id' => 'review-edit');
                    echo form_open_multipart(admin_url_string('reviews/edit/'.$review->id),$attributes);?>
                    <input type="hidden" name="id" value="<?php echo $review->id; ?>" />
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo $review->name; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="clearfix"></div>
                </div>  
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="position">Position
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="position" name="position"  value="<?php echo $review->position; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="body">Body<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('body'); ?>
                        <?php echo $this->ckeditor->editor("body",html_entity_decode($review->body)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="date">Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('date'); ?>
                        <input type="date-picker" id="date" name="date" value="<?php echo $review->date; ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                    <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Image<br/> <?php if($review->image!='') { echo $review->image; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                        <?php if($review->image!='') { ?>
                        Remove image? <input  name="remove_image"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                      <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if($review->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($review->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-secondary <?php if($review->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($review->status=='0') { echo 'checked="checked"'; } ?>> Disabled
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

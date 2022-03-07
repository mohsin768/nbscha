<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Faqs</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'faq-edit');
                echo form_open_multipart(admin_url_string('faqs/edit/'.$faq->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $faq->id; ?>" />
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="question">Question<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('question'); ?>
                        <input type="text" id="question" name="question" required="required" value="<?php echo $faq->question; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="answer">Answer
                    <span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('answer'); ?>
                        <?php echo $this->ckeditor->editor("answer",html_entity_decode($faq->answer)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="sort_order">Sort order
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('sort_order'); ?>
                        <input type="text" id="sort_order" name="sort_order" value="<?php echo $faq->sort_order; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
              

               
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if($faq->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($faq->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-secondary <?php if($faq->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($faq->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('faqs/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

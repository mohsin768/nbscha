<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php if($testimonial->language==$language) echo 'Edit Testimonial'; else echo 'Testimonial - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($testimonial->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('testimonials/translates/'.$testimonial->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'testimonial-horizontal testimonial-label-left', 'id' => 'location-add');
                echo form_open_multipart(admin_url_string('testimonials/edit/'.$testimonial->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $testimonial->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />


                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Author<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('author'); ?>
                        <input type="text" id="author"  name="author"  value="<?php echo $testimonial->author; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Message <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('message'); ?>
                        <?php echo $this->ckeditor->editor("message",html_entity_decode($testimonial->message)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Date <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('date'); ?>
                        <input type="text" id="publish_date"  name="date"  value="<?php echo date('d-m-Y',strtotime($testimonial->date)); ?>" class="form-control date-picker">
                    </div>
                    <div class="clearfix"></div>
                </div
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(All Languages)</span><span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($testimonial->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($testimonial->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($testimonial->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($testimonial->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('testimonials/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
		$("#publish_date").daterangepicker({
		timePicker: false,
			singleDatePicker: true,showDropdowns: true,
			locale: {format: "DD-MM-YYYY",cancelLabel: "Clear"},
			calender_style: "picker_4"
		}, function(start_date, end_date) {
				this.element.val(start_date.format("DD-MM-YYYY"));
		});

	});
</script>

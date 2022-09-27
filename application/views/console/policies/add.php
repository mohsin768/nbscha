<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $manual->title; ?> - Version:<?php echo $manual->version; ?>  <br/> Section: <?php echo $section->title; ?> - Add Policy</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'policy-add');
                echo form_open_multipart(admin_url_string('policies/add/'.$manual->id.'/'.$section->id.'/'.$language),$attributes);
                ?>
                <input type="hidden" name="language" value="<?php echo $language;?>" />
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="policy_category">Category</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('policy_category'); ?>
                        <select id="policy_category" name="policy_category" class="form-control">
                            <option value=""> -- Please Select --</option>
                            <?php foreach($policyCategories as $policyCategory): ?>
                                <option value="<?php echo $policyCategory['id']; ?>" <?php echo set_select('policy_category',$policyCategory['id']); ?>><?php echo $policyCategory['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>    
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" required name="title" value="<?php echo set_value('title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Content<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('content'); ?>
                          <?php echo $this->ckeditor->editor("content",html_entity_decode(set_value('content'))); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="policy_issue_date">Issue Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('policy_issue_date'); ?>
                        <input type="text" id="policy_issue_date"  name="policy_issue_date"  value="" class="form-control date-picker">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="policy_update_date">Update Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('policy_update_date'); ?>
                        <input type="text" id="policy_update_date"  name="policy_update_date"  value="" class="form-control date-picker">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if(set_value('status')=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if(set_value('status')=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if(set_value('status')=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
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
                        <a class="btn btn-primary" href="<?php echo admin_url('policies/overview/'.$manual->id.'/'.$section->id.'/'.$language); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function() {
		$("#policy_issue_date").daterangepicker({
		timePicker: false,
			singleDatePicker: true,showDropdowns: true,autoUpdateInput: false,
			locale: {format: "DD-MM-YYYY",cancelLabel: "Clear"},
			calender_style: "picker_4"
		}, function(start_date, end_date) {
				this.element.val(start_date.format("DD-MM-YYYY"));
		});

        $("#policy_update_date").daterangepicker({
		timePicker: false,
			singleDatePicker: true,showDropdowns: true,autoUpdateInput: false,
			locale: {format: "DD-MM-YYYY",cancelLabel: "Clear"},
			calender_style: "picker_4"
		}, function(start_date, end_date) {
				this.element.val(start_date.format("DD-MM-YYYY"));
		});

	});
</script>
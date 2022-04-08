<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add News</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'news-add');
                echo form_open_multipart(admin_url_string('news/add'),$attributes);
                ?>
                <input type="hidden" name="language" value="<?php echo $this->default_language;?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" required name="title"  value="<?php echo set_value('title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Category<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('category'); ?>
                        <select id="category" name="category" class="form-control">
                            <option value=""> -- Select -- </option>
                            <?php foreach($categories as $key => $value): ?>
                                <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Resource Type<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('type'); ?>
                        <select id="type" name="type" class="form-control">
                            <option value=""> -- Select -- </option>
                            <?php foreach($resourse_types as $key => $value): ?>
                                <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Summary
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('summary'); ?>
                        <textarea class="form-control" rows="3" name="summary"><?php echo set_value('summary'); ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Body
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
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="video">Video
                   <br/><small>Formats supported: mp4</small></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('video'); ?>
                       <input id="video" name="video" class="form-control" style="padding:0px;"  type="file">
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="author">Author
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('author'); ?>
                        <input type="text" id="author"  name="author"  value="<?php echo set_value('author'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Publish Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('publish_date'); ?>
                        <input type="text" id="publish_date"  name="publish_date"  value="" class="form-control date-picker">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
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
                        <a class="btn btn-primary" href="<?php echo admin_url('news/overview'); ?>">Cancel</a>
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

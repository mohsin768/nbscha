<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Package</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'package-add');
                echo form_open(admin_url_string('packages/add'),$attributes);
                ?>
                <input type="hidden" name="language" value="<?php echo $this->default_language;?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required value="<?php echo set_value('title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>



                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Beds Count<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="bed-count-wrap">
                          <?php echo form_error('bed_count'); ?>
                          <input type="number"  id="bed_count" name="bed_count"  value="<?php echo set_value('bed_count'); ?>" class="form-control">
                        </div>
                        <div style="padding-top:8px;">
                          <input class="bed_unlimited" name="bed_unlimited" value="1" <?php  echo set_checkbox('bed_unlimited', '1'); ?>  type="checkbox"/> Unlimited
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Price
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('price'); ?>
                        <input type="text" id="price" name="price"  value="<?php echo set_value('price'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="Certificate">Certificate Template</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('certificate_template'); ?>
                        <select id="certificate_template" name="certificate_template" class="form-control">
                            <option value=""> -- Please Select --</option>
                            <?php foreach($certificates as $id => $name): ?>
                                <option value="<?php echo $id; ?>" <?php echo set_select('certificate_template',$id); ?>><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Description
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('description'); ?>
                        <?php echo $this->ckeditor->editor("description",html_entity_decode(set_value('description'))); ?>
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
                        <a class="btn btn-primary" href="<?php echo admin_url('packages/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
hideBedcount();
$(document).ready(function(){
  $('.bed_unlimited').change(function() {
  hideBedcount();
  });
});
function hideBedcount(){
  if ($('input.bed_unlimited').is(':checked')) {
    $("#bed-count-wrap").addClass("hide");
  } else {
    $("#bed-count-wrap").removeClass("hide");
  }
}
</script>

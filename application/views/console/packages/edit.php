<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php if($package->language==$language) echo 'Edit Package'; else echo 'Package - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($package->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('packages/translates/'.$package->pid); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open(admin_url_string('packages/edit/'.$package->pid.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="pid" value="<?php echo $package->pid; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo $package->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>



                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Beds Count <span class="lang_label">(All Languages)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="bed-count-wrap">
                        <?php echo form_error('bed_count'); ?>
                        <input type="number"  id="bed_count" name="bed_count"  value="<?php echo $package->bed_count; ?>" class="form-control">
                      </div>
                      <div style="padding-top:8px;">
                        <input class="bed_unlimited" name="bed_unlimited" value="1" <?php if($package->bed_unlimited=='1')  echo 'checked'; ?>  type="checkbox"/> Unlimited
                      </div>

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Price <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('price'); ?>
                        <input type="text" id="price" name="price"  value="<?php echo $package->price; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="Certificate">Certificate Template <span class="lang_label">(All Languages)</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('certificate_template'); ?>
                        <select id="certificate_template" name="certificate_template" class="form-control">
                            <option value=""> -- Please Select --</option>
                            <?php foreach($certificates as $id => $name): ?>
                                <option value="<?php echo $id; ?>" <?php if($package->certificate_template == $id) echo 'selected="selected"'; ?> ><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Description <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('description'); ?>
                        <?php echo $this->ckeditor->editor("description",html_entity_decode($package->description)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(All Languages)</span><span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($package->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($package->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($package->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($package->status=='0') { echo 'checked="checked"'; } ?>> Disabled
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

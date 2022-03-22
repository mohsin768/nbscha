<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php if($form->language==$language) echo 'Edit Form'; else echo 'Form - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($form->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('forms/translates/'.$form->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open_multipart(admin_url_string('forms/edit/'.$form->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $form->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Name <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo $form->name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Resource Type <span class="lang_label">(All Languages)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('type'); ?>
                        <select id="type" name="type" class="form-control">
                            <option value=""> -- Select -- </option>
                            <?php foreach($resourse_types as $key => $value): ?>
                                <option <?php if($form->type==$key) echo 'selected';?> value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Attachment <span class="lang_label">(All Languages)</span>
                     <?php if($form->attachment!='') { echo $form->attachment; } ?></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('attachment'); ?>
                        <input id="image" name="attachment" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Attachment? <input  name="remove_attachment"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Publish Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('publish_date'); ?>
                        <input type="text" id="publish_date"  name="publish_date"  value="<?php echo date('d-m-Y',strtotime($form->publish_date)); ?>" class="form-control date-picker">
                    </div>
                    <div class="clearfix"></div>
                </div
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(All Languages)</span><span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($form->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($form->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($form->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($form->status=='0') { echo 'checked="checked"'; } ?>> Disabled
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
                        <a class="btn btn-primary" href="<?php echo admin_url('forms/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

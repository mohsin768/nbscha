<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'settings-add');
                echo form_open(admin_url_string('home/settings'),$attributes);
                ?><input type="hidden" id="settings" name="settings" value="1"  >
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php foreach($settings_groups as $settings_group): $settings = (isset($grouped_settings[$settings_group['id']]))?$grouped_settings[$settings_group['id']]:array(); ?>
                    <div class="panel">
                        <a class="panel-heading" role="tab" id="heading-<?php echo $settings_group['id']; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $settings_group['id']; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $settings_group['id']; ?>">
                            <h4 class="panel-title"><?php echo $settings_group['title']; ?></h4>
                        </a>
                        <div id="collapse-<?php echo $settings_group['id']; ?>" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="heading-<?php echo $settings_group['id']; ?>">
                            <div class="panel-body">
                                <br/>
                                <?php if(count($settings)>0){ foreach($settings as $setting): ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">
                                        <?php echo $setting['title']; ?>
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <?php if($setting['settingtype']=='dashboard'){ ?>
                                        <input type="radio" name="setting[<?php echo $setting['id']; ?>]" <?php if($setting['settingvalue']=='W'){ echo 'checked="checked"';} ?> value="W" checked="checked" /> Weekly 
                                        <input type="radio" name="setting[<?php echo $setting['id']; ?>]" <?php if($setting['settingvalue']=='M'){ echo 'checked="checked"';} ?> value="M" /> Monthly
                                        <input type="radio" name="setting[<?php echo $setting['id']; ?>]" <?php if($setting['settingvalue']=='Y'){ echo 'checked="checked"';} ?> value="Y"  /> Yearly 
                                        <input type="radio" name="setting[<?php echo $setting['id']; ?>]" <?php if($setting['settingvalue']=='A'){ echo 'checked="checked"';} ?> value="A"  /> All 
                                        <?php } else if($setting['settingtype']=='radio'){ ?>
                                        <input type="radio" name="setting[<?php echo $setting['id']; ?>]" value="Y" <?php if($setting['settingvalue']=='Y'){ echo 'checked="checked"';} ?> /> Yes 
                                        <input type="radio" name="setting[<?php echo $setting['id']; ?>]" value="N" <?php if($setting['settingvalue']=='N'){ echo 'checked="checked"';} ?> /> No
                                        <?php } else if($setting['settingtype']=='textaera'){ ?>
                                        <input  name="setting[<?php echo $setting['id']; ?>]" type="text" class="form-control" value="<?php echo $setting['settingvalue']; ?>" />
                                        <?php } else if($setting['settingtype']=='formatted_textarea'){ ?>
                                        <?php echo $this->ckeditor->editor("setting[".$setting['id']."]",html_entity_decode($setting['settingvalue'])); ?>
                                        <?php } else if($setting['settingtype']=='pages'){ ?>
                                        <select  name="setting[<?php echo $setting['id']; ?>]"class="form-control">
                                            <option value="">Please Select</option>
                                            <?php foreach($pages as $id => $name): ?>
                                                <option value="<?php echo $id; ?>" <?php if($setting['settingvalue'] ==$id){ echo 'selected="selected"';} ?>><?php echo $name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php } else { ?>
                                        <input  name="setting[<?php echo $setting['id']; ?>]" type="text" class="form-control" value="<?php echo $setting['settingvalue']; ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php endforeach; }?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('home/dashboard'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
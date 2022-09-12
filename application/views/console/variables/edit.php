<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $manual->title; ?> - Version:<?php echo $manual->version; ?> - <?php if($variable->language==$language) echo 'Edit Variable'; else echo 'Variable - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($variable->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('variables/translates/'.$manual->id.'/'.$variable->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'variable-edit');
                echo form_open_multipart(admin_url_string('variables/edit/'.$manual->id.'/'.$variable->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $variable->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo $variable->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Variable Key<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('variable_key'); ?>
                        <input type="text" id="variable_key" required name="variable_key" value="<?php echo $variable->variable_key; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="variable_type">Variable Type</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('variable_type'); ?>
                        <select id="variable_type" name="variable_type" class="form-control">
                            <option value=""> -- Please Select --</option>
                            <?php foreach($this->variableTypes as $id => $name): $default = false; if($variable->variable_type==$id){ $default = true; }?>
                                <option value="<?php echo $id; ?>" <?php echo set_select('variable_type',$id,$default); ?>><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Variable Value<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('variable_value'); ?>
                        <?php if($variable->variable_type=='text'){?>
                            <input type="text"  id="variable_value" name="variable_value"  value="<?php echo $variable->variable_value; ?>" class="form-control col-md-12 col-xs-12">
                          <?php } elseif($variable->variable_type=='textarea'){?>
                            <textarea id="variable_value" name="variable_value"  class="form-control col-md-12 col-xs-12" ><?php echo $variable->variable_value; ?></textarea>
                          <?php } elseif($variable->variable_type=='editor'){?>
                            <?php echo $this->ckeditor->editor("variable_value",html_entity_decode($variable->variable_value)); ?>
                          <?php } ?>

                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('variables/overview/'.$manual->id.'/'.$language); ?>">Cancel</a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

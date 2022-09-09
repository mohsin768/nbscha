<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $manual->title; ?> - Version:<?php echo $manual->version; ?> - Add Variable</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'variable-add');
                echo form_open_multipart(admin_url_string('variables/add/'.$manual->id.'/'.$language),$attributes);
                ?>
                <input type="hidden" name="language" value="<?php echo $this->default_language;?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Variable Key<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('variable_key'); ?>
                        <input type="text" id="variable_key" required name="variable_key" value="<?php echo set_value('variable_key'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="section_type">Variable Type</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('variable_type'); ?>
                        <select id="variable_type" name="variable_type" class="form-control">
                            <option value=""> -- Please Select --</option>
                            <?php foreach($this->variableTypes as $id => $name): ?>
                                <option value="<?php echo $id; ?>" <?php echo set_select('variable_type',$id); ?>><?php echo $name; ?></option>
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
                        <input type="text" id="variable_value" required name="variable_value" value="<?php echo set_value('question'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('variables/overview/'.$manual->id.'/'.$language); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

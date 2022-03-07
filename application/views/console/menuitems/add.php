<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Menu Item - <?php echo $menu_detail->name; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open(admin_url_string('menuitems/add/'.$menu_detail->id),$attributes);
                ?>
                
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo set_value('name'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="parent_id">Parent<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('parent_id'); ?>
                        <select class="form-control" name="parent_id">
                            <option value="">Please Select</option>
                            <option value="0">Root</option>
                            <?php foreach($menus as $menu):?>
                                <option value="<?php echo $menu['id'];?>"><?php echo $menu['name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="link_type">Link Type <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('link_type'); ?>
                        <select class="form-control" name="link_type">
                            <option value="">Please Select</option>
                            <?php foreach($linktypes as $key => $value):?>
                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="link_object">Page</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('link_object'); ?>
                        <select class="form-control" name="link_object">
                            <option value="">Please Select</option>
                            <?php foreach($pages as $page):?>
                                <option value="<?php echo $page['id'];?>"><?php echo $page['title'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="link">Link<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('link'); ?>
                        <input type="text" id="link" name="link" value="<?php echo set_value('link'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="target_type">Target Type</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('target_type'); ?>
                        <select class="form-control" name="target_type">
                            <option value="">Please Select</option>
                            <?php foreach($targettypes as $key => $value):?>
                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
    
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="class">Class</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('class'); ?>
                        <input type="text" id="class" name="class" value="<?php echo set_value('class'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="sort_order">Sort Order<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('sort_order'); ?>
                        <input type="text" id="sort_order" name="sort_order" required="required" value="<?php echo set_value('sort_order'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if(set_value('status')=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if(set_value('status')=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-secondary <?php if(set_value('status')=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
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
                        <a class="btn btn-primary" href="<?php echo admin_url('menuitems/overview/'.$menu_detail->id); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Widget</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'widgets-add');
                echo form_open_multipart(admin_url_string('widgets/add/'.$type),$attributes);
                ?>
                <input type="hidden" name="widget_type" value="<?php echo $type; ?>" />
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required value="<?php echo set_value('name'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if($type == 'content_widget' || $type == 'content_block_widget'){ 
                    $widgetTypes = array();
                    if($type == 'content_widget'){
                        $widgetTypes = $content_widget_templates;
                    }
                    if($type == 'content_block_widget'){
                        $widgetTypes = $block_widget_templates;
                    }
                ?>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="widget_template">Widget Template<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_error('widget_template'); ?>
                            <select id="widget_template" name="widget_template" required="required" class="form-control">
                                <option value="">Please Select</option>
                                <?php foreach($widgetTypes as $id => $name): ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('widget_template',$id); ?>><?php echo $name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
                <?php if($type == 'content_block_widget'){ ?>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="block_category">Category<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_error('block_category'); ?>
                            <select id="block_category" name="block_category" required="required" class="form-control">
                                <option value="">Please Select</option>
                                <?php foreach($categories as $id => $name): ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('block_category',$id); ?>><?php echo $name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" value="<?php echo set_value('title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
        
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Sub Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('subtitle'); ?>
                        <input type="text" id="subtitle" name="subtitle" value="<?php echo set_value('subtitle'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inset_title">Inset Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('inset_title'); ?>
                        <input type="text" id="inset_title" name="inset_title" value="<?php echo set_value('inset_title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="class">Class
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('class'); ?>
                        <input type="text" id="class" name="class" value="<?php echo set_value('class'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="background">Background
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="background" name="background" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if($type == 'content_widget'){ ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('content'); ?>
                        <?php echo $this->ckeditor->editor("content",html_entity_decode(set_value('content'))); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="bvideo">Video
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="video" name="video" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="primary_link_title">Primary Link Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('primary_link_title'); ?>
                        <input type="text" id="primary_link_title" name="primary_link_title" value="<?php echo set_value('primary_link_title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="primary_link_url">Primary Link URL
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('primary_link_url'); ?>
                        <input type="text" id="primary_link_url" name="primary_link_url" value="<?php echo set_value('primary_link_url'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="secondary_link_title">Secondary Link Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('secondary_link_title'); ?>
                        <input type="text" id="secondary_link_title" name="secondary_link_title" value="<?php echo set_value('secondary_link_title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="secondary_link_url">Secondary Link URL
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('secondary_link_url'); ?>
                        <input type="text" id="secondary_link_url" name="secondary_link_url" value="<?php echo set_value('secondary_link_url'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="attachment_link_title">Attachment Link Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('attachment_link_title'); ?>
                        <input type="text" id="attachment_link_title" name="attachment_link_title" value="<?php echo set_value('attachment_link_title'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="attachment">Attachment
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="attachment" name="attachment" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if($type == 'combined_widget'){ ?>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="left_widget">Left Widget<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="left_widget">
                                <option value="">Please Select</option>
                                <?php foreach($combinedWidgets as $combinedWidget):?>
                                <option value="<?php echo $combinedWidget['id'];?>" <?php echo set_select('left_widget',$combinedWidget['id'],FALSE); ?>><?php echo $combinedWidget['title'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="right_widget">Right Widget<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="right_widget">
                                <option value="">Please Select</option>
                                <?php foreach($combinedWidgets as $combinedWidget):?>
                                <option value="<?php echo $combinedWidget['id'];?>" <?php echo set_select('right_widget',$combinedWidget['id'],FALSE); ?>><?php echo $combinedWidget['title'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
                <div class="ln_solid"></div>          
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('widgets/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
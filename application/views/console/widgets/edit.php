<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Widget</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'widget-edit');
                echo form_open_multipart(admin_url_string('widgets/edit/'.$type.'/'.$widget->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $widget->id; ?>" />
                <input type="hidden" name="widget_type" value="<?php echo $widget->widget_type; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" required name="name" value="<?php echo $widget->name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php 
                if($type == 'content_widget' || $type == 'content_block_widget'){ 
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
                                <?php foreach($widgetTypes as $id => $name): $selected = false; if($widget->widget_template == $id){ $selected = true; } ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('widget_template',$id,$selected); ?>><?php echo $name; ?></option>
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
                                <?php foreach($categories as $id => $name): $selected = false; if($widget->block_category == $id){ $selected = true; } ?>
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
                        <input type="text" id="title" name="title" value="<?php echo $widget->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Sub Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('subtitle'); ?>
                        <input type="text" id="subtitle" name="subtitle" value="<?php echo $widget->subtitle; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inset_title">Inset Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('inset_title'); ?>
                        <input type="text" id="inset_title" name="inset_title" value="<?php echo $widget->inset_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="class">Class
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('class'); ?>
                        <input type="text" id="class" name="class" value="<?php echo $widget->class; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Background<br/> <?php if($widget->background!='') { echo $widget->background; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="background" name="background" class="form-control" style="padding:0px;"  type="file">
                        <?php if($widget->background!='') { ?>
                        Remove Background? <input  name="remove_background"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if($widget->widget_type == 'content_widget'){ ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('content'); ?>
                        <?php echo $this->ckeditor->editor("content",html_entity_decode($widget->content)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Image<br/> <?php if($widget->image!='') { echo $widget->image; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                        <?php if($widget->image!='') { ?>
                        Remove Image? <input  name="remove_image"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Video <br/> <?php if($widget->video!='') { echo $widget->video; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="video" name="video" class="form-control" style="padding:0px;"  type="file">
                        <?php if($widget->video!='') { ?>
                        Remove Video? <input  name="remove_video"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="primary_link_title">Primary Link Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('primary_link_title'); ?>
                        <input type="text" id="primary_link_title" name="primary_link_title" value="<?php echo $widget->primary_link_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="primary_link_url">Primary Link URL
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('primary_link_url'); ?>
                        <input type="text" id="primary_link_url" name="primary_link_url" value="<?php echo $widget->primary_link_url; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="secondary_link_title">Secondary Link Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('secondary_link_title'); ?>
                        <input type="text" id="secondary_link_title" name="secondary_link_title" value="<?php echo $widget->secondary_link_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="secondary_link_url">Secondary Link URL
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('secondary_link_url'); ?>
                        <input type="text" id="secondary_link_url" name="secondary_link_url" value="<?php echo $widget->secondary_link_url; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="attachment_link_title">Attachment Link Title
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('attachment_link_title'); ?>
                        <input type="text" id="attachment_link_title" name="attachment_link_title" value="<?php echo $widget->attachment_link_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="attachment">
                        Attachment <br/> <?php if($widget->attachment!='') { echo $widget->attachment; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="attachment" name="attachment" class="form-control" style="padding:0px;"  type="file">
                        <?php if($widget->attachment!='') { ?>
                        Remove Attachment? <input  name="remove_attachment"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if($type == 'combined_widget'){ $currentWidgets = explode(',',$widget->widgets);?>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="left_widget">Left Widget<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="left_widget">
                                <option value="">Please Select</option>
                                <?php foreach($combinedWidgets as $combinedWidget): $default = false; if(isset($currentWidgets[0]) && $currentWidgets[0]!='0' && $currentWidgets[0] == $combinedWidget['id']){ $default = true; }?>
                                <option value="<?php echo $combinedWidget['id'];?>" <?php echo set_select('left_widget',$combinedWidget['id'],$default); ?>><?php echo $combinedWidget['name'];?></option>
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
                                <?php foreach($combinedWidgets as $combinedWidget): $default = false; if(isset($currentWidgets[1]) && $currentWidgets[1]!='0' && $currentWidgets[1] == $combinedWidget['id']){ $default = true; } ?>
                                <option value="<?php echo $combinedWidget['id'];?>" <?php echo set_select('right_widget',$combinedWidget['id'],$default); ?>><?php echo $combinedWidget['name'];?></option>
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

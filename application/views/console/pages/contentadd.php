<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Content</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'page-content-add');
                echo form_open_multipart(admin_url_string('pages/contentadd/'.$type.'/'.$page->id),$attributes);
                ?>
                <input type="hidden" name="language" value="<?php echo $this->default_language;?>" />
                <input type="hidden" name="content_type" value="<?php echo $type; ?>" />
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
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('content'); ?>
                        <?php echo $this->ckeditor->editor("content",html_entity_decode(set_value('content'))); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php if(in_array($type,array('image_text','video_text'))){ ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
                <?php if(in_array($type,array('video_text'))){ ?>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="bvideo">Video
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="video" name="video" class="form-control" style="padding:0px;"  type="file">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
                <div class="ln_solid"></div>          
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('pages/contents/'.$page->id); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
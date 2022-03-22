<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php if($slider->language==$language) echo 'Edit Slider'; else echo 'Slider - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($slider->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('sliders/translates/'.$slider->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open_multipart(admin_url_string('sliders/edit/'.$slider->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $slider->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo $slider->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Subtitle <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('subtitle'); ?>
                        <input type="text" id="subtitle"  name="subtitle"  value="<?php echo $slider->subtitle; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Description <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('summary'); ?>
                        <?php echo $this->ckeditor->editor("summary",html_entity_decode($slider->summary)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="link_url">Link Url <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('link_url'); ?>
                        <input type="text" id="link_url"  name="link_url"  value="<?php echo $slider->link_url; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="link_title">Link Title <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('link_title'); ?>
                        <input type="text" id="link_title"  name="link_title"  value="<?php echo $slider->link_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="lang_label">(All Languages)</span>
                     <?php if($slider->image!='') { echo '<img src="'.base_url('public/uploads/sliders/images/'.$slider->image).'" width="50px" />'; } ?>
                   <br/><small>Formats supported: jpg, jpeg, png</small></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('image'); ?>
                        <input id="image" name="image" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Image? <input  name="remove_image"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>

                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="video">Video <span class="lang_label">(All Languages)</span>
                     <?php if($slider->video!='') { echo $slider->video; } ?>
                   <br/><small>Formats supported: mp4</small></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('video'); ?>
                        <input id="video" name="video" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Video? <input  name="remove_video"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(All Languages)</span><span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($slider->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($slider->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($slider->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($slider->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('sliders/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

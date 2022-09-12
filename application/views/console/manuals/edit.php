<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php if($manual->language==$language) echo 'Edit Manual'; else echo 'Manual - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($manual->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('manuals/translates/'.$manual->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open_multipart(admin_url_string('manuals/edit/'.$manual->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $manual->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" name="title" required="required" value="<?php echo (set_value('title')!='')?set_value('title'):$manual->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="version">Version<span class="lang_label">(All Languages)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('version'); ?>
                        <input type="text" id="version" required name="version" value="<?php echo (set_value('version')!='')?set_value('version'):$manual->version; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="cover_header">Cover Header<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                   <?php if($manual->cover_header!='') { $coverHeader = base_url('public/uploads/manuals/cover/'.$manual->cover_header); ?>
                    <a class="image-preview" href="<?php echo $coverHeader; ?>"><img src="<?php  echo $coverHeader; ?>" width="50px" /></a>
                    <?php } ?>
                   <br/><small>Formats supported: jpg, jpeg, png</small></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('cover_header'); ?>
                       <input id="cover_header" name="cover_header" class="form-control" style="padding:0px;"  type="file">
                       <?php if($manual->cover_header!='') { ?>
                       Remove Cover Header? <input  name="remove_cover_header"   type="checkbox" value="1">
                       <?php } ?>
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="cover_title">Cover Title<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                   <?php if($manual->cover_title!='') { $coverHeader = base_url('public/uploads/manuals/cover/'.$manual->cover_title); ?>
                    <a class="image-preview" href="<?php echo $coverHeader; ?>"><img src="<?php  echo $coverHeader; ?>" width="50px" /></a>
                   <?php } ?>
                   <br/><small>Formats supported: jpg, jpeg, png</small></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('cover_title'); ?>
                       <input id="cover_title" name="cover_title" class="form-control" style="padding:0px;"  type="file">
                       <?php if($manual->cover_title!='') { ?>
                       Remove Cover Title? <input  name="remove_cover_title"   type="checkbox" value="1">
                       <?php } ?>
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="cover_footer">Cover Footer<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                   <?php if($manual->cover_footer!='') { $coverHeader = base_url('public/uploads/manuals/cover/'.$manual->cover_footer); ?>
                    <a class="image-preview" href="<?php echo $coverHeader; ?>"><img src="<?php  echo $coverHeader; ?>" width="50px" /></a>
                    <?php } ?>
                   <br/><small>Formats supported: jpg, jpeg, png</small></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('cover_footer'); ?>
                       <input id="cover_footer" name="cover_footer" class="form-control" style="padding:0px;"  type="file">
                       <?php if($manual->cover_footer!='') { ?>
                       Remove Cover Footer? <input  name="remove_cover_footer"   type="checkbox" value="1">
                       <?php } ?>
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="header_title">Page Header Title<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('header_title'); ?>
                        <input type="text" id="header_title" name="header_title" value="<?php echo (set_value('header_title')!='')?set_value('header_title'):$manual->header_title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="header_subtitle">Page Header Subtitle<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('header_subtitle'); ?>
                        <input type="text" id="header_subtitle" name="header_subtitle" value="<?php echo (set_value('header_subtitle')!='')?set_value('header_subtitle'):$manual->header_subtitle; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($manual->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($manual->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($manual->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($manual->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('manuals/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      $(document).ready(function() {
          $("a[class=image-preview]").fancybox();
      });
  </script>

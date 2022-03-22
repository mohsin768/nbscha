<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php if($team->language==$language) echo 'Edit Board Member'; else echo 'Board Member - Add '.$this->languages_pair[$language].' Translate';?></h2>
                <?php if($team->language!=$language){?>
                  <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <span><a class="btn btn-primary btn-sm" href="<?php echo admin_url('teams/translates/'.$team->id); ?>" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> &nbsp;Back</a></span>
                      </li>
                  </ul>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open_multipart(admin_url_string('teams/edit/'.$team->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $team->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Name <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo $team->name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
      

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Position <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('position'); ?>
                        <input type="text" id="position"  name="position"  value="<?php echo $team->position; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Phone <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('phone'); ?>
                        <input type="text" id="phone"  name="phone"  value="<?php echo $team->phone; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Email <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('email'); ?>
                        <input type="text" id="email"  name="email"  value="<?php echo $team->email; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Facebook <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('facebook'); ?>
                        <input type="text" id="facebook"  name="facebook"  value="<?php echo $team->facebook; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Twitter <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('twitter'); ?>
                        <input type="text" id="twitter"  name="twitter"  value="<?php echo $team->twitter; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Linked In <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('linkedin'); ?>
                        <input type="text" id="linkedin"  name="linkedin"  value="<?php echo $team->linkedin; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Skype <span class="lang_label">(All Languages)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('skype'); ?>
                        <input type="text" id="skype"  name="skype"  value="<?php echo $team->skype; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Bio <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('bio'); ?>
                        <?php echo $this->ckeditor->editor("bio",html_entity_decode($team->bio)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Photo <span class="lang_label">(All Languages)</span>
                     <?php if($team->photo!='') { echo '<img src="'.base_url('public/uploads/teams/'.$team->photo).'" width="50px" />'; } ?></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('image'); ?>
                        <input id="image" name="image" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Photo? <input  name="remove_image"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(All Languages)</span><span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($team->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($team->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($team->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($team->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('teams/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

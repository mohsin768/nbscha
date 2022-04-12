<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Certificate Template</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'template-edit');
                echo form_open_multipart(admin_url_string('certificatetemplates/edit/'.$template->id.'/'.$language.'/'.$translate),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $template->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language;?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title<span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('title'); ?>
                        <input type="text" id="title" required name="title"  value="<?php echo $template->title; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Template Key <span class="lang_label">(All Languages)</span><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('c_key'); ?>
                        <input type="text" id="c_key" required name="c_key"  value="<?php echo $template->c_key; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Template <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('template'); ?>
                        <?php echo $this->ckeditor->editor("template",html_entity_decode($template->template)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Wallet Template <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('wallet_template'); ?>
                        <?php echo $this->ckeditor->editor("wallet_template",html_entity_decode($template->wallet_template)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Signature <span class="lang_label">(All Languages)</span>
                     <?php if($template->signature!='') { echo '<img src="'.base_url('public/uploads/certificates/'.$template->signature).'" width="50px" />'; } ?></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('signature'); ?>
                        <input id="signature" name="signature" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Signature? <input  name="remove_signature"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Signatory <span class="lang_label">(<?php echo $this->languages_pair[$language];?>)</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('signatory'); ?>
                        <input type="text" id="signatory"  name="signatory"  value="<?php echo $template->signatory; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="lang_label">(All Languages)</span>
                     <?php if($template->image!='') { echo '<img src="'.base_url('public/uploads/certificates/'.$template->image).'" width="50px" />'; } ?></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('image'); ?>
                        <input id="image" name="image" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Image? <input  name="remove_image"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>

                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Background <span class="lang_label">(All Languages)</span>
                     <?php if($template->background!='') { echo '<img src="'.base_url('public/uploads/certificates/'.$template->background).'" width="50px" />'; } ?></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('background'); ?>
                        <input id="background" name="background" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Background? <input  name="remove_background"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>

                <div class="form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Wallet Background <span class="lang_label">(All Languages)</span>
                     <?php if($template->wallet_bg!='') { echo '<img src="'.base_url('public/uploads/certificates/'.$template->wallet_bg).'" width="50px" />'; } ?></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('wallet_bg'); ?>
                        <input id="wallet_bg" name="wallet_bg" class=" col-md-7 col-xs-12" style="padding:0px;"  type="file">
                             Remove Wallet Background? <input  name="remove_wallet_bg"   type="checkbox" value="1">
                   </div>
                   <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="lang_label">(All Languages)</span><span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if($template->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($template->status=='1') { echo 'checked="checked"'; } ?> /> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-default <?php if($template->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio" required="required" name="status" value="0" <?php if($template->status=='0') { echo 'checked="checked"'; } ?> /> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('certificatetemplates/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

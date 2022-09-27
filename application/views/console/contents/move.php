<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $manual->title; ?> - Version:<?php echo $manual->version; ?>  <br/> Section: <?php echo $section->title; ?> - Change Section of Content</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'location-add');
                echo form_open_multipart(admin_url_string('contents/move/'.$manual->id.'/'.$section->id.'/'.$content->id.'/'.$language),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $content->id; ?>" />
                <input type="hidden" name="language" value="<?php echo $language; ?>" />

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Title
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo $content->title; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="section">Section</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('section'); ?>
                        <select id="section" name="section" class="form-control">
                            <option value=""> -- Please Select --</option>
                            <?php foreach($sections as $sectionRow): $default = false; if($content->section == $sectionRow['id']){ $default = true; } ?>
                                <option value="<?php echo $sectionRow['id']; ?>" <?php echo set_select('section',$sectionRow['id'],$default); ?>><?php echo $sectionRow['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>   

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('contents/overview/'.$manual->id.'/'.$section->id.'/'.$language); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

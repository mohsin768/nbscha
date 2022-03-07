<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Batch</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'batch-edit');
                echo form_open_multipart(admin_url_string('batches/edit/'.$batch->id),$attributes);?>
                <input type="hidden" name="id" value="<?php echo $batch->id; ?>" />
                 
                   <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('name'); ?>
                        <input type="text" id="name" name="name" required="required" value="<?php echo $batch->name; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
        
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="instrument_id">Instrument<span class="required">*</span>
                    </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('instrument_id'); ?>
                         <select class="form-control" name="instrument_id">
                            <?php foreach($instruments as $iid => $name):?>
                            <option value="<?php echo $iid;?>" <?php if($batch->instrument_id==$iid) echo 'selected="selected"';?>><?php echo $name;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
               
                 
              <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="short_description">Short description
                    <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('short_description'); ?>
                        <textarea id="short_description" name="short_description" value="<?php echo $batch->short_description; ?>" class="form-control"></textarea> 
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <?php echo form_error('description'); ?>
                        <?php echo $this->ckeditor->editor("description",html_entity_decode($batch->description)); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="start_date">Start Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('start_date'); ?>
                        <input type="date-picker" id="start_date" name="start_date" value="<?php echo $batch->start_date; ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="end_date">End Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('end_date'); ?>
                        <input type="date-picker" id="end_date" name="end_date" value="<?php echo $batch->end_date; ?>" class="date-picker form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                 <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="seats">Seat
                    <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('seats'); ?>
                        <input type="number" id="seats" name="seats" value="<?php echo $batch->seats; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
                 <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="amount">Amount
                    <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('amount'); ?>
                        <input type="number" step="0.01" id="amount" name="amount" value="<?php echo $batch->amount; ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>
               
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">
                        Image<br/> <?php if($batch->image!='') { echo $batch->image; } ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="image" name="image" class="form-control" style="padding:0px;"  type="file">
                        <?php if($batch->image!='') { ?>
                        Remove image? <input  name="remove_image"   type="checkbox" value="1">
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
              
            <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('status'); ?>
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if($batch->status=='1') { echo 'active'; } ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                <input type="radio"  required="required" name="status" value="1" <?php if($batch->status=='1') { echo 'checked="checked"'; } ?>> &nbsp; Enabled &nbsp;
                            </label>
                            <label class="btn btn-secondary <?php if($batch->status=='0') { echo 'active'; } ?>" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-primary">
                                <input type="radio"  required="required" name="status" value="0" <?php if($batch->status=='0') { echo 'checked="checked"'; } ?>> Disabled
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('batches/overview'); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

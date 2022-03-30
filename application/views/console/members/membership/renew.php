<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Renew Membership</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'membership-renew');
                echo form_open(admin_url_string('members/renew/'.$membership->member_id),$attributes);
                ?>
                <div class="form-group">   
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="label">Number of beds<span>*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo form_error('package_id'); ?>
                    <select id="package_id" name="package_id" class="form-control">
                        <option value=""> -- Select -- </option>
                        <?php foreach($packages as $package): ?>
                            <option <?php echo set_select('package_id',$package['pid']); ?> value="<?php echo $package['pid']; ?>" ><?php echo $package['title'].' ($'.$package['price'].')'; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Payment Method<span>*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('payment_method'); ?>
                        <div class="radios">
                            <input type="radio" id="etransfer" name="payment_method" <?php echo set_radio("payment_method", "eTransfer"); ?> value="eTransfer">
                            <label for="etransfer">E-Transfer</label><br>
                            <input type="radio" id="check" name="payment_method" <?php echo set_radio("payment_method", "Cheque"); ?> value="Cheque">
                            <label for="check">Cheque</label><br>
                            <input type="radio" id="cash" name="payment_method" <?php echo set_radio("payment_method", "Cash"); ?> value="Cash">
                            <label for="cash">Cash</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_info">Payment Info
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('payment_info'); ?>
                        <input type="text" id="payment_info" name="payment_info" value="<?php echo set_value('payment_info'); ?>" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="comments">Comments
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_error('comments'); ?>
                        <textarea id="comments" name="comments" class="form-control"><?php echo set_value('comments'); ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary" href="<?php echo admin_url('members/membership/'.$membership->member_id); ?>">Cancel</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

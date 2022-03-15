<div class="login-form">
<h4>Reset Password</h4>
<?php echo form_open(member_url_string('login/resetpwd/'.$id.'/'.$key)); ?>
  <div>
    <span class="validation_error"><?php echo form_error('pass'); ?></span>
    <!--<label class="left" for="passconf">New Password</label>-->
    <input type="password" name="pass" class="form-control" placeholder="New Password" />
  </div>
  <div>
    <span class="validation_error"><?php echo form_error('passconf'); ?></span>
    <!--<label class="left" for="passconf">Confirm Password</label>-->
    <input type="password" class="form-control" placeholder="Confirm Password" name="passconf" />
  </div>
  <div>
    <input type="submit" class="btn btn-primary submit" name="Reset" value="Reset" />
    <a class="reset_pass" href="<?php echo member_url('login'); ?>">Back to Login</a>
  </div>

  <div class="clearfix"></div>
<?php echo form_close(); ?>
</div>
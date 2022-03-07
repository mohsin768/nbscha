<?php if($this->session->flashdata('message')){ ?>
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="alert alert-dismissible <?php echo $this->session->flashdata('message')['status']; ?>" role="alert">
      <?php echo $this->session->flashdata('message')['message']; ?>
  </div>
  </div>
<?php } ?>
<div class="login-form">
<h4>Forgot Password</h4>
<?php echo form_open(admin_url_string('login/forgot')); ?>
  <div>
    <span class="validation_error"><?php echo form_error('username'); ?></span>
    <input type="text" name="username" class="form-control" placeholder="Username or Email Address" />
  </div>
  <div>
    <input type="submit" class="btn btn-primary submit" name="Reset" value="Reset" />
    <a class="reset_pass" href="<?php echo admin_url('login'); ?>">Back to Login</a>
  </div>
  <div class="clearfix"></div>
<?php echo form_close(); ?>
</div>
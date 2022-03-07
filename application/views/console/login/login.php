<div class="login-form">
<h4>Log in to Console</h4>
<?php echo form_open(admin_url_string('login')); ?>
	<div class="form-item">
		<span class="validation_error"><?php echo form_error('username'); ?></span>
		<label class="left" for="username">Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" />
	</div>
	<div class="form-item">
		<span class="validation_error"><?php echo form_error('password'); ?></span>
		<label class="left" for="password">Password</label>
		<input type="password" class="form-control" placeholder="Password" name="password" />
	</div>
	<div class="actions">
		<input type="submit" class="btn btn-primary submit" name="Login" value="Login" />
		<a class="reset_pass" href="<?php echo admin_url('login/forgot'); ?>">Lost your password?</a>
		<div class="clearfix"></div>
	</div>

  <div class="clearfix"></div>
<?php echo form_close(); ?>
</div>

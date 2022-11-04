<div class="login-form">
<h4><?php echo translate('LOGIN_MEMBER','Log in to Member Portal','member');?></h4>
<?php echo form_open(member_url_string('login')); ?>
	<div class="form-item">
		<span class="validation_error"><?php echo form_error('username'); ?></span>
		<label class="left" for="username"><?php echo translate('USERNAME','Username','member');?></label>
		<input type="text" name="username" class="form-control" placeholder="<?php echo translate('USERNAME','Username','member');?>" />
	</div>
	<div class="form-item">
		<span class="validation_error"><?php echo form_error('password'); ?></span>
		<label class="left" for="password"><?php echo translate('PASSWORD','Password','member');?></label>
		<input type="password" class="form-control" placeholder="<?php echo translate('PASSWORD','Password','member');?>" name="password" />
	</div>
	<div class="actions">
		<input type="submit" class="btn btn-primary submit" name="Login" value="<?php echo translate('LOGIN','Login','member');?>" />
		<a class="reset_pass" href="<?php echo member_url('login/forgot'); ?>"><?php echo translate('LOST_PASSWORD','Lost your password?','member');?></a>
		<div class="clearfix"></div>
	</div>

  <div class="clearfix"></div>
<?php echo form_close(); ?>
</div>

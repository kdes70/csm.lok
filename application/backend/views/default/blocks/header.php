
<div id="wrepper">
<header id="header" class="">
<div id="logo_block">
	logotip
</div>
<div id="auth_block">
	
	
	<?php if($this->session->userdata('loggedin') == TRUE): ?>
		<p>
			<?php echo anchor('user/logout', '<i class="fa fa-sign-out"></i>logaut', ''); ?>
		</p>
		<p>
		
		<?php echo anchor('user/profiles/'.$this->session->userdata('id_user'), '<i class="fa fa-newspaper-o"></i>Profiles', 'attributs'); ?>
	</p>
	<?php else: ?>
		<p>
			<?php echo anchor('page/show/login', '<i class="fa fa-sign-out"></i>log in', ''); ?>
		</p>

		<p>
		<?php echo anchor('page/show/registration', '<i class="fa fa-newspaper-o"></i>registration', 'attributs'); ?>
		</p>
	<?php endif; ?>
	<?php if($this->session->userdata('is_admin') == TRUE): ?>
	<p>
		
		<?php echo anchor('admin/dashboard', '<i class="fa fa-newspaper-o"></i>admin', 'attributs'); ?>
	</p>
<?php endif; ?>
</div>
	
</header><!-- /header -->
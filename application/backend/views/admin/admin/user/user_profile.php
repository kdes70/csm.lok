
<div id="wrepper">
<header id="header" class="">
<div id="logo_block">
	logotip
	<h1>Admin-panel</h1>
</div>
<div id="auth_block">
	<p>	
		<?php echo anchor('admin/user/logout', '<i class="fa fa-sign-out"></i> Logout'); ?>
	</p>
	<p>	
		<?php echo anchor('admin/user/profiles', '<i class="fa fa-newspaper-o"></i>Profiles', 'attributs'); ?>
	</p>
	<p>	
		<?php echo anchor('/', '<i class="fa fa-newspaper-o"></i> Site'); ?>
	</p>
</div>
	
</header><!-- /header -->
<nav id="top_menu">
		<ul>
			<li><?php echo anchor('admin/user', 'Users'); ?></li>
			<li><?php echo anchor('admin/page', 'Page'); ?></li>
			<li><a href="">пункт3</a></li>
			<li><a href="">пункт4</a></li>
			<li><a href="">пункт5</a></li>
		</ul>
	</nav>
<section id="content" class="">
<div>
	<?php echo anchor('admin/user/', 'All list'); ?>
</div>
<h1>Список пользователей</h1>

<div id="user_profil_block">
	
<div>
	
	<img src="setup/user/avatar/avatar.jpg" alt="">
</div>
	<h3><?php echo $user_profile->name ?> <?php echo $user_profile->surname ?> <?php echo $user_profile->patronymic ?></h3>

	<?php foreach($user_profile as $key => $item): ?>
	
	<p><?php echo $key;  ?> -- <?php echo $item; ?></p>
	<?php endforeach; ?>
</div>

	
</section><!-- /content -->
	

</div>
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


	
</section><!-- /content -->
	

</div>
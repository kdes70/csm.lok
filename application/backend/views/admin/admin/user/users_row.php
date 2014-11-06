
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

<h1>Список пользователей</h1>

<div class="table_block">
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>name</th>
				<th>email</th>
				<th>group</th>
				<th>--</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($users)): foreach($users as $user): ?>
				<tr>
					<td><?php echo $user->id_user; ?></td>
					<td><?php echo anchor('admin/user/profile/'.$user->id_user, $user->name); ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->id_groups; ?></td>
					<td><?php echo anchor('admin/user/edit/'.$user->id_user, 'edit'); ?></td>
				</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

</div>

	
</section><!-- /content -->
	

</div>
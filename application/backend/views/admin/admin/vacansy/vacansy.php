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
			<li><?php echo anchor('admin/vacansy', 'Вакансии'); ?></li>
			<li><a href="">пункт4</a></li>
			<li><a href="">пункт5</a></li>
		</ul>
	</nav>
<section id="content" class="">

<div id="main">

	<div> <?php echo anchor('admin/vacansy/add_vacansy', 'Подать зоявку на вокансию');?>  </div>
       
      <div class="table_block">
      	<table>
      		<thead>
      			<tr>
      				<th>ID</th>
      				<th>name</th>
      				<th>author</th>
      				<th>locals</th>
      				<th>puplic</th>
      				<th>--</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php if(count($vacansy)): foreach($vacansy as $item): ?>
      				<tr>
      					<td><?php echo $item->id_vac; ?></td>
      					<td><?php echo anchor('admin/vacansy/read/'.$item->id_vac, $item->title); ?></td>
      					<td><?php echo $item->fio; ?></td>
      					<td><?php echo $item->local; ?></td>
      					<td><?php echo $item->public; ?></td>
      					<td><?php echo anchor('admin/vacansy/edit/'.$item->id_vac, 'edit'); ?></td>
      				</tr>
      			<?php endforeach; ?>
      			<?php endif; ?>
      		</tbody>
      	</table>

      </div>  

</div>
	
</section><!-- /content -->
	
 <div class="clear"></div>
           	
</div>
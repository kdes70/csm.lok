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

	<div> <?php echo anchor('admin/vacansy', 'Назад');?>  </div>
       
     <h3><?php echo $vacansy_read->title; ?></h3> 
     <?php foreach($vacansy_read as $key => $item): ?>
            <p><?php echo $key; ?> :  <?php echo $item; ?> </p>
     <?php endforeach; ?>
            
</div>
	
</section><!-- /content -->
	
 <div class="clear"></div>
           	
</div>
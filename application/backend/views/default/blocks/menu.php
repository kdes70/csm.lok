
<nav id="top_menu">
	<ul>
		<li><?php echo anchor('page/show/main', 'Главная');?></li>
	<?php if($this->session->userdata('loggedin') == TRUE): ?>
		<li><?php echo anchor('page/show/tests', 'Тесты');?></li>
	<?php else: ?>
		<li><a href="">пункт2</a></li>
	<?php endif; ?>
		<li><?php echo anchor('page/show/vacansy', 'Вакансии'); ?></li>
		<li><a href="">пункт4</a></li>
		<li><a href="">пункт5</a></li>
	</ul>
</nav>
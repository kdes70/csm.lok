<section id="content" class="">

    <h3>Страница <?php echo $page_info->title; ?></h3>
  
    <article>
    <?php if($this->session->userdata('loggedin') === TRUE): ?>
     <?php echo $page_info->text; ?>

	<?php if($subview): ?>
		<?php echo $subview; ?>
	<?php endif; ?>

	<?php else: ?>
		<h3 style="color: red">Доступ закрыт!</h3>
		<small>Страница в разработке</small>
	<?php endif; ?>

    </article>
 

</section><!-- /content -->
<section id="content" class="">
	<div>
		<?php foreach($pages as $item): ?>
			<p><a href="<?php echo base_url('admin/pages/read/'.$item->url); ?>" title=""><?php echo $item->title. ' - status: '. $item->status; ?> </a></p>
		<?php endforeach; ?>
	</div>
</section>
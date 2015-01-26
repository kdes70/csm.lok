<section id="content" class="">

    <h3>Страница <?php echo $page_info->title; ?></h3>
  
    <article>
   
     <?php echo $page_info->text; ?>

    </article>
    <hr>
    <?php if($post): ?>

    <?php foreach($post as $item): ?>
   <div id="info_post">
    <div class="post_rows">
    	<!-- <div class="post_img">
    		<img src="" alt="">
    	</div> -->
        <h4><?php echo $item->title; ?></h4>
        <small><?php echo rus_date("j F - H:i", strtotime($item->modified)); ?></small>
    	<div class="post_content">
    		<?php echo $item->text; ?>
    	</div>

 	</div>
   </div>
    <?php endforeach; ?>
<?php endif; ?>
 
<div class="clear"></div>
</section><!-- /content -->
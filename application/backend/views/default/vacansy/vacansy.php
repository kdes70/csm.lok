<div id="main">
	cection <?php echo $page_info->text; ?>




	  <div class="auth_form_block">
	
	<div>

          <?php foreach($vac as $item): ?>
          	<div class="vacansy_row">
  		 	<h3 class="message"><?php echo $item->title; ?></h3>

           	<small><?php echo $item->created; ?></small>

          	<p>Образование: <?php echo $item->education; ?></p>	<br>
          	<p>Условия работы: <?php echo $item->special_requirement; ?></p>
          	</div>
          <?php endforeach; ?>

          



           
          
       
           

	</div>
</div>
</div>
	

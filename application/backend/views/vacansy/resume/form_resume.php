
<section id="content" class="">

        <?php if($view_form): ?>
    
                <?php  echo $this->load->view($view_form); ?>
        <?php else: ?>
                <p class="ajax_loader"><img src="<?php echo base_url('images/ajax-loader.gif'); ?>" alt=""></p>
        <?php endif; ?>
     
</section>
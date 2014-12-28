
<section id="content" class="">
<!-- Modal -->
    <div id="modal_form"><!-- Само окно --> 
      <span id="modal_close">X</span> <!-- Кнопка закрыть --> 
      <!-- Тут любое содержимое -->
         <div class="modal-body">
        <?php if($form_view): ?>
                <?php  echo $this->load->view($form_view); ?>
        <?php else: ?>
                <p class="ajax_loader"><img src="<?php echo base_url('images/ajax-loader.gif'); ?>" alt=""></p>
        <?php endif; ?>
           
          </div>
    </div>
<div id="overlay"></div><!-- Подложка -->
 <!-- /.modal -->
</section>
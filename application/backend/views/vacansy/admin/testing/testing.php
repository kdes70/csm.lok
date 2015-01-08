
<section id="content" class="">
<div class="card_option">
    <ul>
       <!--  <li><?php echo anchor('admin/resume/public_set/'.$vacansy->id_vac, 'В архив'); ?></li> -->
       <!--  <li><?php echo anchor('admin/vacansy/edit/'.$vacansy->id_vac, 'Редактировать'); ?></li>
        <li><?php echo anchor('admin/vacansy/delete/'.$vacansy->id_vac, 'Удалить'); ?></li> -->
    </ul>
<p>
  <a href="<?php echo base_url('admin/testing/add') ?>">
  <img src="<?php echo base_url("images/file_add.png") ?>" width="32px" alt="Добавить вакансию"> Создать тест
</a>
</p>
</div>

    <h3 class="title_blue">Система тестирования</h3>
    
    <div id="testing_block">
      <?php if($tests): ?>
        <h3>Выбирете тему тестов</h3>
        <hr>
        <?php echo $tests; ?>
      <?php else: ?>
        <p>Нет опубликованных тестов</p>
      <?php endif; ?>
       <div class="clear"></div>
   
    </div>
   
</section><!-- /content -->
    
  
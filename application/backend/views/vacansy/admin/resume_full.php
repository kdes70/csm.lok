
<section id="content" class="">
<div class="card_option">
    <ul>
       <!--  <li><?php // echo anchor('admin/resume/public_set/'.$vacansy->id_vac, 'В архив'); ?></li> -->
      <!--   <li><?php echo anchor('admin/resume/edit/'.$resume->id, 'Редактировать'); ?></li> -->
        <li><?php echo anchor('admin/resume/archive/'.$resume->id, 'В архив'); ?></li>
    </ul>
</div>

    <h3 class="title_blue">Резюме </h3>
   <div>
      <!--  <h4>Наименование вакансии: <?php// echo $vacansy->title; ?></h4> -->
      <?php if($vacansy): ?>
    <p><a href="<?php echo base_url('admin/vacansy/card_vacansy/'.$vacansy->id_vac); ?>">Заявка на вакансию <b><?php echo $vacansy->title; ?></b></a></p>
      <?php endif; ?>
    <div id="author_block">
        <h4>Контактные данные</h4>
        <p>ФИО: <?php echo $resume->surname .' '. $resume->name .' '. $resume->surname;  ?></p>
        <p>Дата рождения: <?php echo rus_date("j F Y", strtotime($resume->birthday)); ?></p>
        <p>Email: <?php echo mailto($resume->email); ?></p>
        <p>Телефон: <?php echo $resume->phone; ?></p>
      <!--   <p>Город: <?php echo $resume->cityname; ?></p> -->
    </div>
        <div>
        <h4>Образование</h4>
          <p>Название учебного заведения: <?php echo $resume->institution;?></p>
          <p>Период обучения: <?php echo $resume->training_period;?> </p>
          <p>Специальность по диплому: <?php echo $resume->specialty;?> </p>
           <p>Основная специальность: <?php echo $resume->main_specialty;?></p>
          <h4>Дополнительная информация</h4>
          <p>Статус: <?php echo $resume->status;?></p>
         
          <p>Дополнительная специальность: <?php echo $resume->extra_specialty;?></p>
          <p>Дополнительные манипуляции: <?php echo $resume->extra_actions;?></p>
          <h4>Опыт работы</h4>
          <p><?php echo $resume->work_experience;?></p>
        </div>
    
   </div>
</section><!-- /content -->
	
  
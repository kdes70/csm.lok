
<section id="content" class="">
<div class="card_option">
    <ul>
       <!--  <li><?php echo anchor('admin/resume/public_set/'.$vacansy->id_vac, 'В архив'); ?></li> -->
        <li><?php echo anchor('admin/vacansy/edit/'.$vacansy->id_vac, 'Редактировать'); ?></li>
        <li><?php echo anchor('admin/vacansy/delete/'.$vacansy->id_vac, 'Удалить'); ?></li>
    </ul>
</div>

    <h3 class="title_blue">Карточка вакансии</h3>
   <div>
       <h4>Наименование вакансии: <?php echo $vacansy->title; ?></h4>
       <p class="title_blue">Отзывы по вакансии <span>10</span></p>
    <div id="author_block">
        <h4>Контактные данные</h4>
        <p>Автор: <?php echo $vacansy->author; ?></p>
        <p>Email: <?php echo $vacansy->email; ?></p>
        <p>Телефон: <?php echo $vacansy->phone; ?></p>
        <p>Город: <?php echo $vacansy->cityname; ?></p>
    </div>
        <div>
        <h4>Описание вакансии</h4>
          <p><?php echo $vacansy->schedule;?></p>
          <p><?php echo $vacansy->nature_work;?></p>
          <p><?php echo $vacansy->wage_rate;?> .руб</p>
          <p><?php echo $vacansy->additional_terms;?></p>
          <p><?php echo $vacansy->desc_candidate; ?></p>
        <h4>Требования:</h4>
          <p><?php echo $vacansy->education; ?></p>
          <p><?php echo $vacansy->profes_profession; ?></p>
          <p><?php echo $vacansy->special_requirement; ?></p>
          <p><?php echo $vacansy->other_requirements; ?></p>
        <h4>Условия работы:</h4>
          <p><?php echo $vacansy->workplace; ?></p>
          <p><?php echo $vacansy->schedule; ?></p>
          <p><?php echo $vacansy->nature_work; ?></p>
          <p>Структура заработной платы: <?php echo $vacansy->wage_structure; ?></p>
          <p><?php echo $vacansy->additional_terms; ?></p>
        </div>
    
   </div>
</section><!-- /content -->
	
  
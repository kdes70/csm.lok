
<section id="content" class="">

    <h3>Страница <?php echo $page->title; ?></h3>
  <!--   <span style="color: red">На данном этапе страница находится в разработке, приносим извинения за не удобства</span> -->
    <article>

     <?php echo $page->text; ?>
		
    </article>
    <iframe width="640" height="360" frameborder="0" name="tv2video" scrolling="no" style="background-color: #000000" src="http://tv2video.ru/embed/13795"></iframe>

    <div id="vacansy_top_block">
    <h4>Вакансии дня</h4>
    <ul>
        <?php if($vacansy): ?>
            <?php foreach($vacansy as $item): ?>
                <?php  $id_item = $item->id_vac; ?>
            <li class="row_vacansy vacansy_top" id="<?php echo $item->id_vac;?>">
                <a><h3><?php echo $item->title; ?></h3></a>
                <p><?php echo $item->cat ?></p>
                <!-- <p class="price"><?php echo $item->wage_rate;?><br><?php echo $item->wage_structure;?></p> -->
                <p class="date_create">Дата размещения: <?php echo rus_date("j F", strtotime($item->modified)); ?></p>
                <div class="vacansy_info" id="info_block_<?php echo $item->id_vac;?>">
                    <h4>Место работы:</h4>
                        <p><span>Город:</span> <?php echo $item->cityname;?></p>
                        <p><?php if($item->workplace) echo '<span>Место работы:</span> '.$item->workplace; ?></p>
                    <h4>Требования:</h4>
                        <p><?php if($item->education) echo '<span>Уровень образования:</span> '.$item->education; ?></p>
                        <p><?php if($item->profes_profession) echo '<span>Специальность:</span> '. $item->profes_profession; ?></p>
                        <p><?php if($item->desc_candidate) echo '<span>Основные обязанности</span>: <br>'.  $item->desc_candidate; ?></p>
                        <p><?php if($item->special_requirement) echo '<span>Специальные требования:</span> <br>'.$item->special_requirement; ?></p>
                        <p><?php if($item->other_requirements) echo '<span>Другие требования:</span><br>'. $item->other_requirements; ?></p>
                   <h4>Условия работы:</h4>
                        <p><?php if($item->schedule) echo '<span>График работы:</span> '.$item->schedule;?></p>
                        <p><?php if($item->nature_work) echo '<span>Характер работы:</span> '.$item->nature_work;?></p>
                         <p><?php if($item->wage_rate) echo '<span>Размер заработной платы:</span><br>'.$item->wage_rate;?></p>
                        <p> <?php echo '<span>Структура заработной платы:</span> <br>'. $item->wage_structure; ?></p>
                        <p><?php if($item->additional_terms) echo '<span>Дополнительные условия:</span> '. $item->additional_terms;?></p>

 
               <div class="add_resum">
                   <a href="<?php echo base_url('resume/add_resume/'.$item->id_vac) ?>" id="button">
                        <img src="<?php echo base_url('images/mail.png'); ?>" width="24px" alt="Подать заявку на вакансию">Подать заявку на вакансию
                   </a>
               </div>
    
                </div>
            </li>
 
            <?php endforeach; ?>
        <?php else: ?>
            <h3>Вакансий нет</h3>
        <?php  endif; ?>
       <div class="clear"></div>
    </ul>

    </div>
 
      <?php if($category): ?>
 <div id="cat_main_block">
  <h4>Найдено <?php echo $count; ?> вакансии</h4>
     <?php foreach($category as $item):?>

            <p><?php echo anchor('vacansy/cat/'.$item->id, $item->name.'('.$item->count.')'); ?></p>

        <?php endforeach;?>
  </div>
      <?php endif; ?>

</section><!-- /content -->

 <script type="text/javascript">
/*
        $('#ajaxForm').submit(function() {

            var form = $(this); // запишем форму, чтобы потом не было проблем с this

            var data = form.serialize(); // подготавливаем данные

            console.log(data);
            $.ajax({ // инициализируем ajax запрос
               type: 'POST', // отправляем в POST формате, можно GET
               url: 'vacansy/add_resume/', // путь до обработчика, у нас он лежит в той же папке
               dataType: 'json', // ответ ждем в json формате
               data: data, // данные для отправки
               beforeSend: function(data) { // событие до отправки
                   // form.find('input[type="submit"]').attr('disabled', 'disabled'); // например, отключим кнопку, чтобы не жали по 100 раз
                  },
               success: function(data){ // событие после удачного обращения к серверу и получения ответа
                    if (data['error']) { // если обработчик вернул ошибку
                        alert(data['error']); // покажем её текст
                    } else { // если все прошло ок
                        alert('Письмо отвравлено! Чекайте почту! =)'); // пишем что все ок
                    }
                 },
               error: function (xhr, ajaxOptions, thrownError) { // в случае неудачного завершения запроса к серверу
                    alert(xhr.status); // покажем ответ сервера
                    alert(thrownError); // и текст ошибки
                 },
               complete: function(data) { // событие после любого исхода
                  //  form.find('input[type="submit"]').prop('disabled', false); // в любом случае включим кнопку обратно
                 }
                          
                 });
        });
 */
   </script>
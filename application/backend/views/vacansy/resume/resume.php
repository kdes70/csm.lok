
<section id="content" class="">

    <h3>Страница <?php echo $page->title; ?></h3>

    <?php echo form_open(); ?>
        <div id="reg_form_error" class="alert alert-error"><!-- dinamik-->
        <?php echo validation_errors(); ?>
        </div>

    <?php if($vac_list): ?>
        <?php foreach($vac_list as $item): ?>
        <?php 
            $list[0] = 'Вакансия не выбрана';
            $list[$item->id_vac] = $item->title; 
        ?>
    <?php endforeach; ?>
        <p>
        <label for="id_vac">Выбирите вакансию<span class="red">*</span></label><br>
        <?php echo form_dropdown('id_vac', $list, set_value('id_vac'), ' id="id_vac"'); ?> 
        </p>
    <?php endif; ?>

    <p>
        <label>Контактное лицо(ФИО)<span class="red">*</span></label><br>
        <?php echo form_input('surname', set_value('surname'), 'placeholder="Фамилия" id="surname" maxlength="100"'); ?>
        <?php echo form_input('name', set_value('name'), 'placeholder="Имя" id="name" maxlength="100"'); ?>
        <?php echo form_input('patronymic', set_value('patronymic'), 'placeholder="Отчество" id="patronymic" maxlength="100"'); ?>
    </p>

    <p><!-- Дата рождения -->
        <label>Дата рождения<span class="red">*</span></label><br>
        <!-- День -->
        <?php for ($i=1; $i <= 31; $i++) { $dey[str_pad($i, 2, '0', STR_PAD_LEFT)] = str_pad($i, 2, '0', STR_PAD_LEFT);} ?>
        <?php echo form_dropdown('sel_date', $dey, set_value('sel_date'), ' id="sel_date"'); ?> 
        <!-- Месяц -->
        <?php $month = array(
                        '01' => 'Январь',
                        '02' => 'Февраль',
                        '03' => 'Март',
                        '04' => 'Апрель',
                        '05' => 'Май',
                        '06' => 'Июнь',
                        '07' => 'Июль',
                        '08' => 'Август',
                        '09' => 'Сентябрь',
                        '10' => 'Октябрь',
                        '11' => 'Ноябрь',
                        '12' => 'Декабрь'
                        ); 
        ?>
        <?php echo form_dropdown('sel_month', $month, set_value('sel_month'), ' id="sel_month"'); ?> 
        <!-- Год -->
        <?php for ($i=1920; $i <= 2010; $i++) { $year[$i] = $i;} ?>
        <?php echo form_dropdown('sel_year', $year, set_value('sel_year'), ' id="sel_year"'); ?> 
    </p><!-- Дата рождения -->
     <p>
        <label for="email">Email<span class="red">*</span><br>
        <?php echo form_input('email', set_value('email'), 'id="email" maxlength="100"'); ?>
        </label>
  
        <label for="phone">Телефон<span class="red">*</span><br>
        <?php echo form_input('phone', set_value('phone'), 'placeholder="8 999 999 9999" id="phone" maxlength="100"'); ?>
        </label>
    </p>
        <h3>Учебное заведение:</h3>
        <p>
            <label for="institution">Название<span class="red">*</span><br>
                <?php echo form_input('institution', set_value('institution'), 'id="institution"'); ?>
            </label>
       
            <label>Период обучения<span class="red">*</span><br>
             <?php echo form_input('to', set_value('to'), 'placeholder="2005" id="to" style="width:60px" maxlength="4"'); ?>
            -
             <?php echo form_input('up', set_value('up'), 'placeholder="2010" id="up" style="width:60px" maxlength="4"'); ?>
             </label>
        </p>
        <p>
            <label for="specialty">Специальность по диплому<span class="red">*</span><br>
                <?php echo form_input('specialty', set_value('specialty'), 'id="specialty" '); ?>
            </label>
        </p>
<div class="hiiden">
        <p>
        <label for="status">Статус<span class="red">*</span></label><br>
            <?php $status = array(
						'врач практикующий'                     =>'врач практикующий',
						'врач интерн'                           =>'врач интерн',
						'врач ординатор'                        =>'врач ординатор',
						'фармацевт с опытом работы до 1 года'   =>'фармацевт с опытом работы до 1 года',
						'фармацевт с опытом работыболее 1 года' =>'фармацевт с опытом работыболее 1 года',
						'студент мед. ВУЗа'                     =>'студент мед. ВУЗа',
						'медсестра практикующая'                =>'медсестра практикующая',
						'фельдшер практикующий'                 =>'фельдшер практикующий',
						'студент мед. Колледжа'                 =>'студент мед. Колледжа'
                            
                            ); 
            ?>
        <?php echo form_dropdown('status', $status, set_value('status'), ' id="status"'); ?>
        </p>
        <p> 
<?php  $specialty = array(
        'Акушерство-гинекология'                              =>'Акушерство-гинекология',
			'Аллергология и иммунология'                          =>'Аллергология и иммунология',
			'Анестезиология и реаниматология'                     =>'Анестезиология и реаниматология',
			'Восстановительная медицина'                          =>'Восстановительная медицина',
			'Гастроэнтерология'                                   =>'Гастроэнтерология',
			'Гематология'                                         =>'Гематология',
			'Генетика'                                            =>'Генетика',
			'Гепатология'                                         =>'Гепатология',
			'Гериатрия'                                           =>'Гериатрия',
			'Дерматовенералогия'                                  =>'Дерматовенералогия',
			'Детская хирургия'                                    =>'Детская хирургия',
			'Диетология'                                          =>'Диетология',
			'Инфекционные болезни'                                =>'Инфекционные болезни',
			'Кардиология'                                         =>'Кардиология',
			'Клиническая лабораторная диагностика'                =>'Клиническая лабораторная диагностика',
			'Клиническая фармакология'                            =>'Клиническая фармакология',
			'Колопрокталогия'                                     =>'Колопрокталогия',
			'Лечебная физкультура и спортивная медицина'          =>'Лечебная физкультура и спортивная медицина',
			'Мануальная терапия'                                  =>'Мануальная терапия',
			'Неврология'                                          =>'Неврология',
			'Нейрохирургия'                                       =>'Нейрохирургия',
			'Неонатология'                                        =>'Неонатология',
			'Нефрология'                                          =>'Нефрология',
			'Общая врачебная практика'                            =>'Общая врачебная практик',
			'Общая гигиена'                                       =>'Общая гигиена',
			'Онкология'                                           =>'Онкология',
			'Организация здравоохранения и общественное здоровье' =>'Организация здравоохранения и общественное здоровье',
			'Ортодонтия'                                          =>'Ортодонтия',
			'Оториноларингология'                                 =>'Оториноларингология',
			'Офтольмалогия'                                       =>'Офтольмалогия',
			'Патологическая анатомия'                             =>'Патологическая анатомия',
			'Педиатрия'                                           =>'Педиатрия',
			'Пластическая хирургия'                               =>'Пластическая хирургия',
			'Психиатрия'                                          =>'Психиатрия',
			'Пульмонология'                                       =>'Пульмонология',
			'Радиология'                                          =>'Радиология',
			'Ревматология'                                        =>'Ревматология',
			'Рентгенология'                                       =>'Рентгенология',
			'Рентгенэндоваскулярные диагностика и лечение'        =>'Рентгенэндоваскулярные диагностика и лечение',
			'Рефлексотерапия'                                     =>'Рефлексотерапия',
			'Сексология'                                          =>'Сексология',
			'Сердечно-сосудистая хирургия'                        =>'Сердечно-сосудистая хирургия',
			'Скорая медицинская помощь'                           =>'Скорая медицинская помощь',
			'Стоматология'                                        =>'Стоматология',
			'Стоматология детская'                                =>'Стоматология детская',
			'Стоматология ортопедическая'                         =>'Стоматология ортопедическая',
			'Стоматология хирургическая'                          =>'Стоматология хирургическая',
			'Судебно-медицинская экспертиза'                      =>'Судебно-медицинская экспертиза',
			'Терапия'                                             =>'Терапия',
			'Торакальная хирургия'                               =>'Торакальная хирургия', 
			'Травматология и ортопедия'                          =>'Травматология и ортопедия', 
			'Ультразвуковая диагностика'                          =>'Ультразвуковая диагностика',
			'Урология'                                            =>'Урология',
			'Физиотерапия'                                       =>'Физиотерапия', 
			'Функциональная диагностика'                         =>'Функциональная диагностика', 
			'Хирургия'                                           =>'Хирургия', 
			'Челюстно-лицевая хирургия'                         =>'Челюстно-лицевая хирургия', 
			'Эндокринология'                                     =>'Эндокринология', 
			'Эндокопия'                                           =>'Эндокопия',
			'Эпидеомиология'                                      =>'Эпидеомиология',
			'Другое'                                              =>'Другое'
         ); ?>
            <label for="main_specialty">Основная медицинская специальность<span class="red">*</span></label><br>
                <?php echo form_dropdown('main_specialty', $specialty, set_value('main_specialty'), ' id="main_specialty"'); ?>
        </p>
        <p>
            <!-- <label for="extra_specialty">Дополнительная специальность<br>
                <?php // echo form_input('extra_specialty', set_value('specialty'), 'id="extra_specialty" maxlength="100"'); ?>
            </label> -->
      
            <label for="extra_actions">Дополнительные манипуляции<br>
                <?php echo form_textarea('extra_actions', set_value('extra_actions'), 'id="extra_actions" '); ?>
            </label>
        </p>
</div>  
         <p>
            <label for="work_experience">Опыт работы:<br>
                <?php echo form_textarea('work_experience', set_value('work_experience'), 'placeholder
="Период/Место/Должность" id="work_experience"'); ?>
            </label>
        </p>
        <p>
            <?php echo form_submit('submit', 'Отправить', 'class="btn btn-primary" id="button"'); ?>
 
        </p>
          
<?php echo form_close(); ?>

</section><!-- /content -->

<script type="text/javascript">
    



     var divHiiden = $('div.hiiden');

        divHiiden.hide();

  $('#id_vac').change(function() {
      var vacansy = $(this).val();
    //  console.log(vacansy);

    $.ajax({
    url: 'get_type/' + vacansy,
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {'vac': vacansy},
     })
     .done(function(res) {
         console.log(res);
        
         if(res == 1)
         {
            divHiiden.show();
         }
         else{
              divHiiden.hide();
         }

     })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
         console.log("complete");
     });
     

    

  });

 

</script>
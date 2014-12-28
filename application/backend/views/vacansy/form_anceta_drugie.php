<h3>Анкета для медицинского персонала</h3>
      <?php echo form_open('resume/add_resume/'.$vacansy->id_vac, 'id="ajaxForm"'); ?>
       <div id="reg_form_error" class="alert alert-error"><!-- dinamik-->
           <?php echo validation_errors(); ?>
    </div>
    <p>
    <label for="fio">Контактное лицо(ФИО)<span class="red">*</span></label><br>
    <?php echo form_input('surname', set_value('surname'), 'placeholder="Фамилия" id="surname" maxlength="100"'); ?>
    <?php echo form_input('name', set_value('name'), 'placeholder="Имя" id="name" maxlength="100"'); ?>
    <?php echo form_input('patronymic', set_value('patronymic'), 'placeholder="Отчество" id="patronymic" maxlength="100"'); ?>
    </p>

    <p><!-- Дата рождения -->
        <label for="age">Дата рождения<span class="red">*</span></label><br>
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
            <label for="institution">Название<span class="red">*</span></label><br>
                <?php echo form_input('institution', set_value('institution'), 'id="institution"'); ?>
           
        </p>
        <p>
            <label>Период обучения</label><br>
            <?php echo form_input('to', set_value('to'), 'placeholder="2005" id="to" style="width:60px"  maxlength="4"'); ?>
            -
             <?php echo form_input('up', set_value('up'), 'placeholder="2010" id="up" style="width:60px"  maxlength="4"'); ?>
          
        </p>
        <p>
            <label for="specialty">Специальность по диплому<span class="red">*</span><br>
                <?php echo form_input('specialty', set_value('specialty'), 'id="specialty" '); ?>
            </label>
        </p>

     
        <p>
            <!-- <label for="extra_specialty">Дополнительная специальность<br>
                <?php // echo form_input('extra_specialty', set_value('specialty'), 'id="extra_specialty" maxlength="100"'); ?>
            </label> -->
      
            <label for="extra_actions">Дополнительные манипуляции<br>
                <?php echo form_textarea('extra_actions', set_value('extra_actions'), 'id="extra_actions"'); ?>
            </label>
        </p>
         <p>
            <label for="work_experience">Опыт работы:<br>
                <?php echo form_textarea('work_experience', set_value('work_experience'), 'placeholder
="Период/Место/Должность" id="work_experience"'); ?>
            </label>
        </p>

        <p>
            <?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
        </p>

  <?php echo form_close(); ?> 

<div id="wrepper">
<header id="header" class="">
<div id="logo_block">
	logotip
	<h1>Admin-panel</h1>
</div>
<div id="auth_block">
	<p>
		
		<?php echo anchor('admin/user/logout', '<i class="fa fa-sign-out"></i> Logout'); ?>
	</p>
	<p>
		
		<?php echo anchor('admin/user/profiles', '<i class="fa fa-newspaper-o"></i>Profiles', 'attributs'); ?>
	</p>
	<p>
		
		<?php echo anchor('/', '<i class="fa fa-newspaper-o"></i> Site'); ?>
	</p>
</div>
	
</header><!-- /header -->
<nav id="top_menu">
		<ul>
			<li><?php echo anchor('admin/user', 'Users'); ?></li>
			<li><?php echo anchor('admin/page', 'Page'); ?></li>
			<li><?php echo anchor('admin/vacansy', 'Вакансии'); ?></li>
			<li><a href="">пункт4</a></li>
			<li><a href="">пункт5</a></li>
		</ul>
	</nav>
<section id="content" class="">

<div id="main">

	  <div class="auth_form_block">
	
	<div>

           <?php echo form_open('admin/vacansy/add_vacansy', 'id="reg_form"'); ?> 

           <div id="reg_form_error" class="alert alert-error"><!-- dinamik-->
               <?php echo '<pre>' . print_r($this->session->userdata, TRUE).'</pre>'; ?>

           <?php echo validation_errors(); ?>

           </div>

           	<h3 class="message">Заявка на поиск сотрудника</h3>

           	

   <fieldset>  <legend>1. Сведения о Заказчике</legend>
				<p>
					<label>Наименование юр. Лица/Подразделение/Отдел</label>

			<?php echo form_hidden('author_id', $this->session->userdata('id_user')); ?>
			<?php echo form_hidden('id_local', $author->id_local); ?>

			<?php if($local): ?>

				<?php foreach($local as $item): 

				$option[0] = 'Выберите локализацию';
              	$option[$item->id_local] = $item->name;

				?>

				<?php endforeach; ?>
			  <?php echo form_dropdown('local', $option, $author->id_local, ' id="local"'); ?> 
			<?php endif; ?>

				</p>
				<hr>
			<div class="form_field">
				 <legend>Контактное лицо по вакансии</legend>

				 <p>
                <label for="name">Имя <br>

                <?php $data_name = array(
                	 'name'        => 'name',
		              'id'          => 'name',
		              'value'       => $author->name,
		              'maxlength'   => '100',
		              'size'        => '20',
		              'disabled' => 'disabled'
            	   
                ); ?>
                <?php echo form_input($data_name); ?>
                </label>
              </p>

              <p>
                <label for="surname"> Фамилия<br>
                <?php $data_surname = array(
                	 'name'        => 'surname',
		              'id'          => 'surname',
		              'value'       => $author->surname,
		              'maxlength'   => '100',
		              'size'        => '20',
		              'disabled' => 'disabled'
            	   
                ); ?>
                <?php echo form_input($data_surname); ?>
                </label>
              </p>
              <p>
                <label for="patronymic">Очество <br>
                <?php $data_patronymic = array(
                	 'name'        => 'patronymic',
		              'id'          => 'patronymic',
		              'value'       => $author->patronymic,
		              'maxlength'   => '100',
		              'size'        => '20',
		               'disabled' => 'disabled'
            	   
                ); ?>
                <?php echo form_input($data_patronymic); ?>
                </label>
              </p>
          </div>
          <br>
      		   <?php if($profession): $option = array();?>
	            <p id="prof_select">
	              <label for="profession">Должность</label><br>
	               
	              <?php foreach ($profession as $name):
	                $option[$name->id] = $name->name;
	              endforeach; ?>
	              <?php echo form_dropdown('profession', $option, $author->profession, 'disabled="disabled" id="profession" class="testclass"'); ?>
	            </p> 
	          <?php endif; ?>
				<p>
		 			<label for="phone">Контактный телефон <br>
		 			<?php echo form_input('phone', $author->phone, 'disabled="disabled" id="phone" maxlength="30"'); ?>
		 			</label>
		 		</p>

          		<p>
           			<label for="email">Email <br>
           			<?php echo form_input('email', $author->email, 'disabled="disabled" id="email" maxlength="30"'); ?>
           			</label>
           		</p>
           
    </fieldset>
<fieldset>
 <legend>2. Описание вакансии</legend>

 <p>
	<label for="title">Наименование вакансии <br>
	<?php echo form_input('title', set_value('title'), 'id="title" maxlength="30"'); ?>
	</label>
</p>
<p>
	 <label for="reason">Причина открытия вакансии <br>
	<select id="reason"  name="reason">
      <option >Выберите причину открытия вакансии</option>
      <option >Введение новой штатной единицы</option>
      <option >Увольнения сотрудника</option>  
      <option >Увольнения сотрудника в течении действия испытательного срока</option>
    </select>
	</label>
</p>
<p>
	<label for="count_candidate">Количество сотрудников которое требуется<br>
		<input type="number" name="count_candidate" id="count_candidate" value="<?php echo set_value('count_candidate'); ?>" placeholder="">
	</label>
</p>

<p>
	<label for="planned_date">Планируемый срок приема сотрудника<br>
	<small>*при срочных вакансиях, требующих размещения в платных источниках, в т.ч. бегущей строке просьба указывать причину открытия срочной вакансии</small><br>
		<input type="datetime" name="planned_date" id="planned_date" value="<?php echo set_value('planned_date'); ?>" placeholder="">
	</label>
</p>

 <p>
	<label for="desc_profession">Основные обязанности <br>
		<?php echo form_textarea('desc_candidate', set_value('desc_candidate')); ?>
	</label>
</p>
	
</fieldset>
	
<fieldset>
	 <legend>3. Требования</legend>

<p>
	<label for="education">Уровень образования/наименования ВУЗа<br>
	<?php echo form_input('education', '', 'id="education" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="profes_profession">Специальность<br>
	<?php echo form_input('profes_profession', '', 'id="profes_profession" maxlength="30"'); ?>
	</label>
</p>

<p>
	<label for="special_requirement">Специальные требования:<br>
	<small>(наличие определенных навыков, умение выполнять определенные манипуляции, сертификаты и т.д.)</small>
		<?php echo form_textarea('special_requirement', set_value('special_requirement')); ?>
	</label>
</p>
<p>
	<label for="other_requirements">Другие требования, на которые хотели бы обратить внимания<br>
	<?php echo form_input('other_requirements', '', 'id="other_requirements" maxlength="30"'); ?>
	</label>
</p>
</fieldset>


<fieldset>
	<legend>4. Условия работы</legend>

<p>
	<label for="workplace">Место работы практика<br>
	<?php echo form_input('workplace', '', 'id="workplace" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="schedule">График работы<br>
	<?php echo form_input('schedule', '', 'id="schedule" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="nature_work">Характер работы<br>
	<?php echo form_input('nature_work', '', 'id="nature_work" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="wage_rate">Размер заработной платы<br>
	<?php echo form_input('wage_rate', '', 'id="wage_rate" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="wage_structure">Структура заработной платы(оклад+бонусы+премиальные)<br>
	<?php echo form_input('wage_structure', '', 'id="wage_structure" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="additional_terms">Дополнительные условия:<br>
	<small>(компенсация, оплата проживания, проезда, переезда и т.д.)</small><br>
		<?php echo form_textarea('additional_terms', set_value('additional_terms')); ?>
	</label>
</p>
</fieldset>
 <div class="clear"></div>
           
        
         

           		<p>
           			<?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
           		</p>
          
       
           

	</div>
</div>
</div>
	
</section><!-- /content -->
	
 <div class="clear"></div>
           	
</div>
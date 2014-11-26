<section id="content">
	  <div class="vacansy_form_block">

           <?php echo form_open('admin/vacansy/add_vacansy', 'id="reg_form"'); ?> 

           	<h3 class="message">Заявка на поиск сотрудника</h3>
		
		 <div id="form_error" class="alert-error"><!-- dinamik-->
           <?php echo validation_errors(); ?>
           </div>
           
<small>Поля, которые нужно заполнить, отмечены красной звездочкой <span class="red">*</span>.</small>

	<fieldset>
		<legend>1. Сведения о вакансии</legend>
			<p>
				<label for="city">Город<span class="red">*</span></label><br>

				<?php if($city): 
						$option = array();

					foreach($city as $item):

					$option[0] = 'Выберите ваш город';
					$option[$item->id_city] = $item->name;
				?>

				<?php endforeach; ?>
					<?php echo form_dropdown('city', $option, set_value('city'), ' id="city"'); ?> 
				<?php endif; ?>
			
			</p>
			<p>
				<label  for="id_loc">Подразделение/Отдел</label><br>
			<?php if($local): ?>
				<?php foreach($local as $item): 
				$option[0] = 'Выберите локализацию';
              	$option[$item->id_local] = $item->name;
				?>

				<?php endforeach; ?>
			  <?php echo form_dropdown('id_loc', $option, set_value('id_loc'), ' id="id_loc"'); ?> 
			<?php endif; ?>
			</p>
			<p>
				<label for="id_cat">Рубрика<span class="red">*</span></label><br>
				<?php if($category): $option = array();?>
					<?php foreach($category as $item): 
					$option[] = 'Выберите рубрику';
		          	$option[$item->id] = $item->name;
					?>
				<?php endforeach; ?>
			  <?php echo form_dropdown('id_cat', $option, set_value('id_cat'), ' id="id_cat"'); ?> 
			<?php endif; ?>
			</p>
	</fieldset>
	<fieldset>
		<legend>Контактное лицо по вакансии</legend>
			<p>
				<label for="author">Контактное лицо(ФИО)<span class="red">*</span><br>
				<?php echo form_input('author', set_value('author'), 'id="author" maxlength="100"'); ?>
				</label>
			</p>
			<p>
	 			<label for="phone">Контактный телефон <span class="red">*</span><br>
	 			<?php echo form_input('phone', set_value('phone'), 'id="phone" maxlength="30"'); ?>
	 			</label>
	 		</p>
      		<p>
       			<label for="email">Email <span class="red">*</span><br>
       			<?php echo form_input('email', set_value('email'), 'id="email" maxlength="30"'); ?>
       			</label>
       		</p>
           
    </fieldset>
	<fieldset>
		<legend>2. Описание вакансии</legend>
			<p>
				<label for="title">Наименование вакансии(Должность)<span class="red">*</span><br>
				<?php echo form_input('title', set_value('title'), 'id="title" maxlength="30"'); ?>
				</label>
			</p>
			<p>
				 <label for="reason">Причина открытия вакансии <br>
				<select id="reason"  name="reason">
			      <option value="">Выберите причину открытия вакансии</option>
			      <option >Введение новой штатной единицы</option>
			      <option >Увольнения сотрудника</option>  
			      <option >Увольнения сотрудника в течении действия испытательного срока</option>
			    </select>
				</label>
			</p>
<!-- <p>
	<label for="count_candidate">Количество сотрудников которое требуется<br>
		<input type="number" name="count_candidate" id="count_candidate" value="<?php echo set_value('count_candidate'); ?>" placeholder="">
	</label>
</p>

<p>
	<label for="planned_date">Планируемый срок приема сотрудника<br>
	<small>*при срочных вакансиях, требующих размещения в платных источниках, в т.ч. бегущей строке просьба указывать причину открытия срочной вакансии</small><br>
		<input type="datetime" name="planned_date" id="planned_date" value="<?php echo set_value('planned_date'); ?>" placeholder="">
	</label>
</p> -->

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
	<?php echo form_input('education', set_value('education'), 'id="education" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="profes_profession">Специальность<br>
	<?php echo form_input('profes_profession', set_value('profes_profession'), 'id="profes_profession" maxlength="30"'); ?>
	</label>
</p>

<p>
	<label for="special_requirement">Специальные требования:<span class="red">*</span><br>
	<small style="font-size: 12px">(наличие определенных навыков, умение выполнять определенные манипуляции, сертификаты и т.д.)</small>

		<?php echo form_textarea('special_requirement', set_value('special_requirement')); ?>
		</label>
</p>
<p>
	<label for="other_requirements">Другие требования, на которые хотели бы обратить внимания<br>
	<?php echo form_input('other_requirements', set_value('other_requirements'), 'id="other_requirements" maxlength="30"'); ?>
	</label>
</p>
</fieldset>


<fieldset>
	<legend>4. Условия работы</legend>

<p>
	<label for="workplace">Место работы практика<br>
	<?php echo form_input('workplace', set_value('workplace'), 'id="workplace" maxlength="30"'); ?>
	</label>
</p>

<p>
	 <label for="schedule">График работы<br>
	<select id="schedule"  name="schedule">
		<option value="">выберите график...</option>
		<option >полный рабочий день</option>
		<option >удаленная работа</option>  
		<option >гибкий график</option> 
		<option >сменный график</option>
    </select>
	</label>
</p>
<p>
	<label for="nature_work">Характер работы<br>
	<?php echo form_input('nature_work', set_value('nature_work'), 'id="nature_work" maxlength="30"'); ?>
	</label>
</p>

<p>
	 <label for="wage_structure">Структура заработной платы <br>
	<select id="wage_structure"  name="wage_structure">
      <option >оклад</option>
      <option >оклад + премия</option>
      <option >оклад + премия + бонус</option>  
		<option >сдельная</option> 
		<option >по временная(тариф за час)</option>
    </select>
	</label>
</p>
<p>
	<label for="wage_rate">Размер заработной платы<br>
	<?php echo form_input('wage_rate', set_value('wage_rate'), 'id="wage_rate" maxlength="30"'); ?>
	</label>
</p>
<p>
	<label for="additional_terms">Дополнительные условия:<br>
	<small>(компенсация, оплата проживания, проезда, переезда и т.д.)</small><br>
		<?php echo form_textarea('additional_terms', set_value('additional_terms')); ?>
	</label>
</p>
</fieldset>
  
           		<p>
           			<?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
           		</p>
	<?php echo form_close();?>
  
</div>
 <div class="clear"></div>
</section>
	
 <div class="clear"></div>
           	
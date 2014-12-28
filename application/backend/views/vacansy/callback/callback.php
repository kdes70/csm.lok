<section id="content" class="">
<h3>Обратный звонок</h3>
<?php echo form_open(); ?>
      <div id="reg_form_error" class="alert alert-error"><!-- dinamik-->
       <?php echo validation_errors(); ?>
       </div>
	<p>
	 	<label for="fio">ФИО<span class="red">*</span><br>
        <?php echo form_input('fio', set_value('fio'), 'id="fio" maxlength="100"'); ?>
    </label>
	</p>
	<p>
		 <label for="email">Email<span class="red">*</span><br>
        <?php echo form_input('email', set_value('email'), 'id="email" maxlength="100"'); ?>
        </label>
	</p>
	<p>
		 <label for="phone">Телефон<span class="red">*</span><br>
        <?php echo form_input('phone', set_value('phone'), 'id="phone" maxlength="100"'); ?>
      </label>
	</p>
	<p>
            <label for="coment">Комментарий<br>
            <small>Укажите удобное время для звонка</small><br>
                <?php echo form_textarea('comment', set_value('comment'), 'placeholder
="" id="work_experience" maxlength="100"'); ?>
            </label>
  </p>

         <p>
            <?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
 
        </p>

<?php echo form_close(); ?>
</section>
<section id="content">

    <h3 class="message">Редактирование теста</h3>

    <?php echo form_open(); ?>
  <div id="form_error" class="alert-error"><!-- dinamik-->
           <?php echo validation_errors(); ?>
   </div>


    <fieldset>
        <legend>Тема теста</legend>
        <p>
            <label for="test_name">Контактное лицо(ФИО)<span class="red">*</span><br>
            <?php echo form_input('test_name', set_value('test_name'), 'id="test_name"'); ?>
            </label>
        </p>
    </fieldset>
   <?php echo form_close(); ?>
</section>

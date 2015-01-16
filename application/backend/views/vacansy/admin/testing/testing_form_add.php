<section id="content">

    <h3 class="message">Редактирование теста</h3>

    <?php echo form_open(); ?>
  <div id="form_error" class="alert-error"><!-- dinamik-->
           <?php echo validation_errors(); ?>
   </div>


    <fieldset>
        <legend>Тема теста</legend>
        <p><!--  CATEGORY -->
            <label for="cat_test">Выбирете родительскую категорию<span class="red">*</span></label><br>
            <?php if($cat_test): $option = array();?>
                <?php foreach($cat_test as $key => $item): 
                    $option[0] = '-- Главная --';
                    $option[$item->id] = $item->test_name;
                ?>
                <?php endforeach; ?>
                <?php echo form_dropdown('', $option, set_value('cat_test'), ' id="cat_test"'); ?> 
            <?php endif; ?>
        </p><!--  CATEGORY -->
        <p>
            <label for="test_name">Название теста<br>
            <?php echo form_input('test_name', set_value('test_name'), 'id="test_name"'); ?>
            </label>
        </p>
    </fieldset>
       <p>
            <?php echo form_submit('submit', 'Создать', 'id="button"'); ?>
        </p>
   <?php echo form_close(); ?>
</section>

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
              <?php foreach($cat_test as $item): 
                  $option[0] = '-- Главная --';
                  $option[$item->id] = $item->test_name;
              ?>
              <?php endforeach; ?>
              <?php echo form_dropdown('parent_id', $option, set_value('parent_id', $test_name->parent_id), ' id="cat_test"'); ?> 
          <?php endif; ?> 


<!-- <?php if($cat_test): ?>
 
    <select class="select_cat" name="parent_id">
        <option value="0">-- Главная категория --</option>
         <?php echo $cat; ?>
    </select>
 
<?php endif; ?>
 -->


        </p><!--  CATEGORY -->


        <p>
            <label for="test_name">Название теста<br>
            <?php echo form_input('test_name', set_value('test_name', $test_name->test_name), 'id="test_name"'); ?>
            </label>
        </p>
    </fieldset>
       <p>
            <?php echo form_submit('submit', 'Редактировать', 'id="button"'); ?>
        </p>
        <?php if($test_name->public == '1'): ?>
        <p>
            <?php echo form_submit('off_public', 'Скрыть', 'id="button"'); ?>
        </p>
       
    <?php else: ?>
          <p>
            <?php echo form_submit('on_public', 'Опубликовать', 'id="button"'); ?>
        </p>
        
    <?php endif; ?>
   <?php echo form_close(); ?>




    <?php echo form_open_multipart(); ?>
   
 <fieldset>
    <legend>Добавить вопрос</legend>
    <?php if($test_data): ?>
     <p>
        <ul>
            <?php $i=1; foreach($test_data as $key => $item): ?>
                <li><a href="<?php echo base_url('qnsw/'.$key); ?>" title=""><?php echo $i ?></a></li>
            <?php $i++; endforeach; ?>
        </ul>
    </p>
<?php endif; ?>
    <p class="fild_qest">
        <label for="test_qest">Вопрос<br>
        <?php echo form_input('test_qest', set_value('test_qest'), 'id="test_qest"'); ?>
        </label>
    </p>
    <p>
        <label for="">Изображение<br>
        <?php echo form_upload('myfile'); ?>
        </label>
    </p>
    </fieldset>
    <fieldset>
  <legend>Варианты ответов на вопрос</legend>
<a href="#" id="INeedMore"><img  width="30px" src="<?php echo base_url('images/document_add.png'); ?>" alt="">Добавить поле</a>
<div id="Wrapper">
    
</div>
     <p>
            <?php echo form_submit('save', 'Сохранить', 'id="button" class="butt_save"'); ?>
    </p>
    </fieldset>

    <?php echo form_close(); ?>
</section>

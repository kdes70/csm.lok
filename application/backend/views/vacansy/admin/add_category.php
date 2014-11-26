
<section id="content" class="">
<div>

    <p>
        <a href="<?php echo base_url('admin/vacansy/add_vacansy') ?>">
<img src="<?php echo base_url("images/file_add.png") ?>" width="32px" alt="Добавить вакансию"> Добавить вакансию
</a>
    </p>
</div>

<hr>
    <h3>Страница рубрик</h3>
    <div class="left">
   
       <?php echo form_open(); ?>

      <!--  <p>
            <label for="id_loc">Главная рубрика</label>
            <?php if($category): ?>
                <?php foreach($category as $item): 
                $option[0] = 'Главная рубрика';
                $option[$item->id] = $item->name;
                ?>

                <?php endforeach; ?>
              <?php echo form_dropdown('category', $option, set_value('category'), ' id="category"'); ?> 
            <?php endif; ?>
            </p> -->
            
        <p>
           <label>Название рубрики
            <?php echo form_input('name', set_value('name'), 'id="name" maxlength="30"'); ?>
           </label>
        </p>
        <p>
            <?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
        </p>
       <?php echo form_close(); ?>

    </div>
    <div class="right">
    <?php if($category): ?>
        <ul class="cat_list">
        <?php foreach($category as $item): ?>
             <li><a href="<?php echo base_url('admin/category/edit/'.$item->id); ?>"><?php echo $item->name; ?></a></li>

        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
       

      
    </div>
</section><!-- /content -->
	

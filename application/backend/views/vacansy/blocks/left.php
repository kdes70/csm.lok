
<aside id="left_block">
    <?php if($this->session->userdata('loggedin') == FALSE): ?>
   <!--  <div class="title_left">Обучение</div>
    <div class="left_content">
         <div class="left_section" style="font-size: 14px">
      
            <p><?php echo anchor('testing', 'Система тестирования'); ?></p>
    </div>
    </div> --><!-- left_content - Обучение -->
     <?php endif; ?>
    <div class="title_left">Вакансии</div>
    <div class="left_content">
    <?php if($this->session->userdata('loggedin') == TRUE): ?>
        <?php if($this->session->userdata('is_admin') == TRUE): ?>
              <div class="left_section">
                <h3>Админ-панель</h3>
                <p><?php echo anchor('admin/user', 'Администраторы'); ?></p>
                <p><?php echo anchor('admin/page/meta', 'Мета-данные'); ?></p>
                <p><?php echo anchor('admin/testing', 'Система тестирования'); ?></p>
              </div>
        <?php endif; ?>
        <div class="left_section">
        <h3>Опции</h3>
            <p><?php echo anchor('admin/pages', 'Главная страница'); ?></p>
            <p><?php echo anchor('admin/vacansy', 'Вакансии'); ?></p>
            <p><?php echo anchor('admin/category/edit', 'Рубрики'); ?></p>

            <!--  <p><?php echo anchor('admin/callback', 'Заявки на звонок'); ?></p> -->

            <p><?php echo anchor('admin/resume', 'Резюме ') ?> 
            <?php if($new_resume): ?>
<a class="no_line" href="<?php echo base_url('admin/resume/new_resume'); ?>"><span class="info_count">+<?php echo $new_resume ?></span></a>
             <?php endif; ?>
            </p>  
           
            
            <p><?php echo anchor('admin/auth/logout', 'Выйти') ?></p>
        </div>
    <?php endif; ?>
    <!-- <div class="left_section"> 
        <h3>Выберите ваш город</h3>
        <?php if($city): foreach($city as $item):?>
             <p><?php echo anchor('vacansy/city/'.$item->id_city, $item->name); ?></p>
        <?php endforeach; endif; ?>
    
    </div> -->
   
        <div class="left_section" style="font-size: 14px">
            <h3>Категории</h3>
            <?php if($category): foreach($category as $item):?>
                <p><?php echo anchor('vacansy/cat/'.$item->id, $item->name.'('.$item->count.')'); ?></p>
            <?php endforeach; endif; ?>
           
        </div>
    </div>

</aside>

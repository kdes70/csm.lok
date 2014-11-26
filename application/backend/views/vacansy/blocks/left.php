
<aside id="left_block">
    <div class="title_left">Вакансии</div>
    <div class="left_content">
    <?php if($this->session->userdata('loggedin') == TRUE): ?>
        <div class="left_section">
        <h3>Опции</h3>
            <p><?php echo anchor('admin/pages', 'Главная страница'); ?></p>
            <p><?php echo anchor('admin/vacansy', 'Вакансии'); ?></p>
            <p><?php echo anchor('admin/category/edit', 'Рубрики'); ?></p>
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
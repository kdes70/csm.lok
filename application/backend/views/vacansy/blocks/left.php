
<aside id="left_block">
    <div class="title_left">Вакансии</div>
    <div class="left_content">
    <div class="left_section">
        <h3>Выберите ваш город</h3>
        <p><?php echo anchor('vacansy/city/tomsk', 'Томск'); ?></p>
        <p><?php echo anchor('vacansy/city/novosibirsk', 'Новосибирск'); ?></p>
    </div>
    <div class="left_section" style="font-size: 14px">
        <h3>Категории</h3>
        <?php if($category): foreach($category as $item):?>
            <p><?php echo anchor('vacansy/cat/'.$item->id, $item->name.'(10)'); ?></p>
        <?php endforeach; endif; ?>
       
    </div>
    </div>
</aside>
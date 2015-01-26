
<section id="content" class="">
<div>

    <p>
        <a href="<?php echo base_url('admin/vacansy/add_vacansy') ?>">
<img src="<?php echo base_url("images/file_add.png") ?>" width="32px" alt="Добавить вакансию"> Добавить вакансию
</a>
    </p>
</div>

<hr>
    <h3>Страница вакансий цсм</h3>
    <div>
   
        <?php if($vacansy): ?>
          <table class="vacansy_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Город</th>
                    <th>Категория</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
          
          
           <tbody> 
            <?php foreach($vacansy as $item): ?>
                <tr>
                    <td><?php echo $item->id_vac; ?></td>
                    <td class="row_title"><?php echo anchor('admin/vacansy/card_vacansy/'.$item->id_vac, $item->title); ?></td>
                    <td><?php echo $item->cityname; ?></td>
                    <td class="row_cat"><?php echo $item->cat; ?></td>
                    <td class="row_author"><?php echo $item->author; ?></td>
                    <td class="row_data"><?php echo rus_date("j F - H:i", strtotime($item->modified)); ?></td>
                    <td class="row_option">
                        
                    <a href="<?php echo base_url('admin/vacansy/edit/'.$item->id_vac); ?>"><img src="<?php echo base_url('images/file_edit.png'); ?>" width="32px" alt="Редактировать"></a>
                    <a href="<?php echo base_url('admin/vacansy/delete/'.$item->id_vac); ?>"><img src="<?php echo base_url('images/file_delete.png'); ?>" width="32px" alt="Удалить"></a>
                    </td>
                </tr> 
             <?php endforeach;  ?>
           </tbody>
          </table>
        <?php endif; ?>
       
   

    </div>
</section><!-- /content -->
	


<section id="content" class="">

    <h3>Страница <?php echo $page_title; ?></h3>
   <!--  <p>
        Общее количество - <?php echo $count; ?>, 
        <?php echo anchor('admin/callback', 'активных - ') ?><?php echo $resum_active_count ?>, 
        <?php echo anchor('admin/callback/archive', 'в архиве') ?> - <?php echo $resume_archive_count; ?>
    </p> -->
    <div>
   
        <?php if($callback): ?>
          <table class="vacansy_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>Email</th>
                    <th>Телефон</th>
                 <!--    <th>Подробно</th> -->
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
          
          
           <tbody> 
            <?php foreach($callback as $item): ?>
                <tr>
                    <td><?php echo $item->id; ?></td>
                    <td class="row_title"><?php echo anchor('admin/callback/read/'.$item->id, $item->fio); ?></td>
                    <td><?php echo $item->email; ?></td>
                    <td class="row_cat"><?php echo $item->phone; ?></td>
                  <!--   <td class="row_author"><?php // echo $item->; ?></td> -->
                    <td class="row_data"><?php echo rus_date("j F - H:i", strtotime($item->created)); ?></td>
                    <td class="row_option">
                        <?php echo $item->comment; ?>
                   <!--  <a href="<?php // echo base_url('admin/resume/edit/'.$item->id); ?>"><img src="<?php // echo base_url('images/file_edit.png'); ?>" width="32px" alt="Редактировать"></a> -->
                  <!--   <a href="<?php echo base_url('admin/callback/add_archive/'.$item->id); ?>"><img src="<?php echo base_url('images/file_delete.png'); ?>" width="32px" alt="Удалить"></a> -->
                    </td>
                </tr> 
             <?php endforeach;  ?>
           </tbody>
          </table>
        <?php endif; ?>
       
   

    </div>
</section><!-- /content -->
	

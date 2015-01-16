
<section id="content" class="">
<?php echo $this->uri->segment(3); ?>
    <h3>Страница <?php echo $page_title; ?></h3>
    <p>
        Общее количество - <?php echo $count; ?>, 
        <?php echo anchor('admin/resume', 'активных - ') ?><?php echo $resum_active_count ?>, 
        <?php echo anchor('admin/resume/archive', 'в архиве') ?> - <?php echo $resume_archive_count; ?>
    </p>
    <div>
   
        <?php if($resume): ?>
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
            <?php foreach($resume as $item): ?>
                <tr>
                    <td><?php echo $item->id; ?></td>
  <?php if($this->uri->segment(3) === 'archive'): ?>
    <td class="row_title"><?php echo anchor('admin/resume/full_arhive/'.$item->id, $item->surname.' '.$item->name.' '.$item->patronymic); ?></td>
                    
  <?php else: ?>
    <td class="row_title"><?php echo anchor('admin/resume/full/'.$item->id, $item->surname.' '.$item->name.' '.$item->patronymic); ?></td>
                    
  <?php endif; ?>
                   <td><?php echo $item->email; ?></td>
                    <td class="row_cat"><?php echo $item->phone; ?></td>
                  <!--   <td class="row_author"><?php // echo $item->; ?></td> -->
                    <td class="row_data"><?php echo rus_date("j F - H:i", strtotime($item->created)); ?></td>
                    <td class="row_option">
                        
                   <!--  <a href="<?php // echo base_url('admin/resume/edit/'.$item->id); ?>"><img src="<?php // echo base_url('images/file_edit.png'); ?>" width="32px" alt="Редактировать"></a> -->
                    
         <?php if($this->uri->segment(3) === 'archive'): ?>
    <a href="<?php echo base_url('admin/resume/delete/'.$item->id); ?>"><img src="<?php echo base_url('images/file_delete.png'); ?>" width="32px" alt="Удалить"></a>
                                 
  <?php else: ?>
    <a href="<?php echo base_url('admin/resume/add_archive/'.$item->id); ?>"><img src="<?php echo base_url('images/file_delete.png'); ?>" width="32px" alt="Удалить"></a>
                                 
  <?php endif; ?>
                    </td>
                </tr> 
             <?php endforeach;  ?>
           </tbody>
          </table>
        <?php endif; ?>
       
   

    </div>
</section><!-- /content -->
	

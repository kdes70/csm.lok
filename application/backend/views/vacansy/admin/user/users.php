
<section id="content" class="">

<div>
    <p>
        <a href="<?php echo base_url('admin/user/new_admin') ?>">
    <img src="<?php echo base_url("images/file_add.png") ?>" width="32px" alt="Добавить пользователя"> Добавить пользователя
        </a>
    </p>
</div>
    <h3><?php echo $page_title; ?></h3>
  <!--   <p>
        Общее количество - <?php// echo $count; ?>, 
    </p> -->
    <div>
<?php if($users): ?>
        <table class="vacansy_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Email</th>
                   <!--  <th>Телефон</th> -->
                 <!--    <th>Подробно</th> -->
                    <th>Дата рег.</th>
                    <th>Действия</th>
                </tr>
            </thead>

           <tbody> 
            <?php foreach($users as $item): ?>
            <tr>
                <td><?php echo $item->id; ?></td>

    <td class="row_title"><?php echo anchor('admin/user/profile/'.$item->id, $item->login); ?></td>
                    
 
    <td class="row_title"><?php echo $item->email ?></td>
   <!--  <td class="row_cat"><?php echo $item->phone; ?></td> -->
  <!--   <td class="row_author"><?php // echo $item->; ?></td> -->
    <td class="row_data"><?php echo rus_date("j F - H:i", strtotime($item->created)); ?></td>
    <td class="row_option">   
   <!--  <a href="<?php // echo base_url('admin/resume/edit/'.$item->id); ?>"><img src="<?php // echo base_url('images/file_edit.png'); ?>" width="32px" alt="Редактировать"></a> -->
    <a href="<?php echo base_url('admin/resume/add_archive/'.$item->id); ?>"><img src="<?php echo base_url('images/file_delete.png'); ?>" width="32px" alt="Удалить"></a>
    </td>
            </tr> 
             <?php endforeach;  ?>
           </tbody>
        </table>
<?php endif; ?>
       
   

    </div>
</section><!-- /content -->
	

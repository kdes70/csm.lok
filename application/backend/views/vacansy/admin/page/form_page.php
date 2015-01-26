
<section id="content" class="">
<div>

  <!--   <p>
        <a href="<?php echo base_url('admin/pages/edit_pages/vacansy'); ?>">
<img src="<?php echo base_url("images/file_edit.png") ?>" width="32px" alt="Редактировать страницу"> Редактировать страницу
</a>
    </p> -->
    <p><a href="<?php echo base_url('admin/pages') ?>" title="">Назад</a></p>
</div>

<hr>
    <h3>Страница <?php echo $page->title; ?></h3>
    <div>
   
     <?php echo form_open(); ?>
    <p>
            <?php echo form_textarea('text', set_value('text', $page->text)); ?>
    </p>
<p>
    <?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
</p>
        <?php echo form_close(); ?>
    </div>
<hr>
 <p>
        <a href="<?php echo base_url('admin/post/add_post') ?>">
<img src="<?php echo base_url("images/file_add.png") ?>" width="32px" alt="Добавить"> Добавить пост
</a>
    </p>


<?php if($post_row): ?>
       <table class="vacansy_table">
            <thead>
                <tr>
                    <th>#</th>
                   <!--  <th>img</th> -->
                    <th>Заголовок</th>
                   
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
          
          
           <tbody> 
            <?php foreach($post_row as $item): ?>
                <tr>
                    <td><?php echo $item->id; ?></td>
                    <!-- <td><?php echo $item->img; ?></td> -->
    <td class="row_title"><?php echo anchor('admin/post/full/'.$item->id, $item->title); ?></td>
                    <td class="row_data"><?php echo rus_date("j F - H:i", strtotime($item->modified)); ?></td>
                    <td class="row_option">
<a href="<?php echo base_url('admin/post/delete/'.$item->id); ?>"><img src="<?php echo base_url('images/file_delete.png'); ?>" width="32px" alt="Удалить"></a>
                                 
                    </td>
                </tr> 
             <?php endforeach;  ?>
           </tbody>
          </table>
    <?php endif; ?>




</section><!-- /content -->
    <script type="text/javascript">


    var ckeditor1 = CKEDITOR.replace( 'text' );
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
</script>

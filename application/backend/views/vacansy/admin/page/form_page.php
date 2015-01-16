
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
</section><!-- /content -->
	<script type="text/javascript">


    var ckeditor1 = CKEDITOR.replace( 'text' );
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
</script>

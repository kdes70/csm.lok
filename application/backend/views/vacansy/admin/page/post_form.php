<section id="content" class="">

<hr>
    
    <div id="form_post">
   
     <?php echo form_open_multipart(); ?>
<p>
    <label for="">Заголовок</label><br>
    <?php echo form_input('title', set_value('title'), 'style=width:450px'); ?>
</p>
<!-- <p>
    <label>Изображение
        <input type="file" name="userfile" size="20" />
    </label>
</p> -->
<p>
    <label for="">Текст</label><br>
        <?php echo form_textarea('text', set_value('text')); ?>
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

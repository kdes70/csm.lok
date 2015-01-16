
<section id="content" class="">
<div>

    <p>
        <a href="<?php echo base_url('admin/pages/edit_pages/'. $page->url); ?>">
<img src="<?php echo base_url("images/file_edit.png") ?>" width="32px" alt="Редактировать страницу"> Редактировать страницу
</a>
    </p>
</div>

<hr>
    <h3>Страница <?php echo $page->title; ?></h3>
    <div>
   
     
 <article>
     <?php echo $page->text; ?>
 </article>

    </div>
</section><!-- /content -->
	<script type="text/javascript">


    var ckeditor1 = CKEDITOR.replace( 'form[value1]' );
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
</script>

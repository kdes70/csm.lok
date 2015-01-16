
<section id="content" class="">

    <h3>Страница <?php echo $page->title; ?></h3>
  <!--   <span style="color: red">На данном этапе страница находится в разработке, приносим извинения за не удобства</span> -->
    <article>
   
     <?php echo $page->text; ?>
        
    </article>
    <div id="testing_block">
      <?php if($tests): ?>
        <h3>Выберите тему тестов</h3>
        <hr>
        <?php echo $tests; ?>
      <?php else: ?>
        <p>Нет опубликованных тестов</p>
      <?php endif; ?>
       <div class="clear"></div>
   
    </div>
   
      

 
 

</section><!-- /content -->


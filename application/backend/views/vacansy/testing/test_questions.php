
<section id="content" class="">

    <h3>Страница <?php echo $page->title; ?></h3>
  <!--   <span style="color: red">На данном этапе страница находится в разработке, приносим извинения за не удобства</span> -->
    <article>
   
     <?php echo $page->text; ?>
        
    </article>
    <div id="testing_block">
    <h3><?php echo $test_title; ?></h3>

    <?php if(isset($count_quest)): ?>
         <p>Всего вопросов: <?php echo $count_quest ?></p>
         <?php echo $pagin_tabs; ?>
         <span class="hidden" id="test_id"><?php echo $test_id; ?></span>
    <?php endif; ?>

     <hr> 
    <?php if($test_data): ?>
        <div id="test_data">
            <?php foreach($test_data as $id_question => $item): ?>
                <div class="question" data-id="<?php echo $id_question ?>" id="question-<?php echo $id_question ?>">
                    <?php foreach($item as $id_answer => $answer): // Проходим по массиву вопрос/ответ?>
                        <?php if(!$id_answer): //Выводим вопрос ?>
                            <p class="quest"><?php echo $answer; ?></p>
                        <?php else: //Выводим ответы?>
<p class="answ">
    <input type="radio" name="question-<?php echo $id_question; ?>" id="answer-<?php echo $id_answer; ?>" value="<?php echo $id_answer; ?>">
    <label for="answer-<?php echo $id_answer; ?>"><?php echo $answer; ?></label>
</p>
                        <?php endif; //$id_answer?>
                    <?php endforeach; ?>
                </div><!-- .question -->
            <?php endforeach; ?>
        </div><!-- #test_data -->
       <div class="test_button">
           <button class="button btn" id="button" >Закончить тест</button>
       </div>

       <div id="answ_result">
           
       </div>
    <?php else: ?>
        <p>Выбирете тест</p>
    <?php endif; ?>
    
    </div><!-- #testing_block -->
   
       <div class="clear"></div>
   

 
 

</section><!-- /content -->


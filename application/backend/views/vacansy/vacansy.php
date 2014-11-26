
<section id="content" class="">

    <h3>Страница <?php echo $page->title; ?></h3>
    <article>
     <?php echo $page->text; ?>
 </article>
    <div>
    <ul>
        <?php if($vacansy): ?>
            <?php foreach($vacansy as $item): ?>
            <li class="row_vacansy" id="<?php echo $item->id_vac;?>">
                <a><h3><?php echo $item->title; ?></h3></a>
                <p><?php echo $item->cat ?></p>
                <p class="price"><?php echo $item->wage_rate;?><br><?php echo $item->wage_structure;?></p>
                <div class="vacansy_info" id="info_block_<?php echo $item->id_vac;?>">
                    <h4>Место работы:</h4>
                        <p>Город: <?php echo $item->cityname;?></p>
                        <p><?php echo $item->schedule;?></p>
                        <p><?php echo $item->nature_work;?></p>
                        <p><?php echo $item->wage_rate;?></p>
                        <p><?php echo $item->additional_terms;?></p>
                        <p><?php echo $item->desc_candidate; ?></p>
                    <h4>Требования:</h4>
                        <p><?php echo $item->education; ?></p>
                        <p><?php echo $item->profes_profession; ?></p>
                        <p><?php echo $item->special_requirement; ?></p>
                        <p><?php echo $item->other_requirements; ?></p>
                   <h4>Условия работы:</h4>
                        <p><?php echo $item->workplace; ?></p>
                        <p><?php echo $item->schedule; ?></p>
                        <p><?php echo $item->nature_work; ?></p>
                        <p>Структура заработной платы: <?php echo $item->wage_structure; ?></p>
                        <p><?php echo $item->additional_terms; ?></p>

                        <!-- Button trigger modal -->
                       <!--  <button class="bottom_resume" data-toggle="modal" data-target="#myModal">
                        Оставить заявку на вакансию
                        </button> -->
                       <!--  <div class="bottom">
                           <a class="bottom_resume" href="resume/bid_by">Подать заявку на вакансию</a>
                       </div> -->

                       <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                          Подать заявку на вакансию
                        </button>
                </div>
            </li>
            <?php endforeach; ?>
        <?php else: ?>
            <h3>Вакансий нет</h3>
        <?php  endif; ?>
       
    </ul>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Заявка на вакансию</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open(); ?>
                
            <?php echo form_close(); ?>

           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</section><!-- /content -->
	
  
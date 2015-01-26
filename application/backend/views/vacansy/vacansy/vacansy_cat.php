
<section id="content" class="">

    <h3>Страница <?php echo $page->title; ?></h3>
   
    <div>
    <ul>
        <?php if($vacansy): ?>
            <?php foreach($vacansy as $item): ?>
                <?php  $id_item = $item->id_vac; ?>
            <li class="row_vacansy" id="<?php echo $item->id_vac;?>">
                <a><h3><?php echo $item->title; ?></h3></a>
                <p><?php echo $item->cat ?></p>
                <!-- <p class="price"><?php echo $item->wage_rate;?><br><?php echo $item->wage_structure;?></p> -->
                 <p class="date_create">Дата размещения: <?php echo rus_date("j F", strtotime($item->modified)); ?></p>
                <div class="vacansy_info" id="info_block_<?php echo $item->id_vac;?>">
                    <h4>Место работы:</h4>
                        <p><span>Город:</span> <?php echo $item->cityname;?></p>
                        <p><?php if($item->workplace) echo '<span>Место работы:</span> '.$item->workplace; ?></p>
                    <h4>Требования:</h4>
                        <p><?php if($item->education) echo '<span>Уровень образования:</span> '.$item->education; ?></p>
                        <p><?php if($item->profes_profession) echo '<span>Специальность:</span> '. $item->profes_profession; ?></p>
                        <p><?php if($item->desc_candidate) echo '<span>Основные обязанности</span>: <br>'.  $item->desc_candidate; ?></p>
                        <p><?php if($item->special_requirement) echo '<span>Специальные требования:</span> <br>'.$item->special_requirement; ?></p>
                        <p><?php if($item->other_requirements) echo '<span>Другие требования:</span><br>'. $item->other_requirements; ?></p>
                   <h4>Условия работы:</h4>
                        <p><?php if($item->schedule) echo '<span>График работы:</span> '.$item->schedule;?></p>
                        <p><?php if($item->nature_work) echo '<span>Характер работы:</span> '.$item->nature_work;?></p>
                         <p><?php if($item->wage_rate) echo '<span>Размер заработной платы:</span><br>'.$item->wage_rate;?></p>
                        <p> <?php echo '<span>Структура заработной платы:</span> <br>'. $item->wage_structure; ?></p>
                        <p><?php if($item->additional_terms) echo '<span>Дополнительные условия:</span> '. $item->additional_terms;?></p>

 
               <div class="add_resum">
                   <a href="<?php echo base_url('resume/add_resume/'.$item->id_vac) ?>" id="button">
                        <img src="<?php echo base_url('images/mail.png'); ?>" width="24px" alt="Подать заявку на вакансию">Подать заявку на вакансию
                   </a>
               </div>
    
                </div>
            </li>
 
            <?php endforeach; ?>
        <?php else: ?>
            <h3>Вакансий нет</h3>
        <?php  endif; ?>
       
    </ul>

    </div>
 
</section><!-- /content -->

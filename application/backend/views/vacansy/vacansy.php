
<section id="content" class="">

    <h3>Страница вокансий цсм</h3>
    <div>
    <ul>
        <?php if($vacansy): foreach($vacansy as $item):?>
            <li class="row_vacansy"><a href=""><h3><?php echo $item->title; ?></h3></a>
                <p>краткое описание вакансии</p>
                <p class="price">20 000 руб.</p>
            </li>
        <?php endforeach; endif; ?>
       
    </ul>

    </div>
</section><!-- /content -->
	

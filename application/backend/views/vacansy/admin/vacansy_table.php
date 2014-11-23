
<section id="content" class="">
<div>
    <p><?php echo anchor('admin/vacansy/add_vacansy', 'Добавить вокансию'); ?></p>
</div>
<hr>
    <h3>Страница вокансий цсм</h3>
    <div>
    <ul>
        <?php if($vacansy): ?>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Город</th>
                    <th>Автор</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <?php foreach($vacansy as $item): ?>
          
           <tbody>
               <tr>
                   <td><?php echo $item->id_vac; ?></td>
                   <td><?php echo $item->title; ?></td>
                   <td><?php echo $item->city; ?></td>
                   <td><?php echo $item->author; ?></td>
                   <td><?php echo $item->created; ?></td>
               </tr>
           </tbody>
           <?php endforeach;  ?>
        <?php endif; ?>
       
    </ul>

    </div>
</section><!-- /content -->
	

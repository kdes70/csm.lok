<section id="content">

<div class="user_form_block">

<?php echo form_open('', 'id="reg_form"'); ?> 

<div id="form_error" class="alert-error">
   <?php echo validation_errors(); ?><!-- dinamik-->
</div>


<table id="form_teble">
    <caption><h3><?php echo $page_title; ?></h3></caption>
   
    <tbody>
        <tr>
            <td><label for="email">Email</label></td>
            <td><?php echo form_input('email', set_value('email')); ?></td>
        </tr>
        <tr>
            <td><label for="group">Группа пользователя<span class="red">*</span></label></td>
            <td><?php if($group):?>
            <?php foreach($group as $item):

            $option[0] = '--Выберите прова--';
            $option[$item->id_group] = $item->name;
            ?>
            <?php endforeach; ?>
            <?php echo form_dropdown('group', $option, set_value('group'), ' id="group"'); ?> 
            <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><label for="">Название роли</label></td>
            <td> <?php echo form_input('roles_name', set_value('roles_name')); ?></td>
        </tr>
        <tr>
            <td> <label for="">Код роли</label><br>
                 <small>Допускаются только англиские симвалы нижнего регистра,<br> 
                        в места пробела нижние подчеркивание
                </small>
            </td>
            <td><?php echo form_input('roles', set_value('roles')); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
           <td></td>
        </tr>
        <tr>
            
           <td > <?php echo form_submit('submit', 'Зарегистрировать', 'id="button"'); ?></td>
        </tr>
    </tbody>
</table>

<?php echo form_close(); ?>
        
    
    <br>
  <!--   <div>
<?php if($permissions): ?>
    <?php  echo form_fieldset('Прова/Обязаности'); ?>
    <?php foreach($permissions as $value): ?>
         <p>
            <label for=""><?php echo $value->perm_name ?></label>
            <?php echo form_checkbox( $value->perm_desc, true); ?>
        </p>
    <?php endforeach; ?>
       
    <?php echo form_fieldset_close(); ?>
<?php endif; ?>
    </div>
    -->
  
  
</div>
 <div class="clear"></div>
</section>
    
 <div class="clear"></div>
            
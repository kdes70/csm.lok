<div id="main">
	cection <?php echo $page_info->text; ?>




	  <div class="auth_form_block">
	
	<div>

           <?php echo form_open('user/registration', 'id="reg_form"'); ?> 

           <div id="reg_form_error" class="alert alert-error"><!-- dinamik-->
               <?php echo '<pre>' . print_r($this->session->userdata, TRUE).'</pre>'; ?>

           <?php echo validation_errors(); ?>

           </div>

           	<h3 class="message">Заявка на поиск сотрудника</h3>

           	  <legend>1. Сведения о Заказчике</legend>

           	   <fieldset>

				<p>
					<label>Наименование юр. Лица/Подразделение/Отдел</label>

			<?php if($local): ?>

				<?php foreach($local as $item): 

				$option[0] = 'Выберите локализацию';
              	$option[$item->id_local] = $item->name;

				?>

				<?php endforeach; ?>
			  <?php echo form_dropdown('local', $option, set_value('local'), 'id="local"'); ?> 
			<?php endif; ?>



				</p>
           	   </fieldset>

             <!--  <?php if($groups): ?> -->
              <p>
                <label for="groups">Ваш статус <br>
<!-- 
                <?php

                $option = array();

                foreach($groups as $group): 
                  $option[0] = 'Выберите свой статус';
                  $option[$group->id_group] = $group->name;
                ?>
                    
                <?php endforeach; ?>
                <?php echo form_dropdown('groups', $option, set_value('groups'), 'id="groups"'); ?> -->
               <!--  <select id="user_status"  name="user_status">
                  <option value="0">Выберите свой статус</option>
                  <option value="1">Сотрудник СЦМ</option>
                  <option value="2">Практикующий врач (в том числе интерн)</option>  
                  <option value="3">Студент медицинского ВУЗа</option>
                  <option value="4">Не врач (ограниченный доступ)</option>  
                </select> -->
                </label>
              </p> 
           <!--  <?php endif; ?>
 -->
          <!-- AJAX query $data=user.profession -->
          <!-- <?php if($profession): $option = array();?>
            <p id="prof_select" class="hidden">
              <label for="
               ">Выберите специальность</label><br>
              <?php foreach ($profession as $name):
                $option[$name->id] = $name->name;
              endforeach;?>
              <?php echo form_dropdown('profession', $option, set_value('profession'),'disabled="disabled" id="profession" class="testclass"'); ?>
            </p> 
          <?php endif; ?> -->
          <!-- AJAX query $data=user.profession -->
         
            <p>
                <label for="name">Имя <br>
                <?php echo form_input('name', set_value('name'), 'id="name" maxlength="30"'); ?>
                </label>
              </p>
              <p>
                <label for="surname"> Фамилия<br>
                <?php echo form_input('surname', set_value('surname'), 'id="surname" maxlength="30"'); ?>
                </label>
              </p>
              <p>
                <label for="patronymic">Очество <br>
                <?php echo form_input('patronymic', set_value('patronymic'), 'id="patronymic" maxlength="30"'); ?>
                </label>
              </p>

              <p>
              	<label for="">text <br>
              		<?php echo form_textarea('text', set_value('text')); ?>
              	</label>
              </p>
        
          <div class="clear"></div>
           	

           		<p>
           			<label for="email">Email <br>
           			<?php echo form_input('email', '', 'id="email" maxlength="30"'); ?>
           			</label>
           		</p>
              <p>
                <label for="email">Email еще раз<br>
                <?php echo form_input('email_confirm', '', 'id="email_confirm" maxlength="30"'); ?>
                </label>
              </p>
           		
           		<!-- <p>
                <label for="pass">Password <br>
                <?php echo form_password('password', '', 'id="pass" maxlength="30"'); ?>
                </label>
              </p>
              <p>
                <label for="pass_cnf">Password confirm<br>
                <?php echo form_password('password_confirm', '', 'id="pass_conf" maxlength="30"'); ?>
                </label>
                            </p>  --><!--
           	<p>
           		<label for="breed">Порода</label><br>
           		<?php foreach ($breed as $name):
           			$option[$name->name] = $name->name;
           		endforeach;?>
           		<?php echo form_dropdown('breed', $option, '','id="breed" class="testclass"'); ?>
           	</p> -->
           		<p>
           			<?php echo form_submit('submit', 'Отправить', 'id="button"'); ?>
           		</p>
          
       
           

	</div>
</div>
</div>
	

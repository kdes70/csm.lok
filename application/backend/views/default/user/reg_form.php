  <div class="auth_form_block">
	
	<div>

           <?php echo form_open('user/registration', 'id="reg_form"'); ?> 

           <div id="reg_form_error" class="alert alert-error"><!-- dinamik-->
               <?php echo '<pre>' . print_r($this->session->userdata, TRUE).'</pre>'; ?>

           <?php echo validation_errors(); ?>

           </div>

           	<h3 class="message">REGISTRATION</h3>

              <?php if($groups): ?>
              <p>
                <label for="groups">Ваш статус <br>

                <?php

                $option = array();

                foreach($groups as $group): 
                  $option[0] = 'Выберите свой статус';
                  $option[$group->id_group] = $group->name;
                ?>
                    
                <?php endforeach; ?>
                <?php echo form_dropdown('groups', $option, '0', 'id="groups"'); ?>
               <!--  <select id="user_status"  name="user_status">
                  <option value="0">Выберите свой статус</option>
                  <option value="1">Сотрудник СЦМ</option>
                  <option value="2">Практикующий врач (в том числе интерн)</option>  
                  <option value="3">Студент медицинского ВУЗа</option>
                  <option value="4">Не врач (ограниченный доступ)</option>  
                </select> -->
                </label>
              </p> 
            <?php endif; ?>

          <!-- AJAX query $data=user.profession -->
          <?php if($profession): $option = array();?>
            <p id="prof_select" class="hidden">
              <label for="
               ">Выберите специальность</label><br>
              <?php foreach ($profession as $name):
                $option[$name->id] = $name->name;
              endforeach;?>
              <?php echo form_dropdown('profession', $option, '','disabled="disabled" id="profession" class="testclass"'); ?>
            </p> 
          <?php endif; ?>
          <!-- AJAX query $data=user.profession -->
          <div class="form_field">
            <p>
                <label for="name">Имя <br>
                <?php echo form_input('name', '', 'id="name" maxlength="30"'); ?>
                </label>
              </p>
              <p>
                <label for="surname"> Фамилия<br>
                <?php echo form_input('surname', '', 'id="surname" maxlength="30"'); ?>
                </label>
              </p>
              <p>
                <label for="patronymic">Очество <br>
                <?php echo form_input('patronymic', '', 'id="patronymic" maxlength="30"'); ?>
                </label>
              </p>
          </div>
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
           <?php echo form_close(); ?>
       
           

	</div>
</div>
<script type="text/javascript">
/*	$(function  () {

		$('#reg_form_error').hide();

		$('#reg_form').submit(function(event) {
			event.preventDefault();

			var url = $(this).attr('action');
			var postData = $(this).serialize();

			$.post(url, postData, function(o) {
				if(o.result == 1)
				{
					//window.location.href =  "<?php echo base_url('/') ?>";
					alert('good');
				} else {
					$('#reg_form_error').show();
					var output = '<ul>';
					for (var key in o.error)
						{	var value = o.error[key];
							output += '<li>'+ key +': '+ value +'</li>';
					};

					output += '</ul>';
					$('#reg_form_error').html(output);
				}
			}, 'json');
		});
	});*/

	</script>
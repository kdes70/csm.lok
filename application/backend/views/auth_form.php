  <div class="auth_form_block">
	
	<div>
	
           <?php echo form_open('auth', 'id="auth_form"'); ?> 

           <div id="reg_form_error" class="alert alert-error"><!-- dinamik--></div>

           

           	<h3 class="message">REGISTRATION</h3>
              <p>
                <label for="name">Ваш статус <br>
                <select>
                  <option value="1">Выберите свой статус</option>
                  <option value="2">Сотрудник СЦМ</option>
                  <option value="3">Практикующий врач (в том числе интерн)</option>  
                  <option value="4">Студент медицинского ВУЗа</option>
                  <option value="5">Не врач (ограниченный доступ)</option>  
                </select>
                </label>
              </p> 
          <!-- AJAX query $data=user.profession -->
          <?php if($data['profession']): ?>
            <p class="hidden">
              <label for="profession">Выберите специальность</label><br>
              <?php foreach ($profession as $name):
                $option[$name->name] = $name->name;
              endforeach;?>
              <?php echo form_dropdown('profession', $option, '','id="profession" class="testclass"'); ?>
            </p> 
          <?php endif; ?>
          <!-- AJAX query $data=user.profession -->
           		<p>
           			<label for="login">Login <br>
           			<?php echo form_input('login', '', 'id="login" maxlength="30"'); ?>
           			</label>
           		</p>
         

           		<p>
           			<label for="email">Email <br>
           			<?php echo form_input('email', '', 'id="email" maxlength="30"'); ?>
           			</label>
           		</p>
           		
           		<p>
           			<label for="pass">Password <br>
           			<?php echo form_password('password', '', 'id="pass" maxlength="30"'); ?>
           			</label>
           		</p>
           		<p>
           			<label for="pass_cnf">Password confirm<br>
           			<?php echo form_password('password_confirm', '', 'id="pass_conf" maxlength="30"'); ?>
           			</label>
            	</p> <!--
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
	$(function  () {

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
	});


	</script>
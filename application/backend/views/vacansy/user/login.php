  <div class="login_block">
	<p class="message">Авторезируйтесь!</p>
	<div>
	
           <?php echo form_open('user/login','id="login_form"'); ?> 

            <?php echo '<pre>' . print_r($this->session->userdata, TRUE).'</pre>'; ?>

           <?php echo validation_errors(); ?>
           		<p>
           			<label for="email">Email <br>
           			<?php echo form_input('email', '', 'id="email" maxlength="30"'); ?>
           			</label>
           		</p>
           		<p>
           			<label for="login">Password <br>
           			<?php echo form_password('password', '', 'id="pass" maxlength="30"'); ?>
           			</label>
           		</p>
           		<p>
           			<?php echo form_submit('submit', 'Log in', 'id="button"'); ?>
           		</p>
           <?php echo form_close(); ?>
        <div>
           <p><a href="#">Забыли пароль?</a></p>
           <p><?php echo anchor('page/show/registration', 'Регистрация'); ?></p>
		</div>
           
	
	</div>
</div>
	<script type="text/javascript">
	/*	$(function  () {
				$('#login_form').submit(function(event) {
					event.preventDefault();

					var url = $(this).attr('action');
					var postData = $(this).serialize();

					$.post(url, postData, function(o) {
						if(o.result == 1)
						{
							window.location.href = "<?php echo base_url('/') ?>";
							
						} else {
							alert('no good');
						}
					}, 'json');
				});
			});
*/
	</script>

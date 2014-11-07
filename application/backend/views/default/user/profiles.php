  <div class="Profile_block">
	<p class="message">Моя страничка</p>

<div class="user_avatar">
	<img src="setup/user/avatar/ava.jpg" alt="" width="50px">
</div>
<div>
	
	<p>
		Имя:<?php echo $user_profile->name; ?>
	</p>
	<p>Отечство: <?php echo $user_profile->surname; ?></p>
	<p>Фамилия: <?php echo $user_profile->patronymic; ?></p>
	<p>Email: <?php echo $user_profile->email; ?></p>
	<p>Profession: <?php echo $user_profile->profession->name; ?></p>
</div>

<div>
	<p><?php echo anchor('user/options/'.$user_profile->id_user, 'Редактировать профиль') ?></p>
</div>
	
</div>
	
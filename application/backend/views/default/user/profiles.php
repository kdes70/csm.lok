  <div class="Profile_block">
	<p class="message">Моя страничка</p>

<div class="user_avatar">
	<img src="setup/user/avatar/ava.jpg" alt="" width="50px">
</div>
<div>
	<h3><?php echo $user_profile->name. " " .$user_profile->surname. " " .$user_profile->patronymic; ?></h3>
	<p>Email: <?php echo $user_profile->email; ?></p>
	<p>Profession: <?php echo $user_profile->profession->name; ?></p>
</div>

<div>
	<p><?php echo anchor('user/options/'.$user_profile->id_user, 'Редактировать профиль') ?></p>
</div>
	
</div>
	
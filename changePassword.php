<form action="" method="POST">
	<input type="password" name="old_password">
	<input type="password" name="new_password">
	<input type="password" name="new_password_confirm">
	<input type="submit" name="submit">
</form>
<?php
	$id = $_SESSION['id']; // id юзера из сессии
	$query = "SELECT * FROM users WHERE id='$id'";
	
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	
	$hash = $user['password']; // соленый пароль из БД
	$oldPassword = $_POST['old_password'];
	$newPassword = $_POST['new_password'];
	
	// Проверяем соответствие хеша из базы введенному старому паролю
	if (password_verify($oldPassword, $hash)) {
		$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
		
		$query = "UPDATE users SET password='$newPasswordHash' WHERE id='$id'";
		mysqli_query($link, $query);
	} else {
		// старый пароль введен неверно, выведем сообщение
	}
?>
<?php
	$id = $_SESSION['id'];
	$query = "SELECT * FROM users WHERE id='$id'";
	
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	
	$hash = $user['password']; // соленый пароль из БД
		
	// Проверяем соответствие хеша из базы введенному старому паролю
	if (password_verify($_POST['password'], $hash)) {
		$query = "DELETE FROM users WHERE id='$id'";
		mysqli_query($link, $query);
	} else {
		//  пароль введен неверно, выведем сообщение
	}
?>
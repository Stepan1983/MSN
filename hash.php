<?php
	echo md5('12345'); // выведет '827ccb0eea8a706c4c34a16891f84e7b'
?>

<?php
	$login = $_POST['login'];
	$password = md5($_POST['password']); // преобразуем пароль в его хеш
	
	$query = "INSERT INTO users SET login='$login', password='$password'";
?>

<?php
	$login = $_POST['login'];
	$password = md5($_POST['password']); // преобразуем пароль в его хеш
		
	$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
?>

Аналогичным образом подправится код авторизации:

<?php
	$login = $_POST['login'];
	
	$query = "SELECT * FROM users WHERE login='$login'"; // получаем юзера по логину
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	
	if (!empty($user)) {
		$hash = $user['password']; // соленый пароль из БД
		
		// Проверяем соответствие хеша из базы введенному паролю
		if (password_verify($_POST['password'], $hash)) {
			// все ок, авторизуем...
		} else {
			// пароль не подошел, выведем сообщение
		}
	} else {
		// пользователя с таким логином нет, выведем сообщение
	}
?>
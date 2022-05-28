<?php
	session_start();
	
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user)) {
			$_SESSION['auth'] = true;
		} else {
			// неверно ввел логин или пароль
		}
	}

<?php
	if (!empty($_SESSION['auth'])) {
		
	}
?>
<?php
session_start();

//////////////////////// Доступ к базе

    $host = 'sbasta4e.beget.tech'; // имя хоста
    $user = 'sbasta4e_1';    // имя пользователя
    $pass = 'CHEmpion_123';          // пароль
    $name = 'sbasta4e_1';      // имя базы данных

///////////////////////////////////////


	if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
		if ($_POST['password'] == $_POST['confirm']) {
			$login = $_POST['login'];
  		$password = $_POST['password'];

      $link = mysqli_connect($host, $user, $pass, $name);
      $query = "SELECT * FROM users WHERE login='$login'";
      
		  $user = mysqli_fetch_assoc(mysqli_query($link, $query));

      if (empty($user)) {
			$query = "INSERT INTO users SET login='$login', password='$password'";
			mysqli_query($link, $query);
      
      $query = "SELECT * FROM users WHERE login='$login'";      
		  $user = mysqli_fetch_assoc(mysqli_query($link, $query));
      $id = $user['id'];
      echo $id;

      $query = "INSERT INTO dataUsers SET id='$id'";
			mysqli_query($link, $query); 
        
			
			$_SESSION['auth'] = true;
      $_SESSION['id'] = $id;

      echo "<p>Вы зарегистрированы и авторизованы</p>";
      echo "<p><a href = 'account.php'>Ваш профиль</a></p>";
          
               
            
			
		} else {
			// логин занят, выведем сообщение об этом
        echo "Логин занят";
		}
	} else {
			// выведем сообщение о несовпадении
      echo "Пароль и подтверждение не совпадают";
		};

      } else {
      // выведем сообщение о не всех введенных данных
        echo "Не все данные введены";
    };
     		
  	
?>


 <form action="" method="POST">
  	<input name="login" placeholder = "Логин">
  	<input type="password" name="password" placeholder = "Пароль">
  	<input type="password" name="confirm" placeholder = "Подтверждение пароля" >
  	<input type="submit" >
  </form>



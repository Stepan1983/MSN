<?php
    session_start();
    $host = 'sbasta4e.beget.tech'; // имя хоста
    $user = 'sbasta4e_1';    // имя пользователя
    $pass = 'CHEmpion_123';          // пароль
    $name = 'sbasta4e_1';      // имя базы данных

    
   if(!$_SESSION['auth']) {
    include 'introLogin.html';
    
  } 


    if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $link = mysqli_connect($host, $user, $pass, $name);
    
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user)) {
			// прошел авторизацию
      echo "<p>Прошел авторизацию</p>";
      echo "<a href = 'index.php'>Перейдите на главную</a>";
            
      
      $_SESSION['auth'] = true;
      $_SESSION['id'] = $user['id'];
      $id = $user['id'];
      
      
      
		} else {
			// неверно ввел логин или пароль
      echo "Не прошел авторизацию";
		  }
	  } 
   
    
    
        

	
?>





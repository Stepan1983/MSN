<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital@0;1&family=PT+Sans+Caption:wght@400;700&display=swap" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <header class="header">
    <div class = "intro">Тестовая социальная сеть</div>
  </header>
  <main>
    <div class="wrapper">
      <a href="/">На главную</a>
      <a href="members.php">Участники</a>
      <a href="">Друзья</a>
      <a href="">Сообщения</a>
      <a href="account.php">Редактировать профиль</a>
      <a href="logout.php">Разлогиниться</a>
    </div>
    <div class="members">
      <?php
               

        $host = 'sbasta4e.beget.tech'; // имя хоста
        $user = 'sbasta4e_1';    // имя пользователя
        $pass = 'CHEmpion_123';          // пароль
        $name = 'sbasta4e_1'; 
				    
        $query = "SELECT * FROM dataUsers";
        $link = mysqli_connect($host, $user, $pass, $name);
      	$result = mysqli_query($link, $query) or die(mysqli_error($link));

      	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        
        foreach ($data as $elem) {
          
    		echo "<p>$elem[name]</p>";
          ?>
        <form method = "POST" >
              <textarea name = "message<?php echo $elem['id'] ?>" placeholder = "Отправьте сообщение"></textarea><br/>
              <input type="submit">
            </form>
          
       
          <?php
                    
          $id = $elem['id'];
                    
          if (!empty($_POST['message'.$id])) {
          		$message = $_POST['message'.$id];
             
              $link = mysqli_connect($host, $user, $pass, $name);
               
              $query = "INSERT INTO messages SET id='$id', message='$message'";
          		mysqli_query($link, $query);
          		
          }


        
        }
        
      ?>

    </div>
  </main>
</body>
</html>
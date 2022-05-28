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
  <h2>Ваш профиль 
</h3>
  <div class = "wrapperUser">
    <div class="userImg">
      <img src = "https://papik.pro/uploads/posts/2021-12/1639295657_1-papik-pro-p-sotsseti-klipart-1.png " width = '100px'>
    </div>
    <div class="userTitle">
      <?php
        session_start();
        $id = $_SESSION['id'];
        $host = 'sbasta4e.beget.tech'; // имя хоста
        $user = 'sbasta4e_1';    // имя пользователя
        $pass = 'CHEmpion_123';          // пароль
        $name = 'sbasta4e_1'; 
				    
        $query = "SELECT * FROM dataUsers WHERE id='$id'";
        $link = mysqli_connect($host, $user, $pass, $name);
    
    		$result = mysqli_query($link, $query);
    		$user = mysqli_fetch_assoc($result);
     
        echo "<p>Ваше имя: $user[name]</p>";
        echo "<p>Ваша фамилия: $user[surname]</p>";
        echo "<p>О вас: $user[title]</p>";
        
        
      ?>
    </div>
    
  </div>
  <h3>Вы можете добавить описание профиля</h3>

  <form method="POST">
	<textarea name="title" class = addUserTitle></textarea><br/>
	<input type="submit">
</form>
  
</body>
</html>

<?php
session_start();
$host = 'sbasta4e.beget.tech'; // имя хоста
$user = 'sbasta4e_1';    // имя пользователя
$pass = 'CHEmpion_123';          // пароль
$name = 'sbasta4e_1'; 

$id = $_SESSION['id'];



if (!empty($_POST['title'])) {
      $title = $_POST['title'];
    
      $query = "UPDATE dataUsers SET title='$title' WHERE id = $id";          		
      $link = mysqli_connect($host, $user, $pass, $name);
      
      mysqli_query($link, $query);
                    
                		
      }

?>

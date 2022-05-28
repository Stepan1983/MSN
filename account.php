<?php 

session_start();
$host = 'sbasta4e.beget.tech'; // имя хоста
$user = 'sbasta4e_1';    // имя пользователя
$pass = 'CHEmpion_123';          // пароль
$name = 'sbasta4e_1'; 

      include 'layoutLogged.html';
      

			if (!empty($_SESSION['auth'])) {
        $id = $_SESSION['id'];
        
				    
        $query = "SELECT * FROM dataUsers WHERE id='$_SESSION[id]'";
        $link = mysqli_connect($host, $user, $pass, $name);
    
    		$result = mysqli_query($link, $query);
    		$user = mysqli_fetch_assoc($result);

        if(empty($user['name']) || empty($user['surname'])) {
          include 'introAccount.html';
          include 'layoutUser.php';
          
        } else {
          $_SESSION['name'] = $user['name'];
          $_SESSION['surname'] = $user['surname'];
          include 'layoutUser.php';
          
  }
        
			}
		

if (!empty($_POST['name']) and !empty($_POST['surname'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		
		$query = "UPDATE dataUsers SET name='$name', surname = '$surname'
WHERE id = $id";
		mysqli_query($link, $query);
    
		
	} 

  if (!empty($_POST['title'])) {
      $title = $_POST['title'];
    
      $query = "UPDATE dataUsers SET title='$title' WHERE id = $id";          		
      $link = mysqli_connect($host, $user, $pass, $name);
      
      mysqli_query($link, $query);
                    
                		
      }

?>
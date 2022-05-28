<?php 
session_start();
$id = $_SESSION['id'];

$host = 'sbasta4e.beget.tech'; // имя хоста
$user = 'sbasta4e_1';    // имя пользователя
$pass = 'CHEmpion_123';          // пароль
$name = 'sbasta4e_1'; 

      	

$query = "SELECT * FROM messages WHERE id='$id'";
$link = mysqli_connect($host, $user, $pass, $name);
    
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

echo $id;
echo "<p>Сообщение: $user[message]</p>";

?>
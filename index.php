<?php
session_start();
if($_SESSION['auth']) {
 
  include 'layoutLogged.html';
  include 'layoutUserForIndex.php';
  
 
  
} else {
  include 'layoutLogout.html';
}

?>



 




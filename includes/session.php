<?php
session_start();
if(!isset($_SESSION['login'])){    
    header('location:login.php');
}else{
   $user_id = ($_SESSION['login']['user_id']) ;
}
?>
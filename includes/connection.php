<?php
 $connect = mysqli_connect('localhost', 'root', '', 'students_management');
 if(!$connect){
     die("Not conncet" . "mysqli_error($connect)");
 }
?>

<?php include 'includes/session.php';?>
<?php include 'includes/connection.php'?>
<?php
$id = $_REQUEST['class_delete'];
$query = "DELETE FROM `class` WHERE id = $id";
$result = mysqli_query($connect, $query);
if($result){
    header('location:class-manage.php');
}
?>
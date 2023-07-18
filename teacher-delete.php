<?php include 'includes/session.php';?>
<?php include 'includes/connection.php'?>
<?php
$id = $_REQUEST['delete_id'];
$query ="DELETE FROM `teachers` WHERE id = $id";
$delete_query = mysqli_query($connect, $query);
if($delete_query){
    header('location:teacher-manage.php');
}
?>
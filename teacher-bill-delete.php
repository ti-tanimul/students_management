<?php include 'includes/connection.php'?>
<?php
$id = $_REQUEST['delete_id'];
$query = "DELETE FROM `teachers-salary` WHERE id = $id";
$result = mysqli_query($connect, $query);
if($result){
    header('location:teacher-bill-manage.php');
}
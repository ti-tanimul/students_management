<?php include 'includes/session.php'?>
<?php include 'includes/connection.php'?>
<?php
$id = $_REQUEST['delete_id'];
$query = "DELETE FROM `students` WHERE id = $id";
$result = mysqli_query($connect, $query);
if($result){
    header('location:student-manage.php');
}
?>
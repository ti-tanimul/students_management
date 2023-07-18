<?php include 'includes/connection.php'?>
<?php
$id = $_REQUEST['delete_id'];
$query = "DELETE FROM `students_bill` WHERE id = $id";
$result = mysqli_query($connect, $query);
if($result){
    header('location:student-bill-manage.php');
}
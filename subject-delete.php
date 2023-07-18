<?php include 'includes/session.php';?>
<?php include 'includes/connection.php'?>
<?php
if(isset($_REQUEST['subject_delete'])){
    $id = $_REQUEST['subject_delete'];
    $query = "DELETE FROM `subjects` WHERE id = $id";
    $result = mysqli_query($connect, $query);
    if($result){
        header('location:subject-manage.php');
    }
}
?>
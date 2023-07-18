<?php include 'includes/session.php';?>
<?php include 'includes/connection.php'?>
<?php

if(isset($_REQUEST['submit'])){
    $name = $_REQUEST['dropdown'];
    $hidden_id = $_REQUEST['hidden_id'];
    $query = "UPDATE `class` SET `name`='$name' WHERE id = $hidden_id";
    $result = mysqli_query($connect, $query);
    if($result){
        header('location:class-manage.php');
    }
}

?>
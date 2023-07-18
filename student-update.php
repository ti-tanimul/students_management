<?php include 'includes/session.php';?>
<?php include 'includes/connection.php'?>
<?php
if(isset($_REQUEST['submit'])){
    $roll = $_REQUEST['roll'];
    $name = $_REQUEST['student_name'];
    $class = $_REQUEST['student_class'];
    $phone = $_REQUEST['student_phone'];
    $email = $_REQUEST['student_email'];
    $address = $_REQUEST['student_address'];
    $hidden_id = $_REQUEST['hidden_id'];
    // echo $_REQUEST['hidden_id'];

    $update_query = "UPDATE `students` SET `roll`='$roll',`name`='$name',`class`='$class',`phone`='$phone',`email`='$email',`address`='$address' WHERE id = $hidden_id";
    $final_query = mysqli_query($connect, $update_query);
    if($final_query){
        header('location:student-manage.php?updated');
    }
}

?>
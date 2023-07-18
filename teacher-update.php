<?php include 'includes/session.php';?>
<?php include 'includes/connection.php'?>
<?php
if(isset($_REQUEST['submit'])){
    $roll = $_REQUEST['roll'];
    $name = $_REQUEST['teacher_name'];
    $subject = $_REQUEST['teacher_subject'];
    $phone = $_REQUEST['teacher_phone'];
    $email = $_REQUEST['teacher_email'];
    $address = $_REQUEST['teacher_address'];
    $hidden_id = $_REQUEST['thidden_id'];

    $query = "UPDATE `teachers` SET `t_id`='$roll',`name`='$name',`subject`='$subject',`phone`='$phone',`email`='$email',`address`='$address' WHERE id = $hidden_id";
    $teacher_query = mysqli_query($connect, $query);
    if($teacher_query){
        header('location:teacher-manage.php?updated');
    }
}
?>
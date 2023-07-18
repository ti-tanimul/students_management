<!-- START HEADER-->
<?php include 'includes/session.php';?>
<?php include 'includes/header.php';?>
<!-- END HEADER-->
<!-- START SIDEBAR-->
<?php include 'includes/sidebar.php' ?>
<!-- END SIDEBAR-->
<div class="content-wrapper">
    <!-- START My Code-->
<?php include 'includes/connection.php'?>


<?php
if(isset($_POST['submit'])){
    // $t_id = $_POST['id'];
    $t_roll = $_POST['roll'];
    $t_name = $_POST['teacher_name'];
    $t_subject = $_POST['teacher_subject'];
    $t_phone = $_POST['teacher_phone'];
    $t_email = $_POST['teacher_email'];
    $t_address = $_POST['teacher_address'];

    $query = "INSERT INTO `teachers`(`t_id`, `name`, `subject`, `phone`, `email`, `address`) 
                VALUES ('$t_roll','$t_name', '$t_subject','$t_phone','$t_email','$t_address')";
    $result = mysqli_query($connect, $query);
    if($result){
        echo "Success";
    }else{
        echo "Not Success";
    }
}
/////-------/////
$sql1 = "SELECT * FROM subjects";
$resultfecth = $connect->query($sql1);
if ($resultfecth->num_rows > 0) {
    $users = array();
    while ($row = $resultfecth->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No records found.";
}
///-----/////
$connect->close();
?>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Teacher-Roll</div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="roll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Teacher-Name</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="teacher_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Teacher-Subject</div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="teacher_subject" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                                    <?php endforeach; ?>  
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">phone</div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="teacher_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Email</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="teacher_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Address</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="teacher_address">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-3 col-form-label"></div>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success" name="submit" value="submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- END My Code-->
<?php include 'includes/footer.php'?>
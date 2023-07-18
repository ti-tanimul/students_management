<!-- START HEADER-->
<?php include 'includes/session.php'?>
<?php include 'includes/header.php'?>
<!-- END HEADER-->
<!-- START SIDEBAR-->
<?php include 'includes/sidebar.php' ?>
<!-- END SIDEBAR-->
<div class="content-wrapper">
    <!-- START My Code-->
    <?php include 'includes/connection.php'?>

<?php
if (isset($_POST['submit'])){
    $s_roll = $_POST['roll'];
    $s_name = $_POST['student_name'];
    $s_class = $_POST['student_class'];
    $s_phone = $_POST['student_phone'];
    $s_email = $_POST['student_email'];
    $s_address = $_POST['student_address'];
    
    $query = "INSERT INTO `students`(`roll`, `name`, `class`, `phone`, `email`, `address`) 
            VALUES ('$s_roll','$s_name', '$s_class', '$s_phone','$s_email','$s_address')";
    $result = mysqli_query($connect, $query);
    if($result){
        echo "success";
    }else{
        echo "Not Success";
    }  
}
//////----------//////
$sql1 = "SELECT * FROM class";
$resultfecth = $connect->query($sql1);
if ($resultfecth->num_rows > 0) {
    $users = array();
    while ($row = $resultfecth->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No records found.";
}
$connect->close();
?>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Roll</div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="roll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Name</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="student_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Class</div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="student_class" aria-label="Default select example">
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
                                <input type="number" class="form-control" name="student_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Email</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="student_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Address</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="student_address">
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
    

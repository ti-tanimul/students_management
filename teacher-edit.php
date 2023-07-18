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
if(isset($_REQUEST['edit_id'])){
    $rcve_id = $_REQUEST['edit_id'];
    $query = "SELECT * FROM `teachers` WHERE id = $rcve_id";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)){
?>
<?php
$sql1 = "SELECT * FROM subjects";
$resultfecth = $connect->query($sql1);
if ($resultfecth->num_rows > 0) {
    $users = array();
    while ($roww = $resultfecth->fetch_assoc()) {
        $users[] = $roww;
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
                    <form action="teacher-update.php" method="post">

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Teacher-Roll</div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" value="<?php echo $row['t_id']; ?>"name="roll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Teacher-Name</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="teacher_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Teacher-Subject</div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="teacher_subject" aria-label="Default select example">
                                <option ><?php echo $row['subject']; ?></option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user['id'];?>"<?php echo $user['id']== $row['subject'] ?'selected':'' ?>><?php echo $user['name']; ?></option>
                                    <?php endforeach; ?>  
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">phone</div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" value="<?php echo $row['phone']; ?>" name="teacher_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Email</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="teacher_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Address</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="<?php echo $row['address']; ?>" name="teacher_address">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-3 col-form-label"></div>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success" name="submit" value="Update" />
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-3 col-form-label"></div>
                            <div class="col-md-9">
                                <input type="hidden" class="btn btn-outline-success" name="thidden_id" value="<?php echo $rcve_id; ?>" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- END My Code-->
<?php include 'includes/footer.php'?>

<?php
    }
}
?>
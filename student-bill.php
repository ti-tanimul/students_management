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
if(isset($_POST['submit'])){
    $name = $_POST['id'];
    $bill = $_POST['bill'];
    $note = $_POST['note'];

    $query = "INSERT INTO `students_bill`(`name`, `bill`, `note`) VALUES ('$name','$bill','$note')";
    $result = mysqli_query($connect, $query);
    if($result){
        echo "Success";
        
    }else{
        echo "Not Success";
    }
}
////---------/////////
$sql1 = "SELECT * FROM students";
$resultfecth = $connect->query($sql1);
if ($resultfecth->num_rows > 0) {
    $users = array();
    while ($row = $resultfecth->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No records found.";
}
// $connect->close();
?>
<?php
if(isset($_REQUEST['bill'])){
    $bill = $_REQUEST['bill'];
    $query = "SELECT * FROM `students` WHERE id = $bill";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)){
?>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" value="<?php echo $bill; ?>" name="hidden_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Name</div>
                            <div class="col-md-6">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>"  name="name">
                                    
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Bill</div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="bill">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Note</div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="note" ></textarea>
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
<?php
    }
}
?>
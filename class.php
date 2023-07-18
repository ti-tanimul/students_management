
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
    $dropdown = $_POST['dropdown'];
    $query = "INSERT INTO `class`(`name`) VALUES ('$dropdown')";
    $result = mysqli_query($connect, $query);
    if($result){
        echo "success";
    }else{
        echo "Not Success";
    }
}
?>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">
                    <div class="form-group row">
                            <div class="col-md-3 col-form-label">Name</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="dropdown">
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
    

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
$query = "SELECT teachers.name, `teachers-salary`.bill, `teachers-salary`.note
FROM teachers
INNER JOIN `teachers-salary` ON teachers.id = `teachers-salary`.name";
$result = mysqli_query($connect, $query);
?>
<section>
    <div class="container">    
        <div class="row mt-3 ">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a href="teacher-add-bill.php" class="btn btn-outline-success" >Add Bill</a>
            </div> 
        </div>
    </div>
</section>
<section class="py-5 ">
    <div class="container ">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form >
                    <table class="table">
                        <thead class="thead-primary bg-success">
                            <tr>
                                <th>Name</th>                                                                     
                                <th>Bill</th>                                   
                                <th>Note</th>                                   
                                <th>Action</th>                                   
                                                                    
                            </tr>
                        </thead>
                        <?php
while($row = mysqli_fetch_assoc($result)){
    // $id = $row['id'];
    $name = $row['name'];
    $bill = $row['bill'];
    $note = $row['note'];
?>
                        <tbody class="bg-light shadow">
                            <tr>
                                <td><?php echo $name ?></td>
                                <td><?php echo $bill ?></td>
                                <td><?php echo $note ?></td>
                                <td><a href="teacher-bill-delete.php?delete_id=<?php echo $id ?>" ><i class="fa fa-trash"></i></a></td>
                            </tr>
                        </tbody>
<?php
}
?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- END My Code-->
<?php include 'includes/footer.php'?>
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
$query = "SELECT * FROM class";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
?>
<section class="py-5 ">
        <div class="container ">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <form >
                        <table class="table">
                            <thead class="thead-primary bg-success">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>                                    
                                    <th>Action</th>                                    
                                </tr>
                            </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['name'];
?>
                            <tbody class="bg-light shadow">
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><a href="class-edit.php?class_edit=<?php echo $id ?>">EDIT</a> || <a href="class-delete.php?class_delete=<?php echo $id?>">DELETE</a></td>
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
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

$query = "SELECT * FROM `teachers`";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
?>

<section class="py-5 ">
        <div class="container ">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <form >
                        <table class="table">
                            <thead class="thead-primary bg-success">
                                <tr>
                                    <th>ID</th>
                                    <th>Roll</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                    <th>Bill</th>
                                </tr>
                            </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $roll = $row['t_id'];
    $name = $row['name'];
    $subject = $row['subject'];
    $phone = $row['phone'];
    $email = $row['email'];
    $address = $row['address'];
?>
                            <tbody class="bg-light shadow">
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $roll?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $subject?></td>
                                    <td><?php echo $phone?></td>
                                    <td><?php echo $email?></td>
                                    <td><?php echo $address?></td>
                                    <td><a href="teacher-edit.php?edit_id=<?php echo $id ?>">EDIT</a> || <a href="teacher-delete.php?delete_id=<?php echo $id ?>">DELETE</a></td>
                                    <td><a href="teacher-bill.php?bill=<?php echo $id ?>"; >Add Bill</a></td>
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
<?php include 'includes/session.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/sidebar.php' ?>
<div class="content-wrapper">
<?php include 'includes/connection.php'?>
<?php
if(isset($_POST['submit'])){
    $class = $_POST['student_class'];
    $subject = $_POST['teacher_subject'];
    $sql = "INSERT INTO `class_subjects`(`class_id`, `subjects_id`) VALUES ('$class','$subject')";
    $sqlquery = mysqli_query($connect, $sql);
    if($sqlquery){
        echo "Success";
    }else{
        echo "Not Success";
    }
}
////-----/////
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
///----///
$sql2 = "SELECT * FROM class";
$resultfecth2 = $connect->query($sql2);
if ($resultfecth2->num_rows > 0) {
    $users2 = array();
    while ($row2 = $resultfecth2->fetch_assoc()) {
        $users2[] = $row2;
    }
} else {
    echo "No records found.";
}
// $connect->close();

if(isset($_POST['submit'])){
$selectSub = $_POST['teacher_subject'];
$query = "SELECT name FROM teachers WHERE subject = $selectSub";
$result = mysqli_query($connect, $query);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $teacherName = $row['name'];
        // echo $teacherName;
        echo "<li>$teacherName</li>";
    }
    }else{
        echo "No teachers found for this subject.";
    }
}
////--------//////
// $query = "SELECT * FROM class_subjects";
$query = "SELECT class.name AS c_name, subjects.name, teachers.name AS t_name FROM class_subjects 
JOIN class ON class_subjects.class_id = class.id JOIN subjects ON 
class_subjects.subjects_id = subjects.id JOIN teachers ON subjects.id = teachers.subject";
$queryresult = mysqli_query($connect, $query);
?>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Class</div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="student_class" aria-label="Default select example">
                                    <option selected>Select Class</option>
                                        <?php foreach ($users2 as $user2): ?>
                                            <option value="<?php echo $user2['id']; ?>"><?php echo $user2['name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label"><b>Select-Subject:</b></div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="teacher_subject" aria-label="Default select example">
                                <option selected>Select Subject</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                                    <?php endforeach; ?>      
                                </select>    
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
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 mx-auto ">
                    <form action="" method="" >
                        <table class="table" >
                            <thead class="thead-primary bg-success" >
                                <tr>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>
<?php
while($rou = mysqli_fetch_assoc($queryresult)){
    
    $class = $rou['c_name'];
    $subjects = $rou['name'];
    $teacher = $rou['t_name'];

?>
                            <tbody>
                                <tr>
                                    <td><?php echo $class ?></td>
                                    <td><?php echo $subjects ?></td>
                                    <td><?php echo $teacher ?></td>
                                    
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
    

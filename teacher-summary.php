<?php include 'includes/session.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/sidebar.php' ?>
<div class="content-wrapper">
<?php include 'includes/connection.php'?>
<?php
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
///////--------//////
?>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">
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
        <div class="container">
            <div class="row">
                <h2><b>Teacher Name</b></h2>
            </div>
        </div>
    </section>
<?php
if(isset($_POST['submit'])){
    $selectSub = $_POST['teacher_subject'];
    $query = "SELECT name FROM teachers WHERE subject = $selectSub";
    $result = mysqli_query($connect, $query);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $teacherName = $row['name'];
            // echo "<li>$teacherName</li>";
            echo "<li><b>$teacherName</b></li>";
        }
        }else{
            echo "No teachers found for this subject.";
        }
    }
?>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label"><b>Select-Class:</b></div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="student_class" aria-label="Default select example">
                                <option selected>Select Class</option>
                                    <?php foreach ($users2 as $user2): ?>
                                        <option value="<?php echo $user2['id']; ?>"><?php echo $user2['name']; ?></option>
                                    <?php endforeach; ?>      
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-3 col-form-label"></div>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success" name="submit2" value="submit" />
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <h2><b>Student Name</b></h2>
            </div>
        </div>
    </section>

<?php
if(isset($_POST['submit2'])){
    $selectSub = $_POST['student_class'];
    $query = "SELECT name FROM students WHERE class = $selectSub";
    $result = mysqli_query($connect, $query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $studentName = $row['name'];
            // echo "<li>$studentName</li>";
            echo "<li><b>$studentName</b></li>";
        }
        }else{
            echo "No teachers found for this subject.";
        }
    }
?>
<?php include 'includes/footer.php'?>
    

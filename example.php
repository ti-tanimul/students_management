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
        $subjects = array();
        while ($row = $resultfecth->fetch_assoc()) {
            $subjects[] = $row;
        }
    } else {
        echo "No subjects found.";
    }
    ///----///
    $sql2 = "SELECT * FROM class";
    $resultfecth2 = $connect->query($sql2);
    if ($resultfecth2->num_rows > 0) {
        $classes = array();
        while ($row2 = $resultfecth2->fetch_assoc()) {
            $classes[] = $row2;
        }
    } else {
        echo "No classes found.";
    }
    
    if(isset($_POST['submit'])){
        $selectedSubject = $_POST['teacher_subject'];
        $query = "SELECT name FROM teachers WHERE subject = $selectedSubject";
        $result = mysqli_query($connect, $query);
        if($result->num_rows > 0){
            echo "<h2>Teachers:</h2>";
            echo "<ul>";
            while($row = $result->fetch_assoc()){
                $teacherName = $row['name'];
                echo "<li>$teacherName</li>";
            }
            echo "</ul>";
        }else{
            echo "No teachers found for this subject.";
        }
        
        $selectedClass = $_POST['student_class'];
        $query = "SELECT name FROM students WHERE class_id = $selectedClass";
        $result = mysqli_query($connect, $query);
        if($result->num_rows > 0){
            echo "<h2>Students:</h2>";
            echo "<ul>";
            while($row = $result->fetch_assoc()){
                $studentName = $row['name'];
                echo "<li>$studentName</li>";
            }
            echo "</ul>";
        }else{
            echo "No students found for this class.";
        }
    }
    
    ////--------//////
    $query = "SELECT class.name AS c_name, subjects.name AS subject_name
    FROM class_subjects
    JOIN class ON class_subjects.class_id = class.id
    JOIN subjects ON class_subjects.subjects_id = subjects.id";
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
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label"><b>Select Subject:</b></div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="teacher_subject" aria-label="Default select example">
                                    <option selected>Select Subject</option>
                                    <?php foreach ($subjects as $subject): ?>
                                        <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-3 col-form-label"></div>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success" name="submit" value="Submit" />
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
                    <table class="table">
                        <thead class="thead-primary bg-success">
                            <tr>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($queryresult)): ?>
                                <tr>
                                    <td><?php echo $row['c_name']; ?></td>
                                    <td><?php echo $row['subject_name']; ?></td>
                                    <td></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- END My Code-->
    <?php include 'includes/footer.php'?>

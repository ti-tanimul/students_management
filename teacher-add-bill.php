<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/connection.php';

$sql1 = "SELECT * FROM teachers";
$resultfecth = $connect->query($sql1);
if ($resultfecth->num_rows > 0) {
    $users = array();
    while ($row = $resultfecth->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No records found.";
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $bill = $_POST['bill'];
    $note = $_POST['note'];

    if ($name != 'Open this select menu') { // Check if a valid option is selected
        // Get the ID corresponding to the selected name
        $selectedUser = array_filter($users, function($user) use ($name) {
            return $user['name'] == $name;
        });

        if (!empty($selectedUser)) {
            $selectedUser = array_values($selectedUser);
            $selectedId = $selectedUser[0]['id'];

            $query = "INSERT INTO `teachers-salary`(`name`, `bill`, `note`) VALUES ('$selectedId','$bill','$note')";
            $result = mysqli_query($connect, $query);

            if ($result) {
                echo "Success";
            } else {
                echo "Not Success";
            }
        } else {
            echo "Invalid user selection.";
        }
    } else {
        echo "Please select a valid option for the name field.";
    }
}
?>

<div class="content-wrapper">
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label">Name</div>
                            <div class="col-md-6">
                                <select class="form-select col-md-12 form-control" name="name" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user['name']; ?>"><?php echo $user['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                                <textarea class="form-control" name="note"></textarea>
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
</div>

<?php include 'includes/footer.php'; ?>

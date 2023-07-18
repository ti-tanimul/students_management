<?php
session_start();
?>
<?php include 'includes/connection.php'?>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password =md5($_POST['password']);

    if(!empty($email) && !empty($password)){
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $connect->query($query);
        $sql = mysqli_fetch_assoc($result);
        if($result->num_rows > 0){
            $arr_session = array('user_id'=> $user_info['id'], 'status'=>true);
            $_SESSION['login'] = $arr_session;
            header('location:index.php');
        }else{
            echo "not found";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="card col-md-6 mx-auto shadow-lg">
            <!-- <div class=" card-header">Login</div> -->
            <div class=" card-body" >
                <form action="" method="POST" style="box-shadow: 1px;">                    
                    <div class="mb-3">
                        <label class="form-label" >Email</label>
                        <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['submit'])){echo $email;} ?>" >
                        <!-- <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>" .$email."</span>"; } ?> -->
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                                               
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-success" name="submit">Login</button>
                    </div>
                    
                </form>
                <h6>Create Account || <a href="registration.php">Register</a></h6>
            </div>
            
            </div>
        </div>
    </div>
</section>
</body>
</html>


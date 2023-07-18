<?php include 'includes/connection.php'?>
<?php
    $empty_name = $empty_mobile = $empty_email = $empty_password = '';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password =md5($_POST['password']) ;
    // $md5pass = md5($password);

    if(empty($name)){
        $empty_name = 'fill up the field';
    }
    if(empty($mobile)){
        $empty_mobile = 'fill up the field';
    }
    if(empty($email)){
        $empty_email = 'fill up the field';
    }
    if(empty($password)){
        $empty_password = 'fill up the field';
    }

    if(!empty($name) && !empty($mobile) && !empty($email) && !empty($password)){
        $query = "INSERT INTO `users`(`name`, `mobile`, `email`, `password`) VALUES ('$name','$mobile','$email','$password')";
        $result = mysqli_query($connect, $query);
        if($result){
            header('location:login.php');
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
                        <label class="form-label" >Name</label>
                        <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['submit'])){echo $name;} ?>" >
                        <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>" .$empty_name."</span>"; } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Mobile</label>
                        <input type="number" class="form-control" name="mobile" value="<?php if(isset($_POST['submit'])){echo $mobile;} ?>">
                        <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>" .$empty_mobile."</span>"; } ?>                      
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Email</label>
                        <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['submit'])){echo $email;} ?>">  
                        <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>" .$empty_email."</span>"; } ?>                     
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>" .$empty_password."</span>"; } ?>                        
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-outline-success" name="submit">Submit</button>
                    </div>
                    
                </form>
                <h6>Have Account || <a href="login.php">Login</a></h6>
            </div>
            
            </div>
        </div>
    </div>
</section>
</body>
</html>
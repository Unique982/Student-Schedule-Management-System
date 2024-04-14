<?php 
    session_start();
include './database/config.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // admin
    $sql = "SELECT * FROM admin WHERE username = '$username'  OR password = '$password'"; 
    $result = mysqli_query($conn,$sql) or die("Query failed");
    
    // student
    $sql1 = "SELECT * FROM student_rec WHERE username = '$username' OR password = '$password'"; 
    $result1 = mysqli_query($conn,$sql1) or die("Query failed");

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
            $_SESSION ['username'] = $row['username'];
            $_SESSION ['role'] ='admin';
            header("location:index.php");
         exit();
        }
        elseif(mysqli_num_rows($result1)>0){
            $row = mysqli_fetch_assoc($result1);
                $_SESSION ['username'] = $row['username'];
                $_SESSION ['role'] ='student';
                header("location:index.php");
             exit();
            }
     
    
    else{
        echo "<script>alert('username and password are not match');</script>";
    }

}


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
 
  <body>            
     <h1 class="head">Student Class Schedule Management System</h1>      
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card mt-5 ">
                <div class="card-header bg-success text-light text-center">
                    <b>Login</b>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn bg-primary w-100">Login</button>
                        </div>
                        <p>Don't have an Account?
                            <a href="register.php">Reg</a>
                        </p>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
include './database/config.php';
if(isset($_POST['reg'])){
$username= mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$course = mysqli_real_escape_string($conn,$_POST['course']);
$class = mysqli_real_escape_string($conn,$_POST['class']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
 $sql = "SELECT * FROM student_rec WHERE username='$username' OR st_email='$email'";
 $result = mysqli_query($conn,$sql) or die("Query failed");
if(mysqli_num_rows($result)>0){
    echo "<script>alert('Student already exits');</script>";
}
else{
    $query = "INSERT INTO student_rec (username, st_email, st_course, st_class,password) VALUES('$username','$email','$course','$class','$password')";
    if(mysqli_query($conn,$query)){
        header("Location:login.php");
        echo "<script>alert('Register successfullyt!');</script>";
    }
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Register Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header bg-success text-light text-center">
                        <b>Register Form</b>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                        <div class="from-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="from-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Course</label>
                          <select name="course" id="course" class="form-control">
                            <option disabled selected>Select Course</option>
                            <?php 
                             include './database/config.php';
                             $sql = "SELECT * FROM course";
                             $result =mysqli_query($conn, $sql);
                             if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
                                }
                             }
                             ?>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="">Class</label>
                          <select name="class" id="class" class="form-control">
                            <option disabled selected>Select Class</option>
                            <?php 
                             include './database/config.php';
                             $sql = "SELECT * FROM class";
                             $result = mysqli_query($conn,$sql) or die("query failed");
                             if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_array($result)){
                               echo "<option value='{$row['id']}'>{$row['class_code']}</option>";
                                }
                             }
                            ?>
                          </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                       <div class="form-group">
                        <button type="submit" name="reg" class="btn  bg-primary text-light ">Register</button>
                       </div>
                       <p>Already have account? <a href="login.php">Login</a></p>
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
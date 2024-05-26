<?php
session_start();

include './database/config.php';
if(!isset($_SESSION['username'])){
 header("Location:login.php");
}

if(isset($_POST['add'])){
    $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
    $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);
    // select query 
    $query = "SELECT * From course WHERE course_code='$course_code' OR course_name='$course_name'";
    $result = mysqli_query($conn,$query) or die("Query failed");
    if(mysqli_num_rows($result)>0){
        echo " room is already exit";
       }
    else{
        // insert query 
        $sql = "INSERT INTO `course` (course_code, course_name) VALUES('$course_code', '$course_name')";
        if(mysqli_query($conn,$sql)){
            header("location:course.php");
            echo "course add successfully";
        }
        else{
            echo "Failed";
        }
    }
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
      <div class="row">
       <div class="col-md-5 mx-auto">
        <div class="card  bg-light">
          <div class="card-header bg-secondary text-light text-center">
            <b>Add Course</b>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-group">
              <label>Course Code</label>
            <input type="text" name="course_code" class="form-control">
              </div>
              <div class="form-group">
              <label>Course</label>
            <input type="text" name="course_name" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" name="add" class="btn btn-outline-warning text-dark">ADD</button>

              </div>
            </form>
          </div>
        </div>
       </div>
      </div>
     </div>
</html>

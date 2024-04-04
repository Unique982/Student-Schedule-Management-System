<?php
include './database/config.php';
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
      <h1>Course</h1>
      <form action="" method="POST">
      <div class="input-box">
            <label>Course Code</label>
            <input type="text" name="course_code">
        </div>
        <div class="input-box">
            <label>Course</label>
            <input type="text" name="course_name">
        </div>
        <input type="submit" name="add" value="ADD Course">
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
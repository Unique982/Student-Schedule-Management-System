<?php 
include './database/config.php';
 if(isset($_POST['add'])){
    $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
    $sql = "SELECT * From add_subject WHERE subject_code='$subject_code' OR subject_name='$subject_name'";
    $result = mysqli_query($conn, $sql) or die("Query failed");
    if(mysqli_num_rows($result)>0){
       echo "subject is already added to database";

    }
    else{
        $sql1="insert into add_subject(subject_code,subject_name) values('$subject_code','$subject_name')";
        if(mysqli_query($conn, $sql1)){
            header("Location:course.php");
            echo "Subject is added successfully";
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
</head>
<body>
    <h1>Subject Add</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-box">
            <label for="">Course Code:</label>
            <input type="number" name="subject_code">
        </div>
        <div class="input-box">
            <label for="">Course Name:</label>
            <input type="text" name="subject_name">
        </div>
 <input type="submit" name="add" value="Add">
    </form>
    
</body>
</html>
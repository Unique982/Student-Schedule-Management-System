<?php 
include './database/config.php';
 if(isset($_POST['add'])){
    $id = $_POST['id'];
    $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
    $sqli = "UPDATE add_subject SET subject_code='$subject_code', subject_name='$subject_name' WHERE id='$id'";

     if(mysqli_query($conn,$sqli)){
        header("location:subject.php");
        echo"Update data successfully";
     }
     else{
        echo "Error updating data";
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
    <?php
        $id = $_GET['id'];
      $sql = "SELECT * From add_subject WHERE id = '$id'";
      $result = mysqli_query($conn, $sql) or die("Query failed");
      if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
        
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="input-box">
            <label for="">Course Code:</label>
            <input type="text" name="subject_code" value="<?php echo $row['subject_code'] ?>">
        </div>
        <div class="input-box">
            <label for="">Course Name:</label>
            <input type="text" name="subject_name" value="<?php  echo $row['subject_name'] ?> ">
        </div>
 <input type="submit" name="add" value="Add">
    </form>
    <?php }} ?>
</body>
</html>
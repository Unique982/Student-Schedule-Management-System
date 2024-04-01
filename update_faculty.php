<?php
include './database/config.php';
if(isset($_POST['faculty'])){
    $fid = $_POST['fid'];
 $faculty_name=mysqli_real_escape_string($conn,$_POST['faculty_name']);
 $designation = mysqli_real_escape_string($conn,$_POST['designation']);
 $sql = "UPDATE faculty SET faculty_name='$faculty_name', designation='$designation' WHERE faculty_id = '$fid'";
 if(mysqli_query($conn,$sql)){
    header("location:faculty.php");
    echo "update data successfully! ";
 }
 else{
    echo "Update data failed";
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
    <?php 
    $fid =$_GET['fid'];
     $sqli = "SELECT * FROM faculty WHERE faculty_id='$fid'";
   $resuly = mysqli_query($conn,$sqli) or die("Query Failed");
   if(mysqli_num_rows($resuly)){
    while($row = mysqli_fetch_array($resuly)){
   

    ?>
  <h1>Faculty Update</h1>
      <form action="" Method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fid" value="<?php echo $row['faculty_id'] ?>">
        <div class="input-box">
            <label for="">Faculty Name:</label>
            <input type="text" name="faculty_name" value=<?php echo $row['faculty_name'] ?>>
        </div>
        <div class="input-box">
            <label for="">Designation:</label>
            <input type="text" name="designation" value="<?php echo $row['designation'] ?>">
        </div>
        <input type="submit" name="faculty" value="Update">
      </form>
      <?php  } }?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
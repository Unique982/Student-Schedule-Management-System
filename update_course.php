<?php 
include './database/config.php';
if(isset($_POST['edit'])){
    $coid =$_POST['coid'];
 $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
 $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);
 $sql = "UPDATE course SET course_code='$course_code', course_name='$course_name' WHERE course_id = '$coid'";
 if(mysqli_query($conn,$sql)){
    header("location:course.php");
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
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    $coid =$_GET['coid'];
     $sqli = "SELECT * FROM course WHERE course_id='$coid'";
   $resuly = mysqli_query($conn,$sqli) or die("Query Failed");
   if(mysqli_num_rows($resuly)){
    while($row = mysqli_fetch_array($resuly)){
    ?>
      <h1>Course</h1>
      <form action="" method="POST">
        <input type="hidden" name="coid" value="<?php echo $row['course_id'] ?>">
      <div class="input-box">
            <label>Course Code</label>
            <input type="text" name="course_code" value="<?php echo $row['course_code'] ?>">
        </div>
        <div class="input-box">
            <label>Course</label>
            <input type="text" name="course_name" value="<?php echo $row['course_name']?>">
        </div>
        <input type="submit" name="edit" value="ADD Course">
      </form>
      <?php }}  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
include './database/config.php';
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");
}
if(isset($_POST['edit'])){
    $coid =$_POST['coid'];
 $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
 $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);
 $sql = "UPDATE course SET course_code='$course_code', course_name='$course_name' WHERE course_id = '$coid'";
 if(mysqli_query($conn,$sql)){
  echo "update data successfully! ";
    header("location:course.php");
   exit();
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
  <div class="container">
      <div class="row">
   
        <div class="col-md-8 mx-auto">
          <div class="card bg-light">
            <div class="card-header bg-success text-dark text-center">
              <b>Update Course</b>
            </div>
               <?php 
    $coid =$_GET['coid'];
     $sqli = "SELECT * FROM course WHERE course_id='$coid'";
   $resuly = mysqli_query($conn,$sqli) or die("Query Failed");
   if(mysqli_num_rows($resuly)>0){
    while($row = mysqli_fetch_array($resuly)){
    ?>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="coid" value="<?php echo $row['course_id'] ?>">
                <div class="form-group">
                <label>Course Code</label>
            <input type="text" name="course_code" value="<?php echo $row['course_code'] ?>" class="form-control">
                </div>
                <div class="form-group">
                <label>Course</label>
            <input type="text" name="course_name" value="<?php echo $row['course_name']?>" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="edit" class="btn btn-primary">Update</button>
                </div>
              </form>
              
            </div>
            <?php  } }?>
               
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

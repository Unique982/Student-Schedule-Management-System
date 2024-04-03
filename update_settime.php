<?php 
include './database/config.php';

if(isset($_POST['edit'])){
$tid = $_POST['tid'];
  $start_time = mysqli_real_escape_string($conn,$_POST['start_time']);
  $end_time = mysqli_real_escape_string($conn,$_POST['end_time']);
  $query = "UPDATE `time` SET start_time = '$start_time', end_time = '$end_time' WHERE id = '$tid'";
 $result = mysqli_query($conn,$query);
 if($result){
    header("Location:time.php");
    echo "<script>alert('update successfully')</script>";
  }  
  else{
    echo "Failed";
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
    $tid = $_GET['tid'];
    $sql = "SELECT * FROM `time` WHERE id ='$tid'";
    $result = mysqli_query($conn,$sql) or die("Query Failed");
    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
    
    ?>
      <h1>Set Time</h1>
      <form action="" method="POST">
        <input type="hidden" name="tid" value="<?php echo $row['id'] ?>">
 <div class="input-box">
    <label>Start Time:</label>
    <input type="text" name="start_time" value="<?php echo $row['start_time'] ?>">
 </div>
 <div class="input-box">
    <label>End Time:</label>
    <input type="text" name="end_time" value="<?php echo $row['end_time'] ?>">
 </div>
 <input type="submit" name="edit" value="Update">

      </form>
      <?php } } ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
 include './database/config.php';
 if(isset($_POST['edit'])){
    $cid = $_POST['cid'];
    $room_code = mysqli_real_escape_string($conn,$_POST['room_code']);
    
 $sql = "UPDATE class SET class_code='$room_code' WHERE id='$cid'";
 if(mysqli_query($conn,$sql)){
    header("location:room.php");
    echo "update data successfully";
 }
 else{
    echo "update data failed";
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Room</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $cid= $_GET['cid'];
    $sql1= "SELECT * FROM class WHERE id='$cid'";
    $result = mysqli_query($conn, $sql1) or die("Query");
    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_array($result)){
        
    
    ?>
    <h1>Room Update</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="cid" value="<?php echo $row['id'] ?>">
        <div class="input-box">
            <label>Room Code:</label>
            <input type="text" name="room_code" value="<?php echo $row['class_code'] ?>">
        </div>
        <input type="submit" name="edit" value="add">
      </form>
      <?php } } ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
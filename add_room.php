<?php 
include './database/config.php';
if(isset($_POST['room'])){
    $room_code = mysqli_real_escape_string($conn,$_POST['room_code']);
    // $room_name =mysqli_real_escape_string($conn,$_POST['room_name']);
    $sql = "SELECT * FROM `class`  WHERE class_code = '$room_code'";
    $result = mysqli_query($conn,$sql) or die("Query failed");
   if(mysqli_num_rows($result)){
    echo " room is already exit";
   }
   else{
    $sql1="insert into class(class_code) values('$room_code')";
    if(mysqli_query($conn, $sql1)){
        header("Location:room.php");
        echo "Room  is added successfully";
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
      <h1>Add Roo/class</h1>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-box">
            <label>Room Code:</label>
            <input type="text" name="room_code">
        </div>
        <!-- <div class="input-box">
            <label>Room Name:</label>
            <input type="text" name="room_name">
        </div> -->
        <input type="submit" name="room" value="add">
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
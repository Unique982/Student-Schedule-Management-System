<?PHP 
 include './database/config.php';
 $sql = " SELECT * FROM faculty";
 $result = mysqli_query($conn,$sql) or die("Query Failed");
$count = mysqli_num_rows($result);
if($count >0){

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
      
  <table class="table">
  <a href="add_faculty.php">  <button type="button" class="btn btn-primary" >Add</button></a>
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Faculty</th>
      <th scope="col">Desgination</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    while($row= mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td><?php echo $row['faculty_id'] ?></td>
      <td><?php echo $row['faculty_name'] ?></td>
      <td><?php echo $row['designation'] ?></td>
      <td>
       <a href="update_faculty.php?fid=<?php echo $row['faculty_id'] ?>"> <button type="button" class="btn btn-success">Edit</button></a>
        <a href="delete_faculty.php?fid=<?php echo $row['faculty_id'] ?>><button type="button" class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
  
  </tbody>
  <?php } } ?>
</table>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
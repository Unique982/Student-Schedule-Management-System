<?php 
include './database/config.php';
$id = $_GET['schid'];
$sql = "DELETE FROM schedule WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:schedule.php");
    echo "delete data successfully";
}
else{
    echo "failed to delete data";
}


?>
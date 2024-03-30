<?php 
include './database/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM add_subject WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:subject.php");
    echo "delete data successfully";
}
else{
    echo "failed to delete data";
}


?>
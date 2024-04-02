<?php 
include './database/config.php';
$cid = $_GET['cid'];
$sql = "DELETE FROM class WHERE id='$cid'";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location:room.php");
    echo "<script>alert('Data is deleted successfully!');</script>";
}
else{
    echo "failed";
}

?>
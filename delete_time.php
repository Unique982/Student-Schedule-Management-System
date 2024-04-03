
<?php 
include './database/config.php';
$tid = $_GET['tid'];
$sql = "DELETE FROM time WHERE id='$tid'";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:time.php");
    echo "delete data successfully";
}
else{
    echo "failed";
}


?>
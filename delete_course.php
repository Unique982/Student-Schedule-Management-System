<?php 
include './database/config.php';
$coid = $_GET['coid'];
$sql = "DELETE FROM course WHERE course_id = $coid";
$result = mysqli_query($conn,$sql);
if(($result)){
    header("location:course.php");
    echo "course deleted successfully";
}
else{
    echo "delete failed";
}
?>
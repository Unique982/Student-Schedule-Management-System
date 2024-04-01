<?php

include './database/config.php';
$fid =$_GET['fid'];
$sql ="DELETE  FROM faculty WHERE faculty_id ='$fid'";
$result = mysqli_query($conn,$sql);
if($result){
   header("location:faculty.php");
   echo "data deleted successfully";
}
else{
   echo "failed";
}




?>
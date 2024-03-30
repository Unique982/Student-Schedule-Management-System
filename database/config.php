<?php 
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "studentclassmanagement";
$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn){
    die("Could not connect: " . mysqli_connect_error());

}
// else{
//     echo "Connecting to successfully";
// }




?>
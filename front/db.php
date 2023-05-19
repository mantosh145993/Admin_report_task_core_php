<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "admin_task";

$conn =mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connection not correct" . mysqli_connect_error());
}
// echo "Connection correct";
    

?>
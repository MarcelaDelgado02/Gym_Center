<?php

$server = "localhost:3306";
$user= "root";
$pass= "";
$database = "bd_gymcenter";

$conn = mysqli_connect($server,$user,$pass);
mysqli_select_db($conn,$database);
?>
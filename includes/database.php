<?php 

$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbHName="jobstep";

Global $conn;
$conn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbHName);
if(!$conn){
    die("Database connection failed!");
}

?>
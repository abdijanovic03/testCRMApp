<?php

session_start();
require 'functions.php';
require 'database.php';

$sb = $_POST['sb'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];

$sql = "SELECT id from login where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

   mysqli_stmt_bind_param($stmt, "s", $sb);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);


   $sql = "INSERT INTO login (id,username,password,type) values (?,?,?,?)";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
   } else {

      mysqli_stmt_bind_param($stmt, "ssss", $sb, $username, $password, $type);
      mysqli_stmt_execute($stmt);

      $zadnji_id = $stmt->insert_id;
      $log = "User " . $_SESSION['user'] . " je dodao novog usera " . $zadnji_id . "";
      addToLogs($log);

      header("Location: ../users.php?success");
   }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

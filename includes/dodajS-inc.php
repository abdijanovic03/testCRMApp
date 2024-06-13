<?php

session_start();
require 'functions.php';
require 'database.php';

$sb = $_POST['sb'];
$naziv_škole = $_POST['naziv_škole'];
$tip_obrazovanja = $_POST['tip_obrazovanja'];


$sql = "SELECT id from škola where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

   mysqli_stmt_bind_param($stmt, "s", $sb);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);


   $sql = "INSERT INTO škola (naziv_škole,tip_obrazovanja) values (?,?)";
   $stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)) {
   } else {

      mysqli_stmt_bind_param($stmt, "ss", $naziv_škole, $tip_obrazovanja);
      mysqli_stmt_execute($stmt);
      $zadnji_id = $stmt->insert_id;
      $log = "User " . $_SESSION['user'] . " je dodao novu skolu " . $zadnji_id . "";
      addToLogs($log);
      header("Location: ../skole.php?success");
   }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

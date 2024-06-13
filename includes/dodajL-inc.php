<?php
session_start();
require 'functions.php';
require 'database.php';

$sb;
$naziv_linka = $_POST['naziv_linka'];


$sql = "SELECT id from linkovi where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

  mysqli_stmt_bind_param($stmt, "s", $sb);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);


  $sql = "INSERT INTO linkovi (naziv_linka) values (?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
  } else {

    mysqli_stmt_bind_param($stmt, "s", $naziv_linka);
    mysqli_stmt_execute($stmt);
    $zadnji_id = $stmt->insert_id;
    $log = "User " . $_SESSION['user'] . " je dodao novi link " . $zadnji_id . "";
    addToLogs($log);
    header("Location: ../linkovi.php?success");
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
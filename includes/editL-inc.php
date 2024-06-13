<?php

session_start();

require 'database.php';
require 'functions.php';

$sb = $_POST['sb'];
$naziv_linka = $_POST['naziv_linka'];

$sql = "SELECT id from linkovi where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

  mysqli_stmt_bind_param($stmt, "s", $sb);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $i = mysqli_stmt_num_rows($stmt);
  if ($i > 0) {
    $sql = "UPDATE linkovi set naziv_linka='$naziv_linka' where id='$sb'";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
      $log = "User " . $_SESSION['user'] . " je napravio izmjenu kod linka " . $zadnji_id . "";
      addToLogs($log);
      header("Location: ../linkovi.php?success");
    } else {

      header("Location: ../linkovi.php?error");
    }
  } else {

    $sql = "INSERT INTO linkovi (id,naziv_linka) values (?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    } else {

      mysqli_stmt_bind_param($stmt, "ss", $sb, $naziv_linka);
      mysqli_stmt_execute($stmt);
      $log = "User " . $_SESSION['user'] . " je napravio izmjenu kod linka " . $sb . "";
      addToLogs($log);
      header("Location: ../linkovi.php?success");
    }
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

<?php
session_start();

require 'database.php';
require 'functions.php';

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
  $i = mysqli_stmt_num_rows($stmt);
  if ($i > 0) {
    $sql = "UPDATE škola set naziv_škole='$naziv_škole',tip_obrazovanja='$tip_obrazovanja' where id='$sb'";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
      $log = "User " . $_SESSION['user'] . " je napravio izmjenu kod skole " . $sb . "";
      addToLogs($log);
      header("Location: ../skole.php?success");
    } else {

      header("Location: ../skole.php?error");
    }
  } else {

    $sql = "INSERT INTO škola (id,naziv_škole,tip_obrazovanja) values (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    } else {

      mysqli_stmt_bind_param($stmt, "sss", $sb, $naziv_škole, $tip_obrazovanja);
      mysqli_stmt_execute($stmt);
      $log = "User " . $_SESSION['user'] . " je napravio izmjenu kod skole " . $zadnji_id . "";
      addToLogs($log);
      header("Location: ../skole.php?success");
    }
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

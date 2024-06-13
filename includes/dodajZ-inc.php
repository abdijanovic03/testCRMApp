<?php
require 'database.php';

$sb = $_POST['sb'];
$naziv_zvanja = $_POST['naziv_zvanja'];

$sql = "SELECT id from zvanje where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

  mysqli_stmt_bind_param($stmt, "s", $sb);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);


  $sql = "INSERT INTO zvanje (naziv_zvanja) values (?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
  } else {

    mysqli_stmt_bind_param($stmt, "s", $naziv_zvanja);
    mysqli_stmt_execute($stmt);
    header("Location: ../zvanja.php?success");
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);



<?php
session_start();
require 'database.php';
require 'functions.php';

$sb = $_POST['sb'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$brTel = $_POST['brTel'];
$email = $_POST['email'];
$adresa = $_POST['adresa'];
$posBr = $_POST['posBr'];
$grad = $_POST['grad'];
$drzava = $_POST['drzava'];
$skole = $_POST['skola'];
$sqlReset = "DELETE from kandidat_skola WHERE id_kandidat='$sb';";
$query_run1 = mysqli_query($conn, $sqlReset);
$sql = "SELECT id from kandidat where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

  mysqli_stmt_bind_param($stmt, "s", $sb);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $i = mysqli_stmt_num_rows($stmt);
  if ($i > 0) {
    $sql = "UPDATE kandidat set ime='$ime',prezime='$prezime',broj_telefona='$brTel',email='$email',adresa='$adresa',poštanski_broj='$posBr',grad='$grad',država='$drzava' where id='$sb'";
    $query_run = mysqli_query($conn, $sql);
    $sqlskole = "INSERT INTO kandidat_skola(id_kandidat,id_skola) values (?,?)";
    $stmtskole = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmtskole, $sqlskole);

    foreach ($skole as $skola) {


      mysqli_stmt_bind_param($stmtskole, "ss", $sb, $skola);
      mysqli_stmt_execute($stmtskole);
    }
    if ($query_run) {
      $log = "User " . $_SESSION['user'] . " je napravio izmjenu kod kandidata " . $zadnji_id . "";
      addToLogs($log);
      header("Location: ../kandidati.php?success");
    } else {

      header("Location: ../kandidati.php?error");
    }
  } else {

    $sql = "INSERT INTO kandidat (id,ime,prezime,broj_telefona,email,adresa,poštanski_broj,grad,država) values (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    } else {

      mysqli_stmt_bind_param($stmt, "sssssssss", $sb, $ime, $prezime, $brTel, $email, $adresa, $posBr, $grad, $drzava);
      mysqli_stmt_execute($stmt);
      $zadnji_id = $stmt->insert_id;
      $sqlskole = "INSERT INTO kandidat_skola(id_kandidat,id_skola) values (?,?) ";
      $stmtskole = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmtskole, $sqlskole);

      foreach ($skole as $skola) {


        mysqli_stmt_bind_param($stmtskole, "ss", $zadnji_id, $skola);
        mysqli_stmt_execute($stmtskole);
      }
      $log = "User " . $_SESSION['user'] . " je napravio izmjenu kod kandidata " . $zadnji_id . "";
      addToLogs($log);
      header("Location: ../kandidati.php?success");
    }
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
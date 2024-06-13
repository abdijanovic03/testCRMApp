

<?php

require 'database.php';
$link = $_POST['link'];
$sb;
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$brTel = $_POST['brTel'];
$email = $_POST['email'];
$adresa = $_POST['adresa'];
$posBr = $_POST['posBr'];
$grad = $_POST['grad'];
$drzava = $_POST['drzava'];
$skole = $_POST['skola'];

$sql = "SELECT id from kandidat where id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {

  mysqli_stmt_bind_param($stmt, "s", $sb);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);


  $sql = "INSERT INTO kandidat (ime,prezime,broj_telefona,email,adresa,poštanski_broj,grad,država,link) values (?,?,?,?,?,?,?,?,?)";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
  } else {

    mysqli_stmt_bind_param($stmt, "sssssssss", $ime, $prezime, $brTel, $email, $adresa, $posBr, $grad, $drzava, $link);
    mysqli_stmt_execute($stmt);

    $zadnji_id = $stmt->insert_id;
    $sqlskole = "INSERT INTO kandidat_skola(id_kandidat,id_skola) values (?,?)";
    $stmtskole = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmtskole, $sqlskole);

    foreach ($skole as $skola) {


      mysqli_stmt_bind_param($stmtskole, "ss", $zadnji_id, $skola);
      mysqli_stmt_execute($stmtskole);
    }

    header("Location: ../kandidati.php?success");
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
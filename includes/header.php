<?php
require_once 'includes/database.php';
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#7952b3">
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <title>NexusCRM</title>
</head>
<style>
  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_filter,
  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_processing,
  .dataTables_wrapper .dataTables_paginate {
    color: white;
  }
  .dataTables_wrapper .dataTables_length select {
    color: white;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    color: white !important;
  }
</style>

<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header style="margin-bottom: 70px;">
      <center>

        <div class="w-55">
          <a class="nav-link " style="color: white;" aria-current="page" href="index.php">
            <h3 class="float-md-start mb-0"> <img class="rounded" src="includes/logo.jpg" height="48px" width="48px"> NexusCRM</h3>
          </a>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link " style="color: white;" aria-current="page" href="index.php">Home</a>

            <?php
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


            if (strpos($url, 'kandidati.php') !== false) {
            ?>
              <a class="btn btn-secondary " style="color: white;" href="dodajK.php">Dodaj kandidata</a>
            <?php
            } else {
            ?>
              <a class="nav-link " style="color: white;" href="kandidati.php">Kandidati</a>
            <?php
            }
            ?>
            <?php
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


            if (strpos($url, 'skole.php') !== false) {
            ?>
              <a class="btn btn-secondary " style="color: white;" href="dodajS.php">Dodaj školu</a>
            <?php
            } else {
            ?>
              <a class="nav-link" style="color: white;" href="skole.php">Škole</a>
            <?php
            }
            ?>
            <?php
            if ($_SESSION['login'] == "admin") {
              $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


              if (strpos($url, 'users.php') !== false) {
            ?>
                <a class="btn btn-secondary " style="color: white;" href="dodajU.php">Dodaj korisnika</a>
              <?php
              } else {
              ?>
                <a class="nav-link" style="color: white;" href="users.php">Korisnici</a>
              <?php
              }
              ?>
              <?php
              $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
              if (strpos($url, 'linkovi.php') !== false) {
              ?>
                <a class="btn btn-secondary " style="color: white;" href="dodajL.php">Dodaj link</a>
              <?php
              } else {
              ?>
                <a class="nav-link" style="color: white;" href="linkovi.php">Linkovi</a>
              <?php
              } ?>

              <?php
              $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


              if (strpos($url, 'zvanja.php') !== false) {
              ?>
                <a class="btn btn-secondary " style="color: white;" href="dodajZ.php">Dodaj zvanje</a>
              <?php
              } else {
              ?>
                <a class="nav-link " style="color: white;" href="zvanja.php">Zvanja</a>
              <?php
              }
              ?>

            <?php
            }
            ?>

            <?php
            if ($_SESSION['login']) {
            ?>
              <div class="dropdown text-end">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" style="margin-left: 15px;" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="includes/logo.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small bg-white" aria-labelledby="dropdownUser1">
                  <li><a class="dropdown-item" href="dodajK.php">Dodaj kandidata</a></li>
                  <li><a class="dropdown-item" href="dodajS.php">Dodaj školu</a></li>

                  <?php
                  if ($_SESSION['login'] == "admin") {
                  ?>
                    <li><a class="dropdown-item" href="dodajU.php">Dodaj korisnika</a></li>
                    <li><a class="dropdown-item" href="dodajL.php">Dodaj link</a></li>
                    <li><a class="dropdown-item" href="dodajZ.php">Dodaj zvanje</a> </li>
                  <?php
                  }
                  ?>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item " href="end.php">Log out</a></li>
                </ul>
              </div>

            <?php
            }
            ?>
          </nav>
        </div>
      </center>
    </header>
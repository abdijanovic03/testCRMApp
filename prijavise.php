<?php
require_once 'includes/database.php';
$id_linka = $_GET['id'] ?? 1;
?>

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
  label {
    color: black;
  }
</style>
<style>
  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_filter,
  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_processing,
  .dataTables_wrapper .dataTables_paginate {
    color: white;
  }
</style>

<body class="d-flex h-100 text-center text-white bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header style="margin-bottom: 70px;">
      <center>
        <br>
        <h2>Prijavi se</h2>
        <br><br>
        <div class="container w-50">
          <form action="includes/prijaviseK-inc.php" method="post">
            <input type="hidden" name="link" value="<?php echo $id_linka; ?>">
            <div class="form-floating">
              <input type="text" class="form-control" name="ime" id="floatingInputValue">
              <label for="floatingInputValue"> Ime</label>
            </div><br>
            <div class="form-floating">
              <input type="text" class="form-control" name="prezime" id="floatingInputValue">
              <label for="floatingInputValue">Prezime</label>
            </div><br>
            <div class="form-floating">
              <input type="text" class="form-control" name="brTel" id="floatingInputValue">
              <label for="floatingInputValue">Broj telefona</label>
            </div><br>
            <div class="form-floating">
              <input type="email" class="form-control" name="email" id="floatingInputValue">
              <label for="floatingInputValue">E-mail</label>
            </div><br>
            <div class="form-floating">
              <input type="text" class="form-control" name="adresa" id="floatingInputValue">
              <label for="floatingInputValue">Adresa</label>
            </div><br>
            <div class="form-floating">
              <input type="text" class="form-control" name="posBr" id="floatingInputValue">
              <label for="floatingInputValue">Poštansi broj</label>
            </div><br>
            <div class="form-floating">
              <input type="text" class="form-control" name="grad" id="floatingInputValue">
              <label for="floatingInputValue">Grad</label>
            </div><br>
            <div class="form-floating">
              <input type="text" class="form-control" name="drzava" id="floatingInputValue">
              <label for="floatingInputValue">Država</label>
            </div><br>
            <div class="form-floating">
              <select name="skola[]" class="form-select" style="height: auto;" multiple="multiple" aria-label="Default select example" id="floatingInputValue" placeholder="Odaberi školu">
                <?php
                $lista = mysqli_query($conn, "select * from škola");
                while ($škole = mysqli_fetch_array($lista)) {
                ?>
                  <option value="<?php echo $škole['id']; ?>"><?php echo $škole['naziv_škole']; ?></option>
                <?php
                }
                ?>
              </select>
              <label for="floatingInputValue">Škola</label>
            </div><br>
            <button type="submit" style="float: left;" name="submit" class="btn btn-primary">Spremi</button>
          </form>
        </div>
  </div>
  </center>
  </header>
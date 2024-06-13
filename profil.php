<?php
require_once 'includes/header.php';

?>
<style>
  label {
    color: black;
  }
</style>
<?php

$id = $_GET['id'];
$lista = mysqli_query($conn, "select * from kandidat where id=$id");
$kandidat = mysqli_fetch_array($lista);

?><center> <span>
    <h2>Profil<div class="dropdown">
        <a class="btn btn-primary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          Uređuj
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li> <a class="dropdown-item" href="includes/kand.php?id=<?php echo $kandidat['id']; ?>">Izbriši</a> </li>
          <li> <a class="dropdown-item" href="edit.php?id=<?php echo $kandidat['id']; ?>">Uredi</a> </td>
          </li>

        </ul>

      </div>
    </h2>
  </span> </center>
<br><br>

<form action="includes/edit-inc.php" method="post" style="margin-left: 5%; ">
  <div class="container" style="width: 35%; margin-left: 5%; text-align: left; position: absolute;">
    <div class="form-floating">
      <p type="number" class="form-control" name="sb" id="floatingInputValue"><?php echo $id ?></p>
      <label for="floatingInputValue">Serijski broj</label>
    </div> <br>
    <div class="form-floating">
      <p type="text" class="form-control" name="ime" id="floatingInputValue" value=""><?php echo $kandidat['ime'] ?></p>
      <label for="floatingInputValue">Ime</label>
    </div><br>
    <div class="form-floating">
      <p type="text" class="form-control" name="prezime" id="floatingInputValue" value=""><?php echo $kandidat['prezime'] ?></p>
      <label for="floatingInputValue">Prezime</label>
    </div><br>
    <div class="form-floating">
      <p type="text" class="form-control" name="brTel" id="floatingInputValue" value=""><?php echo $kandidat['broj_telefona'] ?></p>
      <label for="floatingInputValue">Broj telefona</label>
    </div><br>
    <div class="form-floating">
      <p type="email" class="form-control" name="email" id="floatingInputValue" value=""><?php echo $kandidat['email'] ?></p>
      <label for="floatingInputValue">E-mail</label>
    </div><br>

    <div class="form-floating">
      <p type="text" class="form-control" name="link" id="floatingInputValue" value=""><?php echo $kandidat['link'] ?></p>
      <label for="floatingInputValue">Link prijave</label>
    </div><br>
  </div>
  <div class="container" style="width: 35%; margin-left: 45%; text-align: left; position: relative;">
    <div class="form-floating">
      <p type="text" class="form-control" name="adresa" id="floatingInputValue" value=""><?php echo $kandidat['adresa'] ?></p>
      <label for="floatingInputValue">Adresa</label>
    </div><br>
    <div class="form-floating">
      <p type="text" class="form-control" name="posBr" id="floatingInputValue" value=""><?php echo $kandidat['poštanski_broj'] ?></p>
      <label for="floatingInputValue">Poštansi broj</label>
    </div><br>
    <div class="form-floating">
      <p type="text" class="form-control" name="grad" id="floatingInputValue" value=""><?php echo $kandidat['grad'] ?></p>
      <label for="floatingInputValue">Grad</label>
    </div><br>
    <div class="form-floating">
      <p type="text" class="form-control" name="drzava" id="floatingInputValue" value=""><?php echo $kandidat['država'] ?></p>
      <label for="floatingInputValue">Država</label>
    </div><br>
    <div class="form-floating">

      <?php
      $lista = mysqli_query($conn, "SELECT b.naziv_škole as sk FROM škola b join kandidat_skola c on b.id=c.id_skola join kandidat a on a.id=c.id_kandidat WHERE a.id='$id';");
      while ($škole = mysqli_fetch_array($lista)) {
      ?>
        <p type="number" class="form-control" name="skola" id="floatingInputValue" value=""><?php echo $škole['sk'] ?></p>
        <label for="floatingInputValue">Škole</label><br>
      <?php
      }
      ?>
    </div><br>
  </div>
</form>
<br>
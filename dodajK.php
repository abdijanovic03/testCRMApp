<?php 

require_once 'includes/header.php';

?>

<style>
  label{
    color: black;
  }
</style>
<h2>Dodaj kandidata</h2> 
<br><br>
 <div class="container w-50"  >
  <form action="includes/dodajK-inc.php" method="post">

<div class="form-floating">
  <input type="text" class="form-control" name="ime" id="floatingInputValue"  >
  <label for="floatingInputValue" > Ime</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="prezime" id="floatingInputValue" >
  <label for="floatingInputValue">Prezime</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="brTel" id="floatingInputValue"  >
  <label for="floatingInputValue">Broj telefona</label>
</div><br>
<div class="form-floating">
  <input type="email" class="form-control" name="email" id="floatingInputValue"  >
  <label for="floatingInputValue">E-mail</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="adresa" id="floatingInputValue"  >
  <label for="floatingInputValue">Adresa</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="posBr" id="floatingInputValue"  >
  <label for="floatingInputValue">Poštansi broj</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="grad"  id="floatingInputValue"  >
  <label for="floatingInputValue" >Grad</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="drzava" id="floatingInputValue"  >
  <label for="floatingInputValue">Država</label>
</div><br>
<div class="form-floating" >
<select name="skola[]" class="form-select" style="height: auto;" multiple="multiple" aria-label="Default select example" id="floatingInputValue" placeholder="Odaberi školu">
  
  <?php 
  $lista=mysqli_query($conn,"select * from škola");
  while($škole=mysqli_fetch_array($lista)){
  ?>
  <option  value="<?php echo $škole['id']; ?>"><?php echo $škole['naziv_škole']; ?></option>
  <?php

    
}
?>
</select>
<label for="floatingInputValue">Škola</label>
</div><br>
<button type="submit" style="float: left;" name="submit" class="btn btn-primary">Spremi</button>
</form>
</div>
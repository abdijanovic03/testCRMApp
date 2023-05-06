
<?php 
require_once 'includes/header.php';

?>
 <style>
  label{
    color: black;
  }
</style>
<?php

  $id=$_GET['id'];
  $lista=mysqli_query($conn,"select * from kandidat where id=$id");
  $kandidat=mysqli_fetch_array($lista);
   
?>
<br><br>
 <div class="container w-50"  >
  <form action="includes/edit-inc.php" method="post">
<div class="form-floating">
  <input type="number" class="form-control" name="sb" id="floatingInputValue" value="<?php echo $id ?>">
  <label for="floatingInputValue">Serijski broj</label>
</div> <br>
<div class="form-floating">
  <input type="text" class="form-control" name="ime" id="floatingInputValue"  value="<?php echo $kandidat['ime'] ?>">
  <label for="floatingInputValue">Ime</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="prezime" id="floatingInputValue"  value="<?php echo $kandidat['prezime'] ?>">
  <label for="floatingInputValue">Prezime</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="brTel" id="floatingInputValue"  value="<?php echo $kandidat['broj_telefona'] ?>">
  <label for="floatingInputValue">Broj telefona</label>
</div><br>
<div class="form-floating">
  <input type="email" class="form-control" name="email" id="floatingInputValue"  value="<?php echo $kandidat['email'] ?>">
  <label for="floatingInputValue">E-mail</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="adresa" id="floatingInputValue"  value="<?php echo $kandidat['adresa'] ?>">
  <label for="floatingInputValue">Adresa</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="posBr" id="floatingInputValue"  value="<?php echo $kandidat['poštanski_broj'] ?>">
  <label for="floatingInputValue">Poštansi broj</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="grad"  id="floatingInputValue"  value="<?php echo $kandidat['grad'] ?>">
  <label for="floatingInputValue" >Grad</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="drzava" id="floatingInputValue"  value="<?php echo $kandidat['država'] ?>">
  <label for="floatingInputValue">Država</label>
</div><br>
<div class="form-floating" >
<select name="skola[]" class="form-select" style="height: auto;" multiple="multiple" aria-label="Default select example" id="floatingInputValue" placeholder="Odaberi školu">
  
  <?php 
  
  $listaS=mysqli_query($conn,"SELECT c.naziv_škole as nsS,c.id as idS from škola c join kandidat_skola b on b.id_skola=c.id join kandidat a on b.id_kandidat=a.id WHERE a.id='$id'");
  $skS= array();
  while($školeS=mysqli_fetch_array($listaS)){
  ?>
  <option selected value="<?php echo $školeS['idS'];
                               
                                  $skS[]=$školeS['idS'];
                                 
                                ?>"><?php echo $školeS['nsS']; ?></option>
  <?php

    
}
?>

 <?php 
 
  $lista=mysqli_query($conn,"SELECT  * from škola where id not in (". implode(',', array_map('intval', $skS)) .  ")");
  while($škole=mysqli_fetch_array($lista)){
   

    
  ?>
  <option  value="<?php echo $škole['id']; ?>"><?php echo $škole['naziv_škole']; ?></option>
  <?php
 
}
?>

</select>
<label for="floatingInputValue">Škola</label>
</div><br>

<button type="submit" style="float: left;" name="submit" class="btn btn-primary">Save</button>
</form>
</div>

<?php 
require_once 'includes/header.php';

?>

<?php

  
?>
<style>
  label{
    color: black;
  }
</style>
<br><br>
 <div class="container w-50"  >
 <form action="includes/dodajZ-inc.php" method="post">

 <div class="form-floating">
  <input type="number" class="form-control" name="sb" id="floatingInputValue">
  <label for="floatingInputValue">Serijski broj</label>
</div> <br>
<div class="form-floating">
  <input type="text" class="form-control" name="naziv_zvanja" id="floatingInputValue"  >
  <label for="floatingInputValue">Naziv zvanja</label>
</div><br>

 
<button type="submit" style="float: left;" name="submit" class="btn btn-primary">Save</button>

</form>
</div>
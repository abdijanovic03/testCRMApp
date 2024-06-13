<?php
require_once 'includes/header.php';
?>
<?php

$id = $_GET['id'];
$lista = mysqli_query($conn, "select * from linkovi where id=$id");
$linkovi = mysqli_fetch_array($lista);

?>
<style>
  label {
    color: black;
  }
</style>
<br><br>
<div class="container w-50">
  <form action="includes/editL-inc.php" method="post">
    <div class="form-floating">
      <input type="number" class="form-control" name="sb" id="floatingInputValue" value="<?php echo $id ?>">
      <label for="floatingInputValue">Serijski broj</label>
    </div> <br>
    <div class="form-floating">
      <input type="text" class="form-control" name="naziv_linka" id="floatingInputValue" value="<?php echo $linkovi['naziv_linka'] ?>">
      <label for="floatingInputValue">Naziv linka</label>
    </div><br>
    <button type="submit" style="float: left;" name="submit" class="btn btn-primary">Save</button>
  </form>
</div>
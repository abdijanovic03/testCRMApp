<?php
require_once 'includes/header.php';
?>
<style>
  label {
    color: black;
  }
</style>
<br><br>
<div class="container w-50">
  <form action="includes/editS-inc.php" method="post">
    <div class="form-floating">
      <input type="text" class="form-control" name="naziv_škole" id="floatingInputValue">
      <label for="floatingInputValue">Naziv škole</label>
    </div><br>
    <div class="form-floating">
      <input type="text" class="form-control" name="tip_obrazovanja" id="floatingInputValue">
      <label for="floatingInputValue">Tip obrazovanja</label>
    </div><br>
    <button type="submit" style="float: left;" name="submit" class="btn btn-primary">Spremi</button>
  </form>
</div>
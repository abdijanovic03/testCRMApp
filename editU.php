
<?php 
require_once 'includes/header.php';

?>

<?php

  $id=$_GET['id'];
  $lista=mysqli_query($conn,"select * from login where id=$id");
  $users=mysqli_fetch_array($lista);
   
?>
<style>
  label{
    color: black;
  }
</style>
<br><br>
 <div class="container w-50"  >
 <form action="includes/editU-inc.php" method="post">

 <div class="form-floating">
  <input type="number" class="form-control" name="sb" id="floatingInputValue" value="<?php echo $id ?>">
  <label for="floatingInputValue">Serijski broj</label>
</div> <br>
<div class="form-floating">
  <input type="text" class="form-control" name="username" id="floatingInputValue"  value="<?php echo $users['username'] ?>">
  <label for="floatingInputValue">Korisniško ime</label>
</div><br>
<div class="form-floating">
  <input type="text" class="form-control" name="password" id="floatingInputValue"  value="<?php echo $users['password'] ?>">
  <label for="floatingInputValue">Šifra</label>
</div><br>
<div class="form-floating">
  <input type="number" class="form-control" name="type" id="floatingInputValue"  value="<?php echo $users['type'] ?>">
  <label for="floatingInputValue">Tip</label>
</div><br>
<button type="submit" style="float: left;" name="submit" class="btn btn-primary">Save</button>

</form>
</div>
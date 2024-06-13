<?php
require_once 'includes/header.php';
?>
<script>
  $(document).ready(function() {
    $('#tabela_korsnici').DataTable();
  });
</script>
<div class="container">
  <div class="row text-center">
    <div class="col-12">
      <h1>
        Lista kandidata
      </h1>
      <table id="tabela_korsnici">
        <thead>
          <td scope="col">SB</td>
          <td scope="col">Korisniško ime</td>
          <td scope="col">Šifra</td>
          <td>Tip korisnika</td>
          <td></td>
        </thead>
        <?php
        $lista = mysqli_query($conn, "select * from login");
        while ($users = mysqli_fetch_array($lista)) {

        ?>
          <tr scope="row">
            <td> <?php echo $users['id'] ?> </td>
            <td> <?php echo $users['username'] ?> </td>
            <td> <?php echo $users['password'] ?> </td>
            <td> <?php echo $users['type'] ?> </td>
            <td>
              <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle " style="float: right;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Uređuj
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li> <a class="dropdown-item" href="includes/usr.php?id=<?php echo $users['id']; ?>">Izbriši</a> </li>
                  <li> <a class="dropdown-item" href="editU.php?id=<?php echo $users['id']; ?>">Uredi</a>
            </td>
            </li>
            </ul>
    </div>
    </tr>
  <?php
        }
  ?>
  </table>
  </div>
</div>
</div>
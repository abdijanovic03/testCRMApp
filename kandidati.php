<?php
require_once 'includes/functions.php';
require_once 'includes/header.php';
?>

<script>
  $(document).ready(function() {
    $('#tabela_kandidati').DataTable();
  });
</script>
<div class="container">
  <div class="row text-center">
      <h1>Lista kandidata</h1>
    <table id="tabela_kandidati">
      <thead>
        <td scope="col">SB</td>
        <td scope="col">Ime</td>
        <td scope="col">Prezime</td>
        <td scope="col">Broj telefona</td>
        <td scope="col">E-mail</td>
        <td scope="col">Link</td>
        <td scope="col">Završene škole</td>
        <td scope="col">Grad</td>
        <td scope="col">Država</td>

        <td scope="col"></td>
      </thead>
      <?php
      $li = 0;
      $sk = 0;
      if (isset($_POST['link'])) {
        $li = $_POST['link'];
        foreach ($li as $i) {
          if ($i == 0) {
            $li = 0;
          }
        }
      }
      if (isset($_POST["skole"])) {
        $sk = $_POST['skole'];
        foreach ($sk as $j) {
          if ($j == 0) {
            $sk = 0;
          }
        }
      }

      if ($li == 0 && $sk == 0) {
        $lista = mysqli_query($conn, "select a.id, a.ime,a.prezime,a.broj_telefona,a.email,b.naziv_linka,a.grad,a.država from kandidat a left join linkovi b on a.link=b.id");
      } else if ($li > 0 || $sk > 0) {

        if ($sk == 0) {
          $lista = mysqli_query($conn, "select DISTINCT a.id, a.ime,a.prezime,a.broj_telefona,a.email ,b.naziv_linka,a.grad,a.država 
                                    from kandidat a
                                    left join kandidat_skola d on a.id=d.id_kandidat 
                                    join linkovi b on a.link=b.id    where b.id in  (" . implode(',', array_map('intval', $li)) .  ") ");
        } else if ($li == 0) {
          $lista = mysqli_query($conn, "select DISTINCT a.id, a.ime,a.prezime,a.broj_telefona,a.email,c.naziv_linka,a.grad,a.država from kandidat a left join kandidat_skola d on a.id=d.id_kandidat join škola b on d.id_skola=b.id left join linkovi c on a.link=c.id   where   
                                  b.id in (" . implode(',', array_map('intval', $sk)) .  ")");
        } else {
          $lista = mysqli_query($conn, "select DISTINCT  a.id, a.ime,a.prezime,a.broj_telefona,a.email,b.naziv_linka,a.grad,a.država from kandidat a join kandidat_skola d on a.id=d.id_kandidat join linkovi b on a.link=b.id join škola c on c.id=d.id_skola  where b.id in  ("
            . implode(',', array_map('intval', $li)) .  ") and c.id in (" . implode(',', array_map('intval', $sk)) .  ")");
        }
      }
      while ($kandidat = mysqli_fetch_array($lista)) {

      ?>

        <tr scope="row">
          <td> <a href="profil.php?id=<?php echo $kandidat['id'] ?>" style="text-decoration: none;"> <?php echo $kandidat['id'] ?> </a></td>
          <td> <?php echo $kandidat['ime'] ?> </td>
          <td> <?php echo $kandidat['prezime'] ?> </td>
          <td> <?php echo $kandidat['broj_telefona'] ?> </td>
          <td> <?php echo $kandidat['email'] ?> </td>
          <td> <?php echo $kandidat['naziv_linka'] ?> </td>
          <td> <?php
                $id = $kandidat['id'];
                $lista1 = mysqli_query($conn, "SELECT b.naziv_škole as sk FROM škola b join kandidat_skola c on b.id=c.id_skola join kandidat a on a.id=c.id_kandidat WHERE a.id='$id';");
                while ($škole = mysqli_fetch_array($lista1)) {
                  echo $škole['sk'];
                }

                ?>
          </td>
          <td> <?php echo $kandidat['grad'] ?> </td>
          <td> <?php echo $kandidat['država'] ?> </td>
          <td>
            <div class="dropdown">
              <a class="btn btn-primary dropdown-toggle " style="float: right;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Uređuj
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li> <a class="dropdown-item" href="includes/kand.php?id=<?php echo $kandidat['id']; ?>">Izbriši</a> </li>
                <li> <a class="dropdown-item" href="edit.php?id=<?php echo $kandidat['id']; ?>">Uredi</a>
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
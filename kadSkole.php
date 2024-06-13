<?php
require_once 'includes/header.php';
?>
<script>
    $(document).ready(function() {
        $('#tabela_kandidati').DataTable();
    });
</script>
<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h1>
                Lista kandidata po školama
            </h1>
            <table id="tabela_kandidati">
                <thead>
                    <td scope="col">SB</td>
                    <td scope="col">ime</td>
                    <td scope="col">prezime</td>
                    <td scope="col">broj telefona</td>
                    <td scope="col">e-mail</td>
                    <td scope="col">adresa</td>
                    <td scope="col">poštanski broj</td>
                    <td scope="col">grad</td>
                    <td scope="col">država</td>
                    <td scope="col">id škole</td>
                    <td scope="col">škola</td>
                </thead>
                <?php
                $sb = $_GET['id'];
                $sql = "SELECT a.id,a.ime,a.prezime,a.broj_telefona,a.email,a.adresa,a.poštanski_broj,a.grad,a.država,b.naziv_škole from kandidat a join kandidat_skola c on a.id=c.id_kandidat join škola b on b.id=c.id_skola where c.id_skola='$sb'";

                $lista = mysqli_query($conn, $sql);
                while ($kandidat = mysqli_fetch_array($lista)) {

                ?>
                    <tr scope="row">
                        <td> <?php echo $kandidat['id'] ?> </td>
                        <td> <?php echo $kandidat['ime'] ?> </td>
                        <td> <?php echo $kandidat['prezime'] ?> </td>
                        <td> <?php echo $kandidat['broj_telefona'] ?> </td>
                        <td> <?php echo $kandidat['email'] ?> </td>
                        <td> <?php echo $kandidat['adresa'] ?> </td>
                        <td> <?php echo $kandidat['poštanski_broj'] ?> </td>
                        <td> <?php echo $kandidat['grad'] ?> </td>
                        <td> <?php echo $kandidat['država'] ?> </td>
                        <td> <?php echo $sb ?> </td>
                        <td> <?php echo $kandidat['naziv_škole'] ?> </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
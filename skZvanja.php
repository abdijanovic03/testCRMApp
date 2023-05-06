<?php 

require_once 'includes/header.php';
?>
 <script>
                    $(document).ready( function () {
                        $('#tabela_kandidati').DataTable();
                    });
                </script>
                <div class="container">
                <div class="row text-center">
            <div class="col-12">
            <h1>
   Lista škola po zvanjima
 </h1>
 <table id="tabela_kandidati"  >
    <thead>
        <td scope="col">SB</td>
        <td scope="col">Naziv škole</td>
        <td scope="col">Tip obrazovanja</td>
        <td scope="col">Zvanje</td>
        
    </thead>


<?php
$sb=$_GET['id'];
$sql="SELECT b.id,b.naziv_škole,b.tip_obrazovanja,a.naziv_zvanja from škola b join zvanje a on b.zvanje=a.id where a.id='$sb'";

$lista=mysqli_query($conn,$sql);
while($kandidat=mysqli_fetch_array($lista)){

    ?>
    
    <tr scope="row">
     <td > <?php echo $kandidat['id'] ?> </td>
     <td > <?php echo $kandidat['naziv_škole'] ?> </td>
     <td> <?php echo $kandidat['tip_obrazovanja'] ?> </td>
     <td> <?php echo $kandidat['naziv_zvanja'] ?> </td>
   
    </tr>
     
    <?php

    
}
?>
</table>
</div></div></div>
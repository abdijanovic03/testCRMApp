
<?php
require_once 'includes/header.php';
require_once 'includes/funkctions.php';
?>



 <script>
                    $(document).ready( function () {
                        $('#tabela_skole').DataTable();
                    });
                </script>
                
                <div class="container">
                <div class="row text-center">
            
            <h1>
   Lista škola
 </h1>
 <table id="tabela_skole" >
    <thead>
        <td>SB</td>
        <td>Naziv skole</td>
        <td>Tip obrazovanja</td>
        <td>Broj kandidata</td>
        <td>Zvanje</td>
        <td></td>
    </thead>
    
<?php 
$skole=mysqli_query($conn,"select id,naziv_škole,tip_obrazovanja,zvanje from škola ");
while($skola=mysqli_fetch_array($skole)){

    ?>
    
    <tr scope="row">
     <td> <?php echo $skola['id'] ?> </td>
     <td> <a style="text-decoration: none; " href="kadSkole.php?id=<?php echo $skola['id']; ?>"> <?php echo $skola['naziv_škole'] ?>  </a></td>
     <td> <?php echo $skola['tip_obrazovanja'] ?> </td>
     <td> <?php 
     
     
     
     brKan($skola['id']);
     
     ?> </td>
     <td> <?php echo $skola['zvanje'] ?> </td>
     <td>
     <div class="dropdown">
  <a class="btn btn-primary dropdown-toggle " style="float: right;"  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    Uređuj
  </a>

  <ul class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
    <li>     <a  class="dropdown-item"   href="includes/sk.php?id=<?php echo $skola['id']; ?>">Izbiši</a> </li>
    <li>     <a  class="dropdown-item"  href="editS.php?id=<?php echo $skola['id']; ?>">Uredi</a> </td>
</li>
    
  </ul>
</div>
     </tr>
     
    <?php

    
}
?>
</table>

</div></div>


<?php
 require_once 'includes/header.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script>
      $(document).ready( function () {
          $('#tabela_kandidati').DataTable();
      });
      
 </script>
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
         
          <h1>Lista kandidata</h1>
          <div class="  " style="width: 20%; float: left;">
          <form action="kandidati.php" method="post">
      <div class="form-floating" >
           
          <script>

          </script>
         <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>     
      <button type="submit" style="float: left;" name="submit" class="btn btn-primary">Odaberi</button> <br> <br>
      </form>
         <select name="link[]" class="form-select" style="height: auto;" multiple="multiple" aria-label="Default select example" id="floatingInputValue" placeholder="Odaberi link">
            <option  value="0"><?php echo "Svi linkovi" ?></option>
   <?php 
        $linn=mysqli_query($conn,"select id,naziv_linka from linkovi");
        while($linkovi=mysqli_fetch_array($linn)){
    ?>
              <option  value="<?php echo $linkovi['id']; ?>"><?php echo $linkovi['naziv_linka']; ?></option>
    <?php
    }
    ?>
            </select>
              <label for="floatingInputValue">Linkovi</label>
      </div> <br> <br>
       
      <div class="form-floating" >
            <select name="skole[]" class="form-select" style="height: auto;" multiple="multiple" aria-label="Default select example" id="floatingInputValue" placeholder="Odaberi skole">
            <option value="0"  ><?php echo "Sve skole" ?></option>
            <?php 
             $skk=mysqli_query($conn,"select id,naziv_škole from škola");
              while($skole=mysqli_fetch_array($skk)){
             ?>
                 <option  value="<?php echo $skole['id']; ?>"><?php echo $skole['naziv_škole']; ?></option>
             <?php
              }
            ?>
            </select>
              <label for="floatingInputValue">Škole</label>
      </div><br><br>
          
          
          </div> 
                      <table id="tabela_kandidati"  >
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
                  $li=0;
                  $sk=0;
                      if(isset($_POST['link'])){
                      $li=$_POST['link'];
                      foreach($li as $i){
                        if($i==0){
                          $li=0;
                        }
                      }
                        
                      }
                      if(isset($_POST["skole"])){
                        $sk=$_POST['skole'];
                        foreach($sk as $j){
                          if($j==0){
                            $sk=0;
                          }
                        }
                          
                      }

                       
                      if($li==0 && $sk==0){
                        $lista=mysqli_query($conn,"select a.id, a.ime,a.prezime,a.broj_telefona,a.email,b.naziv_linka,a.grad,a.država from kandidat a left join linkovi b on a.link=b.id");

                      }
                      else if($li>0 || $sk>0){
                        
                          if($sk==0){
                            $lista=mysqli_query($conn,"select DISTINCT a.id, a.ime,a.prezime,a.broj_telefona,a.email ,b.naziv_linka,a.grad,a.država 
                            from kandidat a
                            left join kandidat_skola d on a.id=d.id_kandidat 
                            join linkovi b on a.link=b.id    where b.id in  (". implode(',', array_map('intval', $li)) .  ") ");
                          }else if($li==0){
                            $lista=mysqli_query($conn,"select DISTINCT a.id, a.ime,a.prezime,a.broj_telefona,a.email,c.naziv_linka,a.grad,a.država from kandidat a left join kandidat_skola d on a.id=d.id_kandidat join škola b on d.id_skola=b.id left join linkovi c on a.link=c.id   where   
                           b.id in (". implode(',', array_map('intval', $sk)) .  ")");
                          }else{
                            $lista=mysqli_query($conn,"select DISTINCT  a.id, a.ime,a.prezime,a.broj_telefona,a.email,b.naziv_linka,a.grad,a.država from kandidat a join kandidat_skola d on a.id=d.id_kandidat join linkovi b on a.link=b.id join škola c on c.id=d.id_skola  where b.id in  (" 
                            . implode(',', array_map('intval', $li)) .  ") and c.id in (". implode(',', array_map('intval', $sk)) .  ")");
                          }

                          

                        }
                  while($kandidat=mysqli_fetch_array($lista)){

                      ?>
                      
                      <tr scope="row">
                      <td > <a href="profil.php?id=<?php echo $kandidat['id'] ?>" style="text-decoration: none;"> <?php echo $kandidat['id'] ?> </a></td>
                      <td > <?php echo $kandidat['ime'] ?> </td>
                      <td> <?php echo $kandidat['prezime'] ?> </td>
                      <td> <?php echo $kandidat['broj_telefona'] ?> </td>
                      <td> <?php echo $kandidat['email'] ?> </td>
                      <td> <?php echo $kandidat['naziv_linka'] ?> </td>
                      <td>     <?php 
                      $id=$kandidat['id'];
                    $lista1=mysqli_query($conn,"SELECT b.naziv_škole as sk FROM škola b join kandidat_skola c on b.id=c.id_skola join kandidat a on a.id=c.id_kandidat WHERE a.id='$id';");
                    while($škole=mysqli_fetch_array($lista1)){
                    ?>
                    |<?php echo $škole['sk'] ?>|
                    <?php

                      
                  }

                  ?></td>


                      <td> <?php echo $kandidat['grad'] ?> </td>
                      <td> <?php echo $kandidat['država'] ?> </td>
                      
                      <td>
                      <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle " style="float: right;"  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Uređuj
                    </a>

                    <ul class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
                      <li>     <a  class="dropdown-item"   href="includes/kand.php?id=<?php echo $kandidat['id']; ?>">Izbriši</a> </li>
                      <li>     <a  class="dropdown-item"  href="edit.php?id=<?php echo $kandidat['id']; ?>">Uredi</a> </td>
                  </li>
                      
                    </ul>
                  </div>


                      </tr>
                      
                      <?php

                      
                  }
                  ?>
                  </table>
</div></div></div>


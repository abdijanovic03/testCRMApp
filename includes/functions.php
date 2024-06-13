<?php
include ('database.php');

function addToLogs($log){
  Global $conn;
   
  $sql="INSERT INTO logovi (log) values (?)";
  $stmt=mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$sql)){
           
       }else{
        
       mysqli_stmt_bind_param($stmt,"s",$log);
       mysqli_stmt_execute($stmt); 
        
     }

}
function brKan($id){    
    Global $conn;
    $sql="SELECT count(id_kandidat) as br from kandidat_skola where id_skola='$id'";
    $query_run=mysqli_query($conn,$sql);
    $count=mysqli_fetch_array($query_run);
  
  echo $count['br'];

 
}

function brKanLink($id){
  Global $conn;
  $sql="SELECT count(id) as br from kandidat where link='$id'";
  $query_run=mysqli_query($conn,$sql);
  $count=mysqli_fetch_array($query_run);

echo $count['br'];


}

?>
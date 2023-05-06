

<?php
session_start();

//if(isset($_POST['submit'])){
 require 'database.php';
 require 'funkctions.php';
  
    $sb=$_GET['id'];
    
    

    $sql="SELECT id from škola where id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){

    }else{
      
        mysqli_stmt_bind_param($stmt,"s",$sb);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $i=mysqli_stmt_num_rows($stmt);
        if($i>0){
            $sql="DELETE from škola where id='$sb'";
            $sql1="DELETE from kandidat_skola where id_skola='$sb'";
                     $query_run=mysqli_query($conn,$sql);
                     $query_run1=mysqli_query($conn,$sql1);
         if($query_run){
            if($query_run1){
            $log="User ".$_SESSION['user']." je izbrisao skolu ".$sb."";
            addToLogs($log);
          header("Location: ../skole.php?success"); }
         }else{
          
          header("Location: ../skole.php?error"); 
         }
        }



    }
?>
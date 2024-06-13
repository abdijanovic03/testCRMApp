

<?php

session_start();

 require 'database.php';
 require 'functions.php';
  
    $sb=$_POST['sb'];
    $naziv_zvanja=$_POST['naziv_zvanja'];

    $sql="SELECT id from zvanje where id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){

    }else{
      
        mysqli_stmt_bind_param($stmt,"s",$sb);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $i=mysqli_stmt_num_rows($stmt);
        if($i>0){
          $sql="UPDATE zvanje set naziv_zvanja='$naziv_zvanja' where id='$sb'";
         $query_run=mysqli_query($conn,$sql);
         if($query_run){
          $log="User ".$_SESSION['user']." je napravio izmjenu kod zvanja ".$sb."";
          addToLogs($log);
          header("Location: ../zvanja.php?success"); 
         }else{
          
          header("Location: ../zvanja.php?error"); 
         }
        }else{
         
           $sql="INSERT INTO zvanje (id,naziv_zvanja) values (?,?)";
           $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            
        }else{
          
        mysqli_stmt_bind_param($stmt,"ss",$sb,$naziv_zvanja);
        mysqli_stmt_execute($stmt); 
        $log="User ".$_SESSION['user']." je napravio izmjenu kod zvanja ".$zadnji_id."";
          addToLogs($log);
        header("Location: ../zvanja.php?success"); 
      }

            }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
 ?>
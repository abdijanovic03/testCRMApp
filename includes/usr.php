

<?php

session_start();

//if(isset($_POST['submit'])){
 require 'database.php';
 require 'functions.php';
  
    $sb=$_GET['id'];
    
    

    $sql="SELECT id from login where id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){

    }else{
      
        mysqli_stmt_bind_param($stmt,"s",$sb);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $i=mysqli_stmt_num_rows($stmt);
        if($i>0){
            $sql="DELETE from login where id='$sb'";
                     $query_run=mysqli_query($conn,$sql);
         if($query_run){
            $log="User ".$_SESSION['user']." je izbrisao usera ".$sb."";
            addToLogs($log);
          header("Location: ../users.php?success"); 
         }else{
          
          header("Location: ../users.php?error"); 
         }
        }



    }
?>


<?php

session_start();

//if(isset($_POST['submit'])){
 require 'database.php';
 require 'funkctions.php';
  
    $sb=$_POST['sb'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    

    $sql="SELECT id from login where id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){

    }else{
      
        mysqli_stmt_bind_param($stmt,"s",$sb);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $i=mysqli_stmt_num_rows($stmt);
        if($i>0){
          $sql="UPDATE login set username='$username',password='$password',type='$type' where id='$sb'";
         $query_run=mysqli_query($conn,$sql);
         if($query_run){
          $log="User ".$_SESSION['user']." je napravio izmjenu kod usera ".$sb."";
          addToLogs($log);
          header("Location: ../users.php?success"); 
         }else{
          
          header("Location: ../users.php?error"); 
         }
        }else{
         
           $sql="INSERT INTO login (id,username,password,type) values (?,?,?,?)";
           $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            
        }else{
          
        mysqli_stmt_bind_param($stmt,"ssss",$sb,$username, $password,$type);
        mysqli_stmt_execute($stmt); 
        $log="User ".$_SESSION['user']." je napravio izmjenu kod usera ".$zadnji_id."";
        addToLogs($log);
        header("Location: ../users.php?success"); 
      }

            }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  /*}else{
    echo "arink";
  }
*/
 ?>
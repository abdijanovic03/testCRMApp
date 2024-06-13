<?php 
session_start();
require 'database.php';

$username=$_POST['username'];
$password=$_POST['password'];

if(empty($username) || empty($password)){
    header("Location: ../index.php");
}else{
    $sql="SELECT * FROM login where username=? and password=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
         
    }else{
        mysqli_stmt_bind_param($stmt,"ss",$username,$password);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        
    if($check=mysqli_fetch_assoc($result)){
     
     $tipK="SELECT type as br,id as sb from login where username='$username'";
     
     $query_run=mysqli_query($conn,$tipK);
     $count=mysqli_fetch_array($query_run);
   
     if($count['br']==1){
        $_SESSION['login']="admin";
     }else{
        $_SESSION['login']="user";
     }
     $idU=$count['sb'];
     $_SESSION['user']=$idU; 

  header("Location: ../index.php");
        }else{
            header("Location: ../index.php");
        }
    }
    
}
?>
<?php
session_start();
require "connect.php";


extract($_POST);
$query = "SELECT * FROM `users` WHERE email = '$email'";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result)==1){
    $user = mysqli_fetch_assoc($result);

 

    $pass_user = $user["password"];
    $role = $user["role"];
    $user_id = $user["id"];

    if(password_verify($password , $pass_user)){
        if($role=="user"){
            header("location:index.php");
            $_SESSION["id"]=$user_id;
        }else{
            header("location:admin/view/layout.php");
        
        }
    }
    
    
    
   
}else{
    header("location:signup.php");
}
<?php

require "connect.php";

// print_r($_POST);
    extract($_POST);

if(isset($_POST["add"])){
    

    
    $errors = [];

    if (empty($name)) {
        $errors["name"] = "name is req";
    } elseif (is_numeric($name)) {
        $errors["name"] = "name must be str";
    } elseif (strlen($name) < 3) {
        $errors["name"] = "name must be more than this";
    }

    if (empty($email)) {
        $errors["email"] = "email is req";
    } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "email must be str";
    } elseif (strlen($email) < 3) {
        $errors["email"] = "email must be more than this";
    }

    if (empty($password)) {
        $errors["password"] = "password is req";
    } elseif (!is_numeric($password)) {
        $errors["password"] = "password must be num ";
    } elseif (strlen($password) < 3) {
        $errors["password"] = "password must be more than this";
    }

    if (empty($phone)) {
        $errors["phone"] = "phone is req";
    } elseif (!is_numeric($phone)) {
        $errors["phone"] = "phone must be num";
    } elseif (strlen($phone) < 11) {
        $errors["phone"] = "phone must be more than this";
    }

    if (empty($address)) {
        $errors["address"] = "address is req";
    } elseif (is_numeric($address)) {
        $errors["address"] = "address must be str";
    } elseif (strlen($address) < 3) {
        $errors["address"] = "address must be more than this";
    }

    if(empty($errors)) {
        $pass= password_hash($password , PASSWORD_DEFAULT);

  
        $query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`) VALUES ('$name','$email','$pass','$phone','$address')";

        $result = mysqli_query($connect , $query);

        if($result) {
           header("location:login.php");
        }
        
    }else{
        print_r($errors);
    }
    
}else{
    echo "not Done";
}






?>
<?php
session_start();
require "../../connect.php";


if(isset($_POST["addCategory"])){
    $title= $_POST["title"];


    $errors_cat = [];

    if(empty($title)) {
        $errors_cat["title"] = "title is req";
    }elseif(is_numeric($title)) {
        $errors_cat["title"] = "title must be string";
    }elseif(strlen($title) < 1) {
        $errors_cat["title"] = "title must be more than this";
    }


    if(empty($errors_cat)) {


        $query = "INSERT INTO `categories`(`title`) VALUES ('$title')";

        $result = mysqli_query($connect, $query); 
        if($result) {
            $_SESSION["successful"]="inserted Category successful";
            header("location:addProduct.php");
        }
    }else{
        $_SESSION["category"]= $errors_cat;
        header("location:addCategory.php");
    }

  

    
}
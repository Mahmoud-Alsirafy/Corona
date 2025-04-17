<?php
require "../../connect.php";
extract($_POST);




if(isset($_POST["add"])){
    
    $image = $_FILES["img"];
    $imgName = $image["name"];
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);
    $tmp = $image["tmp_name"];
    $error = $image["error"];
    $size = $image["size"];
    $errors=[];

    if(empty($title)) {
        $errors ["title"] = "title is req";
    }elseif(is_numeric($title)) {
        $errors ["title"] = "title must be str";
    }elseif(strlen($title) < 3) {
        $errors [ "title"] = "title must more than this";
    }
    if (empty($desc)) {
        $errors["desc"] = "desc is req";
    } elseif (is_numeric($desc)) {
        $errors["desc"] = "desc must be str";
    } elseif (strlen($desc) < 3) {
        $errors["desc"] = "desc must more than this";
    }
    if (empty($price)) {
        $errors["price"] = "price is req";
    } elseif (!is_numeric($price)) {
        $errors["price"] = "price must be num";
    } elseif (strlen($price) < 1) {
        $errors["price"] = "price must more than this";
    }
    if (empty($quantity)) {
        $errors["quantity"] = "quantity is req";
    } elseif (!is_numeric($quantity)) {
        $errors["quantity"] = "quantity must be num";
    } elseif (strlen($quantity) < 1) {
        $errors["quantity"] = "quantity must more than this";
    }
    
    $ex = ["png" , "jpg"];

    if(!in_array($ext , $ex)){
        $errors["img"] = "img is req";
    }

    if(empty($errors)) {
        $newName = uniqid().$imgName;
        $query = "INSERT INTO `products`( `name`, `price`, `image`, `quantity`, `category_id`) VALUES ('$title','$price','$newName','$quantity','$cat')";
        $result = mysqli_query($connect , $query);
        if($result){
            move_uploaded_file($tmp , "../upload/$newName");
            header("location:view_product.php");
        }
    }else{
        print_r($errors);
    }
    
    
}
<?php
require "../../connect.php";
extract($_POST);
// print_r($_POST);
$id = $_GET["id"];



$q = "SELECT  * FROM `products` WHERE id= '$id'";
$r = mysqli_query($connect, $q);
$product = mysqli_fetch_assoc($r);
$old_img = $product["image"];



if (isset($_POST["add"])) {


    $errors = [];

    if (empty($name)) {
        $errors["name"] = "name is req";
    } elseif (is_numeric($name)) {
        $errors["name"] = "name must be str";
    } elseif (strlen($name) < 3) {
        $errors["name"] = "name must more than this";
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







    if ($_FILES["img"]["error"] == 0) {



        $image = $_FILES["img"];
        $imgName = $image["name"];
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
        $tmp = $image["tmp_name"];
        $error = $image["error"];
        $size = $image["size"];




        $ex = ["png", "jpg"];

        if (!in_array($ext, $ex)) {
            $errors["img"] = "img is req";
        }

        $newName = uniqid().$imgName;




        if (empty($errors)) {

            unlink("../upload/$old_img");
            
            $query = " UPDATE `products` SET `name`='$name',`price`='$price',`image`='$newName',`quantity`='$quantity',`category_id`='$cat' WHERE id = '$id'";
           
            $result = mysqli_query($connect, $query);
            if ($result) {
                move_uploaded_file($tmp, "../upload/$newName");
                // echo "yes";
                header("location:view_product.php");
            }
        }else{
             print_r($errors);   
            
        }




        
    }else{


        if (empty($errors)) {

            

            $query = " UPDATE `products` SET `name`='$name',`price`='$price',`quantity`='$quantity',`category_id`='$cat' WHERE id = '$id'";

            $result = mysqli_query($connect, $query);
            if ($result) {
            
                // echo "yes";
                header("location:view_product.php");
            }
        } else {
            print_r($errors);
        }

        
    }
}
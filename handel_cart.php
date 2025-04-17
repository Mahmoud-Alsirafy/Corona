<?php
session_start();
$user_id = $_SESSION["id"];
require "connect.php";

$id = $_GET["id"];


$query = "SELECT * FROM `products` WHERE id='$id'";
$result = mysqli_query($connect , $query);
$pro = mysqli_fetch_assoc($result);

$name = $pro[ "name"];
$price = $pro[ "price"];
$image = $pro[ "image"];
$quantity = $pro[ "quantity"];







$query1 = "INSERT INTO `orders`(`name`, `price`, `quantity` , `image` , `user_id`) VALUES ('$name','$price','$quantity','$image','$user_id')";
$result1 = mysqli_query($connect , $query1);

if ($result1){
    header("location:cart.php");
    
}else{
    header("location:index.php");
}




?>
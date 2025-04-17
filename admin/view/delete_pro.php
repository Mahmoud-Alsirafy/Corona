<?php
require "../../connect.php";
extract($_POST);
echo $id = $_GET["id"];
$Q = "SELECT * FROM `products` WHERE id= '$id'";
$r = mysqli_query($connect, $Q);
$p_img = mysqli_fetch_assoc($r);

$old_img = $p_img["image"];
$query = "DELETE FROM `products` WHERE id = '$id'";
$result = mysqli_query($connect, $query);


if ($result) {
    unlink("../upload/$old_img");
    header("location:view_product.php");
} else {
    echo "no";
}

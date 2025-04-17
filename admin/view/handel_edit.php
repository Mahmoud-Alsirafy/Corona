<?php

require "../../connect.php";

echo $id = $_GET["id"];

extract($_POST);


$errors = [];


if (empty($name)) {
    $errors["name"] = "name is req";
} elseif (is_numeric($name)) {
    $errors["name"] = "name must be string";
} elseif (strlen($name) < 1) {
    $errors["name"] = "name must be more than this";
}

if (empty($price)) {
    $errors["price"] = "price is req";
} elseif (!is_numeric($price)) {
    $errors["price"] = "price must be number";
}

if (empty($quantity)) {
    $errors["quantity"] = "quantity is req";
} elseif (!is_numeric($quantity)) {
    $errors["quantity"] = "quantity must be number";
} elseif (strlen($quantity) < 1) {
    $errors["quantity"] = "quantity must be more than this";
}


if (empty($errors)) {


    $newName = uniqid() . $imgName;
    unlink("../upload/$old_img");

    $query_update = "UPDATE `products` SET `name`='$title',`price`='$price',`image`='$newName',`quantity`='$quantity' WHERE id='$id'";

    $run = mysqli_query($connect, $query_update);

    if ($run) {
        move_uploaded_file($tmp, "../upload/$newName");
        header("location:view.php?x=add");
        $_SESSION["success"] = "inserted successful";
    } else {
        echo "no";
    }
} else {
    $_SESSION["error"] = $errors;
}

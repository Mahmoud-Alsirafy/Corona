 <?php
    require "../../connect.php";
    session_start();
    if (isset($_POST["add"])) {
        extract($_POST);
        $img = $_FILES["img"];
       $imgName = $img["name"];
       $ext = pathinfo($imgName, PATHINFO_EXTENSION);
       $tmp = $img["tmp_name"];
       $error = $img["error"];
       $size = $img["size"] / (1024 * 1024);




        $errors = [];


        if (empty($title)) {
            $errors["title"] = "title is req";
        } elseif (is_numeric($title)) {
            $errors["title"] = "title must be string";
        } elseif (strlen($title) < 1) {
            $errors["title"] = "title must be more than this";
        }

        if (empty($desc)) {
            $errors["desc"] = "desc is req";
        } elseif (is_numeric($desc)) {
            $errors["desc"] = "desc must be string";
        } elseif (strlen($desc) < 3) {
            $errors["desc"] = "desc must be more than this";
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

        $extension= ["jpg" , "png" , "jpeg"];

        if(!in_array($ext , $extension)) {
            $errors["img"] = "img is req";
        }


        if (empty($errors)) {
              
            $newName = uniqid() . $imgName;

            $query_insert = "INSERT INTO `products`( `name`, `price`, `image`, `quantity`, `category_id`) VALUES ('$title','$price','$newName','$quantity','$cat')";

            $run = mysqli_query($connect , $query_insert );

            if($run) {
               move_uploaded_file($tmp , "../upload/$newName");
                header("location:view.php?x=add");
                $_SESSION["success"] = "inserted successful";
                
               
            }else{
                echo "no";
            }
            
        } else {
           
            $_SESSION["error"] = $errors;
            header("location:addProduct.php");
        }

        echo "<pre>";
    } else {
        header("location:addProduct.php");
    }
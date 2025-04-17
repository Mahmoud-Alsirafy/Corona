<?php
session_start();
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
require "../../connect.php";




$query = "SELECT * FROM `products` ";

$result = mysqli_query($connect, $query);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>










<div class="content-wrapper full-page-wrapper d-flex align-items-center auth ">


    <table class="table w-50">
        <div class="alert alert-success" role="alert">
            <?php
            if (isset($_SESSION["delete"]))
                echo $_SESSION["delete"];

            unset($_SESSION["delete"]);
            ?>
        </div>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">cat</th>
                <th scope="col">quantity</th>
                <th scope="col">image</th>


                <th>Edit / Delete</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($users as $key => $value) {
                $cat_id = $value["category_id"];

                $query_cat = "SELECT * FROM `categories` WHERE id = '$cat_id' ";

                $result_cat = mysqli_query($connect, $query_cat);

                $cats = mysqli_fetch_assoc($result_cat);

                $cat_name = $cats["title"]
            ?>

            <tr>
                <td scope="col"><?php echo $key ?></td>
                <td scope="col"><?php echo $value["name"] ?></td>
                <td scope="col"><?php echo $value["price"] ?></td>
                <td scope="col"><?php echo $cat_name ?></td>
                <td scope="col"><?php echo $value["quantity"] ?></td>
                <td><img src="../upload/<?php echo $value["image"] ?>" alt=""></td>

                <td><a class="btn btn-primary" href="edit.php?id=<?php echo $value["id"] ?>">edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $value["id"] ?>">delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
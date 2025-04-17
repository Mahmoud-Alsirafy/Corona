<?php
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";

require "../../connect.php";

$query = "SELECT * FROM `products`";
$result = mysqli_query($connect, $query);
$pro = mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($pro as $key => $value) {
}









?>








<div class="container-fluid page-body-wrapper full-page-wrapper ">







    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">category_id</th>
                <th scope="col">img</th>

                <th> Edit / delete </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($pro as $key => $value) {
                $cat_id = $value["category_id"];
                $q =  "SELECT `id`, `title` FROM `categories` WHERE id = '$cat_id' ";
                $r = mysqli_query($connect, $q);
                $c = mysqli_fetch_assoc($r);
                $cat = $c["title"];
                $id = $value["id"];
            ?>
            <tr>
                <td scope="col"><?php echo $key ?></td>
                <td scope="col"><?php echo $value["name"] ?></td>
                <td scope="col"><?php echo $value["price"] ?></td>
                <td scope="col"><?php echo $value["quantity"] ?></td>
                <td scope="col"><?php echo $cat ?></td>
                <td><img src="../upload/<?php echo $value["image"] ?>" alt=""></td>


                <td>
                    <a href="edit_pro.php?id=<?php echo $id ?>" class=" btn btn-primary">edit</a>
                    <a href="delete_pro.php?id=<?php echo $id ?>" class="btn btn-danger">delete</a>
                </td>
            </tr>
            <?php } ?>




        </tbody>
    </table>


</div>
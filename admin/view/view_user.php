<?php
include "header.php";
include "navbar.php";
include "sidebar.php";

require "../../connect.php";

$query = "SELECT * FROM `users`";

$result = mysqli_query($connect, $query);


$user = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>





<div class="container-fluid page-body-wrapper full-page-wrapper ">







    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">role</th>

                <th> Edit / delete </th>
            </tr>
        </thead>
        <tbody>


            <?php
            foreach ($user as $key => $value) {
                $id = $value["id"];

            ?>
            <tr>

                <td scope="col"><?php echo $value["name"]  ?></td>
                <td scope="col"><?php echo $value["email"]  ?></td>
                <td scope="col"><?php echo $value["phone"]  ?></td>
                <td scope="col"><?php echo $value["address"]  ?></td>
                <td scope="col"><?php echo $value["role"]  ?></td>

                <td>

                    <a href="edit.php?id=<?php echo $id ?>" class="btn btn-primary">edit</a>
                    <a href="delete.php?id=<?php echo $id ?>" class="btn btn-danger">delete</a>
                </td>

            </tr>
            <?php } ?>




        </tbody>
    </table>


</div>
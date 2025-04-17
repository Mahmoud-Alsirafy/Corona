 <?php
    require "../../connect.php";



     $id = $_GET['id'];
    extract($_POST);

    $query = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`role`='$role' WHERE id = '$id' ";


    $result = mysqli_query($connect, $query);

    if ($result) {
        header("location:view_user.php");
    }


    ?>
<?php

include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
require "../../connect.php";

$id = $_GET["id"];




$query = "SELECT * FROM `users` WHERE id = $id";

$result = mysqli_query($connect, $query);

$user = mysqli_fetch_assoc($result);


?>


<form method="POST" class=" d-flex text-center align-items-center " action="handel_update.php? id=<?php echo $user["id"] ?>"
    enctype="multipart/form-data">
  
    <div class="form-group">
        <label>Name</label>
       
        <input type="text" value="<?php echo $user["name"] ?>" name="name" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Email</label>
       
        <input type="text" value="<?php echo $user["email"] ?>" name="email" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Phone</label>
       
        <input type="number" value="<?php echo $user["phone"] ?>" name="phone"
            class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Address</label>
       
        <input type="text" value="<?php echo $user["address"] ?>" name="address"
            class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Role</label>
        
        <input type="text" value="<?php echo $user["role"] ?>" name="role"
            class="form-control p_input">
    </div>
    <div class="text-center">
        <button type="submit" name="add" class="btn btn-primary btn-block enter-btn">Add</button>
    </div>

</form>
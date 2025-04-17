<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";
require "../../connect.php";
$id = $_GET["id"];





$q = "SELECT `name`, `price`, `image`, `quantity`, `category_id` FROM `products` WHERE id= '$id'";
$r = mysqli_query($connect, $q);
$product = mysqli_fetch_assoc($r);
?>

?>

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Add Product</h3>



                    <form method="POST" action="handel_update_pro.php?id=<?php echo $id?>"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Category</label>

                            <select name="cat" id="">
                                <?php
                                $q1 = "SELECT * FROM `categories`";
                                $r1 = mysqli_query($connect, $q1);
                                $c_t1 = mysqli_fetch_all($r1, MYSQLI_ASSOC);
                                foreach ($c_t1  as $k => $v) {


                                ?>
                                <option value="<?php echo $v["id"] ?>"><?php echo $v["title"] ?></option>
                                <?php } ?>
                            </select>


                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="name" value="<?php echo $product["name"] ?>"
                                class="form-control p_input">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="price" value="<?php echo $product["price"] ?>"
                                class="form-control p_input">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="quantity" value="<?php echo $product["quantity"] ?>"
                                class="form-control p_input">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control p_input">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="add" class="btn btn-primary btn-block enter-btn">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<?php
include "../view/footer.php";
?>
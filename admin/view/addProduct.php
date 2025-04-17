<?php
session_start();
include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";
require "../../connect.php";

?>

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

                <div class="card-body px-5 py-5">
                <?php if (isset($_SESSION["successful"])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_SESSION["successful"]; ?>
            </div>
          <?php }
          unset($_SESSION["successful"])
          ?>
                    <h3 class="card-title text-left mb-3">Add Product</h3>
                    <form method="POST" action="handel_pro.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Category</label>

                            <select name="cat" id="">
                                <?php
                $q = "SELECT * FROM `categories`";
                $r = mysqli_query($connect, $q);
                $c_t = mysqli_fetch_all($r, MYSQLI_ASSOC);
                foreach ($c_t  as $k => $v) {


                ?>
                                <option value="<?php echo $v["id"] ?>"><?php echo $v["title"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control p_input">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="desc" class="form-control p_input">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control p_input">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control p_input">
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
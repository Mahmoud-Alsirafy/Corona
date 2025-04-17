<?php
include 'header.php';
include 'navbar.php';
require "connect.php";

$search = $_POST["search"];

if (isset($_POST["search"])) {
    $query = "SELECT * FROM `products` WHERE name LIKE '%$search%'";
    $result = mysqli_query($connect, $query);
    $pro = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>





<section id="product1" class="section-p1 ">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="pro-container">
        <?php
        foreach ($pro as $key => $val) {
        ?>
        <div class="pro">
            <img src="admin/upload/<?php echo $val["image"] ?>" alt="p1">
            <div class="des">
                <span><?php echo $val["name"] ?></span>
                <h5><?php echo $val["price"] ?></h5>
                <div class=" star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4><?php echo $val["quantity"] ?></h4>
                <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="text-center mt-5">
        <a href="product.php" class="btn btn-primary btn-block enter-btn">View More</a>
    </div>


</section>
<?php include 'header.php' ?>
<?php include 'navbar.php';
require "connect.php";


$query = "SELECT * FROM `orders` ";
$result = mysqli_query($connect , $query);
$pro = mysqli_fetch_all($result,MYSQLI_ASSOC);





?>

<section id="page-header" class="about-header">
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>
<section id="product1" class="section-p1 ">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="pro-container">
        <?php
        foreach ($pro as $key => $val) {

        ?>
        <div class="pro py-5">
            <img src="admin/upload/<?php echo $val["image"] ?>" class=" h-75" alt="p1">
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
            </div>
        </div>
        <?php } ?>
    </div>



</section>

<!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->

<?php include "footer.php" ?>
<?php
include "header.php";
include "navbar.php";
?>


<div class="card-body px-5 py-5" style="background-color:darkgray;">
    <h3 class="card-title text-left mb-3">Register</h3>


    <form action="handel_signup.php" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="name" class="form-control p_input">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control p_input">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control p_input">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control p_input">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control p_input">
        </div>

        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">

                <div class="text-center">
                    <button type="submit" value="add" name="add"
                        class="btn btn-primary btn-block enter-btn">add</button>
                </div>
                <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                        <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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

<?php include "footer.php" ?>
<?php
session_start();
include("./partials/header.php");
$firstname=$_SESSION['signup_data']['firstname'] ?? null;
$lastname=$_SESSION['signup_data']['lastname'] ?? null;
$username=$_SESSION['signup_data']['username'] ?? null;
$email=$_SESSION['signup_data']['email'] ?? null;
$password=$_SESSION['signup_data']['password'] ?? null;
$cpassword=$_SESSION['signup_data']['cpassword'] ?? null;
$avatar=$_SESSION['signup_data']['Upload-img'] ?? null;


?>
    
   <!-- sign-up-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])){?>
        <div class="message-alert-error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
                
            </p>
        </div>
        <?php } ?>
        <form action="signup_logic.php" method="post" enctype="multipart/form-data">
            <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First name">
            <input type="text" name="lastname" value="<?= $lastname?>" placeholder="Last name">
            <input type="text" name="username" value="<?= $username?>" placeholder="User name">
            <input type="email" name="email" value="<?= $email?>" placeholder="email">
            <input type="password" name="password" value="<?= $password?>" placeholder="password">
            <input type="password" name="cpassword" value="<?= $cpassword?>" placeholder="confirm password">
            <div class="form-control">
                <label for="Upload-img" >Upload Profile Image</label>
                <input type="file" name="Upload-img" value="<?= $avatar?>" id="Upload-img" >
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small class="message-alert">Allready have an account? <a href="./sing-in.php">Sign in</a></small>
        </form>
    </div>
</section>
   <!-- sign-up-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
    <!-- footer-end -->
    
    
        <script src="main.js"></script>
    </body>
    </html>
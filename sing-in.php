<?php

include("./partials/header.php");
$username_email=$_SESSION['signin_data']['username_email'] ?? null;
$password=$_SESSION['signin_data']['password'] ?? null;
unset($_SESSION['signin_data']);
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Sign In</h2>
        <?php if(isset($_SESSION['signup-success'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['signup-success']; 
             unset($_SESSION['signup-success']);
            ?>
         </div>
         <?php }elseif(isset($_SESSION['signin'])){ ?>
          <div class="message-alert-error">
            <?= $_SESSION['signin']; 
             unset($_SESSION['signin']);
         
            ?>
           </div>
           <?php }?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method='POST'>
            
            <input type="text" placeholder="user name" value='<?= $username_email?>' name="username_email">
            <input type="password" placeholder="password" value='<?= $password ?>' name="password">
           
           
            <button type="submit" class="btn" name="submit">Sign In</button>
            <small class="message-alert">don't have an account? <a href="sign-up.php">Sign Up</a></small>
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
    <!-- footer-end -->
    
    
        <script src="main.js"></script>
    </body>
    </html>
<?php
include("./partials/header.php")
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Sign In</h2>
        <div class="message-alert">
            <p>This is an error message</p>
        </div>
        <form action="">
            
            <input type="text" placeholder="user name">
            <input type="password" placeholder="password">
           
           
            <button type="submit" class="btn">Sign In</button>
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
<?php
include("./partials/header.php")
?>
    
   <!-- sign-up-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Sign Up</h2>
        <div class="message-alert">
            <p>This is an error message</p>
        </div>
        <form action="">
            <input type="text" placeholder="First name">
            <input type="text" placeholder="Last name">
            <input type="email" placeholder="email">
            <input type="password" placeholder="password">
            <input type="password" placeholder="confirm password">
            <div class="form-control">
                <label for="Upload-img" >Upload Profile Image</label>
                <input type="file" name="" id="Upload-img">
            </div>
            <button type="submit" class="btn">Sign Up</button>
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
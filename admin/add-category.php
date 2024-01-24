<?php
include("./partials/header.php")
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Add Category</h2>
        <div class="message-alert">
            <p>This is an error message</p>
        </div>
        <form action="">
            
            <input type="text" placeholder="Title">
            <textarea name="" id="" cols="30" rows="4" placeholder="Description"></textarea>
           
            <button type="submit" class="btn">Add Category</button>
            <small class="message-alert">don't have an account? <a href="sign-up.php">Sign Up</a></small>
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
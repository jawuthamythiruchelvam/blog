<?php
include("./partials/header.php")
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Edit User</h2>
        <div class="message-alert">
            <p>This is an error message</p>
        </div>
        <form action="" enctype="multipart/form-data">
            
            <input type="text" placeholder="First name">
            <input type="text" placeholder="Last name">
                      
           <select name="" id="">
            <option value="0">Admin</option>
            <option value="1">Author</option>
            
           </select>
           
           <div class="form-control">
           <label for="profile-img" checked="">Add Profile image</label>
           <input type="file" name="" id="profile-img">
           </div>
            <button type="submit" class="btn">Update User</button>
            <!-- <small class="message-alert">Allready have an account? <a href="sign-in.html">Sign in</a></small>
         -->
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
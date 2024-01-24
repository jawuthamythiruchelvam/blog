<?php
include("./partials/header.php")
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Add Post</h2>
        <div class="message-alert">
            <p>This is an error message</p>
        </div>
        <form action="" enctype="multipart/form-data">
            
            <input type="text" placeholder="Title">
           
           <select name="" id="">
            <option value="1">Discovery</option>
            <option value="2">Discovery1</option>
            <option value="3">Discovery2</option>
            <option value="4">Discovery3</option>
           </select>
           <div class="form-control inline">
            <input type="checkbox" name="" id="is-Featured">
            <label for="is-Featured" checked>Featured</label>
           </div>
           <div class="form-control">
           <label for="thumb" checked="">Add Photos</label>
           <input type="file" name="" id="thumb" checked>
           </div>
           <textarea name="" id=""  rows="10"placeholder="Body"></textarea>
            <button type="submit" class="btn">Add Post</button>
           </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
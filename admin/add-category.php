<?php

include("./partials/header.php");
$title=$_SESSION['add-category-data']['title'] ?? null;
$description=$_SESSION['add-category-data']['description'] ?? null;
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Add Category</h2>

        

        <?php if(isset($_SESSION['add-category'])){?>
        <div class="message-alert-error">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
                
            </p>
        </div>
        <?php } ?>
        <form action="<?=ROOT_URL?>admin/add-category-logic.php" method="POST">
            
            <input type="text" name="title" value="<?=$title?>"placeholder="Title">
            <textarea name="description" value="<?=$description?>" id="description" cols="30" rows="4" placeholder="Description"></textarea>
           
            <button type="submit" name="submit" class="btn">Add Category</button>
            
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
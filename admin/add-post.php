<?php

include("./partials/header.php");

$category_query="SELECT * FROM categories";
$category_result=mysqli_query($conn,$category_query);

$title=$_SESSION['add-post-data']['title'] ?? null;
$categories=$_SESSION['add-post-data']['categories'] ?? null;
$is_featured=$_SESSION['add-post-data']['is_featured'] ?? null;
$body=$_SESSION['add-post-data']['body'] ?? null;
$blog_pic=$_SESSION['add-post-data']['blog_pic'] ?? null;

?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Add Post</h2>
        <?php if(isset($_SESSION['add-post'])){?>
        <div class="message-alert-error">
            <p>
                <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
                
            </p>
        </div>
        <?php } ?>
        <form action="add-post-logic.php" method="POST" enctype="multipart/form-data">
            
            <input type="text" name="title" placeholder="Title" value="<?=$title?>">
           
           <select name="category" id="">
            <option value="0">Select category</option>
           <?php while($category= mysqli_fetch_assoc($category_result)){?>
            <option value="<?=($category["id"])?>" <?= ($categories == $category["id"]) ? 'selected' : '' ?>><?=($category["title"])?></option>
            <?php }?>
            </select>
           <!-- <div class="form-control inline">
            <input type="checkbox" name="is-Featured" id="is-Featured" <?= ($is_featured) ? 'checked' : '' ?>>
            <label for="is-Featured" checked>Featured</label>
           </div> -->
           <div class="form-control">
           <label for="thumb" checked="">Add Photos</label>
           <input type="file" value="<?=$blog_pic["name"]?>" name="blog_pic" id="thumb">
           </div>
           <textarea name="body" id=""  rows="10"placeholder="Body"><?=$body?></textarea>
            <button type="submit"name="submit"  class="btn">Add Post</button>
           </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
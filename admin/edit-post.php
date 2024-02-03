<?php
include("./partials/header.php");
$category_query="SELECT * FROM categories";
$category_result=mysqli_query($conn,$category_query);

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM posts where id='$id'";
    $post_result=mysqli_query($conn,$query);
    $post=mysqli_fetch_assoc($post_result);
}

?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Edit Post</h2>
        <?php if(isset($_SESSION['edit-post'])){ ?>
        <div class="message-alert-error">
            <?= $_SESSION['edit-post']; 
             unset($_SESSION['edit-post']);
            ?>
         </div>
         <?php } ?>
        <form action="<?=ROOT_URL?>/admin/edit-post-logic.php" method="POST"enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$post['id'] ?>">
            <input type="text" name="title" value="<?=$post['title'] ?>" placeholder="Title">
           
            <select name="category" id="">
            <option value="0">Select category</option>
           <?php while($category= mysqli_fetch_assoc($category_result)){?>
            <option value="<?=($category["id"])?>"><?=($category["title"])?></option>
            <?php }?>
            </select>
           <!-- <div class="form-control inline">
            <input type="checkbox" name="" id="is-Featured">
            <label for="is-Featured" checked>Featured</label>
           </div> -->
           <div class="form-control">
           <label for="thumb" checked="">Edit Photos</label>
           <input type="hidden" name="prepostpic" value="<?=$post['thumbnail']?>">
           <input type="file" name="postpic" id="thumb" checked>
           </div>
           <textarea name="body" id=""  rows="10"placeholder=" update Body"><?=$post['body'] ?></textarea>
            <button type="submit" name="updatepost"class="btn">Update Post</button>
           </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
<?php
include("./partials/header.php");
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],);
    $query="SELECT * FROM categories where id='$id'";
    $category_result=mysqli_query($conn,$query) ;
    if(mysqli_num_rows($category_result)==1){
        $category=mysqli_fetch_assoc($category_result);

    }else{
        header('location: ' . ROOT_URL . 'admin/manage-category.php');
    die();
    }
    }
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Update Category</h2>
        <?php if(isset($_SESSION['edit-category'])) : ?>
            <div class="message-alert-error">
                <?= $_SESSION['edit-category']; ?>
                <?php unset($_SESSION['edit-category']); ?>
            </div>
        <?php endif; ?>
        <form action="<?=ROOT_URL?>/admin/edit-category-logic.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$category['id']?>">
            <input type="text" name="title" value="<?=$category['title']?>" placeholder="Title">
            <textarea  name="description" cols="30" rows="4" placeholder="Description"><?=$category['description']?></textarea>
           
            <button type="submit" name="submit"class="btn">Update Category</button>
           
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
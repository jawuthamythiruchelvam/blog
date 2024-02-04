<?php
session_start();
include("./partials/header.php");
require 'config/database.php';
$featured_query="SELECT * FROM posts ORDER BY RAND() LIMIT 1";
$featured_result=mysqli_query($conn,$featured_query);
$featured=mysqli_fetch_assoc($featured_result);
$feature_id=$featured['id'];
$fuser_id=$featured['author_id'];
$fcategory_id=$featured['category_id'];
$fcategory_query="SELECT * FROM categories WHERE id='$fcategory_id'";
$fcategory_result=mysqli_query($conn,$fcategory_query);
$fcategory=mysqli_fetch_assoc($fcategory_result);
$fuser_query="SELECT * FROM users WHERE id='$fuser_id'";
$fuser_result=mysqli_query($conn,$fuser_query);
$fuser=mysqli_fetch_assoc($fuser_result);
?>
<!-- start featured -->
    <section class="featured">
        <div class="container featured-container">
            <div class="post-thumb">
                <img src="images/<?=$featured['thumbnail']?>" alt="">
            </div>
            <div class="post-info">
                <a href="<?=ROOT_URL?>category.php?id=<?=$fcategory_id?>" class="category-btn"><?=$fcategory['title']?></a>
                <h2 class="post-title"><a href="<?=ROOT_URL?>/post.php?id=<?=$feature_id?>">
                <?=$featured['title']?>
                </a></h2>
            <p class="post-body"><?=substr($featured['body'],0,300)?>...</p>
            <div class="post-profile">
                <div class="post-profile-img">
                    <img src="images/<?= $fuser['avatar']?>" alt="">
                </div>
                <div class="post-profile-info"></div>
                <h5><?php echo $fuser['firstname'] .' '. $fuser['lastname']?></h5>
                <small><?= date("M d, Y - H:i",strtotime($featured['date_time']))?></small>
            </div> 
        </div>
        
        </div>
    </section>
<!-- featured end -->
<!-- post start -->


<section class="post">
    
    <div class="post-container container">
    <?php
    $post_query="SELECT * FROM posts where NOT id='$feature_id'";
    $post_result=mysqli_query($conn,$post_query);
    while($post=mysqli_fetch_assoc($post_result)){
    $post_id=$post['id'];
    $puser_id=$post['author_id'];
    $pcategory_id=$post['category_id'];
    $pcategory_query="SELECT * FROM categories WHERE id='$pcategory_id'";
    $pcategory_result=mysqli_query($conn,$pcategory_query);
    $pcategory=mysqli_fetch_assoc($pcategory_result);
    $puser_query="SELECT * FROM users WHERE id='$puser_id'";
    $puser_result=mysqli_query($conn,$puser_query);
    $puser=mysqli_fetch_assoc($puser_result);
?>
    <article class="post">
    <div class="post-thumb">
        <img  src="images/<?=$post['thumbnail']?>" alt="">
    </div>
<div class="post-info">
<a href="<?=ROOT_URL?>category.php?id=<?=$pcategory_id?>" class="category-btn"><?=$pcategory['title']?></a>
<h3 class="post-title"><a href="<?=ROOT_URL?>/post.php?id=<?=$post_id?>"><?=$post['title']?></a></h3>
<p class="post-body"><?=substr($post['body'],0,100)?>...</p>
<div class="post-profile">
    <div class="post-profile-img">
        <img src="images/<?= $puser['avatar']?>" alt="">
    </div>
    <div class="post-profile-info">
    <h5><?php echo $puser['firstname'] .' '. $puser['lastname']?></h5>
    <small><?= date("M d, Y - H:i",strtotime($post['date_time']))?></small>
</div>
</div> 
</div>
</article>
<?php }?>
       
 </div>
    </div>
</section>
<!-- post end -->
<!-- category start -->
<section class="category">
<div class="category-container container">
    <?Php $category_btn_query="SELECT * FROM categories";
    $category_btn_result=mysqli_query($conn,$category_btn_query);
    while($category_btn=mysqli_fetch_assoc($category_btn_result)){
    ?>
   
        <a href="<?=ROOT_URL?>category.php?id=<?=$category_btn['id']?>" class="category-btn"><?= $category_btn['title']?></a>
        <?php }?>
    </div>
</section>
<!-- category end -->
<!-- footer-start -->
<?php
include("./partials/footer.php")
?>
<!-- footer-end -->


    <script src="main.js"></script>
</body>
</php>
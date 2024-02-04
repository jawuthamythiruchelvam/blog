<?php

include("./partials/header.php");
require 'config/database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM posts where id='$id'";
    $post_result=mysqli_query($conn,$query);
    $post=mysqli_fetch_assoc($post_result);
    $category_id=$post['category_id'];
    $cquery="SELECT * FROM categories where id='$category_id'";
    $c_result=mysqli_query($conn,$cquery);
    $category_title=mysqli_fetch_assoc($c_result);
    $puser_id=$post['author_id'];
    $puser_query="SELECT * FROM users WHERE id='$puser_id'";
    $puser_result=mysqli_query($conn,$puser_query);
    $puser=mysqli_fetch_assoc($puser_result);
}
?>
<!-- single post start -->
<section class="singele-post">
    <div class="container singele-post-container">
        <h2> <?=$post['title']?></h2>
        <div class="post-profile">
            <div class="post-profile-img">
                <img src="images/<?=$puser['avatar']?>" alt="">
            </div>
            <div class="post-profile-info">
                <h5><?php echo $puser['firstname'] .' '. $puser['lastname']?></h5>
                <small><?= date("M d, Y - H:i",strtotime($post['date_time']))?></small>
            </div>
        </div>
        <div class="singele-post-thumb">
            <img src="images/<?= $post['thumbnail']?>" alt="">
        </div>
        <?= $post['body']?>

    </div>
</section>
<!-- single post end -->

<!-- footer-start -->
<?php
include("./partials/footer.php")
?>
<!-- footer-end -->


    <script src="main.js"></script>
</body>
</html>
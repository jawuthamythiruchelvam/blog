<?php
include("./partials/header.php");
require 'config/database.php';
?>
<section class="post">
<div class="post-container container">
<?php
if(isset($_POST['search'] ) && isset($_POST['submit'])){
$search=filter_var($_POST['search'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$QUERY="SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
$QUERY_RESULT=mysqli_query($conn,$QUERY);
while($post=mysqli_fetch_assoc($QUERY_RESULT)){
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
    
</section>

<?php
 }else{
    header('location: '. ROOT_URL.'blog.php');
    die();
}

?>
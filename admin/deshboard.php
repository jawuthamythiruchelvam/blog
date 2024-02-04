<?php
require 'config/database.php';
include("./partials/header.php");
$user_id=$_SESSION['user-id'];
$blog_query="SELECT * FROM posts where author_id='$user_id'";
$blog_result=mysqli_query($conn,$blog_query);
?>
    
    <section class="Deshboard">
    <?php if(isset($_SESSION['add-post-success'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['add-post-success']; 
             unset($_SESSION['add-post-success']);
            ?>
         </div>
         <?php } ?>
         <?php if(isset($_SESSION['edit-post-success'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['edit-post-success']; 
             unset($_SESSION['edit-post-success']);
            ?>
         </div>
         <?php } ?>
         <?php if(isset($_SESSION['delete-post'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['delete-post']; 
             unset($_SESSION['delete-post']);
            ?>
         </div>
         <?php } ?>
        <div class="container deshboard-container">
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php">
                            <i class="fa fa-plus"></i>
    
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="deshboard.php" class="active">
                            <i class="fa fa-pen"></i>
                            <h5>Manage Post</h5>
                        </a>
                    </li>
                    <?php if($_SESSION['user_is_admin']){?>
                    <li>
                        <a href="add-user.php">
                            <i class="fa fa-user-plus"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-user.php" >
                            <i class="fa fa-users"></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                   
                    <li>
                        <a href="add-category.php">
                            <i class="fa fa-mobile"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-category.php">
                            <i class="fa fa-list"></i>
                            <h5>Manege Category</h5>
                        </a>
                    </li>
                    <?PHP }?>
                </ul>
            </aside>
    <main>
        <h2>Manage Post</h2>
        <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($blog= mysqli_fetch_assoc($blog_result)){
            $category_id=$blog['category_id'];
            $category_query="SELECT * FROM categories where id='$category_id'";
            $category_result=mysqli_query($conn,$category_query);
            $category= mysqli_fetch_assoc($category_result)
            ?>
                
            <tr>
            <td><?= $blog['title'];?></td>
            <td><?= $category['title'];?></td>
               
            <td><a href="<?=ROOT_URL?>admin/edit-post.php?id=<?= $blog['id']?>" class="btn sm">Edit</a></td>
            <td><a href="<?=ROOT_URL?>admin/delete-post.php?id=<?= $blog['id']?>" class="btn sm danger">Delete</a></td>
            </tr>
            <?php }?>
            
        </tbody>
       </table>
    </main>
        </div>
    </section>
    <!-- footer-start -->
   
    <?php
include("./partials/footer.php")
?>
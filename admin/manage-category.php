<?php
include("./partials/header.php");

//$user_id= $_SESSION["user-id"];
$blog_query="SELECT * FROM categories WHERE NOT id=9";
$blog_result=mysqli_query($conn,$blog_query);
?>
    <section class="Deshboard">
    <?php if(isset($_SESSION['add-category-success'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['add-category-success']; 
             unset($_SESSION['add-category-success']);
            ?>
         </div>
         <?php } ?>
         <?php if(isset($_SESSION['delete-category'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['delete-category']; 
             unset($_SESSION['delete-category']);
            ?>
         </div>
         <?php } ?>
         <?php if(isset($_SESSION['edit-category-success'])) : ?>
            <div class="message-alert-success">
                <?= $_SESSION['edit-category-success']; ?>
                <?php unset($_SESSION['edit-category-success']); ?>
            </div>
        <?php endif; ?>
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
                        <a href="deshboard.php">
                            <i class="fa fa-pen"></i>
                            <h5>Manage Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-user.php">
                            <i class="fa fa-user-plus"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-user.php" class="">
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
                        <a href="manage-category.php" class="active">
                            <i class="fa fa-list"></i>
                            <h5>Manege Category</h5>
                        </a>
                    </li>
                </ul>
            </aside>
    <main>
        <h2>Manage Category</h2>
        <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
            <?php while($blog= mysqli_fetch_assoc($blog_result)){
               
                ?>
            <tr>
            <td><?= $blog['title'];?></td>
                <td><a href="<?=ROOT_URL?>admin/edit-category.php?id=<?= $blog['id']?>" class="btn sm">Edit</a></td>
                <td><a href="<?=ROOT_URL?>admin/delete-category.php?id=<?= $blog['id']?>" class="btn sm danger">Delete</a></td>
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
<?php

include("./partials/header.php");
$user_id= $_SESSION["user-id"];
$user_query="SELECT * FROM users WHERE  NOT id='$user_id' and NOT id=33";
$user_result=mysqli_query($conn,$user_query);
?>
    
    <section class="Deshboard">
    <?php if(isset($_SESSION['edit-user-success'])) : ?>
        <div class="message-alert-success">
            <?= $_SESSION['edit-user-success']; ?>
            <?php unset($_SESSION['edit-user-success']); ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['add-user-success'])) : ?>
        <div class="message-alert-success">
            <?= $_SESSION['add-user-success']; ?>
            <?php unset($_SESSION['add-user-success']); ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['delete-user'])){?>
        <div class="message-alert-success">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
                
            </p>
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
                        <a href="manage-user.php" class="active">
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
                </ul>
            </aside>
    <main>
        <h2>Manage User</h2>
        <table class="text-white">
        <thead class="text-white">
            <tr>
                <th>Name</th>
                <th>User name</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
           <?php while($user= mysqli_fetch_assoc($user_result)){?>
            <tr>
            <td><?= $user['firstname'] . ' ' . $user['lastname'];?></td>
                <td><?=$user['username'];?></td>
                <td><?= $user['is_admin'] == 1 ? 'Yes' : 'No' ?></td>
                <td><a href="<?=ROOT_URL?>admin/edit-user.php?id=<?= $user['id']?>" class="btn sm">Edit</a></td>
                <td><a href="<?=ROOT_URL?>admin/delete-user.php?id=<?= $user['id']?>" class="btn sm danger">Delete</a></td>
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
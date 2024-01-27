<?php
session_start();
include("./partials/header.php")
?>
    
    <section class="Deshboard">
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
                        <a href="dashboard.php" class="active">
                            <i class="fa fa-pen"></i>
                            <h5>Manage Post</h5>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['user_is_admin'])){?>
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
            <tr>
                <td>lipsum</td>
                <td>Discovery</td>
               
                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
            </tr>
            <tr>
                <td>lipsum</td>
                <td>Discovery</td>
               
                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
            </tr>
            <tr>
                <td>lipsum</td>
                <td>Discovery</td>
               
                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
            </tr>
            <tr>
                <td>lipsum</td>
                <td>Discovery</td>
               
                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
            </tr>
            <tr>
                <td>lipsum</td>
                <td>Discovery</td>
               
                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                <td><a href="delete-post.php" class="btn sm danger">Delete</a></td>
            </tr>
            
        </tbody>
       </table>
    </main>
        </div>
    </section>
    <!-- footer-start -->
   
    <?php
include("./partials/footer.php")
?>
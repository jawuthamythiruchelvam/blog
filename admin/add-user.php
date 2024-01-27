<?php
include("./partials/header.php");
$firstname=$_SESSION['add-user_data']['firstname'] ?? null;
$lastname=$_SESSION['add-user_data']['lastname'] ?? null;
$username=$_SESSION['add-user_data']['username'] ?? null;
$email=$_SESSION['add-user_data']['email'] ?? null;
$password=$_SESSION['add-user_data']['password'] ?? null;
$cpassword=$_SESSION['add-user_data']['cpassword'] ?? null;
$avatar=$_SESSION['add-user_data']['avatar'] ?? null;
$user_type=$_SESSION['add-user_data']['user_type'] ?? null;

?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Add User</h2>
        <?php if(isset($_SESSION['add-user-success'])){ ?>
        <div class="message-alert-success">
            <?= $_SESSION['add-user-success']; 
             unset($_SESSION['add-user-success']);
            ?>
         </div>
         <?php } ?>

        <?php if(isset($_SESSION['add-user'])){?>
        <div class="message-alert-error">
            <p>
                <?= $_SESSION['add-user'];
                unset($_SESSION['add-user']);
                ?>
                
            </p>
        </div>
        <?php } ?>
        <form action="<?= ROOT_URL?>/admin/add-user-logic.php" enctype="multipart/form-data" method='post'>
            
            <input type="text" name="firstname" value="<?= $firstname?>"placeholder="First name">
            <input type="text" name="lastname" value="<?= $lastname?>"placeholder="Last name">
            <input type="text" name="username" value="<?= $username?>" placeholder="User name">
            <input type="email" name="email" value="<?= $email?>" placeholder="email">
            <input type="password" name="password" value="<?= $password?>" placeholder="password">
            <input type="password" name="cpassword" value="<?= $cpassword?>" placeholder="confirm password">
           
           <select name="user_type" id="user_type" value="<?= $user_type?>">
            <option value="0">Admin</option>
            <option value="1">Author</option>
            
           </select>
           
           <div class="form-control">
           <label for="profile-img" checked="">Add Profile image</label>
           <input type="file" name="avatar"value="<?= $avatar?>" id="avatar">
           </div>
            <button type="submit"  name="submit"class="btn">Add User</button>
            <!-- <small class="message-alert">Allready have an account? <a href="sign-in.php">Sign in</a></small>
         -->
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
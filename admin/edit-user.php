<?php
//session_start();
include("./partials/header.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM users where id='$id'";
    $user_result=mysqli_query($conn,$query);
    $user=mysqli_fetch_assoc($user_result);
}
?>
    
   <!-- sign-in-form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2>Edit User</h2>
        
        <form action="<?=ROOT_URL?>/admin/edit-user-logic.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$user['id'] ?>">

            <input type="text" value="<?=$user['firstname'] ?>" name="firstname" placeholder="First name">
            <input type="text" value="<?=$user['lastname'] ?>" name="lastname" placeholder="Last name">
                      
           <select  value="<?= $user['is_admin']?>" name="user_type" id="">
            <option value="1" <?php echo $user['is_admin'] == 1 ? 'selected' : ''; ?>>Admin</option>
            <option value="0" <?php echo $user['is_admin'] == 0 ? 'selected' : ''; ?>>Author</option>
            
           </select>
           
           <!-- <div class="form-control">
           <label for="profile-img" >Add Profile image</label>
           <input type="file" value="<?=$user['avatar'] ?>" name="avatar" id="profile-img">
           </div> -->
            <button type="submit" name="UpdateUser"class="btn">Update User</button>
            <!-- <small class="message-alert">Allready have an account? <a href="sign-in.html">Sign in</a></small>
         -->
        </form>
    </div>
</section>
   <!-- sign-in-form -->

    <!-- footer-start -->
    <?php
include("./partials/footer.php")
?>
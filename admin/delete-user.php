<?php
session_start();
require 'config/database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM users where id='$id'";
    $user_result=mysqli_query($conn,$query);
    $user=mysqli_fetch_assoc($user_result);
}
$update_query="Update posts SET author_id=33 where author_id=$id";
$update_reslut=mysqli_query($conn,$update_query);

if(mysqli_num_rows($user_result)==1){
$avatar_name=$user['avatar'];
$avatar_path="../images/".$avatar_name;
if($avatar_path){
    unlink($avatar_path);
}
}

$delete_user_query="DELETE FROM users WHERE id=$id";
$delete_user_result=mysqli_query($conn,$delete_user_query);
if(mysqli_errno($conn)){
    $_SESSION['delete-user']="couldn't delete user";
}else{
    //$_SESSION['delete-user']=" User '{$user['firstname]} '{$user['lastname']}' deleted successfully";
    $_SESSION['delete-user'] = "User '{$user['firstname']}'.' ' . '{$user['lastname']}' deleted successfully";
    header('location:'.ROOT_URL.'admin/manage-user.php');
    die();
}
?>
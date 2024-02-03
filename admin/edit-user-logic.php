<?php
session_start();
require 'config/database.php';
if(isset($_POST['UpdateUser'])){
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$firstname =filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
$lastname =filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
$user_type=filter_var($_POST['user_type'],FILTER_SANITIZE_NUMBER_INT);
$propic=$_FILES['avatar'];
}

if(empty($firstname) || empty($lastname)){
$_SESSION['edit-user']="Invalid input on edit page";
}else{
    //$query="UPDATE users SET firstname=' $firstname',lastname='$lastname',is_admin='$user_type' where id='$id' LIMIT 1";
    $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin='$user_type' WHERE id='$id' LIMIT 1";

    $result=mysqli_query($conn,$query);
    header('location:'.ROOT_URL.'admin/manage-user.php');
    die();

    if(mysqli_errno($conn)){
        $_SESSION['edit-user']="Fail to update user";
    
    }else{
       $_SESSION['edit-user-success']="user $firstname $lastname detail update successfully" ;
    }
}
header('location:'.ROOT_URL.'admin/manage-user.php');
    die();
?>
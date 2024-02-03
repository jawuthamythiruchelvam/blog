<?php
session_start();
require 'config/database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM posts where id=$id";
    $category_results=mysqli_query($conn,$query);
    $category=mysqli_fetch_assoc($category_results);
}

if(mysqli_num_rows($category_results)==1){
    $delete_category_query="DELETE FROM posts WHERE id=$id";
    $delete_category_results=mysqli_query($conn,$delete_category_query);
    if(mysqli_errno($conn)){
        $_SESSION['delete-post']="couldn't delete post";
    }else{
        
        $_SESSION['delete-post'] = "Post '{$category['title']}' deleted successfully";
        header('location:'.ROOT_URL.'admin/deshboard.php');
        die();
    
    }
}


?>
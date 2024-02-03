<?php
session_start();
require 'config/database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM categories where id='$id'";
    $category_results=mysqli_query($conn,$query);
    $category=mysqli_fetch_assoc($category_results);

    //update category as undefined
    $update_query="Update posts SET category_id=9 where category_id=$id";
    $update_reslut=mysqli_query($conn,$update_query);
if(!mysqli_errno($conn)){

if(mysqli_num_rows($category_results)==1){
    $delete_category_query="DELETE FROM categories WHERE id=$id";
    $delete_category_results=mysqli_query($conn,$delete_category_query);
    if(mysqli_errno($conn)){
        $_SESSION['delete-category']="couldn't delete category";
    }else{
        
        $_SESSION['delete-category'] = "category '{$category['title']}' deleted successfully";
        header('location:'.ROOT_URL.'admin/manage-category.php');
        die();
    
    }
}
}}


?>
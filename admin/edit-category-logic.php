<?php
session_start();
require 'config/database.php';

if(isset($_POST["submit"])){
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

if (empty($title) || empty($description)) {
    $_SESSION['edit-category'] = "Invalid input on edit page";
    header('location: ' . ROOT_URL . 'admin/edit-category.php?id=' . $id );
    

} else {
    $query = "UPDATE categories SET title='$title', description='$description' WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_errno($conn)){
        $_SESSION["edit-category"]="could not update category";
    }else{
        $_SESSION["edit-category-success"]="Category $title was updated successfully";
    }
    header('location: ' . ROOT_URL . 'admin/manage-category.php');
    die();
}

}
else{
    header('location: ' . ROOT_URL . 'admin/edit-category.php');
    
}

?>

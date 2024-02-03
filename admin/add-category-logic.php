<?php
session_start();
require 'config/database.php';
if(isset($_POST['submit'])){

$title=filter_var($_POST['title'],FILTER_SANITIZE_STRING);
//$description=filter_var($_POST['description'],FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
if(empty($title)){
    $_SESSION["add-category"]=" enter the category name";
}elseif(empty($description)){
    $_SESSION["add-category"]=" enter the description";
}
if(isset($_SESSION["add-category"])){
    $_SESSION['add-category-data']=$_POST;
    header('location: ' . ROOT_URL .'/admin/add-category.php');
    die();
}
else{
    
    $insert_category_query="INSERT INTO categories (title,description) VALUES ('$title','$description')" ;

   if (mysqli_query($conn, $insert_category_query)) {
    
    $_SESSION['add-category-success'] = "$title category added successfully.";

    header('location: ' . ROOT_URL .'/admin/manage-category.php');
    die();
    unset($_SESSION['add-category-data']);}
    else{
        $_SESSION['add-user'] = "Error: " . mysqli_error($conn);
        header('location: ' . ROOT_URL .'/admin/add-category.php');
        die();
       
    }

}
}else{
    header('location:'.ROOT_URL.'/admin/add-category.php');
die();
}

?>
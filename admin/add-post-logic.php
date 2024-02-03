<?php

session_start();
require 'config/database.php';
if(isset($_POST['submit'])){
$title =filter_var($_POST['title'],FILTER_SANITIZE_STRING);
$category_id =filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
$body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$blogpic=$_FILES['blog_pic'];
$is_featured=filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);
//$is_featured=$is_featured==1?:0;
$user_id=$_SESSION["user-id"];

if(empty($title)){
    $_SESSION["add-post"]="Enter post title";
}elseif($category_id==0){
    $_SESSION["add-post"]="Select the category";
}elseif(empty($body)){
    $_SESSION["add-post"]="Enter post body";
}elseif(empty($blogpic["name"])){
    $_SESSION["add-post"]="Enter post thumbnail";
}
else{
    $time=time();
            $blogpic_name=$time.$blogpic['name'];
            $blogpic_tmp_name=$blogpic["tmp_name"];
            $blogpic_destination_path='../images/'.$blogpic_name;

            $allowed_file=['png','jpg','jpeg'];
            $extention=explode('.',$blogpic_name);
            $extention=end($extention);
            if(in_array($extention,$allowed_file)){
                if($blogpic['size']<1000000){
                    
                    move_uploaded_file($blogpic_tmp_name, $blogpic_destination_path);


                }else{
                    $_SESSION['add-post']="file size is too big should be less than 1mb";
                }
            }else{
                $_SESSION['add-post']="file should be png,jpg,jpeg";
            }
}
if(!empty($_SESSION['add-post'])){
    //pass the incorrect date to sign up page again
    $_SESSION['add-post-data']=$_POST;
    header('location:'.ROOT_URL.'/admin/add-post.php');
    die();
}else{
   $insert_blog_query="INSERT INTO posts (title,body,thumbnail,category_id,author_id) VALUES ('$title','$body','$blogpic_name','$category_id','$user_id')" ;

   if (mysqli_query($conn, $insert_blog_query)) {
    //$_SESSION['add-post-success'] = "Registration successful Destination Path: ' . $avatar_destination_path .";
    $_SESSION['add-post-success'] = "$title  added successful ";
    unset($_SESSION['add-post-data']);
    header('location: ' . ROOT_URL . '/admin/deshboard.php');
    die();
    // unset($_SESSION['add-post-data']);
} else {
    $_SESSION['add-post'] = "Error: " . mysqli_error($conn);
    header('location: ' . ROOT_URL . '/admin/add-post.php');
    die();
}
}
}
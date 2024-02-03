<?php
session_start();

require 'config/database.php';

if(isset($_POST['updatepost'])){
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$category=filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
$title =filter_var($_POST['title'],FILTER_SANITIZE_STRING);
$body =filter_var($_POST['body'],FILTER_SANITIZE_STRING);
$prepostpic=filter_var($_POST['prepostpic'],FILTER_SANITIZE_SPECIAL_CHARS);
$postpic=$_FILES['postpic'];

if(isset($postpic)){
    $time=time();
    $avatar_name=$time.$postpic['name'];
    $avatar_tmp_name=$postpic["tmp_name"];
    $avatar_destination_path='../images/'.$avatar_name;

    $allowed_file=['png','jpg','jpeg'];
    $extention=explode('.',$avatar_name);
    $extention=end($extention);
    if(in_array($extention,$allowed_file)){
        if($postpic['size']<1000000){
            
            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);


        }else{
            $_SESSION['edit-post']="file size is too big should be less than 1mb";
        }
    }else{
        $_SESSION['edit-post']="file should be png,jpg,jpeg";
    }
}

if(empty($title) || empty($body)){
$_SESSION['edit-post']="Invalid input on edit page";
}
else{
    if($avatar_name==$prepostpic){
    if($category>0){
    //$query="UPDATE posts SET firstname=' $firstname',lastname='$lastname',is_admin='$post_type' where id='$id' LIMIT 1";
    $query = "UPDATE posts SET title='$title', category_id='$category', body='$body' WHERE id='$id' LIMIT 1";

    $result=mysqli_query($conn,$query);
    header('location:'.ROOT_URL.'admin/deshboard.php');
    die();

    if(mysqli_errno($conn)){
        $_SESSION['edit-post']="Fail to update post";
    
    }else{
       $_SESSION['edit-post-success']="post $title detail update successfully" ;
    }
}
else{
    $query = "UPDATE posts SET title='$title', body='$body' WHERE id='$id' LIMIT 1";

    $result=mysqli_query($conn,$query);
    header('location:'.ROOT_URL.'admin/deshboard.php');
    die();

    if(mysqli_errno($conn)){
        $_SESSION['edit-post']="Fail to update post";
    
    }else{
       $_SESSION['edit-post-success']="post $title  update successfully" ;
    }
}}else{
    if($category>0){
        //$query="UPDATE posts SET firstname=' $firstname',lastname='$lastname',is_admin='$post_type' where id='$id' LIMIT 1";
        $query = "UPDATE posts SET title='$title', category_id='$category', body='$body',thumbnail='$avatar_name' WHERE id='$id' LIMIT 1";
    
        $result=mysqli_query($conn,$query);
        header('location:'.ROOT_URL.'admin/deshboard.php');
        die();
    
        if(mysqli_errno($conn)){
            $_SESSION['edit-post']="Fail to update post";
        
        }else{
           $_SESSION['edit-post-success']="post $title detail update successfully" ;
        }
    }
    else{
        $query = "UPDATE posts SET title='$title', body='$body',thumbnail='$avatar_name' WHERE id='$id' LIMIT 1";
    
        $result=mysqli_query($conn,$query);
        // header('location:'.ROOT_URL.'admin/deshboard.php');
        // die();
    
        if(mysqli_errno($conn)){
            $_SESSION['edit-post']="Fail to update post";
        
        }else{
           $_SESSION['edit-post-success']="post $title  update successfully" ;
        }
    }
}
}
}
header('location:'.ROOT_URL.'admin/deshboard.php');
    die();
?>
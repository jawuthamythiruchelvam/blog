<?php
session_start();
require 'config/database.php';
if(isset($_POST['submit'])){
$firstname =filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
$lastname =filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
$username =filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$password=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cpassword=filter_var($_POST['cpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$user_type=filter_var($_POST['user_type'],FILTER_SANITIZE_NUMBER_INT);
$propic = $_FILES['avatar'];  


if(empty($firstname)){
    $_SESSION['add-user']="please enter user first name";
}
elseif(empty($lastname)){
    $_SESSION['add-user']="please enter user last name";
}
elseif(empty($username)){
    $_SESSION['add-user']="please enter user user name";
}
elseif(empty($email)){
    $_SESSION['add-user']="please enter a valid email";
}
elseif(strlen($password) < 8 || strlen($cpassword) < 8) {
    $_SESSION['add-user']="password should be 8+ characters";
}
elseif(empty($user_type)){
    $_SESSION['add-user']="please select the user type";
}
elseif(empty($propic)){
    $_SESSION['add-user']="please add profile pic";
}
else{
    if($cpassword!==$password){
        $_SESSION['add-user']="password do not mutch";

    }else{
        $hash_password=password_hash($cpassword,PASSWORD_DEFAULT);
        $user_email_check_query="SELECT * FROM users WHERE  username='$username' OR email='$email'";
        $user_result=mysqli_query($conn,$user_email_check_query);
        if(mysqli_num_rows($user_result)>0){
            $_SESSION['add-user']="Username or email already exist";
        }
        else{
            $time=time();
            $avatar_name=$time.$propic['name'];
            $avatar_tmp_name=$propic["tmp_name"];
            $avatar_destination_path='images/'.$avatar_name;

            $allowed_file=['png','jpg','jpeg'];
            $extention=explode('.',$avatar_name);
            $extention=end($extention);
            if(in_array($extention,$allowed_file)){
                if($propic['size']<1000000){
                    move_uploaded_file($avatar_tmp_name, $avatar_destination_path);


                }else{
                    $_SESSION['add-user']="file size is too big should be less than 1mb";
                }
            }else{
                $_SESSION['add-user']="File should be png , jpg , jpeg";
            }
        }
    }
}
if(!empty($_SESSION['add-user'])){
    //pass the incorrect date to sign up page again
    $_SESSION['add-user_data']=$_POST;
    header('location:'.ROOT_URL.'admin/add-user.php');
    die();
}else{
   $insert_user_query="INSERT INTO users (firstname,lastname,username,email,password,avatar,is_admin) VALUES ('$firstname','$lastname','$username','$email','$hash_password','$avatar_name','$user_type')";

   if (mysqli_query($conn, $insert_user_query)) {
    $_SESSION['add-user-success'] = " New user $firstname $lastname  added successfully.";
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
} else {
    $_SESSION['add-user'] = "Error: " . mysqli_error($conn);
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}
}
}
else{
header('location:'.ROOT_URL.'admin/add-user.php');
die();

}


?>
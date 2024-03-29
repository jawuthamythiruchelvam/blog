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
$propic=$_FILES['Upload-img'];

if(empty($firstname)){
    $_SESSION['signup']="please enter your first name";
}
elseif(empty($lastname)){
    $_SESSION['signup']="please enter your last name";
}
elseif(empty($username)){
    $_SESSION['signup']="please enter your user name";
}
elseif(empty($email)){
    $_SESSION['signup']="please enter a valid email";
}
elseif(strlen($password) < 8 || strlen($cpassword) < 8) {
    $_SESSION['signup']="password should be 8+ characters";
}
elseif(empty($propic)){
    $_SESSION['signup']="please add profile pic";
}
else{
    if($cpassword!==$password){
        $_SESSION['signup']="password do not mutch";

    }else{
        $hash_password=password_hash($cpassword,PASSWORD_DEFAULT);
        $user_email_check_query="SELECT * FROM users WHERE  username='$username' OR email='$email'";
        $user_result=mysqli_query($conn,$user_email_check_query);
        if(mysqli_num_rows($user_result)>0){
            $_SESSION['signup']="Username or email already exist";
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
                    $_SESSION['signup']="file size is too big should be less than 1mb";
                }
            }else{
                $_SESSION['signup']="file should be png,jpg,jpeg";
            }
        }
    }
}
if(!empty($_SESSION['signup'])){
    //pass the incorrect date to sign up page again
    $_SESSION['signup_data']=$_POST;
    header('location:'.ROOT_URL.'sign-up.php');
    die();
}else{
   $insert_user_query="INSERT INTO users (firstname,lastname,username,email,password,avatar,is_admin) VALUES ('$firstname','$lastname','$username','$email','$hash_password','$avatar_name',0)" ;

   if (mysqli_query($conn, $insert_user_query)) {
    $_SESSION['signup-success'] = "Registration successful. Please log in";
    header('location: ' . ROOT_URL . 'sing-in.php');
    die();
} else {
    $_SESSION['signup'] = "Error: " . mysqli_error($conn);
    header('location: ' . ROOT_URL . 'sing-up.php');
    die();
}
}
}
else{
header('location:'.ROOT_URL.'sing-up.php');
die();

}


?>
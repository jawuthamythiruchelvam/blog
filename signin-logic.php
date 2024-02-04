<?php
session_start();
require 'config/database.php';
if(isset($_POST['submit'])){
    $username_email=filter_var($_POST['username_email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(empty($username_email)){
        $_SESSION['signin']="please enter your username or email";
    }
    elseif(empty($password)){
        $_SESSION['signin']="please enter the password";
    }
    else{
        $get_user_detail="SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
        $fetch_result_user=mysqli_query($conn,$get_user_detail);
        if(mysqli_num_rows($fetch_result_user)==1){
            $user_full_data=mysqli_fetch_assoc($fetch_result_user);
            $user_password=$user_full_data['password'];
            $_SESSION['avatar']=$user_full_data['avatar'];
            if(password_verify($password,$user_password)){
                $_SESSION['user-id']=$user_full_data['id'];
                if($user_full_data['is_admin']==1){
                    $_SESSION['user_is_admin'] = true;
                
                    header('location:'.ROOT_URL.'admin/deshboard.php');
                
                }
                else {
                    $_SESSION['user_is_admin'] = false;
                    header('location:'.ROOT_URL.'index.php');
                }
            }else{
                $_SESSION['signin']="password incorrect";
            }
        }
        else{
            $_SESSION['signin']="counld not found username or email";
        }
    }
        if(!empty($_SESSION['signin'])){
            //pass the incorrect date to sign in page again
            $_SESSION['signin_data']=$_POST;
            header('location:'.ROOT_URL.'sing-in.php');
            die();
        }
        
    }else{
        header('location:'.ROOT_URL.'sing-in.php');
        die();
    }

?>
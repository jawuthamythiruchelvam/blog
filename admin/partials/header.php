<?php
session_start();
require 'config/database.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <nav>
        <div class="container nav-container">
            <a href="../index.php" class="logo" ><h3>Code for <span> Blog</span></h3></a> 
            <ul class="nav-link">
                <li><a href="<?= ROOT_URL?>./index.php">Home</a></li>
                <li><a href="<?= ROOT_URL?>./blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL?>./about.php">About</a></li>
                <li><a href="<?= ROOT_URL?>./services.php">Services</a></li>
                <li><a href="<?= ROOT_URL?>./contact.php">contact</a></li>
                <li><a href="<?= ROOT_URL?>./sing-in.php">Sing In</a></li>
                <li>
                    <?php if(isset($_SESSION['user-id'])){?>
                    <div class="nav-profile">
                        <div class="profile-img">
                        <img src="<?= ROOT_URL. 'images/'. $_SESSION['avatar'];?>" alt="">
                        </div>
                   
                        <ul>
                        <li><a href="./deshboard.php">Dashboard</a></li>
                        <li><a href="../logout.php">Log out</a></li>
                        </ul>
                        
                 </div>
                 <?php }?>
                </li>
            </ul>
            <button class="phone-button open"><i class="fa fa-bars"></i></button>
            <button class="phone-button close"><i class="fa fa-close"></i></button>
        </div>
    </nav>
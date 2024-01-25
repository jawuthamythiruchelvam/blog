<?php
require 'config/constants.php';
?>
<?php

$servern="localhost";
$user="root";
$password="";
$db_name="blog";


try{
    $conn=mysqli_connect($servern,$user,$password,$db_name);
}
catch(mysqli_sql_exception){
    echo"could not connect!";
    }

// if(isset($conn)){
//     echo" connected to server";
// }
?>

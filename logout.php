<?php 
session_start();
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";


$cookie_name = "cookie_username";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");

$cookie_name = "cookie_password";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");
session_destroy();
header("location:login.php");
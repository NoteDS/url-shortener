<?php
include('assets/php/config.php');
include('assets/php/recreate_session.php');
$cookie = $_COOKIE['remember_session'];

if($user_type == 'local')
{
    mysqli_query($conn, "DELETE FROM sessions WHERE local_key = '$cookie'");
}
setcookie('remember_session', '', time()+60, "/"); 
unset($_COOKIE['remember_session']);
session_unset();
header('location: /');
die();
?>
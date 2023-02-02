<?php 

session_start();

//  "https://dashboard.example.com"
$config['domain'] = "";

//mysqli server configuration
$config['db_host'] = "";
$config['db_user'] = "";
$config['db_pass'] = "";
$config['db_name'] = ""; 

$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
if(!$conn){
    Header('Location: ' + $config['domain'] + '/500.php');
    die();
}

?>
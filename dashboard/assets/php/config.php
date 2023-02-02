<?php
session_start();


//Website name. Example: URL-SHORTENER
$config['name'] = '';


//Redirect page domain. WITHOUT / AT END!  
//Exmaple: https://example.com
$config['shortener_domain'] = '';


//Dashboard page domain. WITHOUT / AT END!  
//Exmaple: https://dashboard.example.com
$config['dashboard_domain'] = '';


//Mysql Server Configuration
$config['db_host'] = '';
$config['db_user'] = '';
$config['db_pass'] = '';
$config['db_name'] = '';



//discord application configuration
 
// Discord app client id. Example: 000000000000000000
$config['dsc_oauth2_client_id'] = '';
// Discord app client secret. Example: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
$config['dsc_oauth2_client_secret'] = '';
// Discord callback url Example: https://{domain}/{path_to}/{file.php} (configured)
$config['dsc_callback_url'] = $config['dashboard_domain'].'/assets/php/auth_discord.php';
// Discord scopes (configured)
$config['dsc_scope'] = 'identify';
// Discord urls
$config['dsc_auth_url'] = 'https://discord.com/api/oauth2/authorize';
$config['dsc_token_url'] = 'https://discord.com/api/oauth2/token';
$config['dsc_url_base'] = 'https://discord.com/api/users/@me';


//Mysql Server Connection
$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
if(!$conn){
    Header('Location: /500.php');
    exit();
}




include('functions.php');
?>
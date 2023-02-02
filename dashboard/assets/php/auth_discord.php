<?php 

require('config.php');



define('OAUTH2_CLIENT_ID', $config['dsc_oauth2_client_id']);
define('OAUTH2_CLIENT_SECRET', $config['dsc_oauth2_client_secret']);
define('AUTH_URL', $config['dsc_auth_url']);
define('CALLBACK_URL', $config['dsc_callback_url']);
define('SCOPE', $config['dsc_scope']);
define('TOKEN_URL', $config['dsc_token_url']);
define('URL_BASE', $config['dsc_url_base']);


if (get('discord') == 'discord') {
    // Random Hash stored in session for security.
    $_SESSION['state'] = hash('sha256', microtime(TRUE).rand().$_SERVER['REMOTE_ADDR']);
    unset($_SESSION['access_token']);
    
    $params = array(
        'client_id' => OAUTH2_CLIENT_ID,
        'redirect_uri' => CALLBACK_URL,
        'response_type' => 'code',
        'scope' => SCOPE,
        'state' => $_SESSION['state']
    );
    
    //Redirect to Discord Auth Page
    header('Location: ' . AUTH_URL . '?' . http_build_query($params));
    die();
}

if (get('code')) {
    if(!get('state') || $_SESSION['state'] != get('state')) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        die();
    }
    
    //Exchange auth_code for token
    $token = apiRequest(TOKEN_URL, true, array (
        'client_id' => OAUTH2_CLIENT_ID,
        'client_secret' => OAUTH2_CLIENT_SECRET,
        'grant_type' => 'authorization_code',
        'code' => get('code'),
        'redirect_uri' => CALLBACK_URL,
        'scope' => SCOPE
    ));
    $_SESSION['access_token'] = $token->access_token;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
}

if(session('access_token')) {
  $user = apiRequest(URL_BASE, false, '');

  print_r($user);

  $_SESSION['user_user'] = $user->username;
  $_SESSION['user_discriminator'] = $user->discriminator;
  $_SESSION['user_id'] = $user->id;
  $_SESSION['user_avatar'] = $user->avatar;
  $_SESSION['user_type'] = 'discord';

  if(isset($_COOKIE['remember_session']))
  {
      $local_key = $_COOKIE['remember_session'];
    $update_user_links = mysqli_query($conn, "UPDATE `url` SET `userid` = '$user->id' WHERE `localkey` = '$local_key'");
    if(!$update_user_links)
    {
        header('Location: /500.php');
        exit();
    }
  }

  $find_user_in_database = mysqli_query($conn, "SELECT * FROM `sessions` WHERE `user_id` = '$user->id' AND `user_type` = 'discord'");
  if(mysqli_num_rows($find_user_in_database) > 0)
  {


    $get_user_in_database = mysqli_fetch_assoc($find_user_in_database);

    $_SESSION['local_key'] = $get_user_in_database['local_key'];
    $_SESSION['user_api_key'] = $get_user_in_database['user_api_key'];

    $local_key = $_SESSION['local_key'];

    $update_user_links_key = mysqli_query($conn, "UPDATE `url` SET `localkey` = '$local_key' WHERE `userid` = '$user->id'");
    if(!$update_user_links_key)
    {
        header('Location: /500.php');
        exit();
    }


    $update_user_profile = mysqli_query($conn, "UPDATE `sessions` SET `user_user` = '$user->username', `user_discriminator` = '$user->discriminator', `user_avatar` = '$user->avatar' WHERE `local_key` = '$local_key'");
    if(!$update_user_profile)
    {
        header('Location: /500.php');
        exit();
    }
    setcookie('remember_session', $_SESSION['local_key'], time()+60*60*24*90, "/"); 
    
    Header('Location: /dashboard/');
    exit();
  }
  else
  {   
    
  $_SESSION['user_api_key'] = generateRandomString(28);
    
  $user_api_key = $_SESSION['user_api_key'];


  if(isset($_COOKIE['remember_session']))
  {


    $_SESSION['local_key'] = $_COOKIE['remember_session'];
    
    $local_key = $_SESSION['local_key'];


    $update_user_profile = mysqli_query($conn, "UPDATE `sessions` SET `user_user` = '$user->username', `user_discriminator` = '$user->discriminator', `user_id` = '$user->id', `user_avatar` = '$user->avatar', `user_api_key` = '$user_api_key', `user_type` = 'discord' WHERE `local_key` = '$local_key'");
    if(!$update_user_profile)
    {
        header('Location: /500.php');
        exit();
    }

    $update_user_links = mysqli_query($conn, "UPDATE `url` SET `userid` = '$user->id' WHERE `localkey` = '$local_key'");
        if(!$update_user_links)
        {
            header('Location: /500.php');
            exit();
        }

  
    }
    else
    {

        $_SESSION['local_key'] = generateRandomString(50);
        
        $local_key = $_SESSION['local_key'];


            $update_user_profile = mysqli_query($conn, "INSERT INTO `sessions` VALUES(NULL, '$local_key', '$user->username', '$user->discriminator', '$user->id', '$user->avatar', '$user_api_key', 'discord', '', '', NULL, 'en')");
            if(!$update_user_profile)
            {
                header('Location: /500.php');
                exit();
            }
    }


    setcookie('remember_session', $local_key, time()+60*60*24*90, "/"); 
    
Header('Location: /dashboard/');
exit();
  }

}




Header('Location: /');







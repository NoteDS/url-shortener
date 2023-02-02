
<?php

require '../assets/php/config.php';
require '../assets/php/recreate_session.php';



$find_user_in_database = mysqli_query($conn, "SELECT * FROM `sessions` WHERE `local_key` = '$local_key'");
if(mysqli_num_rows($find_user_in_database) > 0)
{

    $get_user_in_database = mysqli_fetch_assoc($find_user_in_database);



    if($get_user_in_database['user_type'] == 'local')
    {
        setcookie('remember_session', '', time()+60, "/"); 
        unset($_COOKIE['remember_session']);
        session_unset();
        echo 'FORBIDDEN';
        exit();
    }
    else
    {
        $local_key = $get_user_in_database['local_key'];
        $user_user = $get_user_in_database['user_user'];
        $user_discriminator = $get_user_in_database['user_discriminator'];
        $user_id = $get_user_in_database['user_id'];
        $user_avatar = 'https://cdn.discordapp.com/avatars/'.$user_id.'/'.$get_user_in_database['user_avatar'].'.png';
        $user_api_key = $get_user_in_database['user_api_key'];
        $user_type = $get_user_in_database['user_type'];
        $local_creation = $get_user_in_database['local_creation'];
    }

}
else
{
    setcookie('remember_session', '', time()+60, "/"); 
    unset($_COOKIE['remember_session']);
    session_unset();
    echo 'FORBIDDEN';
    exit();
}


                
if((isset($user_type)) && ($user_type == 'local'))
{
    if(isset($_GET['src']) && ($_GET['src'] == 'link'))
    {
        header('Location: link.php?echo=login_to_perform_this_action&link='.$_GET['link']);
        exit();
    }
    else
    {
        header('Location: links.php?echo=login_to_perform_this_action');
        exit();
    }
    
}
elseif(!isset($user_type))
{
    header('Location: /');
}


if(isset($_GET['link'])) 
{
    if(strlen($_GET['link']) > 1)
    {
        $get_link = $_GET['link'];
    }
    else
    {
        Header('Location: links.php?echo=nolink');
        exit();
    }
}
else
{
    Header('Location: links.php?echo=nolink');
    exit();
}


if(isset($_GET['action']) && ($_GET['action'] == 'delete'))
{

  $check_if_can_delete = mysqli_query($conn, "SELECT * FROM `url` WHERE `localkey` = '$local_key' AND shorten_url = '$get_link' OR `userid` = '$user_id' AND shorten_url = '$get_link'");


  $check_if_can_delete_rows = mysqli_num_rows($check_if_can_delete);

    if ($check_if_can_delete_rows == 1) 
    {
        
            $sql_delete = mysqli_query($conn, "UPDATE url SET `status` = 'REMOVED', `localkey`='REMOVED', `userid` = 'REMOVED BY - $user_id' WHERE shorten_url = '{$get_link}'");
            if($sql_delete){
                if(isset($_GET['src']) && ($_GET['src'] == 'link'))
                {
                    Header('Location: link.php?echo=REMOVED LINK - '. $_GET['link'] .'&link='. $_GET['link']);
                }
                else
                {
                    Header('Location: links.php?echo=REMOVED LINK - '. $_GET['link']);
                }

            }
            

    }
    else
    {
        echo 'FORBIDDEN';
        exit();
    }
    
}
elseif(isset($_GET['action']) && ($_GET['action'] == 'suspend'))
{

    
  $check_if_can_suspend = mysqli_query($conn, "SELECT * FROM `url` WHERE `localkey` = '$local_key' AND shorten_url = '$get_link' OR `userid` = '$user_id' AND shorten_url = '$get_link'");


  $check_if_can_suspend_rows = mysqli_num_rows($check_if_can_suspend);

    if ($check_if_can_suspend_rows == 1) 
    {

        
        $check_if_can_suspend_row = mysqli_fetch_assoc($check_if_can_suspend);

        if($check_if_can_suspend_row['status'] == 'ACTIVE')
        {
         
            $sql_suspend = mysqli_query($conn, "UPDATE url SET `status` = 'SUSPENDED' WHERE shorten_url = '{$get_link}'");
            if($sql_suspend){
                if(isset($_GET['src']) && ($_GET['src'] == 'link'))
                {
                    Header('Location: link.php?echo=SUSPENDED LINK - '. $_GET['link'] .'&link='. $_GET['link']);
                }
                else
                {
                    Header('Location: links.php?echo=SUSPENDED LINK - '. $_GET['link']);
                }
            }
        }
        elseif($check_if_can_suspend_row['status'] == 'SUSPENDED')
        {
         
            $sql_suspend = mysqli_query($conn, "UPDATE url SET `status` = 'ACTIVE' WHERE shorten_url = '{$get_link}'");
            if($sql_suspend){
                if(isset($_GET['src']) && ($_GET['src'] == 'link'))
                {
                    Header('Location: link.php?echo=LINK STATUS CHANGED!&link='.$_GET['link']);
                }
                else
                {
                    Header('Location: links.php?echo=LINK STATUS CHANGED!');
                }
            }
        }

    }
    else
    {
        echo 'FORBIDDEN';
        exit();
    }
}
else
{
    Header('Location: links.php');
}

?>
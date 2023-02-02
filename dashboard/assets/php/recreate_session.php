<?php
if(isset($_SESSION['last_link']))
{
    setcookie('sessrelinkcookie41', $_SESSION['last_link'], time()+60*60*24*90, "/");
}



if(!isset($_COOKIE['remember_session']))
            {
                $_SESSION['local_key'] = generateRandomString(50);
                $_SESSION['user_type'] = 'local';
                $_SESSION['user_id'] = '0';
            }
            else
            {

              $_SESSION['local_key'] = $_COOKIE['remember_session'];
                $local_key = $_COOKIE['remember_session'];
                
                $_SESSION['user_type'] = 'server';
                
                $find_user_in_database = mysqli_query($conn, "SELECT * FROM `sessions` WHERE `local_key` = '$local_key'");
                if(mysqli_num_rows($find_user_in_database) > 0)
                {
                    $get_user_in_database = mysqli_fetch_assoc($find_user_in_database);
                    $user_id = $get_user_in_database['user_id'];
                    $user_lang = $get_user_in_database['lang'];
                    if($get_user_in_database['user_type'] == 'local')
                    {
                        $_SESSION['user_type'] = 'local';
                        $_SESSION['user_id'] = '0';
                    }
                    else
                    {
                        $_SESSION['user_id'] = $get_user_in_database['user_id'];
                    }
                }
                else
                {
                    $_SESSION['user_type'] = 'local';
                    $_SESSION['user_id'] = '0';
                }

            }

?>
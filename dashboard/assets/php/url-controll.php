<?php


session_start();



if(!isset($_GET['user_type']))
{
    exit();
}

$user_type = $_GET['user_type'];
$user_id = $_GET['user_id'];
$local_key = $_GET['local_key'];

include "config.php";

    $decrypted_full_url = base64_decode($_GET['full_url']);

    $full_url = mysqli_real_escape_string($conn, $decrypted_full_url);

    
    $pattern = '/(?:https?:\/\/)?(?:[a-zA-Z0-9.-]+?\.(?:[a-zA-Z])|\d+\.\d+\.\d+\.\d+)/';

    if(!empty($full_url) && preg_match($pattern, $full_url)){
        $full_url_pos = strpos($full_url, '://');

        if ($full_url_pos == false) {
            $full_url = 'http://'.$full_url;
        }

        $full_url_pos_2 = strpos($full_url, ' ');

        if ($full_url_pos_2 !== false) {
            echo 'Link cannot contain spaces';
            exit();
        }

        
        $full_url_pos_3 = strpos($full_url, $config['shortener_domain']);

        if ($full_url_pos_3 !== false) {
            echo "Can't Shorten url from ".$config['name'];
            exit();
        }
        $full_url_pos_4 = strpos($full_url, $config['shortener_domain'].'/');

        if ($full_url_pos_4 !== false) {
            echo "Can't Shorten url from ".$config['name'];
            exit();
        }
        $ran_url = substr(md5(microtime()), rand(0, 26), 5);
        $sql = mysqli_query($conn, "SELECT * FROM url WHERE shorten_url = '{$ran_url}'");
        if(mysqli_num_rows($sql) > 0){
            echo "Something went wrong... Try Again";
        }else{
            $conn->set_charset('utf8mb4');
            $ip = $_SERVER['REMOTE_ADDR'];
            $added = date('Y-m-d H:i:s');
         


        //load






            if($user_type == 'local') {
            $sql4 = mysqli_query($conn, "SELECT * FROM url WHERE clientIP = '{$ip}'");
            if(mysqli_num_rows($sql4) > 50){
                echo "URL limit has been exhausted. Log in to shorten more urls";
                exit();
            }
            };

            
            $sql2 = mysqli_query($conn, "INSERT INTO url (full_url, shorten_url, clicks, ClientIP, ADDED, userid, localkey) 
                                         VALUES ('{$full_url}', '{$ran_url}', '0', '$ip', '$added', '$user_id', '$local_key')");
            if($sql2){
                $sql3 = mysqli_query($conn, "SELECT shorten_url FROM url WHERE shorten_url = '{$ran_url}'");
                if(mysqli_num_rows($sql3) > 0){
                    $shorten_url = mysqli_fetch_assoc($sql3);
                    echo $shorten_url['shorten_url'];
                }
            }
        }
    }else{
        echo "Invalid Url Format";
    }

?>
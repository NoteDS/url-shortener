<?php include('config.php') ?>
<?php include('recreate_session.php') ?>
<?php include('head.php') ?>

<style> 
body { background-color: transparent; background-image: none; } 
</style>
<body>

<?php 
if(isset($_GET['copied_close'])) {
    header('Location: iframe.php');
    exit();
}

if(isset($_POST['full_url'])) {
 setcookie("last_link", $_POST['full_url'], ['expires' => time() + 86400, 'path' => '/', 'samesite' => 'None']); 


    $full_url_pos_2 = strpos($_POST['full_url'], ' ');
    if ($full_url_pos_2 !== false) { ?>
        <div class="popup-box show">
            <div class="info-box" style="color:#fff;font-weight:700; font-size:30px; border:none; text-align:left;">Link cannot contain spaces</div>
                <form action="#" autocomplete="off" method="get">
                    <button class="rainbow-button" name="close_current" onclick="CurrentUrlAndClose();" style="border:none;border-top: 2px solid #fff; border-right: 2px solid #fff; border-bottom: 2px solid #fff; background: #fff; box-shadow:none; color:#fff;">RETRY</button>
                </form>
            </div>
        </div>
        <script>
            function CurrentUrlAndClose() {
                document.getElementById("buttonCOPYCLOSECURRENT").innerHTML = '✅';
                window.location.replace("iframe.php");                        
                }
        </script>
        <?php exit(); }


        $encrypted_full_url = base64_encode($_POST['full_url']);
        $send_full_url = "http://".$_SERVER['SERVER_NAME']."/assets/php/url-controll.php?user_id=".$_SESSION['user_id']."&user_type=".$_SESSION['user_type']."&full_url=".$encrypted_full_url.'&local_key='.$_SESSION['local_key'];
        $get_data_from_url_controll = file_get_contents($send_full_url);



        if(strlen($get_data_from_url_controll) !== 5) {
            $rand_var = rand(100000, 999999); ?>
            <div class="popup-box show">
                <div class="info-box" style="color:#fff;font-weight:700; font-size:30px; border:none; text-align:left;"><?php printf($get_data_from_url_controll) ?></div>
                    <form action="#" autocomplete="off" method="get">
                        <button class="rainbow-button" name="copied_close" onclick="CurrentUrlAndClose<?php echo $rand_var ?>();" style="border:none;border-top: 2px solid #fff; border-right: 2px solid #fff; border-bottom: 2px solid #fff; background: #fff; box-shadow:none; color:#fff;">RETRY</button>
                </form>
            </div>
            <script>
                function CurrentUrlAndClose<?php echo $rand_var ?>(); 
                {
                document.getElementById("buttonCOPYCLOSECURRENT").innerHTML = '✅';
                window.location.replace("iframe.php"); 
                } 
            </script> <?php
        }
        else {

                $_SESSION['last_link'] = $get_data_from_url_controll;
                setcookie('sessrelinkcookie41', $get_data_from_url_controll, time()+60*60*24*90, "/");


            $shorten_url = $get_data_from_url_controll;
            $rand_var2 = rand(100000, 999999);
            $rand_var3 = rand(100000, 999999);
            ?>

            <div class="popup-box show">
                <div class="info-box" style="color:#fff;font-weight:700; font-size:30px; border:none; text-align:left;">SHORTENED URL</div>
                    <form action="#" autocomplete="off" method="GET">
                        <input type="text" maxlength="100" class="shorten-url form-control" placeholder=":C" spellcheck="false" value="<?php echo $config['shortener_domain'].'/'.$shorten_url ?>" style="color:#fff;border:2px solid #fff; background:#ffffff00;" disabled>            
                            <a onclick="copyTextCURRENT<?php echo $rand_var2 ?>()"  id="buttonCOPYCURRENT">
                                <svg xmlns="http://www.w3.org/2000/svg" class="copy-icon" width="24" height="24" fill="#fff" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                </svg>
                            </a>
                            <button class="rainbow-button" name="copied_close" onclick="copyTextCLOSECURRENT<?php echo $rand_var3 ?>();" id="buttonCOPYCLOSECURRENT" style="border:none;border-top: 2px solid #fff; border-right: 2px solid #fff; border-bottom: 2px solid #fff; background: #fff; box-shadow:none; color:#fff;">Copy & Close</button>
                    </form>
                </div>
            </div>
            <script>
                function copyTextCURRENT<?php echo $rand_var2 ?>() {
                    navigator.clipboard.writeText
                        ("<?php echo $config['shortener_domain'].'/'.$shorten_url ?>");
                    document.getElementById("buttonCOPYCURRENT").innerHTML = '<span class="copy-icon">✅</span>';
                }
                function copyTextCLOSECURRENT<?php echo $rand_var3 ?>() {
                    navigator.clipboard.writeText
                        ("<?php echo $config['shortener_domain'].'/'.$shorten_url ?>");
                    document.getElementById("buttonCOPYCLOSECURRENT").innerHTML = '✅';
                    window.location.href("iframe.php");
                }
            </script>

        <?php } 

    }
    else
    {


    ?>
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-4" style="font-weight:900; color:#fff;">Full controll over your links.</h1>
</div>

<div class="wrapper">
    <form action="#" autocomplete="off" method="POST" class="input-group mb-3" >
      <span class="input-group-text" style="border:none;border-top: 2px solid #fff; border-left: 2px solid #fff; border-bottom: 2px solid #fff; background: transparent">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-link-45deg" viewBox="0 0 16 16">
          <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
          <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
        </svg>
      </span>
          <input type="text" spellcheck="false" name="full_url" class="form-control" id="full_url" style="border:none;border-top: 2px solid #fff; border-bottom: 2px solid #fff; background: transparent; box-shadow:none; color:#fff;" placeholder="looooooong.link/here">
          <button class="input-group-text rainbow-button" name="shorten_url" style="border:none;border-top: 2px solid #fff; border-right: 2px solid #fff; border-bottom: 2px solid #fff; background: #fff; box-shadow:none; color:#fff;">SAVE</button>
    </form>


<?php 
;
    if(isset($_COOKIE['sessrelinkcookie41']) || isset($_SESSION['last_link'])) {
        if(isset($_COOKIE['sessrelinkcookie41']))
        {
            $shortlink = $_COOKIE['sessrelinkcookie41'];
        }
        elseif(isset($_SESSION['last_link']))
        {
            $shortlink = $_SESSION['last_link'];
        }
        $find_user_in_database = mysqli_query($conn, "SELECT * FROM `url` WHERE `shorten_url` = '$shortlink'");
        if(mysqli_num_rows($find_user_in_database) > 0)
        {
    
        $get_user_in_database = mysqli_fetch_assoc($find_user_in_database);
    
        $full_link = $get_user_in_database['full_url'];
        $short_link = $get_user_in_database['shorten_url'];


            if(strlen($short_link) > 0 && strlen($full_link) > 0)
            {

                $get_short_link_clicks['clicks'] = $get_user_in_database['clicks'];

                $rand_var4 = rand(10000000, 99999999);
                ?>
                    <div class="my-3 p-3 rounded shadow-sm" style="border-radius:0 !important; -webkit-border-bottom-right-radius: 5px !important; -webkit-border-bottom-left-radius: 5px !important; border-bottom-right-radius: 5px !important; border-bottom-left-radius: 5px !important; border:2px solid #fff; border-top:none; position:relative; bottom:20px">
                        <h6 class="border-bottom pb-2 mb-0" style="font-weight:900; color:#fff;">Latest url</h6>
                        <div class="d-flex text-muted pt-3">
                            <button onclick="copyText<?php echo $rand_var4 ?>()" type="button" id="<?php echo 'button'.$rand_var4 ?>" class="btn btn-secondary" title="COPY" style="border:none;background:#ffffff00;box-shadow:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                </svg>
                            </button>
                            <script>
                                function copyText<?php echo $rand_var4 ?>() {
                                    navigator.clipboard.writeText
                                        ("<?php echo $config['shortener_domain'].'/'.$short_link ?>");
                                    document.getElementById("<?php echo 'button'.$rand_var4 ?>").innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16"><path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/><path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/><path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/></svg>';    
                                }
                            </script>
                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                    <strong class="text-light" style="line-height:120%;padding:4px; background: #00000011; border-radius:3px;"><?php echo $config['shortener_domain'].'/'.$short_link ?></strong>
                                    <span style="color:#fff !important;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb" viewBox="0 0 16 16">
  <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z"/>
</svg> <?php echo $get_short_link_clicks['clicks'] ?></span>
                                </div>
                                <span class="d-block" style="color:#f0f0f0aa !important;">&nbsp;
                                    
                                    <?php 

                                    if(strlen($full_link) > 35)
                                    {
                                        $full_url_substr = substr($full_link, 0, 35).'...';
                                    }
                                    else
                                    {
                                        $full_url_substr = $full_link;
                                    }
                                    echo $full_url_substr; ?>
                                    
                                </span>
                            </div>
                        </div>
                    </div>
            
        
                    


            <?php
            }
        }
    }
    
}
?>

</div>

</body>
</html>


<?php

require('../assets/php/config.php');
require('../assets/php/head.php');
require('../assets/php/recreate_session.php');

if((!isset($_COOKIE['remember_session'])) || (!isset($_SESSION['user_type'])))
{
    Header('Location: /auth.php');
    exit();
}
if($_SESSION['user_type'] != 'server')
{
    Header('Location: /auth.php');
    exit();
}


$find_user_in_database = mysqli_query($conn, "SELECT * FROM `sessions` WHERE `local_key` = '$local_key'");
                if(mysqli_num_rows($find_user_in_database) > 0)
                {
            
                    $get_user_in_database = mysqli_fetch_assoc($find_user_in_database);



                    if($get_user_in_database['user_type'] == 'local')
                    {
                        setcookie('remember_session', '', time()+60, "/"); 
                        unset($_COOKIE['remember_session']);
                        session_unset();
                        Header('Location: /auth.php');
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
                    Header('Location: /auth.php');
                    exit();
                }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/volt.css" rel="stylesheet">

</head>

<body>



    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none" style="background-color: #0000;">
        <a class="navbar-brand me-lg-5" href="index.html">
            <img class="navbar-brand-dark" src="/assets/css/favicon2.png" alt="logo" /> <img class="navbar-brand-light" src="/assets/css/favicon2.png" alt="logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-white collapse" data-simplebar">
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">


<br />
<li class="nav-item">
                    <a href="/" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
</svg>

                        </span>
                    </a>
                </li>

                <?php
                if(strlen($user_api_key) > 10)
                { 
                ?>
<li class="nav-item">
                    <a href="index.php" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
  <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
  <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
                        </span>
                        <span class="mt-1 ms-1 sidebar-text"> DASHBOARD </span>
                    </a>
                </li>
                <?php } ?>

                <li class="nav-item">
                    <a href="links.php" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
</svg>
                        </span>
                        <span class="mt-1 ms-1 sidebar-text"> LINKS </span>
                    </a>
                </li>




<li class="nav-item">
                    <a href="account.php" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
                        </span>
                        <span class="mt-1 ms-1 sidebar-text"> ACCOUNT </span>
                    </a>
                </li>





                <li class="nav-item"><a href="/logout.php" class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro"><span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
        
            </span><span> LOGOUT</span></a></li>





            </ul>
        </div>
    </nav>

    <main class="content">

<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center">
            </div>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item ms-lg-3">
                    <a class="nav-link pt-1 px-0">
                        <div class="media d-flex align-items-center">
                        <img class="avatar rounded-circle" alt="PFP" src="<?php echo $user_avatar ?>">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span class="mb-0 font-small fw-bold text-gray-900" style="font-weight:900 !important; color: #fff !important;"><?php echo $user_user.'#'.$user_discriminator ?></span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
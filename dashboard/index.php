<!DOCTYPE html>
<html lang="en">

<?php
include('assets/php/config.php');
include('assets/php/recreate_session.php');

include('assets/php/head.php');

include('assets/php/loader.php');
?>

<div class="container">
        <nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center" style="font-weight: 900 !important; color: #fff !important;">
            <a href="/" class="navbar-brand d-flex w-50 mr-auto">&nbsp; <span style="position: relative; color: #fff;"><?php echo $config['name'] ?></span></a>
            <div class="navbar w-100" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-center" style="text-align: right;">
                </ul>
                <ul class="nav navbar-nav ml-auto w-100 justify-content-end d-flex" style="text-align: center;">
                    <?php
                    if($_SESSION['user_type'] == 'server')
                    {
                        echo '<li class="nav-item"><a class="btn btn-light" href="/dashboard/" style="font-weight:800; width: 150px;">DASHBOARD</a></li>';
                    }
                    else
                    {
                        echo '<li class="nav-item"><a class="btn btn-light" href="/auth.php" style="font-weight:800; width: 150px;">LOG IN</a></li>';
                    }  
                    ?>
                </ul>
            </div>
        </nav>
</div>
<div style="width: 100px; height: 200px;"></div>


<div onload="showPage();" class="container"><iframe src="/assets/php/iframe_loader.php" id="url_frame" width="100%" style="min-height:450px;"></iframe></div><script> if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) { document.getElementById('url_frame').src = document.getElementById('url_frame').src; };  </script>
</body>
</html>
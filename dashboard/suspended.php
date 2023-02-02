
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


    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4" style="font-weight:900; color:#fff;">LINK WAS SUSPENDED</h1>
            <span style="color:#fff;font-weight:700; text-decoration:none;"></span> &nbsp; &nbsp; &nbsp;<a href="/" style="color:#fff;font-weight:700; text-decoration:none;"><span id="countbutton"></span> &nbsp; | &nbsp; HOME</a>
            
        </div>
    </div>


        <script>
        var seconds = 8;
        count();
        function count() {
            if(seconds < 0)
            {
            window.location = '/';
            return;
        }
        document.getElementById('countbutton').innerHTML = seconds--;
        setTimeout("count()",1000);
        }
        </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
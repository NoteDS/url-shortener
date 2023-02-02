<!DOCTYPE html>
<html lang="en">

<?php
include('assets/php/config.php');
include('assets/php/recreate_session.php');

if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'server'))
{
	Header('Location: dashboard/');
	exit();
}

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
  


<div class="row">
<div class="col-md">
  &nbsp;
  </div>
  <div class="col-md">
      <div class="card border-0 shadow-sm rounded-3 my-5" style="background:#ffffff00 !important; border: 2px solid #fff !important;">
                <div class="card-body p-4 p-sm-5">
                  <h5 class="card-title text-center mb-5 fw-light fs-5" style="color:#fff; font-weight:900 !important; font-size:24px !important;">SIGN IN TO <br /><?php echo $config['name'] ?></h5>
 					<a href="/assets/php/auth_discord.php?discord=discord" style="color:unset;text-decoration:none;"><div class="d-grid">
                     <button class="btn btn-discord btn-login text-uppercase fw-bold">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                        <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/>
                      </svg> &nbsp; CONNECT WITH DISCORD
                      </button>
                    </div></a>
                </div>
      </div>
  </div>
  <div class="col-md">
  &nbsp;
  </div>
</div>


</div>






</body>
</html>
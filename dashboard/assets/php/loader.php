<?php 


if(!isset($_SESSION['preloader']))
{
    ?>
    <script src="../assets/js/loader.js">
        </script>
    
    <div class="page-loader">
        <div class="spinner"></div>
        <div class="txt"></div>
    </div>
    <?php
    $_SESSION['preloader'] = true;
}

?>
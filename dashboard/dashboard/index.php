<?php 




include('assets/php/top.php');

                
$sql3 = mysqli_query($conn, "SELECT COUNT(*) FROM url");
$res = mysqli_fetch_assoc($sql3);

$sql4 = mysqli_query($conn, "SELECT clicks FROM url");
$total = 0;
while($count = mysqli_fetch_assoc($sql4)){
  $total = $count['clicks'] + $total;
}






$ctr = mysqli_query($conn, "SELECT * FROM url");
$counts = mysqli_num_rows($ctr);
$counts_fake = $counts;


$sessions_count_12 = mysqli_query($conn, "SELECT * FROM sessions");
$sessions_count = mysqli_num_rows($sessions_count_12);



?>
                <?php
                if(strlen($user_api_key) < 10)
                {
                    ?>
                    <meta http-equiv="refresh" content="0; url=links.php" />
                    <script>
                        window.location.replace('links.php');
                    </script>
                    <?php
                } 
                ?>

        <br />
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg xmlns="http://www.w3.org/2000/svg"class="icon" viewBox="0 0 16 16">
  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
</svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">All links created</h2>
                                    <h3 class="fw-extrabold mb-1"><?php echo $counts ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">All links created</h2>
                                    <h3 class="fw-extrabold mb-2"><?php echo $counts ?></h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                        2021 - NOW  
                                        <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                        
                                    </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 16 16">
  <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z"/>
</svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">All links uses</h2>
                                    <h3 class="fw-extrabold mb-1"><?php echo $total ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">All links uses</h2>
                                    <h3 class="fw-extrabold mb-2"><?php echo $total ?></h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                2021 - NOW 
                                        <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                        
                                    </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg xmlns="http://www.w3.org/2000/svg"class="icon" viewBox="0 0 16 16">
  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
</svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">All active session</h2>
                                    <h3 class="fw-extrabold mb-1"><?php echo $sessions_count ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">All active sessions</h2>
                                    <h3 class="fw-extrabold mb-2"><?php echo $sessions_count ?></h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                        2021 - NOW  
                                        <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                        
                                    </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-12 col-xl-8">
                <div class="row">
                    <div class="col-12 col-xxl-6 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                                <h2 class="fs-5 fw-bold mb-0">URL controll</h2>
                                <a href="links.php" class="btn btn-sm btn-primary">See all</a>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush list my--3">

  
                                <?php 
                       
                                $display_urls = mysqli_query($conn, "SELECT * FROM `url` WHERE userid='$user_id' ORDER BY ID DESC LIMIT 4");
          $display_urls_get = mysqli_num_rows($display_urls);
          
          if ($display_urls_get<1) 
          {
              ?>
          <div style="width:100%; min-height:80px; font-weight:900; font-size:14px; text-align:center">
              Tutaj zobaczysz tylko <br> linki skrócone <br> po zalogowaniu
          </div>
              <?php
          }
            for ($i = 1; $i <= $display_urls_get; $i++) 
            {
              
              $display_urls_display = mysqli_fetch_assoc($display_urls);
              
            ?>
                                                <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto ms--2">
                                                <h4 class="h6 mb-0">
                                                    <a href="#"><?php echo $config['shortener_domain'].'/'.$display_urls_display['shorten_url']; ?></a>
                                                </h4>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-secondary dot rounded-circle me-1"></div>
                                                    <small><?php 
                                                    

                                                    if(strlen($display_urls_display['full_url']) > 24)
                                                    {
                                                        $full_url_substr = substr($display_urls_display['full_url'], 0, 24  );
                                                        $full_url_substr = $full_url_substr.'..';
                                                    }
                                                    else
                                                    {
                                                        $full_url_substr = $display_urls_display['full_url'];
                                                    }
                                                    echo $full_url_substr;
                                            

                                                    ?></small>
                                                </div>
                                            </div>
                                            <div class="col text-end">
                                                <a href="link.php?link=<?php echo $display_urls_display['shorten_url'] ?>" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
  <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
  <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
</svg> &nbsp;

                                                    More...
                                                </a>
                                            </div>
                                        </div>
                                    </li>
            <?php
                
                                                }
        ?>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php 

include('assets/php/footer.php');

?>
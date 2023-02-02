<?php 



include('assets/php/top.php');

?>


        <br />
        <div class="row">
            <div>
                <div class="row">
                    <div>

                    <?php if(isset($_GET['echo']))
                    {
                        ?>

                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong></strong> <?php echo $_GET['echo'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                        <?php
                    } ?>

                    


                        <div class="card border-0 shadow">
                            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                                <h2 class="fs-5 fw-bold mb-0">Your Links</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush list my--3">

                                <?php 
                            
                                if($user_id != '0')
                                {
                                

                                    $display_urls_server = mysqli_query($conn, "SELECT * FROM `url` WHERE `userid` = '$user_id' OR `localkey` = '$local_key' ORDER BY ID DESC");
                                                                    
    
         
                                    $display_urls_get = mysqli_num_rows($display_urls_server);
              
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
                                        
    
                                                $display_urls_display = mysqli_fetch_assoc($display_urls_server);
                                        
                                        ?>
    <li class="list-group-item px-0 border-bottom">
                                            <div class="row align-items-center">
                                                <div class="col-auto ms--2">
                                                    <h4 class="h6 mb-0">
                                                        <a href="#"><?php echo $config['shortener_domain'].'/'.$display_urls_display['shorten_url']; ?>  <span style="font-weight: 900"><?php echo $display_urls_display['clicks'] ?> CLICKS</span></a>
                                                    </h4>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-secondary dot rounded-circle me-1"></div>
                                                        <small><?php 
                                                        
    
                                                        if(strlen($display_urls_display['full_url']) > 30)
                                                        {
                                                            $full_url_substr = substr($display_urls_display['full_url'], 0, 30);
                                                            $full_url_substr = $full_url_substr.'...';
                                                        }
                                                        else
                                                        {
                                                            $full_url_substr = $display_urls_display['full_url'];
                                                        }
                                                        echo $full_url_substr;
                                                
    
                                                        ?></small>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="col-md text-end">
                                
                                                                                                        <a href="link.php?link=<?php echo $display_urls_display['shorten_url'] ?>" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                                        <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                                        <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                                                        </svg> &nbsp;
        
                                                                                                            More
                                                                                                        </a>
                                                                                                        <?php 
                            
                            if($display_urls_display['status'] == 'ACTIVE')
                            {
?>
                            <a href="action.php?link=<?php echo $display_urls_display['shorten_url']; ?>&action=suspend" class="d-none d-xl-inline-flex btn btn-sm btn-tertiary align-items-center">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">
  <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/>
</svg> &nbsp;
        
                                                           SUSPEND
                                                        </a>
<?php
                            }
                            else
                            {
                                ?>
                                                            <a href="action.php?link=<?php echo $display_urls_display['shorten_url']; ?>&action=suspend" class="d-none d-xl-inline-flex btn btn-sm btn-success align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg> &nbsp;
        
                                                           ACTIVATE
                                                        </a>
                                <?php
                            }

                            ?>
                                                        <a href="action.php?link=<?php echo $display_urls_display['shorten_url'] ?>&action=delete" class="d-none d-xl-inline-flex btn btn-sm btn-danger align-items-center">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg> &nbsp;
        
                                                            DELETE
                                                        </a>
                                                    </div>
                                            </div>
</li>
                                                <?php
                                                    
                                                }
    
                                                
                                    }
                                    else
                                    {
                                

                                        $display_urls_server = mysqli_query($conn, "SELECT * FROM `url` WHERE `localkey` = '$local_key' ORDER BY ID DESC");
                                                                        
        
             
                                        $display_urls_get = mysqli_num_rows($display_urls_server);
                  
                                        if ($display_urls_get<1) 
                                        {
                                        }
                                            for ($i = 1; $i <= $display_urls_get; $i++) 
                                            {
                                            
        
                                                    $display_urls_display = mysqli_fetch_assoc($display_urls_server);
                                            
                                            ?>
                                                       <li class="list-group-item px-0 border-bottom">
                                            <div class="row align-items-center">
                                                <div class="col-auto ms--2">
                                                    <h4 class="h6 mb-0">
                                                        <a href="#"><?php echo $config['shortener_domain'].'/'.$display_urls_display['shorten_url']; ?></a>
                                                    </h4>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-secondary dot rounded-circle me-1"></div>
                                                        <small><?php 
                                                        
    
                                                        if(strlen($display_urls_display['full_url']) > 30)
                                                        {
                                                            $full_url_substr = substr($display_urls_display['full_url'], 0, 30);
                                                            $full_url_substr = $full_url_substr.'...';
                                                        }
                                                        else
                                                        {
                                                            $full_url_substr = $display_urls_display['full_url'];
                                                        }
                                                        echo $full_url_substr;
                                                
    
                                                        ?></small>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="col-md text-end">
                                                <a class="btn btn-sm btn-light d-inline-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cursor" viewBox="0 0 16 16">
  <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103zM2.25 8.184l3.897 1.67a.5.5 0 0 1 .262.263l1.67 3.897L12.743 3.52 2.25 8.184z"/>
</svg> &nbsp;
        
                                                                                                       <?php echo $display_urls_display['clicks'] ?> CLICKS
                                                                                                        </a>
                                                                                                        <a href="link.php?link=<?php echo $display_urls_display['shorten_url'] ?>" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                                        <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                                        <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                                                        </svg> &nbsp;
        
                                                                                                            More
                                                                                                        </a>
                                                                                                        <?php 
                            
                            if($display_urls_display['status'] == 'ACTIVE')
                            {
?>
                            <a href="action.php?link=<?php echo $display_urls_display['shorten_url']; ?>&action=suspend" class="d-none d-xl-inline-flex btn btn-sm btn-tertiary align-items-center">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">
  <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/>
</svg> &nbsp;
        
                                                           SUSPEND
                                                        </a>
<?php
                            }
                            else
                            {
                                ?>
                                                            <a href="action.php?link=<?php echo $display_urls_display['shorten_url']; ?>&action=suspend" class="d-none d-xl-inline-flex btn btn-sm btn-success align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg>> &nbsp;
        
                                                           ACTIVATE
                                                        </a>
                                <?php
                            }

                            ?>
                                                        <a href="action.php?link=<?php echo $display_urls_display['shorten_url'] ?>&action=delete" class="d-none d-xl-inline-flex btn btn-sm btn-danger align-items-center">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg> &nbsp;
        
                                                            DELETE
                                                        </a>
                                                    </div>
                                            </div>
</li>
        
                                                    <?php
                                                        
                                                    }
        
                                                                        
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
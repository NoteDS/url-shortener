<?php 


if(isset($_GET['link'])) 
{
    if(strlen($_GET['link']) > 1)
    {
        $get_link = $_GET['link'];
    }
    else
    {
        Header('Location: links.php');
        exit();
    }
}
else
{
    Header('Location: links.php');
    exit();
}



include('assets/php/top.php');




 if(isset($_GET['echo']) && ($_GET['echo'] == 'success_r'))
                    {
                        ?>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
<div class="row">
<div class="card">
  <div class="card-body">
    <h1 class="card-title">LINK REMOVED</h1>
    <p class="card-text">SUCCESS!</p>
    <a role="button" href="links.php" class="btn btn-secondary"> <- GO BACK</a>
  </div> 
</div>


                    <?php
exit();
                    } ?>
        <br />


        
        <div class="row">
            <div>
                <div class="row">
                <?php if(isset($_GET['echo']))
                    {
                        ?>

                    <div class="alert alert-dismissible fade show" role="alert">
                     <?php echo $_GET['echo'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                        <?php
                    } ?>
                    <div>




                    
                    <?php 

                        $display_urls_server = mysqli_query($conn, "SELECT * FROM `url` WHERE `userid` = '$user_id' AND shorten_url = '$get_link' ORDER BY ID DESC");
                                                                                                
                                
                                    
                        $display_urls_get = mysqli_num_rows($display_urls_server);

                        if ($display_urls_get > 0) 
                        {
                            $display_urls_display = mysqli_fetch_assoc($display_urls_server);








                            ?>

<div class="card border-0 shadow">
                            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                                <h2 class="fs-5 fw-bold mb-0">EDIT LINK (<code><?php echo $config['shortener_domain'].'/'.$display_urls_display['shorten_url'] ?></code>)</h2>
                            </div>




                            <div class="col-md text-end" style="padding:20px;">


                            <?php 
                            
                            if($display_urls_display['status'] == 'ACTIVE')
                            {
?>
                            <a href="action.php?link=<?php echo $display_urls_display['shorten_url']; ?>&action=suspend&src=link" class="d-none d-xl-inline-flex btn btn-sm btn-tertiary align-items-center">
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
                                                            <a href="action.php?link=<?php echo $display_urls_display['shorten_url']; ?>&action=suspend&src=link" class="d-none d-xl-inline-flex btn btn-sm btn-success align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg> &nbsp;
        
                                                           ACTIVATE
                                                        </a>
                                <?php
                            }

                            ?>




                                                        <a href="action.php?link=<?php echo $display_urls_display['shorten_url'] ?>&action=delete&src=link" class="d-none d-xl-inline-flex btn btn-sm btn-danger align-items-center">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg> &nbsp;
        
                                                            DELETE
                                                        </a>
                                                    </div>

                            <div class="card-body">
                                
                            



                            <div class="input-group mb-3">
                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center">

&nbsp;  URL STATUS
</a>
                                        <input type="text" class="form-control" value="<?php echo $display_urls_display['status'] ?>" id="api_input_type" disabled>
                                    </div>

                                    <div class="input-group mb-3">
                                    <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>
                                                   &nbsp;  CREATION DATE
                                                </a>
                                        <input type="text" class="form-control" value="<?php
                                        
                                        
                                        $format_creation_date = $display_urls_display['ADDED'];
                                        echo  date("d.m.y - H:i ; T || e", strtotime($format_creation_date));  


                                        
                                        ?>" id="api_input_type" disabled>
                                    </div>

                            <div class="input-group mb-3">
                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
</svg>
                                                    SHORT URL
                                                </a>
                                        <input type="text" class="form-control" value="<?php echo $config['shortener_domain'].'/'.$display_urls_display['shorten_url'] ?>" id="api_input_type" disabled>
                                    </div>

                            <div class="input-group mb-3">
                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
</svg>
                                                    FULL URL
                                                </a>
                                        <input type="text" class="form-control" value="<?php echo $display_urls_display['full_url'] ?>" id="api_input_type" disabled>
                                    </div>






                            <div class="row align-items-center">



                        

                        


<?php
                        }
                        else
                        {
                            ?>
                            <h2>FORBIDDEN TO ACCESS THIS RESOURCE</h2>
                            <a href="links.php">< BACK</a>
                            <?php
                        }
            
                            ?>
                    


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        


<?php 

if ($display_urls_get > 0) 
{

?>
<div class="row" style="margin-top:20px;">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5"> Link Clicks</h2>
                            <h3 class="mb-1"><?php echo $display_urls_display['clicks'] ?></h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="fw-extrabold h5"> Link Clicks</h2>
                            <h3 class="mb-1"><?php echo $display_urls_display['clicks'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                <h2 class="fs-5 fw-bold mb-0">Browser</h2>
                    
                </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-auto">
                        <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="h6 mb-0">Chrome</div>
                                <div class="small fw-bold text-gray-500"><span> %</span></div>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="h6 mb-0">Firefox</div>
                                <div class="small fw-bold text-gray-500"><span> %</span></div>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="h6 mb-0">Safari</div>
                                <div class="small fw-bold text-gray-500"><span> %</span></div>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="h6 mb-0">Other</div>
                                <div class="small fw-bold text-gray-500"><span> %</span></div>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                <h2 class="fs-5 fw-bold mb-0">Platform</h2>
                </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-auto">
                        <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="h6 mb-0">Mobile</div>
                                <div class="small fw-bold text-gray-500"><span> %</span></div>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="h6 mb-0">Desktop</div>
                                <div class="small fw-bold text-gray-500"><span> %</span></div>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php }
else
{
    ?>
    HTTP 
    200
    
    <?php
}

?>

<?php 

include('assets/php/footer.php');


?>
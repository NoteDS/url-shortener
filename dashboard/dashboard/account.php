<?php 



include('assets/php/top.php');











$_SESSION['delete_account'] = rand(1000, 9999);



?>



        <br />
        
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div style="width: 100%; height: 100%; top: 0; left: 0; position: absolute"></div>
                        <h3 class="" style="font-size: 18px; font-weight: 900;">ACCOUNT DETAILS</h3>
                        <span>Email:</span>
                        <input type="email" class="form-control" value="Discord Session">
                        <span>Username:</span>
                        <input type="email" class="form-control" value="<?php echo $user_user ?>">
                        <span>3rd party connections:</span>
                        <input type="email" class="form-control" value="Discord, Discord"><br />
                        <button type="submit" class="btn btn-primary" style="width: 100%;" disabled>Edit (disabled)</button>
                       
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                <div class="card-body">
                            <h3 class="" style="font-size: 18px; font-weight: 900;">USER INFO</h3>
                            <div id="debug_info" style="display: block;"> <span>session token:</span>
                            <input type="email" class="form-control" value="<?php echo $local_key ?>">
                            <span>session lifetime:</span>
                            <input type="email" class="form-control" value="<?php echo $local_creation. ' - for '.'_'.' weeks' ?>">
                            <span>api temporary key</span>
                            <input type="email" class="form-control" value="<?php echo $user_api_key ?>"><br />
                            <button onclick="hide_debug()" class="btn btn-primary" style="width: 100%;">HIDE</button>
                            </div>

                            <div id="debug_info_button" style="display: none;">
                            <button onclick="show_debug()" class="btn btn-primary" style="width: 100%;">SHOW</button>
                            </div>


                            <script>
                                            function show_debug() 
                                            {    
                                                document.getElementById("debug_info").style.display = 'block';
                                                document.getElementById("debug_info_button").style.display = 'none';
                                            }
                                            function hide_debug() 
                                            {
                                                document.getElementById("debug_info").style.display = 'none';
                                                document.getElementById("debug_info_button").style.display = 'block';
                                            }
                                            </script>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-12 col-xl-8">
                <div class="row">
                        
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                    
                    <div class="card-body" style="background-color: #f99; border-radius: 8px; border: dashed 2px red;">
                        <h3 class="" style="font-size: 18px; color: red; font-weight: 900;">DELETE ACCOUNT</h3>

<button class="button-hold fill">
    <ul>
        <li><span id="delete_account_button">HOLD TO DELETE ACCOUNT</span></li>
        <li>CHANGED YOUR MIND?</li>
        <li><div class="loader" style="position: relative; top: 36px;"><div class="lds-ring"><div>.</div><div>.</div><div>.</div><div>.</div></div></div></li>
    </ul>
</button>

<br />
                        <script>
                            // Hold button with mouse / select with tab and hold spacebar

                            let duration = 2000,
                                success = button => {
                                    //Success function
                                    button.classList.add('success');

                                    delete_account();

                                };

                            document.querySelectorAll('.button-hold').forEach(button => {
                                button.style.setProperty('--duration', duration + 'ms');
                                ['mousedown', 'touchstart', 'keypress'].forEach(e => {
                                    button.addEventListener(e, ev => {
                                        if(e != 'keypress' || (e == 'keypress' && ev.which == 32 && !button.classList.contains('process'))) {
                                            button.classList.add('process');
                                            button.timeout = setTimeout(success, duration, button);
                                        }
                                    });
                                });
                                ['mouseup', 'mouseout', 'touchend', 'keyup'].forEach(e => {
                                    button.addEventListener(e, ev => {
                                        if(e != 'keyup' || (e == 'keyup' && ev.which == 32)) {
                                            button.classList.remove('process');
                                            clearTimeout(button.timeout);
                                        }
                                    }, false);
                                });
                            });

                            function delete_account() {
                                if(confirm('DELETE ACCOUNT WARNING')){ 
                                    //window.location.href = '?delete_account=<?php echo $_SESSION['delete_account'] ?>';
                                } 
                            }

                        </script>
                </div>

                    </div>
                </div>
            </div>
        </div>



<?php 

include('assets/php/footer.php');


?>
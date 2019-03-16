<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Administrator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url()?>images/logo mekar.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" action="<?php echo base_url()?>login/aksi_login" method="post">
                    <span class="login100-form-title p-b-20">
                        Login Administrator

                    <h4>SMA Mekar Arum</h4>
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-user"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>
                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="<?php echo base_url()?>assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url()?>assets_login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url()?>assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url()?>assets_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url()?>assets_login/js/main.js"></script>

</body>
</html>
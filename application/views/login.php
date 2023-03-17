<!DOCTYPE html>
<html lang="en">

<head>

    <title>My Expenses Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="assets/login/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/login/css/util.css">

    <link rel="stylesheet" href="assets/login/css/main.css">



    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100 limiterimage">
            <div class="wrap-login100">
                <div class="login100-form-title titlebaimage">
                    <span class="login100-form-title-1">
                        Login
                    </span>
                </div>

                <?php
                if ($this->session->flashdata('message')) {
                    echo '
                       <div class="alert-danger">
				        <h4 class="loginh4"></i></h4>
                           ' . $this->session->flashdata("message") . '
                       </div>
                       ';
                }
                ?>

                <form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>login/validation">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email" value="<?php echo set_value('email'); ?>" />
                        <span class="focus-input100"><?php echo form_error('email'); ?></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="admin_pass" placeholder="Enter password" value="<?php echo set_value('admin_pass'); ?>" />
                        <span class="focus-input100"><?php echo form_error('admin_pass'); ?></span>
                    </div>



                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--===============================================================================================-->


    <script src="assets/login/js/jquery-3.2.1.min.js"></script>
    <script src="assets/login/js/main.js"></script>
    <!--===============================================================================================-->




</body>

</html>
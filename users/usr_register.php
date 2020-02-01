<?php
include_once('php/register.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/src/assets/images/favicon.png">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../admin/src/assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../admin/src/assets/login/images/img-01.png" alt="IMG">
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Student Registration
                    </span>

                    <label>Username</label>
                    <div class="wrap-input100 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
                        <input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <label>Email</label>
                    <div class="wrap-input100 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <input class="input100" type="email" name="email" placeholder="e-mail" value="<?php echo $email; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <label>Password</label>
                    <div class="wrap-input100 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input class="input100" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <label>Re-enter Password</label>
                    <div class="wrap-input100 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <input class="input100" type="password" name="confirm_password" placeholder="Password" value="<?php echo $confirm_password; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="help-block">
                            <?php echo $username_err;
                            ?>
                        </span>
                        <span class="help-block">
                            <?php echo $password_err;
                            ?>
                        </span>
                        <span class="help-block">
                            <?php echo $confirm_password_err;
                            ?>
                        </span>
                        <span class="help-block">
                            <?php echo $email_err;
                            ?>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Submit">
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="reset" class="login100-form-btn" value="Reset">
                    </div>
                    <br>
                    <p>Already have an account? <a href="usr_login.php">Login here</a>.</p>
                </form>
            </div>
        </div>
    </div>




<!--===============================================================================================-->  
    <script src="../admin/src/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="../admin/src/assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../admin/src/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="../admin/src/assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="../admin/src/assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="../admin/src/assets/login/js/main.js"></script>

</body>

</html>
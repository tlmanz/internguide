<?php
// Include config file
require_once "../admin/config/connect.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email =  "";
$username_err = $password_err = $confirm_password_err = $email_err =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = '<span style="color: red;">Please enter a username. <br /></span>';
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM employee WHERE username = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = '<span style="color: red;">This username is already taken. <br /></span>';
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo '<span style="color: red;">Oops! Something went wrong. Please try again later. <br /></span>';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    //Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = '<span style="color: red;">Please enter an email. <br /></span>';
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM employee WHERE email = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = '<span style="color: red;">This email is already taken. <br /></span>';
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo '<span style="color: red;">Oops! Something went wrong. Please try again later. <br /></span>';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = '<span style="color: red;">Please enter a password. <br /></span>';
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = '<span style="color: red;">Password must have atleast 8 characters. <br /></span>';
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = '<span style="color: red;">Please confirm password. <br /></span>';
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = '<span style="color: red;">Password did not match. <br /></span>';
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO employee (username, email, password) VALUES (?, ?, ?)";


        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);


            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                $username = trim($_POST["username"]);
                $sql = "SELECT * FROM employee WHERE username = '$username';";
                $result = mysqli_query($connection, $sql);


                if (mysqli_num_rows($result) > 0) {
                    // while ($row = mysqli_fetch_assoc($result)) {
                    //     $userid = $row['id'];
                    //     $user_name = $row['username'];
                    //     $sql = "INSERT INTO profileimg (userid, status, filename) VALUES ('$userid',1,'no-pic');";
                    //     mysqli_query($connection, $sql);
                    //     $sqlprofile = "INSERT INTO userprofile (user, full_name, gender,age,address) VALUES ('$user_name','','',0,'');";
                    //     mysqli_query($connection, $sqlprofile);
                    // }
                    header("location: company_login.php");
                }
            } else {
                echo '<span style="color: red;">Something went wrong. Please try again later. <br /></span>';
            }
        }


        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($connection);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Sign Up</title>
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
                        Company Registration
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
                    <p>Already have an account? <a href="company_login.php">Login here</a>.</p>
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
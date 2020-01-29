<?php
// Include config file
require_once (__DIR__.'/../../../config/connect.php');
 
// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = '<span style="color:red">Please enter a username <br></span>';
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM admin WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = '<span style="color:red">This username is already taken<br></span>';
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo '<span style="color:red">Oops! Something went wrong. Please try again later<br></span>';
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = '<span style="color:red">Please enter an email <br></span>';
    }elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = '<span style="color:red">Please enter a valid email<br></span>';
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM admin WHERE email = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = '<span style="color:red">This email is already taken<br></span>';
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo '<span style="color:red">Oops! Something went wrong. Please try again later<br></span>';
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }    

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = '<span style="color:red">Please enter a password<br></span>';     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = '<span style="color:red">Password must have atleast 6 characters<br></span>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = '<span style="color:red">Please confirm password<br></span>';     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = '<span style="color:red">Password did not match<br></span>';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "<script>window.open('../usr_login.php','_self')</script>";
            } else{
                echo "Insert";
                echo '<span style="color:red">Something went wrong. Please try again later</span>';
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
}
?>
 
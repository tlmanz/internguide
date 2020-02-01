<?php
require_once __DIR__."/../../admin/config/connect.php";
/// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// Define variables and initialize with empty values
$username = $emailpost = "";
$username_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = '<span style="color: red;">Please enter username.</span>';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["email"]))){
        $email_err = '<span style="color: red;">Please enter your email.</span>';
    } else{
        $emailpost = trim($_POST["email"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT cid, username, email FROM customer_account WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $email);
                    if(mysqli_stmt_fetch($stmt)){
                        $email = trim($email);
                        if($emailpost === $email){
                            session_start();
                            $_SESSION['reset'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;
                            $_SESSION['usertype'] = 'student';                           
                            header("location: reset_student.php");
                        }
                         else{
                            // Display an error message if password is not valid
                            $email_err = '<span style="color: red;">email is invalid</span>';
                        }
                        
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = '<span style="color: red;">Username not found</span>';
                }
            } else{
                echo '<span style="color: red;"> Oops! Something went wrong. Please try again later.</span>';
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
}
?>
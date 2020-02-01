<?php
require_once "../../admin/config/connect.php";

$username_err = $email_err = "";
$username = trim($_POST['username']);
$email = trim($_POST['email']);

$sql = "SELECT cid FROM customer_account WHERE email = ?";

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
                    $sql1 = "SELECT cid FROM customer_account WHERE username = ?";

                            if ($stmt1 = mysqli_prepare($connection, $sql1)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt1, "s", $param_username);

                                // Set parameters
                                $param_username = trim($_POST["username"]);

                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt1)) {
                                    /* store result */
                                    mysqli_stmt_store_result($stmt1);

                                    if (mysqli_stmt_num_rows($stmt1) == 1) {
                                     echo "<script>alert ('Email & Username is correct. You can reset your password')</script>";
                                     echo "<script>window.open('resetpw.php?user=$username','_self')</script>";
                                }else{
                                    echo "<script>alert ('Username is not correct!')</script>";
                                }
                            }
                        }
            }else{
                echo "<script>alert ('Email is not correct!')</script>";
            }
        }
    }














// if ($stmt = mysqli_prepare($connection,$query)){

//     mysqli_stmt_bind_param($stmt, "s", $param_username);
//     $param_username = $username;

//     if (mysqli_stmt_execute($stmt)){

//         mysqli_stmt_store_result($stmt);
//         if (mysqli_stmt_num_rows($stmt) != 1){
//             $username_err = '<span style="color: red;">Username not found</span>';
//             echo "<script>alert ('Username is not correct. You can reset your password')</script>";
//         }
        
//     }

// }
// $query1 = "SELECT email FROM customer_account WHERE email = ?";
// if ($stmt1 = mysqli_prepare($connection,$query1)){

//     mysqli_stmt_bind_param($stmt1, "s", $param_email);
//     $param_email = $email;

//     if (mysqli_stmt_execute($stmt)){

//         mysqli_stmt_store_result($stmt);
//         if (mysqli_stmt_num_rows($stmt) != 1){
//             $email_err = '<span style="color: red;">emailnot found</span>';
//             echo "<script>alert ('Email is not correct. You can reset your password')</script>";
//         }
//     }

// }
// if(empty($username_err) && empty($email_err)){
//     echo "<script>alert ('Email & Username is correct. You can reset your password')</script>";
//     echo "<script>window.open('resetpw.php?user=$username','_self')</script>";
// }
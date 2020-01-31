<?php 
require_once "../admin/config/connect.php";


?>
<!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <title>Intern Guide - One Place for All Intern Needs</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <!-- <link href="../dist/css/style.min.css" rel="stylesheet"> -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    </head>
    <body>
    <?php
    $getList = "SELECT * from employee;";
$query = mysqli_query($connection,$getList);
    while ($row = mysqli_fetch_assoc($query))
    {
        $id = $row['id'];
        $name = $row['ename'];
        $email = $row['email'];
        $phone = $row['phone'];
        echo "
        <tr>
        <td><p style='text-align: center;'>$id</p></td>
        <td><p style='text-align: center;'>$name</p></td>
        <td><p style='text-align: center;'>$email</p></td>
        <td><p style='text-align: center;'>$phone</p></td>
        <td>
            <div style='text-align: center;' class='table-data-feature'>
                <a href='../company/company.php?edit=$id'>
                <button class='btn btn-primary btn-circle' data-toggle='tooltip' data-placement='top' title='Show'>
                    <i class='fas fa-list'></i>
                </button>
                </a>
            </div>
        </td>
                                            

        </tr>";
        
    
    }   
?>
    
    </body>
    </html>
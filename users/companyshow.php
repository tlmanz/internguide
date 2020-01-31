<?php

require_once "../admin/config/connect.php";
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'student'){
    header("location: usr_login.php");
    exit;
    }

$user = $_SESSION['username'];
$sql = "SELECT * from customer_account WHERE username = '$user';";
if ($result = mysqli_query($connection, $sql)) {
    $profileData = mysqli_fetch_assoc($result);
    $userid = $profileData['cid'];
    $username = $profileData['firstname']." ".$profileData['lastname'];
    $imageAdd = $profileData['cphoto'];
    $cvpath =  $profileData['cv'];
    $useraddress = $profileData['address'];
    $usermail = $profileData['email'];
    $phoneno = $profileData['telephone'];
    $userdes = $profileData['description1'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Civic - CV Resume</title>
    <meta charset="UTF-8">
    <meta name="description" content="Civic - CV Resume">
    <meta name="keywords" content="resume, civic, onepage, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="civic/img/favicon.ico" rel="shortcut icon" />
    <title>Intern Guide - One Place for All Intern Needs</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="civic/css/bootstrap.min.css" />
    <link rel="stylesheet" href="civic/css/font-awesome.min.css" />
    <link rel="stylesheet" href="civic/css/flaticon.css" />
    <link rel="stylesheet" href="civic/css/owl.carousel.css" />
    <link rel="stylesheet" href="civic/css/magnific-popup.css" />
    <link rel="stylesheet" href="civic/css/style.css" />

    <script src="https://kit.fontawesome.com/6d41dc11d3.js" crossorigin="anonymous"></script>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
       <!--  <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""> -->
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../admin/src/assets/images/favicon.png">
        <link href="../admin/src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        <title>Intern Guide - One Place for All Intern Needs</title>
        <!-- Custom CSS -->
        <link href="../admin/src/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
        <link href="../admin/src/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="../admin/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <!-- <link href="../dist/css/style.min.css" rel="stylesheet"> -->
        <link href="../admin/src/dist/css/style.css" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>






</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="home-five-style">
        <!-- Header section start -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar" data-navbarbg="skin6">

                <nav class="navbar top-navbar navbar-expand-md">
                    <div class="navbar-header" data-logobg="skin6">
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                                class="ti-menu ti-close"></i></a>
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-brand">
                            <!-- Logo icon -->
                            <a href="index.php">
                                <b class="logo-icon">
                                    <!-- Dark Logo icon -->
                                    <img src="../admin/src/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <img src="../admin/src/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="../admin/src/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo text -->
                                    <img src="../admin/src/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                                </span>
                            </a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Toggle which is visible on mobile only -->
                        <!-- ============================================================== -->
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                                class="ti-more"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                            <!-- Notification -->
                           
                            
                        </ul>
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-right">
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <?php
                                $get_user = "select * from customer_account where cid=".$_SESSION['cid'];
                                $run_edit_user = mysqli_query($connection , $get_user);
                                    $row_user = mysqli_fetch_array($run_edit_user);
                                    $name = $row_user['firstname']." ".$row_user['lastname'];
                                    $user_photo = $row_user['cphoto'];
                                    $loc = "../admin/src/assets/".$user_photo; 
                                                             
                            ?>
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src='<?php echo $imageAdd?>' alt='user' class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark"><?php echo $username?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="editprofile.php"><i data-feather="credit-card" class="svg-icon mr-2 ml-1"></i>
                                    Edit profile</a>

                                    <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="companyshow.php"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    View company list</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="php/logout.php"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
                    <aside class="left-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar" data-sidebarbg="skin6">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="editprofile.php"
                                    aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                        class="hide-menu">Edit profile
                                    </span></a>
                            </li>
                            <li class="list-divider"></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="companyshow.php"
                                    aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">View Company List </span></a></li>
                            <li class="list-divider"></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="php/logout.php"
                                    aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                        class="hide-menu">Logout</span></a></li>

                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-7 align-self-center">
                            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                                <?php
                                date_default_timezone_set('Asia/Colombo');
                                if(date("H") < 12){
                                    echo "Good Morning";
                                }elseif(date("H") > 11 && date("H") < 18){
                                    echo "Good Afternoon";
                                }elseif(date("H") > 17){
                                    echo "Good Evening";
                                }
                                ?>
                            <?php echo $name ?>!</h3>
                        </div>
                        <div class="col-5 align-self-center">
                            <div class="customize-input float-right">
                                    <h1 style="font-size:120%; "selected><?php
                                        date_default_timezone_set('Asia/Colombo');
                                        $mydate=getdate(date("U"));
                                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                                    ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
        
        

        <!-- Resume section start -->
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Company Table</h4>
                                <h6 class="card-subtitle">This table contains all the Companies which registered with this system</h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style='text-align: center;'>ID</th>
                                                <th style='text-align: center;'>Name</th>
                                                <th style='text-align: center;'>E-Mail</th>
                                                <th style='text-align: center;'>University</th>
                                                <th style='text-align: center;'>Age</th>
                                                <th style='text-align: center;'>Show</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "select * from employee";
                                                $runsql = mysqli_query($connection, $sql);
                                                $count = 1;
                                                
                                                while($row = mysqli_fetch_array($runsql))
                                                {   
                                                    $sid = $row['id']; //cid for employee table is id
                                                    $firstname = $row['ename'];
                                                    $email = $row['email'];
                                                    $uni = "UOM";
                                                    $age = "10";
                                                    echo "
                                                        <tr>
                                                            <td><p style='text-align: center;'>$count</p></td>
                                                            <td><p style='text-align: center;'>$firstname</p></td>
                                                            <td><p style='text-align: center;'>$email</p></td>
                                                            <td><p style='text-align: center;'>$uni</p></td>
                                                            <td><p style='text-align: center;'>$age</p></td>
                                                            <td>
                                                                <div style='text-align: center;' class='table-data-feature'>
                                                                    <a href='../company/company.php?id=$sid&userid=$userid'>
                                                                    <button class='btn btn-primary btn-circle' data-toggle='tooltip' data-placement='top' title='Show'>
                                                                        <i class='fas fa-list'></i>
                                                                    </button>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    ";
                                                    $count++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <!-- Footer section start -->
    <footer class="footer-section">
        <div class="container text-center">
            <div class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </footer>
    <!-- Footer section end -->



    <!--====== Javascripts & Jquery ======-->
    <script src="civic/js/jquery-2.1.4.min.js"></script>
    <script src="civic/js/bootstrap.min.js"></script>
    <script src="civic/js/owl.carousel.min.js"></script>
    <script src="civic/js/magnific-popup.min.js"></script>
    <script src="civic/js/circle-progress.min.js"></script>
    <script src="civic/js/main.js"></script>



<!--  <script src="../admin/src/assets/libs/jquery/dist/jquery.min.js"></script> -->
        <!-- <script src="../admin/src/assets/libs/popper.js/dist/umd/popper.min.js"></script> -->
       <!--  <script src="../admin/src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> -->
        <!-- apps -->
        <!-- apps -->
        <!-- <script src="../admin/src/dist/js/app-style-switcher.js"></script> -->
        <script src="../admin/src/dist/js/feather.min.js"></script>
        <script src="../admin/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../admin/src/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../admin/src/dist/js/custom.min.js"></script>
        <!--This page JavaScript -->
       <!--  <script src="../admin/src/assets/extra-libs/c3/d3.min.js"></script>
        <script src="../admin/src/assets/extra-libs/c3/c3.min.js"></script>
        <script src="../admin/src/assets/libs/chartist/dist/chartist.min.js"></script> -->
        <!-- <script src="../admin/src/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="../admin/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../admin/src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script> -->
        <!-- <script src="../admin/src/dist/js/pages/dashboards/dashboard1.min.js"></script>
        <script src="../admin/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../admin/src/dist/js/pages/datatable/datatable-basic.init.js"></script> -->
        <!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 -->
</body>

</html>
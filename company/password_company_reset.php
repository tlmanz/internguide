<?php

require_once "connect.php";
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'company'){
    header("location: company_login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>InternGuide</title>
    <meta charset="UTF-8">
    <meta name="description" content="Civic - CV Resume">
    <meta name="keywords" content="resume, civic, onepage, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="../users/civic/img/favicon.ico" rel="shortcut icon" />
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
                            <a href="userprofile.php">
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
                
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
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
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
        
        <section class="hero-section">

            <div class="container-fluid">
                 <?php
            //if(isset($_GET['edit'])){
                $edit_id = $_SESSION['id'];
                $get_student = "select * from employee where id='$edit_id'";
                $run_edit_student = mysqli_query($connection , $get_student);
                $row_emp = mysqli_fetch_array($run_edit_student);
                $id = $row_emp['id'];
                $username = $row_emp['username'];
                $photo = $row_emp['image'];
                $p_loc = "../admin/src/assets/".$photo;
            //}
            ?>
                <div class="row">
                <div style='margin-left: auto; margin-right: auto;'class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Password Reset</h2>
                            <div class= 'text-center'>
                                <img src='<?php echo $p_loc ?>' alt='image' class='rounded-circle' height='150'
                                width="150">
                                <br><br>
                                <h3>Profile Picture</h3>
                            </div>
                            <br>
                            <div style="text-align: center;">
                                <form action='php/reset_php.php' method='post' enctype='multipart/form-data'>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 m-auto">
                                                <div class="form-group">
                                                    <label>User ID</label>
                                                    <input type="text" class="form-control text-center" placeholder="col-md-12" value='<?php echo $id ?>' name='id' readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ml-auto">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control text-center"
                                                    placeholder="col-md-2 ml-auto0" value='<?php echo $username ?>' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 m-auto">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control text-center" placeholder="Enter a New Password" name='newpassword' required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ml-auto">
                                                <div class="form-group">
                                                    <label>Confirm New Password</label>
                                                    <input type="password" class="form-control text-center"
                                                    placeholder="Confirm the New Password" name='confirmpassword' required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = 'footer'>
                                        <div style='text-align: center;'>
                                            <button type ='submit' class="btn btn-rounded btn-info"><i class='fa fa-lock'></i>&nbspUpdate Password</button>
                                            &nbsp&nbsp
                                            <button type="reset" class="btn btn-rounded btn-danger"><i class='fa fa-ban'></i>&nbspReset</button>
                                            &nbsp&nbsp
                                            <a href='php/logout'>
                                                <button type="button" class="btn btn-rounded btn-success"><i class='fa fa-home'></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
        <!-- Info section end -->

        <!-- Resume section start -->
        

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
    <script src="../users/civic/js/jquery-2.1.4.min.js"></script>
    <script src="../users/civic/js/bootstrap.min.js"></script>
    <script src="../users/civic/js/owl.carousel.min.js"></script>
    <script src="../users/civic/js/magnific-popup.min.js"></script>
    <script src="../users/civic/js/circle-progress.min.js"></script>
    <script src="../users/civic/js/main.js"></script>



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
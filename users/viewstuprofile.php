<?php

require_once (__DIR__.'/../../../config/connect.php');
session_start();

// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'company'){
//     header("location: company_login.php");
//     exit;
//     }

//$c_user = $_GET['username'];  //$_GET[]
$s_id = $_GET['sid'];
$sql = "SELECT * from customer_account WHERE cid = '$s_id'";
if ($result = mysqli_query($connection, $sql)) {
	$profileData = mysqli_fetch_assoc($result);
	$userid = $profileData['cid'];
	$name = $profileData['firstname']." ".$profileData['lastname'];
	$user_photo = $profileData['cphoto'];
	$email = $profileData['email'];
    $phoneno = $profileData['telephone'];
    $userdes = $profileData['description1'];
    $cvpath = $profileData['cv'];
    $cv_loc = "../admin/src/assets/".$cvpath;
    $p_loc = "../admin/src/assets/" . $user_photo;
    $dob = $profileData['dob'];
    $address = $profileData['address'];


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


<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar" data-navbarbg="skin6">

		        <nav class="navbar top-navbar navbar-expand-md">
                    
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        
                            <!-- Logo icon -->
                           &nbsp&nbsp&nbsp  
					<div class="text right header-buttons">
						<a href='../company/company_new.php' class="btn btn-outline-success">Back to profile</a>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
					</div>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
					<div class="text right header-buttons">
						<a href='<?php echo $cv_loc?>' class="btn btn-outline-success">Download CV</a>
						
					</div>

					
					
                        
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Toggle which is visible on mobile only -->
                        <!-- ============================================================== -->
                       
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
                            
                        </ul>
                    </div>
                </nav>
            </header>
     

		<!-- Header section start -->

		<section class="hero-section">

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5">
						<div class="site-logo">

						</div>
					</div>
					
				</div>
			</div>
			<div class="container-fluid text-center">
				<img src='<?php echo $p_loc ?>' alt="image" class="img-fluid rounded" width="350">
				<div class="hero-text">
					<h2><?php echo $name ?></h2>
					<p style="font-size: 20px"><?php echo $userdes?></p>
				</div>
				<div class="social-links">
					<a href=""><i class="fab fa-linkedin"></i></a>
					<a href=""><i class="fab fa-instagram"></i></a>
					<a href=""><i class="fab fa-facebook"></i></a>
					<a href=""><i class="fab fa-twitter"></i></a>
				</div>
			</div>
		</section>
		<!-- Hero section end -->

		<!-- Info section start -->
		<div class="info-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2 container-warp">
						<div class="row">
							<!-- <div class="col-md-6"> -->
								<div class="hero-info mb-4 mb-md-0">
									<ul>
										<li><span>Date of Birth</span><?php echo $dob?></li>
										<li><span>Address</span><?php echo $address?></li>
									</ul>
								</div>
							<!-- </div> -->
							<div class="col-md-6">
								<div class="hero-info">
									<ul>
										<li><span>E-mail</span><?php echo $email?></li>
										<li><span>Phone </span><?php echo $phoneno?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	<script src="civic/js/jquery-2.1.4.min.js"></script>
	<script src="civic/js/bootstrap.min.js"></script>
	<script src="civic/js/owl.carousel.min.js"></script>
	<script src="civic/js/magnific-popup.min.js"></script>
	<script src="civic/js/circle-progress.min.js"></script>
	<script src="civic/js/main.js"></script>

 <script src="../admin/src/dist/js/feather.min.js"></script>
        <script src="../admin/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../admin/src/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../admin/src/dist/js/custom.min.js"></script>


</body>

</html>




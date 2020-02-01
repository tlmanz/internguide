<?php

require_once (__DIR__.'../../admin/config/connect.php');
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'company'){
    header("location: company_login.php");
    exit;
    }

//$c_user = $_GET['username'];  //$_GET[]
$s_id = $_GET['sid'];
$sql = "SELECT * from customer_account WHERE cid = '$s_id'";
if ($result = mysqli_query($connection, $sql)) {
	$profileData = mysqli_fetch_assoc($result);
	$username = $profileData['username'];
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
	<link href="civic/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="civic/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="civic/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="civic/css/flaticon.css"/>
	<link rel="stylesheet" href="civic/css/owl.carousel.css"/>
	<link rel="stylesheet" href="civic/css/magnific-popup.css"/>
	<link rel="stylesheet" href="civic/css/style.css"/>

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="civic/images/icons/favicon.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="civic/css/util.css">
	<link rel="stylesheet" type="text/css" href="civic/css/main.css">
	<!--===============================================================================================-->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->

</head>
<body >
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			
		</div>

		<!-- Page Preloder -->
		<div id="preloder">
			<div class="loader"></div>
		</div>
		
		<!-- Header section start -->
		<header class="header-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="site-logo">
							<b class="logo-icon">
                                    <!-- Dark Logo icon -->
                                    <img src="../admin/src/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <!-- <img src="../admin/src/assets/images/logo-icon.png" alt="homepage" class="light-logo" /> -->
                                </b>
                                 <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="../admin/src/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo text -->
                                    <img src="../admin/src/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                                </span>
						</div>
					</div>
					<div class="col-md-8 text-md-right header-buttons">
						<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                                <?php
                                date_default_timezone_set('Asia/Colombo');
                                if(date("H") < 12){
                                    echo "Good Morning!";
                                }elseif(date("H") > 11 && date("H") < 18){
                                    echo "Good Afternoon!";
                                }elseif(date("H") > 17){
                                    echo "Good Evening!";
                                }
                                ?>
                            <!-- <?php echo $username ?>! --></h3>
						<a href="../company/company_new.php" class="site-btn">Back to Home page</a>
						<a href="<?php echo $cv_loc?>" class="site-btn">Download CV</a>
					</div>
				</div>
			</div>
		</header>
		<!-- Header section end -->

		<!-- Hero section start -->
		<section class="hero-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-10 offset-xl-1">
						<div class="row">
							<div class="col-lg-6">
								<div class="hero-text">
									<h2 style="position: relative;top: -40px"><?php echo $name ?></h2>
									<p style="font-size: 25px;color: #899494"><?php echo $userdes?></p>
								</div>
								<div class="hero-info">
									<h2>General Info</h2>
									<ul>
										<li><span>Date of Birth</span><?php echo $dob?></li>
										<li><span>Address</span><?php echo $address?></li>
										<li><span>E-mail</span><?php echo $email?></li>
										<li><span>Phone </span><?php echo $phoneno?></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-6">
								<figure class="hero-image">
									<img src="<?php echo $p_loc ?>" alt="image" class="img-fluid rounded" width="450" style="position: relative;left: 100px;top: -50px">
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Hero section end -->

		<!-- Social links section start -->
		<div class="social-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-10 offset-xl-1">
						<div class="social-link-warp">
							<div class="social-links">
								<a href=""><i class="fa fa-pinterest"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a>
								<a href=""><i class="fa fa-instagram"></i></a>
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- Social links section end -->

		<!-- Resume section start -->
		

		<!-- Footer section start -->
		<footer class="footer-section">
			<div class="container text-center">
				<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
	</body>
	</html>
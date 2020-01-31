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
	$username = $profileData['firstname']." ".$profileData['lastname'];
	$imageAdd = $profileData['cphoto'];
	$useraddress = $profileData['address'];
	$usermail = $profileData['email'];
    $phoneno = $profileData['telephone'];
    $userdes = $profileData['description1'];
    $cvpath = $profileData['cv'];

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
						<a href='../company/company.php' class="btn btn-outline-success">Back to profile</a>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
					</div>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
					<div class="text right header-buttons">
						<a href='<?php echo $cvpath?>' class="btn btn-outline-success">Download CV</a>
						
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
                            <?php
                                $get_user = "select * from customer_account where cid='$s_id'";
                                $run_edit_user = mysqli_query($connection , $get_user);
                                    $row_user = mysqli_fetch_array($run_edit_user);
                                    $name = $row_user['firstname']." ".$row_user['lastname'];
                                    $user_photo = $row_user['cphoto'];
                                    $loc = $user_photo; 
                                                             
                            ?>
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
				<img src='<?php echo $imageAdd ?>' alt="image" class="img-fluid rounded" width="350">
				<div class="hero-text">
					<h2><?php echo $username ?></h2>
					<p><?php echo $userdes?></p>
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
							<div class="col-md-6">
								<div class="hero-info mb-4 mb-md-0">
									<ul>
										<li><span>Date of Birth</span>Aug 25, 1988</li>
										<li><span>Address</span><?php echo $useraddress?></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="hero-info">
									<ul>
										<li><span>E-mail</span><?php echo $usermail?></li>
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
		<section class="resume-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 col-xl-6 offset-lg-1 offset-xl-3 container-warp text-center p-xl-0">
						<div class="section-title">
							<h2>Work Experience</h2>
						</div>
						<ul class="resume-list">
							<li>
								<h2>2016-Present</h2>
								<h3>Web Design Company</h3>
								<h4>Web Designer</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
							</li>
							<li>
								<h2>2014-2016</h2>
								<h3>Web Design Company</h3>
								<h4>Web Designer</h4>
								<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
							</li>
						</ul>
						<div class="spad">
							<div class="section-title">
								<h2>Education</h2>
							</div>
							<ul class="resume-list">
								<li>
									<h2>2008</h2>
									<h3>Ui/Ux Diploma</h3>
									<h4>Design College California</h4>
									<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
								</li>
								<li>
									<h2>2006</h2>
									<h3>Web design Diploma</h3>
									<h4>Design College California</h4>
									<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
								</li>
							</ul>
						</div>
						<div class="section-title">
							<h2>References</h2>
						</div>
						<!-- review slider -->
						<div class="review-slider owl-carousel">
							<div class="single-review">
								<div class="qut">“</div>
								<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
								<h3>Robert G. Smith</h3>
								<h4>Manager, Company</h4>
							</div>
							<div class="single-review">
								<div class="qut">“</div>
								<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
								<h3>Robert G. Smith</h3>
								<h4>Manager, Company</h4>
							</div>
							<div class="single-review">
								<div class="qut">“</div>
								<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
								<h3>Robert G. Smith</h3>
								<h4>Manager, Company</h4>
							</div>
						</div>
					</div>
					<div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 container-warp">
						<!-- skill section start -->
						<section class="skill-section spad">
							<div class="section-title text-center">
								<h2>Skills</h2>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-md-6">
											<div class="fact-box">
												<div class="fact-content">
													<img src="img/icon/1-w.png" alt="">
													<h2>14</h2>
													<p>Years of Experience</p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="fact-box">
												<div class="fact-content">
													<img src="img/icon/2-w.png" alt="">
													<h2>9</h2>
													<p>Awards Won</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="skills pt-5 pt-lg-0">
										<div class="single-progress-item">
											<div class="progress-bar-style" data-progress="99"></div>
											<p>Design</p>
										</div>
										<div class="single-progress-item">
											<div class="progress-bar-style" data-progress="75"></div>
											<p>Illsutrator</p>
										</div>
										<div class="single-progress-item">
											<div class="progress-bar-style" data-progress="87"></div>
											<p>Photoshop</p>
										</div>
										<div class="single-progress-item">
											<div class="progress-bar-style" data-progress="60"></div>
											<p>HTML</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="circle-progress">
												<div id="progress1" class="prog-circle"></div>
												<div class="progress-info">
													<h2>75%</h2>
												</div>
												<div class="prog-title">
													<h3>Inspiration</h3>
													<p>Etiam nec odio vestibulum est.</p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="circle-progress">
												<div id="progress2" class="prog-circle"></div>
												<div class="progress-info">
													<h2>83%</h2>
												</div>
												<div class="prog-title">
													<h3>Inspiration</h3>
													<p>Etiam nec odio vestibulum est.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- skill section end -->
						<div class="footer-top-section">
							<div class="row">
								<div class="col-xl-4">
									<div class="section-title">
										<h2>Languages</h2>
									</div>
									<ul class="language-progress">
										<li>English <div class="lan-prog" data-lanprogesss="5"></div>
										</li>
										<li>Spanish <div class="lan-prog" data-lanprogesss="4"></div>
										</li>
										<li>Chinesse <div class="lan-prog" data-lanprogesss="3"></div>
										</li>
									</ul>
								</div>
								<div class="col-xl-8 pt-5 pt-lg-0">
									<div class="section-title">
										<h2>Hobbies</h2>
									</div>
									<div class="icon-box-area">
										<div class="icon-box">
											<i class="flaticon-032-cooking"></i>
											<p>Cooking</p>
										</div>
										<div class="icon-box">
											<i class="flaticon-015-photo-camera"></i>
											<p>Photography</p>
										</div>
										<div class="icon-box">
											<i class="flaticon-013-chess-1"></i>
											<p>Playing Chess</p>
										</div>
										<div class="icon-box">
											<i class="flaticon-001-yoga"></i>
											<p>Yoga</p>
										</div>
										<div class="icon-box">
											<i class="flaticon-035-tent"></i>
											<p>Camping in nature</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
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

 <script src="../admin/src/dist/js/feather.min.js"></script>
        <script src="../admin/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../admin/src/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../admin/src/dist/js/custom.min.js"></script>


</body>

</html>




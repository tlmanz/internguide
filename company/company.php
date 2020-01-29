<?php
// Include config file
require_once "connect.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>
    <title>Intern Guide - One Place for All Intern Needs</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<div class="home-two-style">
		<?php
            $get_admin = "select * from employee where id = 1"; //.$_SESSION['id'];
            $run_edit_admin = mysqli_query($connection,$get_admin);
            $row = mysqli_fetch_array($run_edit_admin);
			$name = $row['ename'];
			$id = $row['id'];
			$email = $row['email'];
			$phone = $row['phone'];
			$discription = $row['discription'];
			$phone = $row['address'];
			$introduction = $row['introduction'];
			$vision = $row['vision'];
			$mission = $row['mission'];
			$photo1 = $row['image'];
			$loc1 = "../company/src/assets/".$photo1;
			$photo2 = $row['photo2'];
			$loc2 = "../company/src/assets/".$photo2;  
			$photo2 = $row['photo3'];
			$loc3 = "../company/src/assets/".$photo2; 
			$photo2 = $row['photo4'];
            $loc4 = "../company/src/assets/".$photo2;                                   
        ?>
		<!-- Hero section start -->
		<section class="hero-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-10 offset-xl-1">
						<div class="row">
							<div class="col-lg-6">
								<div class="hero-text">
									<h2><?php echo $row['ename'] ?></h2>
									<p><?php echo $row['discription'] ?></p>
								</div>
								<div class="hero-info">
									<h2>General Info</h2>
									<ul>
										<li><span>Address - </span> &nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $row['address'] ?></li>
										<li><span>E-mail - </span>&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $row['email'] ?></li>
										<li><span>Phone -  </span>&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $row['phone'] ?></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-6 text-md-center">
								<figure class="hero-image">
									<img src="<?php echo $loc1 ?>"  style="max-height:500px; max-width : 500px">
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Hero section end -->

		<!-- Social links section start -->
	
		<!-- Social links section end -->

		<!-- Resume section start -->
		<section class="resume-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-7 offset-xl-2">
						<ul class="resume-list">
							<li>
							    <h2>About</h2>
								<h1>Introduction</h1>
								<p><?php echo $row['introduction'] ?></p>
							</li>
							<li>
								<h1>Vision</h1>
								<h3><?php echo $row['vision'] ?></h3>
							</li>
							<li>
								<h1>Current Working Areas</h1>
								<h2><?php echo $row['area1'] ?></h2>
								<h2><?php echo $row['area2'] ?></h2>
								<h2><?php echo $row['area3'] ?></h2>
								<h2><?php echo $row['area4'] ?></h2>
								<h2><?php echo $row['area5'] ?></h2>
								<h2><?php echo $row['area6'] ?></h2>
								<h2><?php echo $row['area7'] ?></h2>
                                <h2><?php echo $row['area8'] ?></h2>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- Resume section end -->
		
		<!-- Review section start -->
		<section class="review-section spad pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-7 offset-xl-2">
						<div class="section-title">
							<h2>US</h2>
						</div>
						<div class="review-slider owl-carousel">
							<div class="single-review">
							<div margin =  "50" >
							     <img src="<?php echo $loc2 ?>" style="max-height:500px; max-width : 500px" >  	
							</div>
                            </div>
							<div class="single-review">
							     <img src="<?php echo $loc3 ?>"style="max-height:500px; max-width : 500px" >
							</div>
							<div class="single-review">
							     <img src="<?php echo $loc4 ?>" style="max-height:500px; max-width : 500px"  >
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Review section end -->

		<!-- Contact section start -->
		<section class="contact-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div class="section-title">
							<h1>Contact Us<h1>
						</div>
						<form class="contact-form">
							<div class="row">
								<div class="col-md-6">
									<input type="text" placeholder="Name">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="E-mail">
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="Subject">
									<textarea placeholder="Message"></textarea>
								</div>
							</div>
							<div class="text-md-right">
								<button class="site-btn"  type="submit" name = "btn-upload" >Edit</button>
								<?php
								if(isset($_POST["btn-upload"])){
								?>
									<a href="login.php"> 
								<?php	
								}
								?>
                            </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- Contact section end -->
	</div>
<footer class="footer-section">
	<div class="social-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-10 offset-xl-1">
						<div class="social-link-warp">
							<div class="social-links">
								<a href="<?php echo $row['printerest link'] ?>"><i class="fa fa-pinterest"></i></a>
								<a href="<?php echo $row['linkedin link'] ?>"><i class="fa fa-linkedin"></i></a>
								<a href="<?php echo $row['facebook link'] ?>"><i class="fa fa-facebook"></i></a>
								<a href="<?php echo $row['twitter link'] ?>"><i class="fa fa-twitter"></i></a>
							</div>
							<h2 class="hidden-md hidden-sm">Find Us</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
</footer>
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
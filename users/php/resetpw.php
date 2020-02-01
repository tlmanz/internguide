<?php
//Student Password Reset
require_once (__DIR__.'../../../admin/config/connect.php');

$username = $_GET['user'];


?>
<!-- <?php
include_once('php/login.php')

?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" sizes="16x16" href="../admin/src/assets/images/favicon.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../admin/src/assets/login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../admin/src/assets/login/images/img-01.png" alt="IMG">
				</div>

				<form action="updatePW.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Student Login
					</span>
					<label>New password</label>
					<div class="wrap-input100 validate-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<input class="input100" type="password" name="newpassword" placeholder="Enter new password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<label>Re-enter password</label>
					<div class="wrap-input100 validate-input <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<input class="input100" type="password" name="confirmpassword" placeholder="Re enter password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<input type="text" name="user" value='<?php echo $username?>'>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<!--===============================================================================================-->	
	<script src="../admin/src/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../admin/src/assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../admin/src/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../admin/src/assets/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../admin/src/assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="../admin/src/assets/login/js/main.js"></script>

</body>
</html>
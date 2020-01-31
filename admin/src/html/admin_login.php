<?php 
include(__DIR__.'/../dist/php/admin_log.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administrator Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../assets/login/images/img-01.png" alt="IMG">
				</div>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Administrator Login
					</span>
					<label>Username</label>
					<div class="wrap-input100 validate-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<label>Password</label>
					<div class="wrap-input100 validate-input <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class = "text-center p-t-12">
						<span class="help-block">
							<?php echo $username_err; ?>
						</span>
						<span class="help-block">
							<?php echo $password_err; ?>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-12">
						<a href="../../../index.php">
							<i class="fa fa-home fa-2x" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<!--===============================================================================================-->	
	<script src="../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="../assets/login/js/main.js"></script>

</body>
</html>
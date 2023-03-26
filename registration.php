
<!DOCTYPE html>
<html lang="en">

<head>
	<title>tryst_login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="insert_data.php" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img class="login-logo" src="images/logo2.png">
					</span>
					<div>
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="uname" id="uname" required>
							<span class="focus-input100" data-placeholder="Name"></span>
						</div>
					</div>

					<div>
						<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
							<input class="input100" type="text" name="email" id="email" required>
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>
					</div>
					<div>
						<div class="wrap-input100 validate-input">
							<input class="input100" type="tel" name="mobile" id="mobile" required>
							<span class="focus-input100" data-placeholder="Phone Number"></span>
						</div>
					</div>

					<div>
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" name="college" id="college" required>
							<span class="focus-input100" data-placeholder="College Name"></span>
						</div>
					</div>

					<div class="wrap-input100 validate-input hide" id="pass" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="submit-btn" name="submit">
								Sign Up
							</button>
						</div>
					</div>
					<?php
						session_start() ;
						if(isset($_SESSION['message'])) {
							echo "<div class='alert alert-danger text-center' role='alert'>
									{$_SESSION['message']}
								</div>" ;
							unset($_SESSION['message']) ;
						}
					?>
				</form>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
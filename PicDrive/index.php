<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/animate.css">
  <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
  <script src="js/ajax_random_password.js"></script>
  <script src="js/ajax_user_check.js"></script>
  <script src="js/ajax_sign_up.js"></script>
  <script src="js/ajax_activate.js"></script>
  <script src="js/ajax_login.js"></script>
  <script src="js/index.js"></script>

</head>
<body style="background:#FCD0CF" class="animated fadeIn slower">

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-4 p-0">
				<img src="images/main_pic.jpg" class="shadow-lg w-100">
			</div>
			<div class="col-md-4 px-5 py-4">
				<h3 class="ml-2 mb-3">SIGN UP</h3>
							<form autocomplete="off" id="signup-form">
							<input type="text" name="fullname" id="fullname" placeholder="ENTER YOUR NAME" required="required">

							<div class="email-box">
							<input type="email" name="email" id="email" placeholder="EMAIL" required="required">
							<i class="fa fa-circle-o-notch fa-spin d-none email-loader" style="font-size:18px"></i>
							</div>
							
							<div class="password-box">
							<input type="password" name="password" id="password" placeholder="PASSWORD" required="required">
							<i class="fa fa-eye show-icon" style="font-size:18px"></i>
							</div>
							

							
							<button class="btn float-left py-2">GENERATE TO IMPROVE SECURITY</button>
							<button class="btn float-right generate-btn">GENERATE </button>
							
							
							<button class="btn submit-btn m-3" type="submit" disabled="disabled">Register now</button>
							<br>

							<div class="signup-notice p-2">

							</div>
							
						</form>

						<div class="px-2 d-none activator">
						<span>Please check your email to get activation code</span>
						<input type="text" name="code" id="code" class="my-3" placeholder="Activaton code">
						<button class="btn btn-dark activate-btn">Activate now</button>
						
						</div>
			</div>
			
			<div class="col-md-4 px-5 py-4">
					<h3 class="ml-2 mb-3">LOGIN</h3>
							<form autocomplete="off" id="login-form">
							

							<div class="email-box">
							<input type="email" name="email" id="login-email" placeholder="USERNAME" required="required">
							</div>
							
							<div class="password-box">
							<input type="password" name="password" id="login-password" placeholder="PASSWORD" required="required">
							<i class="fa fa-eye login-show-icon" style="font-size:18px"></i>
							</div>
							
							<button class="btn login-submit-btn float-right" type="submit">Login now</button>
							<br>

							
							
						</form>

						<div class="login-notice p-2">

						</div>



						<div class="px-2   d-none login-activator">
						<span>Please check your email to get activation code</span>
						<input type="text" name="code" id="login-code" class="my-3" placeholder="Activaton code">
						<button class="btn btn-dark login-activate-btn">Activate now</button>
						
						</div>

						
						


				
			</div>
			
		</div>

	</div>

</body>
</html>
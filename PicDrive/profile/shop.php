<?php
require("../php/database.php");
session_start();
$username = $_SESSION['username'];
if(empty($username))
{
	header("Location:../index.php");
	exit;
}

$starter = '<ul class="list-group w-100">
						<li class="list-group-item bg-success">
							<h3 class="text-center text-white">STARTER PLAN</h3>
						</li>
						<li class="list-group-item">1GB STORAGE</li>
						<li class="list-group-item" style="color:#ddd">24*7 TECHNICAL SUPPORT</li>
						<li class="list-group-item" style="color:#ddd">INSTANT EMAIL SOLUTION</li>
						<li class="list-group-item" style="color:#ddd">DATA SECURITY</li>
						<li class="list-group-item" style="color:#ddd">SEO SERVICES</li>
						<li class="list-group-item bg-light text-center buy-btn" amount="99" plan="starter" storage="1024" style="cursor:pointer">
							<h4><i class="fa fa-inr"></i> 99.00/monthly</h4>
						</li>
					</ul>';

$exclusive = '<ul class="list-group w-100">
						<li class="list-group-item bg-warning">
							<h3 class="text-center text-white">EXCLUSIVE PLAN</h3>
						</li>
						<li class="list-group-item">UNLIMITED STORAGE</li>
						<li class="list-group-item">24*7 TECHNICAL SUPPORT</li>
						<li class="list-group-item">INSTANT EMAIL SOLUTION</li>
						<li class="list-group-item">DATA SECURITY</li>
						<li class="list-group-item">SEO SERVICES</li>
						<li class="list-group-item bg-light text-center buy-btn" amount="500" plan="exclusive" storage="unlimited" style="cursor:pointer">
							<h4><i class="fa fa-inr"></i> 500.00/monthly</h4>
						</li>
					</ul>';

$get_plans = "SELECT plans FROM users WHERE username='$username'";

$response = $db->query($get_plans);

$data = $response->fetch_assoc();

$plans = $data['plans'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User profile</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="js/profile.js"></script>
	</head>
	<body style="background:#FCD0CF">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<a class="navbar-brand" href="#">
				<?php
					require("../php/database.php");
					$email = $_SESSION['username'];
					$get_name = "SELECT full_name FROM users WHERE username = '$email' ";
					$response = $db->query($get_name);
					$name = $response->fetch_assoc();
					echo $name['full_name'];
					$_SESSION['buyer_name'] = $name['full_name'];



				?>
			</a>

			
				<ul class="navbar-nav ml-auto">
					<li class="nav-item" name="logout">
						<a class="nav-link" href="php/logout.php">
							<i class="fa fa-sign-out" style="font-size:18px"></i> Logout
						</a>
					</li>	
				</ul>
			
		</nav>

		<br>

		<div class="container-fluid">
			
			<div class="row">

				<div class="col-md-6 p-5 ">
					<?php
						if($plans == "free")
						{
							echo $starter;
						}

						else if($plans == "starter")
						{
							echo "<button class='btn btn-light shadow-lg p-5'><h1>You are currently using starter plan</h1></button>";
						}

					?>
				</div>
				<div class="col-md-6 p-5">
					<?php
						if($plans == "free" || $plans == "starter")
						{
							echo $exclusive;
						}

					?>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12 p-5 text-center">
					<?php

					if($plans == "exclusive")
					{

						echo "<button class='btn btn-light shadow-lg p-5'><h1>You are  using our most expensive  plan</h1></button>";
						
					}


					?>

				</div>

			</div>


		</div>

		</body>

		<script>

			$(document).ready(function(){
				$(".buy-btn").each(function(){
					$(this).click(function(){
						var amount = $(this).attr("amount");
						var plan = $(this).attr("plan");
						var storage = $(this).attr("storage");
						location.href = "php/payment.php?amount="+amount+"&plans="+plan+"&storage="+storage;
					});
				});
			});

		</script>
</html>


<?php
// database close
	$db->close();

?>
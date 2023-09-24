<?php
require_once('zvinodiwa/database.php');

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    
    $query = mysqli_query($db,"SELECT username,password,type,name,surname FROM users WHERE username = '$username'");
    $row = mysqli_fetch_assoc($query);
    
    if ($row && password_verify($password, $row["password"])) {
        session_start();
        $_SESSION["username"] = $row["username"];
        $_SESSION["type"] = $row["type"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["surname"] = $row["surname"];

        if ($_SESSION["type"] == 'user') {
            header("Location: sys/dashboard.php");
        } elseif ($_SESSION["type"] == 'farmer') {
            header("Location: sys/farmer_dashboard.php");
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Agriculture Support System Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/agric-background.jpg'); ">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
				<h1 style ="color:green;">Welcome to Climacast</h1>
					Admin Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="login.php">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>

						<br>
						<button class="login100-form-btn"  name="submit">
						<a href="farmers_list.php">I am a farmer</a>
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
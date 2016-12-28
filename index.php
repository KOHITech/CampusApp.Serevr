<?php 
	session_start();
	$connected = false;
	$method = "nothing";

	if(isset($_SESSION["email"])) {
		$email = $_SESSION['email'];
		$connected = true;
	} else {
		if(isset($_GET["method"])) {
			$method = $_GET["method"];
		}
		if($method == "login") {
			if(isset($_POST["email"]) && isset($_POST["password"])) {
				$email = $_POST["email"];
				$password = $_POST["password"];

				require "orm.php";
				$linker = new MySQLLinker("localhost", "kohi", "kohi", "kohi_db");
				$table = $linker->select("userr", "*", ["email", "passwordd"], ["'".$email."'", "'".$password."'"]);
				$rslt = $table->get_json();
				if($rslt != "") {
					$_SESSION["email"] = $email;
					header("Location: .");
				}
			}
		}
	} 




?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/x-icon" href="img/campusapp.ico">

		<title>ECC Dashboard</title>

		<!-- Bootstrap core CSS -->
		
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		
		<link href="css/style.css" rel="stylesheet">
		<link href="css/nav.css" rel="stylesheet">
		<?php 
			if ($method == 'login') {
		?>
			<link href="css/signin.css" rel="stylesheet">
		<?php
			}
		?>
		<script src="js/jquery-3.1.1.min.js"></script>
	    <script src="dist/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php 
			require('nav.php');
			if($connected) {
				require('dash.php');
			} elseif ($method == "login") {
				require('signIn.php');
			} else {
		?>
			Welcome
		<?php
			}
		?>


	</body>

</html>
<?php
session_start();
if (!isset($_SESSION['user']))
	{
		header("location: index.php");
	}
?>
<!DOCTYPE HTML>
<!--
	Linear by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>AutoHire</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="home.php">Home</a></li>
						<li><a href="car.php">Our Cars</a></li>
						<li><a href="rent.php">Rent Cars</a></li>
						<li><a href="taxi.php">Taxi Service</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href = "logout.php"><?php echo $_SESSION['user']. " : " ?>Logout</a></li>
					</ul>
				</nav>
			</div>
			<div class="container"> 
				
				<!-- Logo -->
				<div id="logo">
					<h1><a href="#">AutoHire</a></h1>
				</div>
			</div>
		</div>

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<header>
					<h2>Welcome to AutoHire</h2>
				</header>
				<center>
				<image src = "images\dash3.png" height = "400" width = "1000">
				<br><br>
				<strong>Welcome To the best rental car service, we here provide you the best cars to reach your destinations with comfort and elegancy.<br> We believe in making the best of your time by providing every service necessary.

				<br><br>
				You can choose any transportation that suits your needs and is viable to you with services that include picking up, dropping off, renting cars, taxi services etc with the best of costs in your reach. Follow us and ride your life with us.
				</strong>
				<br><br>
				<center>
				<hr />
				<font size = "8"> <center>  “ Let’s ride this city together ” </center> </font>
					
					</section>				
				</div>

				
			
			</div>
		</div>

	<!-- Tweet -->
		<div id="tweet">
			<div class="container">
				<section>
					<blockquote>&ldquo;You're better off driving our way."</blockquote>
				</section>
			</div>
		</div>

	<!-- Footer -->
		<div id="footer">
			<div class="container">
				<section>
					<header>
						<h2>Get in touch</h2>
						<span class="byline">Follow Us On Social Media</span>
					</header>
					<ul class="contact">
						<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
						<li class="active"><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
						<li><a href="#" class="fa fa-dribbble"><span>Pinterest</span></a></li>
						<li><a href="#" class="fa fa-tumblr"><span>Google+</span></a></li>
					</ul>
				</section>
			</div>
		</div>

	
	</body>
</html>
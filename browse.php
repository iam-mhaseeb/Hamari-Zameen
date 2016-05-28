<?php
session_start();
if (!isset($_SESSION['user']))
	{
		header("location: login.php");
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
	<style>
	.cartable {
		width:100%;
		height:100%;
		border:2px groove #C0C0C0;
		border-collapse:collapse;
		padding:5px;
	}
	.cartable th {
		border:2px groove #C0C0C0;
		padding:10px;
		background:#F4FDF8;
	}
	.cartable td {
		border:2px groove #C0C0C0;
		padding:15px;
		background:#F4FDF8;
		font-size:15px;
	}
	</style>
		<title>AutoHire</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel-noscript.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-desktop.css" />
	</head>
	<body>

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
	<!-- Header --> 

	<!-- Main -->	
	<table class="cartable">
	<caption>Our Cars</caption>
	<thead>
	<tr>
		
		<th><strong>Image</strong></th>
		<th><strong>Seating</strong></th>
		<th><strong>Egnine</strong></th>
		<th><strong>Name</strong></th>
		<th><strong>Category</strong></th>
		
	</tr>
	</thead>
	<tbody>
	<?php
$con = mysqli_connect('localhost','root','','db_project');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "db_project");
$sql="SELECT purpose, type, city, title, price, size, unit,img, property_status FROM property";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	?>
		<tr>
			<th>&nbsp;
			<?php
			echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['img'] ) . '" height="300" width="300" />';
			?>
			</th>
			
			<td><font size = "6" color = "black">&nbsp;
			<?php echo $row['purpose']; ?> Persons  </font>
			</td>
			<td><font size = "6" color = "black">&nbsp;
			<?php echo $row['type']; ?> </font>
			</td>
			<td><font size = "6" color = "black">&nbsp;
			<?php echo $row['city']; ?> </font>
			</td>
			<td><font size = "6" color = "black">&nbsp;
			<?php echo $row['title']; ?> </font>
			</td>
			
			
		</tr>
	<?php } ?>	
<?php	
mysqli_close($con);
?>
	</tbody>
</table>
</body>
</html>

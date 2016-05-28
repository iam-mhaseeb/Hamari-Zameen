<?php
session_start();
if (!isset($_SESSION['user']))
	{
		header("location: login.php");
	}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "select * from users GROUP BY user_id ASC;";
$result = mysqli_query($conn, $sql);


$sql2 = "select username from users;";
$result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE HTML>
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
		<link rel="stylesheet" href="css/skel-noscript.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-desktop.css" />
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="admin-home.php">Home</a></li>
						<li><a href="admin-taxi.php">Taxi Log</a></li>
						<li><a href="admin-rent.php">Rent Cars Log</a></li>
						<li><a href="admin-return.php">Return Rental Cars</a></li>
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
				<main>
      <table>
        <thead>
          <tr>
		 
            <th class="service"><span style='margin-left:50px'><strong>USER ID</strong></span></th>
            <th class="desc"><span style='margin-left:95px'><strong>USERNAME</strong></span></th>
            <th><span style='margin-left:150px'><strong>NAME</strong></span></th>
            <th><span style='margin-left:150px'><strong>EMAIL</strong></span></th>
            
		  </tr>
        </thead>
		<?php 
		while($row = mysqli_fetch_array($result))
		{?>
        <tbody>
          <tr>
            <td class="desc"><span style='margin-left:90px'><?php echo $row['user_id']; ?></span></td>
            <td class="desc"><span style='margin-left:110px'><?php echo $row['username']; ?></span></td>
            <td class="desc"><span style='margin-left:150px'><?php echo $row['name']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['email']; ?></span></td>
          </tr>
        </tbody>
		<?php
		}?>
		
      </table>
      <div id="notices">
        Delete user:<select>
		<?php 
		while($row1 = mysqli_fetch_array($result2)){
	?>
		<option> <?php echo $row1['username']; ?>  </option>
 <?php } ?>
</select>
      </div>
    </main>			
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
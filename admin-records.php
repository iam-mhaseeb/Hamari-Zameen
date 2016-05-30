<?php
session_start();
if ($_SESSION['user'] != 'admin'  && $_SESSION['pass'] != 'admin')
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
$sql = "SELECT user_id, PropertyNo, purpose, type, city, address, title, description, price, size, unit, property_status FROM property";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hamari Zameen | Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        <li><a href="index.php#services">Services</a></li>
                        <li><a href="index.php#team">Team</a></li>
                        <li><a href="browse.php">Browse</a></li>
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="index.php#contact">Contact</a></li>
                        <li><a href="index.php#settings"><?php echo $_SESSION['user']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->

    <section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Admin</h1>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Everything you need</h1>
                        <p class="lead">Buy and rent properties from here.</p>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
        <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
    </section><!--/#main-slider-->

    <section id="portfolio">
        <div class="container">
            <div class="box">
                <table>
        <thead>
          <tr>
		 
            <th class="service"><span style='margin-left:50px'><strong>USER ID</strong></span></th>
            <th class="desc"><span style='margin-left:95px'><strong>PROPERTY NUM</strong></span></th>
            <th><span style='margin-left:150px'><strong>PURPOSE</strong></span></th>
            <th><span style='margin-left:150px'><strong>TYPE</strong></span></th>
            <th><span style='margin-left:150px'><strong>CITY</strong></span></th>
            <th><span style='margin-left:150px'><strong>PRICE</strong></span></th>
            <th><span style='margin-left:150px'><strong>SIZE</strong></span></th>
            <th><span style='margin-left:150px'><strong>UNIT</strong></span></th>
            <th><span style='margin-left:150px'><strong>STATUS</strong></span></th>
            
		  </tr>
        </thead>
		<?php 
		while($row = mysqli_fetch_array($result))
		{?>
        <tbody>
          <tr>
            <td class="desc"><span style='margin-left:90px'><?php echo $row['user_id']; ?></span></td>
            <td class="desc"><span style='margin-left:110px'><?php echo $row['PropertyNo']; ?></span></td>
            <td class="desc"><span style='margin-left:150px'><?php echo $row['purpose']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['type']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['city']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['price']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['size']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['unit']; ?></span></td>
            <td class="desc"><span style='margin-left:190px'><?php echo $row['property_status']; ?></span></td>
          </tr>
        </tbody>
		<?php
		}?>
      </table> 
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#portfolio-->    
    
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://behance.net/hassanyf" title="">Hamari Zameen</a>. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user']))
	{
		header("location: login.php");
	}

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
                        <h1>Browse</h1>
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

    <?php
$con = mysqli_connect('localhost','root','','db_project');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "db_project");
$sql="SELECT purpose, type, city, title, price, size, unit,img, property_status FROM property";
$result = mysqli_query($con,$sql);

	?>

    <section id="portfolio">
        <div class="container">
            <div class="box">
                <ul class="portfolio-items col-4">
                	<?php while($row = mysqli_fetch_array($result)){ ?>
                    <li class="portfolio-item apps">
                        <div class="item-inner">
                            <div class="portfolio-image">
                                <?php	echo '<img class="float-left" width="370px" height="250px" src="data:image/jpeg;base64,' . base64_encode( $row['img'] ) . '" height="370" width="250px" />'; ?>
                                <div class="overlay">
                                    <a class="preview btn btn-danger" title="
                                        <h3 ><?php echo $title = $row['title']; ?> (<?php echo $row['property_status']; ?>)</h3>
                                        

                                        <br>
                                        <h4>Property Purpose: <?php echo $row['purpose']; ?> <br>
    									Property Type: <?php echo $row['type']; ?><br>
    									City: <?php echo $row['city']; ?><br>
    									Price: Rs. <?php echo $row['price']; ?> PKR<br>
    									Size: <?php echo $row['size']; ?> <?php echo $row['unit']; ?></h4> <br>
    									" href="images/portfolio/full/item1.jpg"><i class="icon-eye-open"></i></a>           
                                </div>
                            </div>
                            <h5><?php echo $row['title']; ?></h5>
                        </div>
                    </li><!--/.portfolio-item-->

<?php } ?>	
<?php	
mysqli_close($con);
?>
                </ul>   
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

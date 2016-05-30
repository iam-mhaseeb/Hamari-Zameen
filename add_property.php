<?php
session_start();
if (!isset($_SESSION['user'])) {
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
                        <h1>Add Property</h1>
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
                   <form action="upload_property.php" method ="post" enctype="multipart/form-data">
					  <div class="row">
					      <div class="col-sm-6">
					          <div class="form-group">
					              <select class="form-control" name="purpose">
													<option value="Sale">Sale</option>
													<option value="Rent">Rent</option>
												</select>
					          </div>
					      </div>
					      <div class="col-sm-6">
					          <select class="form-control" name="property_type">
											<option value="Home">Home</option>
											<option value="Flat">Flat</option>
											<option value="Plot">Plot</option>
										</select>
					      </div>
					  </div>
					  <div class="row">
					      <div class="col-sm-6">
					          <div class="form-group">
                                <select class="form-control" name="city">
                                    <option value="Lahore">Lahore</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Islamabad">Islamabad</option>
                                </select>
					          </div>
					      </div>
					      <div class="col-sm-6">
                            <input type="textarea" class="form-control" style="margin-bottom:15px;" placeholder="Complete Addres" name = "address" value = "">
					      </div>
					  </div>
				  <input type="text"  style="margin-bottom:15px;" class="form-control" placeholder="Property Title" name = "title" value = "">

				  <div class="row">
				      <div class="col-sm-12">
				          <div class="form-group">
				             <textarea name="desc" id="message" required="required" class="form-control" rows="8" placeholder="Write a description of your property, be brief."></textarea>
				          	<br>

                        	Property Price (PKR)
                        	<input type="number" class="form-control" style="margin-bottom:15px;" placeholder="" name = "price" value = "">

                        	<br>

                        	Size
                        	<input type="number" class="form-control" style="margin-bottom:15px;" placeholder="" name = "size" value = "">

                        	<br>

                        	Unit
                        	<select class="form-control" name="unit">
                        		<option value="sqfeet">Sq Feet</option>
                        		<option value="marla">Marla</option>
                        		<option value="kanal">Kanal</option>
                        	</select>

                        	<br>

                        	<input type="file" name="myimage" id="myimage" class = "myButton">

                        	<br>
				          </div>
				          <div class="form-group">
				              <input type="submit" class="btn btn-danger btn-lg">Add Property</button>
				          </div>
				      </div>
				  </div>
				</form>
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
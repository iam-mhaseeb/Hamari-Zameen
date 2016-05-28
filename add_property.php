<?php
session_start();
if (!isset($_SESSION['user']))
{
	header("location: login.php");
}
?>
<!DOCTYPE html>
<head>
	<title>Add Property</title>
	<link type="text/css" rel="stylesheet" href="http://cdn1.zameen.com/common3_26.css" />
	<link type="text/css" rel="stylesheet" href="http://cdn1.zameen.com/add_property_single1_4.css" />
	<script type="text/javascript" src="http://cdn2.zameen.com/common_lang_en1_12.js"></script>
	<script type="text/javascript" src="http://cdn2.zameen.com/jquery_min1_6.js"></script>
</head>
<body>
	<form action="upload_property.php" method ="post" enctype="multipart/form-data">
		Purpose
	<select name="purpose">
		<option value="Sale">Sale</option>
		<option value="Rent">Rent</option>
	</select>

	<br>

	Property Type
	<select name="property_type">
		<option value="Home">Home</option>
		<option value="Flat">Flat</option>
		<option value="Plot">Plot</option>
	</select>

	<br>

	City
	<select name="city">
		<option value="Lahore">Lahore</option>
		<option value="Karachi">Karachi</option>
		<option value="Islamabad">Islamabad</option>
	</select>

	<br>

	Complete Address
	<input type="textarea" class="" placeholder="" name = "address" value = "">
	
	<br>

	Property Title
	<input type="text" class="" placeholder="" name = "title" value = "">

	<br>

	Property Description
	<textarea rows="4" cols="50" name="desc">At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
	</textarea>

	<br>

	Property Price (PKR)
	<input type="number" class="" placeholder="" name = "price" value = "">

	<br>

	Size
	<input type="number" class="" placeholder="" name = "size" value = "">

	<br>

	Unit
	<select name="unit">
		<option value="sqfeet">Sq Feet</option>
		<option value="marla">Marla</option>
		<option value="kanal">Kanal</option>
	</select>

	<br>

	Image
	<input type="file" name="myimage" id="myimage" class = "myButton">

	<br>

	<input type="submit" class = "myButton">
	</form>
</body>
</html>
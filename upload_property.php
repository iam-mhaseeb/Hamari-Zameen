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
else
{ 
	$purpose = $_POST['purpose'];
	$type = $_POST['property_type'];
	$city = $_POST['city'];
	$address = $_POST['address'];	
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$size = $_POST['size'];
	$unit = $_POST['unit'];
	$image=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));


	$result = mysqli_query($conn, "select user_id from users where username ='".$_SESSION['user']."'");
	$row = mysqli_fetch_array($result);
	$id = $row['user_id']; 

	$sql = "INSERT INTO property(user_id, purpose, type, city, address, title, description, price, size, unit, img, property_status) VALUES ('$id', '$purpose', '$type', '$city', '$address', '$title', '$desc', '$price', '$size', '$unit', '$image', 'available')";

	mysqli_query($conn, $sql) or die(mysql_error());
	header("location: index.php");
	$conn->close();
	echo "success";
}
?>
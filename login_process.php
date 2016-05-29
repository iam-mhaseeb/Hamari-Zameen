<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['pass']))
	{
		header("location: index.php");
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
	$user_error = "Username";
	$pass_error = "Password";
	$incorrect = " ";

	if (isset($_POST['submit']))
	{
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	if ($user == null || $pass == null)
	{
		if ($user == null)
		{
			$user_error = " *Enter Username";
		}
		if ($pass == null)
		{
			$pass_error = " *Enter Password";
		}
	}
	else if ($user == 'root' && $pass == 'root')
	{
		$_SESSION['user'] = "root";
		header("location: saveimage.php");
	}
	else if ($user == 'manager' && $pass == 'manager')
	{
		$_SESSION['user'] = "manager";
		header("location: admin-home.php");
	}
	else
	{
		$query = "select password from users where username = '$user' AND password = '$pass'";
		$result = $conn->query($query);
		if ($result->num_rows == 1)
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			header("location: index.php");
		}
		else
		{
			$user_error = "*enter correct username";
			$pass_error = "*enter correct password";
		}
	}
	}
}
?>

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
	$user_error = "username";
	$pass_error = "password";
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

<!DOCTYPE html>
<html>
	<head>
	  <title>Login</title>
	</head>
<body>
  <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
  <h3>Login Form</h3>
  <form action="" method ="post">
		<label class="login">
		
				<input type="text" placeholder="<?php echo $user_error ?>" name="user"><br>
				<input type="password" placeholder="<?php echo $pass_error ?>" name="pass"><br>
				<input type="submit" class = "myButton" name = "submit">
				<a href = "register.php" class = "myButton">Register</a>
		
		</label>
		</form>
  

</body>
</html>
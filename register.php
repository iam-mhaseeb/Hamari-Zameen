<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$e1 = "username";
$e2 = "password";
$e3 = "name";
$e4 = "email";

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	if ($user == null || $pass == null || $name == null || $email == null)
	{
		if ($user == null)
		{
			$e1 = "*Enter Username";
		}
		if ($pass == null)
		{
			$e2 = "*Enter Password";
		}
		if ($name == null)
		{
			$e3 = "*Enter Name";
		}
		if ($email == null)
		{
			$e7 = "*Enter Email";
		}
	}
	else
	{
		$query = "select username from users where username = '$user'";
		$result = $conn->query($query);
		// printf("Select returned %d rows.\n", $result->num_rows);
		
		if ($result->num_rows == 1) 
		{
			$e1 = "Username Already Exists";
		 /* free result set */
		 $result->close();
		}
		else
		{
			$sql = "INSERT INTO users(username, password, name, email) VALUES ('$user', '$pass', '$name', '$email')";

			if ($conn->query($sql) == TRUE) 
			{
				echo "Signup successful";
				header("location: index.php");
			}
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

		$conn->close();
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
	</head>
<body>

	<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
	<h3>Registration Form</h3>
	
	<form action="" method ="post">
		<label class="login">
		
				<input type="text" placeholder="<?php echo $e1 ?>" name="user"><br>
				<input type="password" placeholder="<?php echo $e2 ?>" name="pass"><br>
				<input type="text" placeholder="<?php echo $e3 ?>" name="name"><br>
				<input type="email" placeholder="<?php echo $e4 ?>" name="email"><br>
				<input type="submit" class = "myButton" name = "submit">
				<a href = "index.php" class = "myButton">Login</a>
		
		</label>
		</form>
</body>
</html>
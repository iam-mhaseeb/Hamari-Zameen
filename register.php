<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$e1 = "Username";
$e2 = "Password";
$e3 = "Name";
$e4 = "Email";

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
			$e4 = "*Enter Email";
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
		<link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
	  <link rel="stylesheet" href="css/font-awesome.min.css">
	  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  <link rel="stylesheet" href="css/login-reg.css">
	</head>
<body>
<div class="wrapper">
  <input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox" hidden />
  <div class="form__container">
    <!-- Front side -->
    <div class="form__login">
      <h1 class="form__header">Register</h1>
      <form id="loginForm" action="" method="post" class="form">
      	<input type="text" class="form__element" placeholder="<?php echo $e1 ?>" name="user"><br>
				<input type="password" class="form__element" placeholder="<?php echo $e2 ?>" name="pass"><br>
				<input type="text" class="form__element" placeholder="<?php echo $e3 ?>" name="name"><br>
				<input type="email" class="form__element" placeholder="<?php echo $e4 ?>" name="email"><br>
				<input type="submit" class = "form__button" name = "submit">
				<small>Already a member? <label for="" class=""><a href="login.php">Login your account</a></label>.</small>
      </form>
    </div>
    <!-- Back side -->
    
  </div>
</div>
</body>
</html>
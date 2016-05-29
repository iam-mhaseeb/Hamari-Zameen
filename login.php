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
			$user_error = "Please enter valid username";
			$pass_error = "Please enter valid password";
		}
	}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
	  <title>Login</title>
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
    <div class="form__login">
      <h1 class="form__header">Login</h1>
      <form id="loginForm" action="" method="post" class="form">
      	<input type="text" class="form__element" placeholder="<?php echo $user_error ?>" name="user"><br>
				<input type="password" class="form__element" placeholder="<?php echo $pass_error ?>" name="pass"><br>
				<input type="submit" class="form__button" class = "myButton" name = "submit">
        <small>Not a member yet? <label for="" class=""><a href="register.php">Create your account</a></label>.</small>
      </form>
    </div>
  </div>
</div>
</body>
</html>
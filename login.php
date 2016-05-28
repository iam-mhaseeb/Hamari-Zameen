<!DOCTYPE html>
<html>
	<head>
	  <title>Login</title>
	</head>
<body>
  <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
  <h3>Login Form</h3>
  <form action="" method="POST">
	Username: <input type="text" name="user"><br /> 
	Password: <input type="password" name="pass"><br />
	<input type="submit" value="Login" name="submit" />
  </form>
  
<?php
	if(isset($_POST["submit"])){
		if(!empty($_POST['user']) && !empty($_POST['pass'])) {
			$user=$_POST['user'];
			$pass=$_POST['pass'];

			$con=mysql_connect('localhost','root','') or die(mysql_error());
			
			mysql_select_db('db_project') or die("cannot select DB");

			$query=mysql_query("SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");

			$numrows=mysql_num_rows($query);
			
			if($numrows!=0) {
				while($row=mysql_fetch_assoc($query)) {
					$dbusername=$row['username'];
					$dbpassword=$row['password'];
				}
				
				if($user == $dbusername && $pass == $dbpassword) {
					session_start();
					$_SESSION['sess_user']=$user;
					header("Location: index.php");
				}
			} else {
				echo "Invalid username or bad password!";
			}
		} else {
			echo "All fields are required!";
		}
	}
?>
</body>
</html>
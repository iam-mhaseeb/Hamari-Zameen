<?php 
	session_start();
	// if session is not started, then redirect to login.
	// check login.php for more info.
	
	// if user directly visits member.php it will redirect to login page because his/her session
	// has not been started
	if(!isset($_SESSION["sess_user"])){
		header("location:login.php");
	// else ending brackets ends at line 25
	} else {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
	</head>
<body>
	<h2>Welcome, <?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a></h2>
	<p>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
	</p>
</body>
</html>
<?php
}
?>



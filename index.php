<?php
	session_start();
		if(isset($_SESSION['type'])) {
			if($_SESSION['type'] ==2) {
				header('Location: http://localhost/oms/employee.php');
			}
			if($_SESSION['type'] ==1) {
				header('Location: http://localhost/oms/admin.php');
			}
			
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OMS</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="loginform">
		<h3>Login</h3>
		<small><?php if(isset($_SESSION['invaliduser'])) { echo $_SESSION['invaliduser'];  unset($_SESSION['invaliduser']);}?></small>
		<small><?php if(isset($_SESSION['invalid'])) { echo $_SESSION['invalid'];  unset($_SESSION['invalid']);}?></small>
		<form method="post" action="function/function.php">
			<!-- <label>User Email</label> -->
			<input name="email" type="email" placeholder="User Email"><br><br>
			<!-- <label>Password</label> -->
			<input name="password" type="password" placeholder="Password"><br><br>
			<button type="submit">Login</button>
		</form>
	</div>
	<div class="omstitle">
		<h2>Office Management System</h2>
		
	</div>
</body>
</html>
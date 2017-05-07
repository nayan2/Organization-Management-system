<?php
	session_start();
	if($_SESSION['type'] !=1 || !isset($_SESSION['type'])) {
		header('Location: http://localhost/oms/index.php');
	}
	include  'function/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Page</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="layout">
		<div class="title1">
			<h4>Welcome <?php if(isset($_SESSION['useremail'])) { echo $_SESSION['useremail']; } ?></h4>
		</div>
		<div class="title2">
			<a href="logout.php"><h4>Logout</h4></a>
		</div>
	<div class="list">
			<?php require_once('menu.php');?>
		</div>
		<div class="contain">
			<h3>Change Password</h3>
			<small><?php if(isset($_SESSION['invalidaddpass'])) { echo $_SESSION['invalidaddpass'];  unset($_SESSION['invalidaddpass']);}?></small>
			<small><?php if(isset($_SESSION['invalidaddpas'])) { echo $_SESSION['invalidaddpas'];  unset($_SESSION['invalidaddpas']);}?></small>
			<form method="post" action="function/function.php">
				<input name="empemail" value="<?php if(isset($_SESSION['useremail'])) { echo $_SESSION['useremail']; } ?>" class="hidden"><br>
				<input name="oldpass" type="password" placeholder="Old Password"><br><br>			
				<input name="newpass" type="password" placeholder="New Password"><br><br>
				<input name="newpass2" type="password" placeholder="Re-enter Password"><br><br>
				<button type="submit">Change</button>
			</form>
		</div>
	</div>
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
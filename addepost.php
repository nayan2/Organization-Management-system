<?php
	session_start();
	if($_SESSION['type'] !=1 || !isset($_SESSION['type'])) {
		header('Location: http://localhost/oms/index.php');

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
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
			<h3>Add Employee Post</h3>
			<small><?php if(isset($_SESSION['invalidaddsp'])) { echo $_SESSION['invalidaddsp'];  unset($_SESSION['invalidaddsp']);}?></small>
			<small><?php if(isset($_SESSION['invalidaddp'])) { echo $_SESSION['invalidaddp'];  unset($_SESSION['invalidaddp']);}?></small>
			<form method="post" action="function/function.php">				
				<input name="epost" type="text" placeholder="Add Employee Post"><br><br>
				<button type="submit">Add</button>
			</form>
		</div>
	</div>	
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
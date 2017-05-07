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
			<h3>List Employee Post</h3>
			<ol>
			<?php 
			$s = "SELECT * FROM employeepost ORDER BY id DESC";
			$r = mysql_query($s);

				if(mysql_num_rows($r) > 0) {
					while($row = mysql_fetch_array($r)) {
						echo "<li>Post : ".$row['post']."</li>";
					}
				}
			 ?>
			 </ol>
		</div>
	</div>	
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
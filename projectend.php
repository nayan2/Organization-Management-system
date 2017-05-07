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
			<h3>Project End</h3>
			<small><?php if(isset($_SESSION['invaliddpe'])) { echo $_SESSION['invaliddpe'];  unset($_SESSION['invaliddpe']);}?></small>
			<form method="post" action="function/function.php">
			<select name="projectend" class="select">
			<?php 
			$s = "SELECT * FROM project ORDER BY id DESC";
			$r = mysql_query($s);

				if(mysql_num_rows($r) > 0) {
					while($row = mysql_fetch_array($r)) {
						$se = "SELECT * FROM employee WHERE id='".$row['pemployee']."'";
						$re = mysql_query($se);

							if(mysql_num_rows($re) > 0) {
							while($rowe = mysql_fetch_array($re)) {
								echo "<option value=".$row['id'].">Project Title : <strong>".$row['projecttitle']."</strong> <br>Project Deadline : <strong>".$row['deadline']."</strong><br> Project Employee e-mail : <strong>".$rowe['eemail']."</strong></option><br>";
							}
						}

					}
				}
			 ?>
			 </select><br><br>
			 <button type="submit">End</button>
			 </form>
		</div>
	</div>	
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
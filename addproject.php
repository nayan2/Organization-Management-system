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
			<h3>Add Project</h3>
			<small><?php if(isset($_SESSION['invalidaddsap'])) { echo $_SESSION['invalidaddsap'];  unset($_SESSION['invalidaddsap']);}?></small>
			<small><?php if(isset($_SESSION['invalidaddap'])) { echo $_SESSION['invalidaddap'];  unset($_SESSION['invalidaddap']);}?></small>
			<form method="post" action="function/function.php">	
				<label>Project Title</label>
				<input name="ptitle" type="text" placeholder="Project Title" required><br><br>
				<label>Project Details</label>			
				<textarea name="pdetails" rows="10" placeholder="Project Details" required></textarea><br><br>
				<label>Employee</label>
				<select name="pemployee" class="select" required>
					<?php 
					$s = "SELECT * FROM employee ORDER BY id DESC";
					$r = mysql_query($s);

						if(mysql_num_rows($r) > 0) {
							while($row = mysql_fetch_array($r)) {
								echo "<option value=".$row['id'].">Name : ".$row['efname']." ".$row['elname']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : ".$row['eemail']."</option>";
							}
						}
					 ?>
			 	</select><br><br>
			 	<label>Project Start</label>
			 	<select class="select">
			 		<option>Now</option>
			 	</select>
			 		<div class="day">
			 	<label>Project Dedline</label>
			 	<input name="pdeadlineday" type="number" placeholder="Day" required>&nbsp;&nbsp;Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 	<input name="pdeadlinehour" type="number" placeholder="Hour" required>&nbsp;&nbsp;Hour&nbsp;&nbsp;(Format : 0 Day 12 Hours / 3 Day 0 Hours)<br><br>
			 		</div>

				<button type="submit">Add</button>
			</form>
		</div>
	</div>	
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
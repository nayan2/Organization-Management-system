<?php
	session_start();
	if($_SESSION['type'] !=2 || !isset($_SESSION['type']) || $_SESSION['attendance'] !='A' || !isset($_SESSION['attendance'])) {
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
			<ul>
				<li><a href="employee.php">Home</a></li>
				<li><a href="changepass.php">Change Password</a></li>
				<?php 
					$se = "SELECT * FROM employee WHERE eemail='".$_SESSION['useremail']."'";
					$re = mysql_query($se);
						if(mysql_num_rows($re) > 0) { 
							while($row = mysql_fetch_array($re)) {
								$sep = "SELECT * FROM employeepost WHERE id='".$row['epost']."'";
								$rep = mysql_query($sep);
									if(mysql_num_rows($rep) > 0) { 
										while($rowp = mysql_fetch_array($rep)) {
											if($rowp['post'] == 'Receptionist') {
												echo '<li><a href="attendance.php">Attendance</a></li>';
												$_SESSION['attendance'] = 'A';
											}
										}
									}
							}
						}
			 	?>
			</ul>
		</div>
		<div class="contain">
			<h3>Present</h3>
			<small><?php if(isset($_SESSION['invaliddatt'])) { echo $_SESSION['invaliddatt'];  unset($_SESSION['invaliddatt']);}?></small>
			<form method="post" action="function/function.php">
			<select name="present" class="select">
			<?php 
			$s = "SELECT * FROM employee ORDER BY id DESC";
			$r = mysql_query($s);

				if(mysql_num_rows($r) > 0) {
					while($row = mysql_fetch_array($r)) {
						echo "<option value=".$row['id'].">Name : ".$row['efname']." ".$row['elname']." &nbsp;&nbsp; &nbsp;&nbsp;Email : ".$row['eemail']."</option>";
					}
				}
			 ?>
			 </select><br><br>
			 <button type="submit">Present</button>
			 </form>

			 <h3>Leave</h3>
			<small><?php if(isset($_SESSION['invaliddattl'])) { echo $_SESSION['invaliddattl'];  unset($_SESSION['invaliddattl']);}?></small>
			<form method="post" action="function/function.php">
			<select name="leave" class="select">
			<?php 
			$s = "SELECT * FROM employee ORDER BY id DESC";
			$r = mysql_query($s);

				if(mysql_num_rows($r) > 0) {
					while($row = mysql_fetch_array($r)) {
						echo "<option value=".$row['id'].">Name : ".$row['efname']." ".$row['elname']." &nbsp;&nbsp; &nbsp;&nbsp;Email : ".$row['eemail']."</option>";
					}
				}
			 ?>
			 </select><br><br>
			 <button type="submit">Leave</button>
			 </form>

			 <ul>
			 <?php 
				$s = "SELECT * FROM attendance WHERE end_time='0000-00-00 00:00:00' ORDER BY id DESC";
				$r = mysql_query($s);
					if(mysql_num_rows($r) > 0) {
						echo "<h3>Present Now</h3>";
						while($row = mysql_fetch_array($r)) {
							$sep = "SELECT * FROM employee WHERE id='".$row['employee_id']."'";
								$rep = mysql_query($sep);
									if(mysql_num_rows($rep) > 0) { 
										while($rowp = mysql_fetch_array($rep)) {
											echo "<li>Name : ".$rowp['efname']." ".$rowp['elname']." &nbsp;&nbsp; &nbsp;&nbsp;Email : ".$rowp['eemail']."</li>";
										}
									}
						}
					}
			 ?>
			</ul>
		</div>
	</div>	
</body>
</html>
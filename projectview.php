<?php
	session_start();
	if($_SESSION['type'] !=2 || !isset($_SESSION['type'])) {
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
				<li><a href="projectview.php">Project</a></li>
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
			<h3>Project</h3>
			<ol>
			<?php 
			$s = "SELECT * FROM project ORDER BY id DESC";
			$r = mysql_query($s);

				if(mysql_num_rows($r) > 0) {
					while($row = mysql_fetch_array($r)) {
						$se = "SELECT * FROM employee WHERE id='".$row['pemployee']."'";
						$re = mysql_query($se);

							if(mysql_num_rows($re) > 0) {
							while($rowe = mysql_fetch_array($re)) {
								if($rowe['eemail'] == $_SESSION['useremail']) {
									echo "<li>Project Title : <strong>".$row['projecttitle']."</strong> <br>Project Deadline : <strong>".$row['deadline']."</strong><br> Project Employee e-mail : <strong>".$rowe['eemail']."</strong></li><br>";
								}
							}
						}

					}
				}
			 ?>
			 </ol>
		</div>
	</div>	
</body>
</html>
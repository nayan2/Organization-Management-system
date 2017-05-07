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
			<ul>
				<li><a href="#"><span><h4>Menu</h4></span></a></li>
				<li><a href="admin.php">Home</a></li>
				<li id="employee"><a href="#">Employee</a></li>
					<ul class="v">
						<li><a href="addemployee.php">Add Employee</a></li>
						<li><a href="deleteemployee.php">Delete Employee</a></li>
						<li><a href="listemployee.php">List Employee</a></li>
					</ul>
				<li id="ep"><a href="#">Employee Post</a></li>
				<ul class="epv">
					<li><a href="addepost.php">Add Employee Post</a></li>
					<li><a href="deleteepost.php">Delete Employee Post</a></li>
					<li><a href="listepost.php">List Employee Post</a></li>
				</ul>
				<li id="pro"><a href="#">Project</a></li>
				<ul class="prov">
					<li><a href="addproject.php">Add Project</a></li>
					<li><a href="deleteproject.php">Delete Project</a></li>
					<li><a href="projectlist.php">Project List</a></li>
					<li><a href="projectend.php">Project End</a></li>
				</ul>
				<li id="per"><a href="#">Performance</a></li>
				<ul class="perv">
					<li><a href="performance.php">Attendance Performance</a></li>
					<li><a href="projectper.php">Project Performance</a></li>
				</ul>
				<li><a href="changepass2.php">Change Password</a></li>
				<li><a href="attendanceAD.php">Attendance</a></li>
			</ul>
		</div>
		<div class="contain">
			<h3>Attendance</h3>
			<ul>
			<?php 

				$endtime = '0000-00-00 00:00:00';

				$sa = "SELECT * FROM attendance ORDER BY id DESC";
				$r = mysql_query($sa);
					if(mysql_num_rows($r) > 0) {
						while($row = mysql_fetch_array($r)) {
							$se = "SELECT * FROM employee WHERE id='".$row['employee_id']."'";
							$re = mysql_query($se);

								if(mysql_num_rows($re) > 0) {
								while($rowe = mysql_fetch_array($re)) {

									$en = 	$row['end_time'];
									if($en != $endtime) {

										$st =  $row['start_time'];
										$en = 	$row['end_time'];
										$td = strtotime($en) - strtotime($st) ;
										$t = $td/(60*60);

										echo "<li>Employee Name : ".$rowe['efname']." ".$rowe['elname']."<br>Employee E-mail : ".$rowe['eemail']."<br>Attended Date & Time : ".$row['start_time']."<br>Leave Date & Time : ".$row['end_time']."<br>Duration : ".substr($t,0,4)." Hours</li><br>";
									}
								}
							}

						}
					}
			 ?>
			</ul>
		</div>
	</div>	
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
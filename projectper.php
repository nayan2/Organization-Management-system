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
			<h3>Project Performance</h3>
			<ul>
			<?php 

					$endtime = '0000-00-00 00:00:00';

					$se = "SELECT * FROM employee";
					$re = mysql_query($se);

						if(mysql_num_rows($re) > 0) {
							while($rowe = mysql_fetch_array($re)) {
								$id = $rowe['id'];	

								$s = "SELECT * FROM project WHERE pemployee='".$id."' AND epsd!='".$endtime."'";
								$r = mysql_query($s);
								$n = mysql_num_rows($r);

								if($n > 0) {
									$x= 0;
									$y=0;
									for ($i=0; $i < $n; $i++) { 
										while($row = mysql_fetch_array($r)) {

											// $cmf = date('Y-m-01');
											// $cml = date('Y-m-t');

											// $crdt = $row['start_at'];
											// $crt = strtotime($crdt);
											// $crd = date('Y-m-d',$crt);

											// if($cmf <= $crd && $crd <= $cml){

												$st_at = strtotime($row['start_at']);
												$st_ate = strtotime($row['deadline']);
												$ed_at = strtotime($row['epsd']);

												$v =  $st_ate -$st_at ;
												$deadlined = $v/(60*60);

												$x = $x + $deadlined;

												$t = $ed_at - $st_at ;
												$time = $t/(60*60);

												$y = $y + $time;

												if($y<=$x) {
													$p = 100;
												} else {
													$g = $y - $x;
													if($g <= 100) {
														$p = 100 - $g;
													} else {
														$p = 0;
													}
												}

											// }
										}
									}
									
									echo "<li>Employee Name : ".$rowe['efname']." ".$rowe['elname']."<br>Employee E-mail : ".$rowe['eemail']."<br>Project Performance : ".$p."%</li><br>";
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
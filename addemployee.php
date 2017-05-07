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
			<h3>Add Employee</h3>
			<small><?php if(isset($_SESSION['invalidadds'])) { echo $_SESSION['invalidadds'];  unset($_SESSION['invalidadds']);}?></small>
			<small><?php if(isset($_SESSION['invalidadd'])) { echo $_SESSION['invalidadd'];  unset($_SESSION['invalidadd']);}?></small>
			<form method="post" action="function/function.php">				
				<input name="efname" type="text" placeholder="First Name"><br><br>			
				<input name="elname" type="text" placeholder="Last Name"><br><br>
				<input name="eemail" id="eemail" type="email" placeholder="Email" onChange="emailCheck()" ><br>
				<span id="emailValidation" style="color:red;"></span>
				<br>
				<input name="epassword" type="password" placeholder="Password"><br><br>
				<select name="addemployeepost" class="select">
					<?php 
					$s = "SELECT * FROM employeepost ORDER BY id DESC";
					$r = mysql_query($s);

						if(mysql_num_rows($r) > 0) {
							while($row = mysql_fetch_array($r)) {
								echo "<option value=".$row['id'].">Post : ".$row['post']."</option>";
							}
						}
					 ?>
			 	</select><br><br>
				<button type="submit">Add</button>
			</form>
		</div>
		<!----- ajax for user's Email check ------->
		<script>
			function emailCheck(){
				var emailAddress=document.getElementById("eemail").value;
				  var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					 document.getElementById("emailValidation").innerHTML = this.responseText;
					}
				  };
				  
				 
				  xhttp.open("GET", "function/ajax.php?emailAddress="+emailAddress+"", true);
				  xhttp.send();
			}
		
		</script>
	</div>	
	<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
<?php
// Email Check AJAX
 include  'connection.php';
	
	if(!mysql_connect($host,$username,$password) || !mysql_select_db($db))
	{
		die("Connection error");
	}
	if(!empty($_GET['emailAddress'])) {
		if(isset($_GET['emailAddress'])) {
			$email= $_GET['emailAddress'];
			$sql="SELECT * FROM employee WHERE eemail='$email'";
			if($result=mysql_query($sql))
			{
				$validEmployee=mysql_num_rows($result);
				if($validEmployee===1){
					echo "Email already used";
				}
				else{
					echo "";
				}
			}
			
				
		}
		else {
			
			//echo "Not connected";
		}
	} 
	
	?>

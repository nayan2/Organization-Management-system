<?php
session_start();
include  'connection.php';
include  'mainfunction.php';

	// Insert employee
	
	if(!empty($_POST['eemail']) && !empty($_POST['epassword']) && !empty($_POST['efname']) && !empty($_POST['elname']) && !empty($_POST['addemployeepost'])) {
		if(isset($_POST['eemail']) && isset($_POST['epassword']) && isset($_POST['efname']) && isset($_POST['elname']) && isset($_POST['addemployeepost'])) {

			$passwordadmin = $_POST['epassword'];
			$emailadmin      = $_POST['eemail'];
			$hashpassword    =$_POST['epassword'];

			$esql = "INSERT INTO employee(efname, elname, eemail, epassword,epost) VALUES('".$_POST['efname']."','".$_POST['elname']."','".$_POST['eemail']."','".$hashpassword."','".$_POST['addemployeepost']."')";

			$insertemp = "INSERT INTO user (email, password, type) VALUES ('".$_POST['eemail']."','".$hashpassword."', 2)";

			$emp = new addemployee();
			$emp->esql($insertemp);
			$_SESSION['invalidadds'] = $emp->getsm();

	 		$eresult = new addemployee();
			$eresult->esql($esql);
			$_SESSION['invalidadds'] = $eresult->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invalidadd'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidadd'] = "Something Wrong.Try Again!";
	}


	// Delete employee
	if(!empty($_POST['deleteemployee'])) {
		if(isset($_POST['deleteemployee'])) {

			$esql = "DELETE FROM employee WHERE id='".$_POST['deleteemployee']."'";

	 		$eresult = new addemployee();
			$eresult->esql($esql);
			$_SESSION['invalidd'] = $eresult->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invalidd'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidd'] = "Something Wrong.Try Again!";
	}


	// Login
	if(!empty($_POST['email']) && !empty($_POST['password'])) {
		if(isset($_POST['email']) && isset($_POST['password'])) {

			$passwordc = $_POST['password'];
			$emailc    = $_POST['email'];
			//$hashc     = hash('sha256', $passwordc . $emailc);
			$hashc     =$_POST['password'];

			$sql = "SELECT * FROM user WHERE email='".$_POST['email']."' AND password='".$hashc."'";

	 		$result = new log();
			$result->sql($sql);

			if($result->numrow() > 0) {
				if($result->gettype() == 1) {

					$_SESSION['useremail'] = $result->getemail();
					$_SESSION['type'] = $result->gettype();

					header('Location: http://localhost/oms/admin.php');
				}
				if($result->gettype() == 2) {
					$_SESSION['useremail'] = $result->getemail();
					$_SESSION['type'] = $result->gettype();
					header('Location: http://localhost/oms/employee.php');
				}
			}	
			else {
				header('Location: ' . $_SERVER['HTTP_REFERER']);

				$_SESSION['invaliduser'] = "Invalid user email or password!";
			
			}
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invalid'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		$_SESSION['invalid'] = "Something Wrong.Try Again!";
	}



	// Add employee post
	if(!empty($_POST['epost'])) {
		if(isset($_POST['epost'])) {

			$esqlpost = "INSERT INTO employeepost(post) VALUES('".$_POST['epost']."')";

	 		$epost = new addemployee();
			$epost->esql($esqlpost);
			$_SESSION['invalidaddsp'] = $epost->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invalidaddp'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidadd'] = "Something Wrong.Try Again!";
	}
	
    
	// Delete employee Post
	if(!empty($_POST['deleteemployeepost'])) {
		if(isset($_POST['deleteemployeepost'])) {

			$esql = "DELETE FROM employeepost WHERE id='".$_POST['deleteemployeepost']."'";

	 		$eresult = new addemployee();
			$eresult->esql($esql);
			$_SESSION['invaliddp'] = $eresult->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invaliddp'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidd'] = "Something Wrong.Try Again!";
	}

	// Insert Project
	
	if(!empty($_POST['ptitle']) && !empty($_POST['pdetails']) && !empty($_POST['pemployee'])) {
		if(isset($_POST['ptitle']) && isset($_POST['pdetails']) && isset($_POST['pemployee']) && isset($_POST['pdeadlineday']) && isset($_POST['pdeadlinehour'])) {

			$pdeadlineday  = $_POST['pdeadlineday'];
			$pdeadlinehour = $_POST['pdeadlinehour'];

			$time = time() + ($pdeadlineday * 24 * 60 *60) + ($pdeadlinehour * 60 *60);
			$deadline = date('Y-m-d G:i:s',$time);

			$esql = "INSERT INTO project(projecttitle, pdetails, pemployee, deadline) VALUES('".$_POST['ptitle']."','".$_POST['pdetails']."','".$_POST['pemployee']."','".$deadline."')";

	 		$eresult = new addemployee();
			$eresult->esql($esql);
			$_SESSION['invalidaddsap'] = $eresult->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invalidaddap'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidadd'] = "Something Wrong.Try Again!";
	}


	// Delete Project
	if(!empty($_POST['deleteproject'])) {
		if(isset($_POST['deleteproject'])) {

			$esql = "DELETE FROM project WHERE id='".$_POST['deleteproject']."'";

	 		$eresult = new addemployee();
			$eresult->esql($esql);
			$_SESSION['invaliddpr'] = $eresult->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invaliddpr'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidd'] = "Something Wrong.Try Again!";
	}

	// Project End
	if(!empty($_POST['projectend'])) {
		if(isset($_POST['projectend'])) {

			$current = date('Y-m-d H:i:s');

			$esqlpost = "UPDATE project SET epsd='".$current."' WHERE id='".$_POST['projectend']."'";

	 		$epost = new addemployee();
			$epost->esql($esqlpost);
			$_SESSION['invaliddpe'] = $epost->getsm();
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invaliddpe'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidd'] = "Something Wrong.Try Again!";
	}



	// Password Change
	if(!empty($_POST['empemail']) && !empty($_POST['oldpass']) && !empty($_POST['newpass']) && !empty($_POST['newpass2'])) {
		if(isset($_POST['empemail']) && isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['newpass2'])) {

			$passwordc = $_POST['oldpass'];
			$emailc    = $_POST['empemail'];
			$hashc     = $_POST['oldpass'];

			$sql = "SELECT * FROM user WHERE email='".$_POST['empemail']."' AND password='".$hashc."'";

			$result = new log();
			$result->sql($sql);

			if($result->numrow() > 0) {
				if($_POST['newpass'] === $_POST['newpass2']) {
						$passwordc = $_POST['newpass2'];
						$emailc    = $_POST['empemail'];
						$hashc     = $_POST['newpass2'];

						$sqlup = "UPDATE user SET password='".$hashc."' WHERE email='".$emailc."'";

					if(mysql_query($sqlup)) {
						header('Location: ' . $_SERVER['HTTP_REFERER']);
						$_SESSION['invalidaddpas'] = "Password Saved";
					} 
					else {
						header('Location: ' . $_SERVER['HTTP_REFERER']);
						$_SESSION['invalidaddpas'] = "Password doesn&#39;t Saved";
					}
				} 
				else {
					header('Location: ' . $_SERVER['HTTP_REFERER']);

					$_SESSION['invalidaddpas'] = "New password doesn&#39;t match";
				}				
			} 
			else {
				header('Location: ' . $_SERVER['HTTP_REFERER']);

				$_SESSION['invalidaddpas'] = "Wrong old password";
			}			
				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invalidaddpas'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidd'] = "Something Wrong.Try Again!";
	}


	// Attendance Present
	if(!empty($_POST['present'])) {
		if(isset($_POST['present'])) {

				$y = date('Y');
				$m = date('m');
				$d = date('d');
			$start = mktime(8 , 59 , 59, $m, $d, $y);
			$leave = mktime(16 , 59 , 59, $m, $d, $y);

			$endtime = '0000-00-00 00:00:00';
			$current = date('Y-m-d H:i:s');
			$s = date("Y-m-d H:i:s", $start);
			$l = date("Y-m-d H:i:s", $leave);

			$sql = "SELECT * FROM attendance WHERE employee_id='".$_POST['present']."' AND end_time='".$endtime."'";

			$result = new log();
			$result->sql($sql);

			if($result->numrow() <= 0) {

				if($s < $current && $current < $l) {
					$start_at = $current;

					$esqlpost = "INSERT INTO attendance(employee_id,start_time) VALUES('".$_POST['present']."','".$start_at."')";

			 		$epost = new addemployee();
					$epost->esql($esqlpost);
					$_SESSION['invaliddatt'] = $epost->getsm();
				}
				if ($current < $s) {
					$start_at2 = $s;

					$esqlpost = "INSERT INTO attendance(employee_id,start_time) VALUES('".$_POST['present']."','".$start_at2."')";

			 		$epost = new addemployee();
					$epost->esql($esqlpost);
					$_SESSION['invaliddatt'] = $epost->getsm();
				}
			}				
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invaliddatt'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidadd'] = "Something Wrong.Try Again!";
	}


// Attendance Leave
	if(!empty($_POST['leave'])) {
		if(isset($_POST['leave'])) {

				$y = date('Y');
				$m = date('m');
				$d = date('d');
			$start = mktime(8 , 59 , 59, $m, $d, $y);
			$leave = mktime(16 , 59 , 59, $m, $d, $y);

			$endtime = '0000-00-00 00:00:00';
			$current = date('Y-m-d H:i:s');
			$s = date("Y-m-d H:i:s", $start);
			$l = date("Y-m-d H:i:s", $leave);

			$sql = "SELECT * FROM attendance WHERE employee_id='".$_POST['leave']."' AND end_time='".$endtime."'";

			$result = new log();
			$result->sql($sql);

			if($result->numrow() > 0) {
				if($s < $current && $current < $l) {
					$end_at = $current;

					$esqlpost = "UPDATE attendance SET end_time='".$end_at."' WHERE employee_id='".$_POST['leave']."' AND end_time='".$endtime."'";

			 		$epost = new addemployee();
					$epost->esql($esqlpost);
					$_SESSION['invaliddattl'] = $epost->getsm();
				}
				if ($current > $l) {
					$end_at = $l;

					$esqlpost = "UPDATE attendance SET end_time='".$end_at."' WHERE employee_id='".$_POST['leave']."' AND end_time='".$endtime."'";

			 		$epost = new addemployee();
					$epost->esql($esqlpost);
					$_SESSION['invaliddattl'] = $epost->getsm();
				}	
			}
			else {
				header('Location: ' . $_SERVER['HTTP_REFERER']);

				$_SESSION['invaliddattl'] = "Doesn&#39;t have any attendance.";
			}			
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);

			$_SESSION['invaliddattl'] = "Something Wrong.Try Again!";
		}
	} 
	else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// $_SESSION['invalidadd'] = "Something Wrong.Try Again!";
	}







?>
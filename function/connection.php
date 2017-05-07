<?php 


$host = "localhost";
$username = 'root';
$password = '';
$db = 'oms';


@$mysql_connect = mysql_connect($host,$username,$password) or die("Server Connection Error");

	$dbc = 'CREATE DATABASE oms';
	mysql_query($dbc,$mysql_connect);

@$mysql_db = mysql_select_db($db) or die("Database Connection Error");
	
	// Create user table
	$creattable1 = "CREATE TABLE IF NOT EXISTS user (".
		"id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,".
  		"email varchar(255) UNIQUE NOT NULL,".
  		"password varchar(255) NOT NULL,".
  		"type int(1) NOT NULL,".
  		"created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,".
  		"updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00');";

	mysql_query($creattable1, $mysql_connect);

	// Insert admin
	$passwordadmin = 'admin';
	$emailadmin      = 'admin@mail.com';
	$hashpassword    = hash('sha256', $passwordadmin . $emailadmin);

	$insertadmin = "INSERT INTO user (email, password, type) VALUES ('admin@mail.com','".$hashpassword."', 1)";

	mysql_query($insertadmin, $mysql_connect);

	// Create employee table
	$creattable2 = "CREATE TABLE IF NOT EXISTS employee (".
		"id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,".
		"efname varchar(255) NOT NULL,".
		"elname varchar(255) NOT NULL,".
		"eemail varchar(255) UNIQUE NOT NULL,".
		"epassword varchar(255) NOT NULL,".
		"epost int(4) NOT NULL,".
		"created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,".
  		"updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00');";

	mysql_query($creattable2, $mysql_connect);

	// Create employee post

	$creattable3 = "CREATE TABLE IF NOT EXISTS employeepost (".
		"id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,".
		"post varchar(255) UNIQUE NOT NULL,".
		"created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,".
  		"updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00');";

	mysql_query($creattable3, $mysql_connect);
	
	// Create project table 
	$creattable4 = "CREATE TABLE IF NOT EXISTS project (".
		"id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,".
		"projecttitle varchar(1000) NOT NULL,".
		"pdetails LONGTEXT NOT NULL,".
		"pemployee int(4) NOT NULL,".
		"start_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,".
		"deadline timestamp NOT NULL,".
		"epsd timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',".
  		"updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00');";

	mysql_query($creattable4, $mysql_connect);

	// Create Attendance table
	$creattable5 = "CREATE TABLE IF NOT EXISTS attendance (".
		"id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,".
		"employee_id int(4) NOT NULL,".
		"start_time timestamp NULL,".
		"end_time timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',".
		"created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,".
  		"updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00');";

	mysql_query($creattable5, $mysql_connect);

	// Create Performance table
	$creattable6 = "CREATE TABLE IF NOT EXISTS performance (".
		"id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,".
		"employee_id int(4) NOT NULL,".
		"att_per int(3) NOT NULL,".
		"pro_per int(3) NULL,".
		"created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,".
  		"updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00');";

	mysql_query($creattable6, $mysql_connect);


 ?>
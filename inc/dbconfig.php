<?php
	// $host = "localhost";
	// $user = "esanwinc_dsms_db";
	// $pass = "esanwinc_dsms_db";
	// $db = "esanwinc_dsms_db";
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "erp_db";

	$con = mysqli_connect($host, $user, $pass, $db);
	if (mysqli_connect_errno()) {
		// If there is an error with the connection, stop the script and display the error.
		exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}
?>
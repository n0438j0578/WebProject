<?php
	$host = "localhost";
	$user = "root";
	$pass = "P@ssword";
	$db = "N&N_Cafe";

	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		die('Connection Failed: ' . $conn->connect_error );
	}
?>

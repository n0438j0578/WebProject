<?php
	$host = "localhost";
	$user = "root";
	$pass = "qwer1234";
	$db = "N&N_Cafe";

	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		die('Connection Failed: ' . $conn->connect_error );
	}


	//	$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	//	echo "Connection Successfull";

	//	$database = $conn -> selectDatabase("WebProject");
	//	echo "Select Successfull";
?>

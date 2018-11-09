<?php
	// $host = "localhost";
	// $user = "root";
	// $pass = "P@ssword";
	// $db = "N&N_Cafe";

	// $conn = new mysqli($host, $user, $pass, $db);
	// if($conn->connect_error){
	// 	die('Connection Failed: ' . $conn->connect_error );
	// }

	$connect  = new MongoClient("mongodb://localhost:27017");
	$db = $connect->Reservation;
	$collection = $db->Users;

	$cursor = $collection->find();

	foreach($cursor as $result){
		print_r($result);
	}

	//	$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	//	echo "Connection Successfull";

	//	$database = $conn -> selectDatabase("WebProject");
	//	echo "Select Successfull";
?>

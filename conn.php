<?php
	 $host = "35.220.204.174:3306";
	 $user = "root";
	 //$pass = "qwer1234";
	 $pass = "P@ssword";
	 $db = "N&N_Cafe";

	 $conn = new mysqli($host, $user, $pass, $db);
	 if($conn->connect_error){
	 	die('Connection Failed: ' . $conn->connect_error );
	 } 
?>
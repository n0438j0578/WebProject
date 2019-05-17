<?php

	 $host = "35.220.204.174:3306";
	 //$host = "localhost";
	 $user = "root";
	 //$pass = "qwer1234";
	 //$pass = "P@ssword";

	 $pass = "n0438@j0578";
	 //$pass = "";
	 $db = "N&N_Cafe";

	 $conn = new mysqli($host, $user, $pass, $db);
	 if($conn->connect_error){
	 	die('Connection Failed: ' . $conn->connect_error );
	 }

	 mysqli_set_charset($conn,"utf8");

?>
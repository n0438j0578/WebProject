<?php

	include("conn.php");
	$id = $_REQUEST['id'];
	$img = $_REQUEST['image'];
	$sqldelete = 'DELETE FROM `product` WHERE ID = "'.$id.'";';
	
	if($query = mysqli_query($conn, $sqldelete)){
		header("Location: index.php");
		unlink($img);
		echo '<script> alert("Delete Item Success!); </script>';
	}else{
		echo '<script> alert("Delete Item Failed!); </script>';
	}

	$conn->close();

?>
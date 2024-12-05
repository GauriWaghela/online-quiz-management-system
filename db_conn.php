<?php

	$server ="localhost";
	$username ="root";
	$password ="";
	
	$db_name = "online quiz";
	
	$conn = mysqli_connect($server,$username,$password,$db_name);
	mysqli_connect_error();
	
	if(mysqli_connect_error()){
		die("Failed to connect with MYSQL:".mysqli_connect_error());
	}
	
	
?>	

	
	
	
	
	
	
	
	
	
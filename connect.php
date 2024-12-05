<?php



	$host ="localhost";
	$username ="root";
	$password ="";
	
	$db_name = "online quiz";
	
	$con = mysqli_connect($host,$username,$password,$db_name);
	if(mysqli_connect_error())
	{
		die("Failed to connect with MYSQL:".mysqli_connect_error());
	}
	
	
	
	
?>
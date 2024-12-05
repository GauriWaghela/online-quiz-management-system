<?php



$link = mysqli_connect("localhost","root","","online quiz");

//check connect
if($link === false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}

//Attempt insert query execution

$sql = "Insert into registration(first,last,username,password,email,contact)
values
		('riya','bose','riya','riyabose','riya@gmail.com','74589663210')";

if(mysqli_query($link,$sql)){
	echo "Record inserted successfully.";
}else{
	echo "ERROR:Could not able to execute $sql.".mysqli_error($link);
}
//Close connection
mysqli_close($link);

?>
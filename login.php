<?php
session_start();
include"db_conn.php";
 
 if (isset($_POST['username']) && isset($_POST['password'])) {
	 
	 function  validate($data) 
	 {
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	 }
 }
 
 $username = validate($_POST['username']);
 $password = validate($_POST['password']);
 
 if(empty($username)) {
	 header ("location:studentlogin.php?error=User Name is required");
	 exit();
 }
else if(empty($password)){
	header ("location:studentlogin.php?error=Password is required");
	exit();
}		 
	
$sql = "SELECT * FROM studentlogin WHERE username='$username' AND password='$password'";
 
 $result = mysqli_query($conn,$sql);
 
 if(mysqli_num_rows($result) === 1){
 $row = mysqli_fetch_assoc($result);
 if($row['username'] === $username && $row['password'] === $password){
	 echo "Logged In !";
	
	 $_SESSION['username'] = $row['username'];	
	 $_SESSION['password'] = $row['password'];	
	 $_SESSION['id'] = $row['id'];
	header("location:home.php");
	exit();	
	 }
	 else{
		 header("location:studentlogin.php?error=Incorrect username or password");
		 exit();
	}
 }
 else{
	 header("location:studentlogin.php");
 }
 
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
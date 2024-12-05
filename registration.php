<?php

$link = mysqli_connect("localhost","root","","online quiz");

//check connection
if($link === false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}

//Prepare insert statement
 
$sql = "Insert into registration(firstname,lastname,username,password,email,contact)
values (?,?,?,?,?,?)";
		
if($stmt = mysqli_prepare($link,$sql)){
	
	mysqli_stmt_bind_param($stmt,"ssssss",$firstname,$lastname,
	$username,$password,$email,$contact);
	
		//set parameters
	$firstname = $_REQUEST['firstname']??"";
	$lastname = $_REQUEST['lastname']??"";
	$username = $_REQUEST['username']??"";
	$password = $_REQUEST['password']??"";
	$email = $_REQUEST['email']??"";
	$contact = $_REQUEST['contact']??"";
	
// Attempt to execute prepared statement
if(mysqli_stmt_execute($stmt)){
	echo '<script type="text/javascript">';
	echo 'alert("Record inserted successfully.")';
	echo '</script>';
}else{
	echo '<script type="text/javascript">';
	echo 'alert "ERROR:Could not able to execute query:$sql.".mysqli_error($link)';
	echo '</script>';
}
}
else{
	echo '<script type="text/javascript">';
	echo 'alert "ERROR:Could not prepare query:$sql.".mysqli_error($link)';
	echo '</script>';
}	
//close statement
mysqli_stmt_close($stmt);

//close connection
mysqli_close($link);
?>

<html>
<head>
	<title>
	ONLINE QUIZ
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	
	
<style type="text/css">
section
{
margin-top:-20px;
}
</style>

</head>
<body>

<nav>
	<div class="logo">ONLINE QUIZ</div>
	<input type="checkbox" id="click">
	<label for="click" class="menu-btn">
		<i class="fas fa-bars"></i>
	</label>
		<ul>
			<li><a class="active" href="index.php">HOME</a></li>
			<li><a class="active" href="studentlogin.php">LOGIN</a></li>
			
		</ul>
</nav>


<div class="reg_img">
	<div class="box2">
		<h1 style="color:white;text-align:center; font-size:35px; font-family:Lucida Console;">ONLINE QUIZ</h1><br>
		<h1 style="color:white;text-align:center;font-size:20px;">USER REGISTRATION FORM</h1><br>
		<form name="Registration" action="registration.php" method="post">
			<div class="login">
			
				<h3 style="text-align:center;"><input class="login-input" type="text" name="firstname" placeholder="firstname" required=""/>
				<br><br>
				<h3 style="text-align:center;"><input class="login-input" type="text" name="lastname" placeholder="lastname" required=""/>
				<br><br>
				<h3 style="text-align:center;"><input class="login-input" type="text" name="username" placeholder="username" required=""/>
				<br><br>
				<h3 style="text-align:center;"><input class="current-password" type="password" name="password" placeholder="password" required=""/>
				<br><br>
				<h3 style="text-align:center;"><input class="login-input" type="text" name="email" placeholder="email" required=""/>
				<br><br>
				<h3 style="text-align:center;"><input class="login-input" type="text" name="contact" placeholder="contact" required=""/>
				<br><br>
				<h3 style="text-align:center;"><input class="login-button" type="submit" name="SUBMIT" value="SIGNUP" style="color:black; 
				width:100px; height:30px;"/>
			</div>
		</form>
			
	</div>	
</div>

</body>
</html>



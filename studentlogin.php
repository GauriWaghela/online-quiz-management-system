<?php
	session_start();
	include('db_conn.php');
	
	if (isset($_POST['username']) && isset($_POST['password']))
	{
	$username =$_POST['username'];
	$password = $_POST['password'];
	}
//to prevent from mysqli injection

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);

$sql = "select * from studentlogin where username='$username' and password='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

/*echo '<script type="text/javascript">';
echo 'alert("login Successful")';
echo '</script>';*/

if($count==1){
	echo '<script type="text/javascript">';
	echo 'alert("login Successful")';
	echo '</script>';
}
else{
	echo '<script type="text/javascript">';
	echo 'alert("login failed! Invalid username or password")';
	echo '</script>';
}

?>


<html>
<head>
	<title>
	ONLINE QUIZ
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	

<style type="text/css">
section
{
margin-top:-20px;
}
</style>

</head>
<body>

<nav>
	<div class="logo"> ONLINE QUIZ</div>
	<input type="checkbox" id="click">
	<label for="click" class="menu-btn">
		<i class="fas fa-bars"></i>
	</label>
		<ul>
			<li><a class="active" href="index.php">HOME</a></li>
			<li><a class="active" href="studentlogin.php">LOGIN</a></li>
			<li><a class="active" href="registration.php">REGISTRATION</a></li>
			<li><a class="active" href="result.php">RESULT</a></li>
			<li><a class="active" href="feedback.php">FEEDBACK</a></li>
		</ul>
</nav>

<div class="log_img">
	<div class="box1">
		<h1 style="color:white;text-align:center; font-size:35px; font-family:Lucida Console;"><b>LOGIN</b></h1>
		<br>
		<h1 style="color:white;text-align:center;font-size:20px;">USER LOGIN FORM</h1>
		<br>
		<form name="login" action="studentlogin.php" method="post">
			<div class="login">
				<h1 style="text-align:center;"><input class="form-control" type="text" name="username" placeholder="Username" required="">
				</h1><br>
				<h1 style="text-align:center;"><input class="form-control" type="password" name="password" placeholder="Password" required="">
				</h1><br>
				<h3 style="text-align:center;"><input class="btn btn-default" type="submit" name="login" href="start.html" value="LOGIN" style="color:black; 
				width:100px; height:30px;">
			</div>
			<p style="color:white; padding-left:10px; text-align:center;"><br>			
				<a style="color:yellow; text-decoration:none;" href="updatepassword.php">Forgot Password?</a>&nbsp &nbsp   
				New to the website?<a style="color:yellow; text-decoration:none;" href="registration.php">SignUp</a>
			</p>
		</form>
	</div>	
</div>					


</body>
</html>


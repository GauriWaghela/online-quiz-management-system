<?php
session_start();
include('db_conn.php');
if(isset($_REQUEST['comment'])){
	
	$comment = $_REQUEST['comment'];

	$conn = mysqli_connect("localhost","root","","online quiz");

	$query = "insert into feedback(comment)values('$comment')";

	$result = mysqli_query($conn,$query);
	if($result){
		echo '<script type="text/javascript">';
		echo'alert("Thank u for ur feedback")';
		echo '</script>';
	}
	else{
		echo '<script type="text/javascript">';
		echo 'alert("Something went wrong!.Please try again.!")';
		echo '</script>';
	}
	
}
?>

<html>
<head>
<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<style type="text/css">
	body
	{
		background-color: #007bff;
	}
	.wrapper
	{
		padding:10px;
		margin:-20px auto;
		width:600px;
		height:400px;
		background-color:black;
		opacity:.8;
		color:white;
	}
	.form-control
	{
		height:70px;
		width:60%;
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
			<li><a class="active" href="registration.php">REGISTRATION</a></li>
			<li><a class="active" href="result.php">RESULT</a></li>
			<li><a class="active" href="feedback.php">FEEDBACK</a></li>
		</ul>
</nav>
	
	<br><br><br><br><br><br><br>
	<div class="wrapper" style="center">
		<h3>If u have any suggestions or questions please comment below.</h3>
		<br>
		<form style="" action="feedback.php" method="post">
			<input class="text-input" type="text" name="comment" placeholder="write something..." style="width:500px; height:40px;"><br><br>
			<input class="btn btn-default" type="submit" name="submit" value="Comment" 
			style="width:100px; height:35px;">
		</form>
	</div>	

</body>
</html>	
		
		
		
		
		
		
		
		
		
		
	
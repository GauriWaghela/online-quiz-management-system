<?php
session_start();

$_SESSION["userId"] = "1";

$conn = mysqli_connect("localhost","root","","online quiz") or
 die("Connection Error:".mysqli_error($conn));

if(count($_POST)>0){
	$result = mysqli_query($conn,"Select * from updatepassword Where userId  ='".$_SESSION["userId"]."'");
	$row =mysqli_fetch_assoc ($result);
	
	if($_POST["currentPassword"]== $row["password"]){
		mysqli_query($conn,"Update users set password='".$_POST["newPassword"]."'
		where userId ='".$_Session["userId"]."'");
		
		echo '<script type="text/javascript">';
		echo 'alert("Password Changed")';
		echo '<script type="text/javascript">';
	}
	else{
		
		echo '<script type="text/javascript">';
		echo 'alert("Current Password is not correct")';
		echo '<script type="text/javascript">';
	}
}
?>

<html>
<head>
<title>Change Password</title>
	<style type="text/css">
	   body
	   {
		   height:650px;
		   background-color:#007bff;
		   background-image: url('images/10.jpg');
		   background-repeat:no-repeat;
	   }
	   .wrapper
	   {
		   width:400px;
		   height:400px;
		   margin:100 auto;
		   background-color:black;
		   opacity:.8;
		   color:white;
		   padding:27px 15px;
	   }
	   .form-control
	   {
		   width:300px;
	   }
	</style>
	
<script>
function validatePassword(){
	var currentPassword,newPassword,confirmPassword,output = true;
	
	currentPassword = document.frmChange.currentPassword;
	newPassword = document.frmChange.newPassword;
	confirmPassword = document.frmChange.confirmPassword;
	
	if(!currentPassword.value){
		currentPassword.focus();
		
		document.getElementById(currentPassword).innerHTML = "required";
		output = false;
	}
	else if(!newPassword.value){
		newPassword.focus();
		
		document.getElementById(newPassword).innerHTML = "required";
		output = false;
		
	}
	else if(!confirmPassword.value){
		confirmPassword.focus();
		
		document.getElementById(confirmPassword).innerHTML = "required";
		output = false;
		
	}
	if(newPassword.value ! = confirmPassword.value){
		newPassword.value ="";
		confirmPassword.value ="";
		newPassword.focus();
		
		document.getElementById("confirmPassword").innerHTML = "not same";
		output = false;
	}
	return output;
}
</script>	

</head>
<body>
				
	<div class="wrapper">
		<div style="text-align:center;">
		
			<h1 style="color:white;text-align:center; font-size:35px; font-family:Lucida Console;">
			Change Your Password</h1>
		</div>
		
			<div style="padding-left:30px;">
				<form action="updatepassword.php" method="post" onSubmit="return validatePassword()">
					<input type="text" name="userId" class="form-control" placeholder="userId" required="">
					<br><br>
					<input type="text" name="currentPassword" class="form-control" placeholder="currentPassword" required="">
					<br><br>
					<input type="text" name="newPassword" class="form-control" placeholder="newPassword" required="">
					<br><br>
					<input type="text" name="confirmPassword" class="form-control" placeholder="confirmPassword" required="">
					<br><br>
					<button class="btn btn-default" type="submit" name="submit">Update</button>
				</form>
			</div>	
		
	</div>
	
</body>
</html>
	
	
<?php
include('db_conn.php');
?>

<html>
<head>
	<title>
	ONLINE QUIZ
	</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width,intial-scale=1">
	
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<style type="text/css">
		.srch
			{
			padding-left:1000px;	
			}
		body{
			background-color:#007bff;
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
		<ul style="float:right">
			<li><a class="active" href="index.php">HOME</a></li>
			<li><a class="active" href="studentlogin.php">LOGIN</a></li>
			<li><a class="active" href="registration.php">REGISTRATION</a></li>
			<li><a class="active" href="result.php">RESULT</a></li>
			<li><a class="active" href="feedback.php">FEEDBACK</a></li>
		</ul>
		<br>
</nav>

<!-----------------------------------------search bar--------------------------------------->
	<div class="srch">
		<form class="navbar-form" method="post">
			<br><br>
			<input class="form-control" type="text" name="search" placeholder="search result..." required="">
			<button style="background-color:#6ae2be" type="submit" name="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-search"></span>
			</button>
			
		</form>
	</div>
	<h2><b>STUDENT RESULT</b></h2>

<?php
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($conn,"select * from result where name like '%$_POST[search]%';");
			
			if(mysqli_num_rows($q)==0)
			{
				echo '<script type="text/javascript">';
				echo 'alert("Sorry! No result found.Try searching again.")';
				echo '</script>';
			}	
			else
			{
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color:#6ae2be;'>";
			
				//table header
				echo"<th>"; echo"Id";echo"</th>";
				echo"<th>"; echo"student name";echo"</th>";
				echo"<th>"; echo"mks";echo"</th>";
				echo"<th>"; echo"total";echo"</th>";
				
			
				echo"</tr>";
				
				while($row=mysqli_fetch_assoc($q))
				{
				echo"<tr>";
				
				echo"<td>"; echo $row['rid'];echo"</td>";
				echo"<td>"; echo $row['name'];echo"</td>";
				echo"<td>"; echo $row['mks'];echo"</td>";
				echo"<td>"; echo $row['total'];echo"</td>";
				
				}
				echo"</tr>";
			}
			echo"</table>";
		}		
		
		/*if button is not pressed.*/
		else
		{
			
		$res=mysqli_query($conn,"SELECT * FROM `result`;");
		
		echo"<table class='table table-bordered table-hover'>";
		echo"<tr style='background-color:#6ae2be;'>";
		
			//table header
			echo"<th>"; echo"Id";echo"</th>";
			echo"<th>"; echo"student name";echo"</th>";
			echo"<th>"; echo"mks";echo"</th>";
			echo"<th>"; echo"total";echo"</th>";
			
		
			echo"</tr>";
			while($row=mysqli_fetch_assoc($res))
			{
			echo"<tr>";
			
			echo"<td>"; echo $row['rid'];echo"</td>";
			echo"<td>"; echo $row['name'];echo"</td>";
			echo"<td>"; echo $row['mks'];echo"</td>";
			echo"<td>"; echo $row['total'];echo"</td>";
			
			}
			echo"</tr>";
			echo"</table>";	
		}	
		?>
		

</body>
</html>





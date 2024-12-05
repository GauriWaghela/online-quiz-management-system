<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoint" content="width-device-width,initial-scale=1.0">
	<title>ONLINE QUIZ</title>
	<link rel="stylesheet" href="style.css">
	<!--FontAwesome CON link for Icons-->
	<script src ="https://kit.fontawesome.com/a076d05399.js"></script>
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
			<li><a class="active" href="feedback.php">FEEDBACK</a></li>i>
		</ul>
</nav>

<!--Start Quiz Button-->
<div class="start_btn"><button>Start Quiz</button></div>

<!--Info box-->
<div class="info_box">
	<div class="info_title">
		<span> Some Rules Of This Quiz </span>
	</div>
	<div class="info_list">
		<div class="info">1. You will have only <span> 15 Seconds </span> per each question.</div>
		<div class="info">2. Once you select your answer,it can't be undone.</div>
		<div class="info">3. You can't select any option once time goes off.</div>
		<div class="info">4. You can't exit from the Quiz while you're reloading.</div>
		<div class="info">5. You"ll get points on the basis of your correct answers.</div>
	</div>
	<div class="buttons">
		<button class="quiz">Exit Quiz</button>
		<button class="restart">Continue</button>
	</div>
</div>

<!--Quiz Box-->
<div class="quiz_box">
<header>
	<div class="title">Awesome Quiz Application</div>
    <div class="timer">	
		<div class="time_text_txt">Time Left</div>
		<div class="timer_sec">15</div>
	</div>
	<div class="time_line"></div>
</header>
<section>
	<div class="que_text">
		<!--<span>What does html stand for?</span>-->
	</div>
	
	<div class="option_list">
		 <!--<div class="option">
		  <span>Hyper Text Preprocessor</span>
			<div class="icon cross"><i class="fas fa-times"></i></div>
		</div>
		<div class="option">
			<span>Hyper Text Markup Language</span>
			<div class="icon tick"><i class="fas fa-check"></i></div>
		</div>
		<div class="option">
			<span>Hyper Text Multiple Language</span>
			
		</div>
		<div class="option">
			<span>Hyper Tool Multi Language</span>
		</div>-->
	</div>
	
</section>

<!--Quiz Box footer-->
<footer>
	<div class="total_que">
	<!--<span> <p>2</p>Of<p>5</p>Questions</span>-->
	</div>
	 <button class="next_btn">Next Que</button>
</footer>
</div>

<!--Result Box-->
	<div class="result_box">
		<div class="icon">
		<i class="fas fa-crown"></i>
		</div>
		
		<div class="Complete_text"><h2>You've completed the Quiz!</div>
			<div class="score_text">
				<!--<span>and sorry,You got only <p>2</p>out of <p>5</p> </span>-->
		</div>
		
		<div class="buttons">
			<button class="restart">Replay Quiz</button>
			<button class="quit">Quit Quiz</button>
		</div>
	</div>
	
	<!-- Inside this javascript file I've inserted questions and options only--> 
	<script src="questions.js"></script>
	
	<!-- Inside this javascript file I've coded all Quiz codes --> 
	<script src="script.js"></script>
	
</body>
</html>		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
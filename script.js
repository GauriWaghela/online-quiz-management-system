
//getting all required elements

const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = document.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const result_box = document.querySelector(".result_box");
const quiz_box = document.querySelector(".quiz_box");
const timeCount = document.querySelector(".timer .timer_sec");
const timeLine = document.querySelector("header .time_line");
const timeText = document.querySelector("timer .time_left_txt");
const option_list = document.querySelector(".option_list");



//If Start Quiz Button Clicked
start_btn.onclick = () => {
	info_box.classList.add("activeInfo"); //show the info box
}

//If exitQuiz Button Clicked
exit_btn.onclick = () => {
	info_box.classList.remove("activeInfo"); //hide the info box
}

//If Continue Button Clicked
continue_btn.onclick = () => {
	info_box.classList.remove("activeInfo"); //hide the info box
	quiz_box.classList.add("activeQuiz"); //show the Quiz box
	showQuestions(0);
	queCounter(1);
	startTimer(15);
	startTimerLine(0);
}

let que_count= 0;
let que_numb=1;
let counter;
let counterLine;
let timeValue = 15;
let widthValue = 0;
let userScore = 0;


const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");
/*const quit_box = document.querySelector(".quit_box");*/
/*const timeText = document.querySelector(".time_left_txt");*/

//if restartQuiz button clicked
restart_quiz.onclick = ()=>{
	quiz_box.classList.add("activeQuiz");
	result_box.classList.remove("activeResult");
	 que_count= 0;
	 que_numb=1;
	 timeValue = 15;
	 widthValue = 0;
	 userScore = 0;
	showQuestions(que_count);
	queCounter(que_numb);
	clearInterval(counter);
	startTimer(timeValue);
	clearInterval(counterLine);
	startTimerLine(widthValue);
	
	next_btn.classList.remove("show");
}

//if quitQuiz button clicked
quit_quiz.onclick = ()=>{
	window.location.reload();
}

const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector(".total_que");
/*const time_Count = document.querySelector(".time")*/

//If Next Que Button Clicked
	next_btn.onclick = () =>{
	if(que_count < questions.length - 1){
	que_count++;
	que_numb++;
	showQuestions(que_count);
	queCounter(que_numb);
	clearInterval(counter);
	startTimer(timeValue);
	clearInterval(counterLine);
	startTimerLine(widthValue);
	
	next_btn.classList.remove("show");
	}
	else{
		clearInterval(counter);
		clearInterval(counterLine);
		
		showResult();
	}
}

//getting questions and options from array 
function showQuestions(index){
	const que_text = document.querySelector(".que_text");
	
	//creating a new span and div tag for question and option and passing the array index
	let que_tag = '<span>' + questions[index].numb + "." + questions[index].question +'<span>';
	let option_tag = '<div class="option"><span>'+ questions[index].options[0] +'</span></div>'
	                  +'<div class="option"><span>'+ questions[index].options[1] +'</span></div>'
					  +'<div class="option"><span>'+ questions[index].options[2] +'</span></div>'
					  +'<div class="option"><span>'+ questions[index].options[3] +'</span></div>';
	que_text.innerHTML = que_tag;				  
	option_list.innerHTML = option_tag;
	
	const option = option_list.querySelectorAll(".option");
	
	//set onclick attribute to all available options
	for(i = 0; i < option.length; i++){
		option[i].setAttribute("onclick","optionSelected(this)");
	
	}
}

//creating the new div tags for icons
let tickIcon = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIcon = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//if user clicked on option
function optionSelected(answer){
	clearInterval(counter);
	clearInterval(counterLine);
	let userAns = answer.textContent;
	let correctAns = questions[que_count].answer;
	const allOptions = option_list.children.length;
	
	if(userAns == correctAns){
		userScore += 1;
		answer.classList.add("correct");																					
		answer.insertAdjacentHTML("beforeend",tickIcon);																								
		console.log("Correct Answer");										
		console.log("Your correct answers = " + userScore);					
	}
	else
	{
	 answer.classList.add("incorrect");
	 answer.insertAdjacentHTML("beforeend",crossIcon);
	 console.log("Wrong Answer");
	
	 //if answer is incorrect then automatically selected the correct answer
	 for( i = 0; i < allOptions; i++){
		if(option_list.children[i].textContent == correctAns) {
			option_list.children[i].setAttribute("class","option correct");
			option_list.children[i].insertAdjacentHTML("beforeend",tickIcon);
			console.log("Auto selected correct answer.");
			}
	
		}
	}
	
	//once user selected disabled all optionSelected
	for( i = 0; i < allOptions; i++){
		option_list.children[i].classList.add("disabled");
	}
	next_btn.classList.add("show");
}

function showResult()
{
	info_box.classList.remove("activeInfo"); //hide the info box
	quiz_box.classList.remove("activeQuiz"); //hide the Quiz box
	result_box.classList.add("activeResult"); //show the Result box
	const scoreText = result_box.querySelector(".score_text");
	
	if(userScore > 3)
	{
		let scoreTag = '<span>and congrats!,You got <p>'+ userScore +'</p>out of <p>'+ questions.length+'</p> </span>';
		scoreText.innerHTML = scoreTag;
	}
	
	else if(userScore > 1)
	{
		let scoreTag = '<span>and nice,You got <p>'+ userScore +'</p>out of <p>'+ questions.length+'</p> </span>';
		scoreText.innerHTML = scoreTag;
	}
	
	else
	{
		let scoreTag = '<span>and sorry,You got <p>'+ userScore +'</p>out of <p>'+ questions.length +'</p> </span>';
		scoreText.innerHTML = scoreTag;
	}
} 


function startTimer(time){
	counter = setInterval(timer,1000);
	function timer(){
		timeCount.textContent = time;
		time--;
		if( time < 9){
			let addZero = timeCount.textContent;
			timeCount.textContent = "0" + addZero;
		}
		if(time < 0){
			clearInterval(counter);
		    let correctAns = questions[que_count].answer;
			const allOptions = option_list.children.length;
			 
			for(i = 0; i < allOptions; i++){
				if(option_list.children[i].textContent == correctAns ){
				option_list.children[i].setAttribute("class","option correct");
				option_list.children[i].insertAdjacentHTML("beforeend",tickIcon);
				console.log("Time Off:Auto selected correct answer.");
				}
	
			}
			for(i = 0; i < allOptions; i++){
				option_list.children[i].classList.add("disabled");
			}
			next_btn.classList.add("show");

		}
	}
}

function startTimerLine(time){
	counterLine = setInterval(timer,29);
	function timer(){
		time +=1;
		timeLine.style.width = time + "px";
		if(time > 549){
			clearInterval(counterLine);
		}
	}
}

function queCounter(index){
	
	/*const bottom_ques_counter = quiz_box.querySelector(".total_que");*/
	let totalQueCountTag = '<span> <p>'+ index +'</p> Of <p>'+ questions.length +'</p> Questions </span>';
	bottom_ques_counter.innerHTML = totalQueCountTag;
}











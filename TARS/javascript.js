function playAud(){
	var audioPlayer=document.getElementById("output");
	var button=document.getElementById("player");
	audioPlayer.play();
	button.innerHTML="Pause";
	button.setAttribute("onClick","pauseAud()");
	audioPlayer.onended=function(){
		button.innerHTML="Play Morse";
		button.setAttribute("onClick","playAud()");
		button.setAttribute("class","btn-warning btn-lg");
	}
	button.setAttribute("class","btn-primary btn-lg");
	
}
function pauseAud(){
	var audioPlayer=document.getElementById("output");
	var button=document.getElementById("player");
	audioPlayer.pause();
	button.innerHTML="Play Morse";
	button.setAttribute("onClick","playAud()");
	button.setAttribute("class","btn-warning btn-lg");
}
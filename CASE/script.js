var tree=['$','$','E','T','I','A','N','M','S','U','R','W','D','K','G','O','H','V','F','*','L','*','P','J','B','X','C','Y','Z','Q'];
function sleep(time){
	var request;
	var response;
	if(typeof ActiveXObject=="undefined"){
		request=new XMLHttpRequest();
	}
	else{
		request=new ActiveXObject("Microsoft.XMLHTTP");
	}
	try{
		request.open("GET","sleep.php?time="+time,false);
		request.send(null);
		response=request.responseText;
	}
	catch(e){
		console.error(e);
	}
}
function convert(){
	var morse=document.getElementById("myMorse").value;
	var eng="";
	var count=1;
	var check=new Date();
	for(var i=0;i<morse.length;i++){
		switch(morse.charAt(i)){
		case ".":
			count=count*2;
			sleep(200);
			document.getElementById("eng").innerHTML=eng+tree[count];
			break;
		case "_":
			count=count*2 + 1;
			sleep(200);
			document.getElementById("eng").innerHTML=eng+tree[count];
			
			break;
		case " ":
			eng+=tree[count];
			count=1;
			break;
		case "/":
			eng+=tree[count]+" ";
			count=1;
			break;
		}
		
	}

}
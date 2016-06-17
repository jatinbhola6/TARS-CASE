<?php
$arr=array('$','$','E','T','I','A','N','M','S','U','R','W','D','K','G','O','H','V','F','*','L','*','P','J','B','X','C','Y','Z','Q');
$out;
$output="";
$dit="file 'dit.mp4'\r\n";
$dah="file 'dah.mp4'\r\n";
$intra="file 'intra.mp4'\r\n";
$inter="file 'inter.mp4'\r\n";
$mid="file 'mid.mp4'\r\n";

if($_SERVER['REQUEST_METHOD']=="POST"){
	session_start();
	$str=$_POST["text"];
	$str=strtoupper($str);
	$str.=" ";
	$fileAddr="Audio_Files/file".session_id().".txt";
	$outAddr="Audio_Files/output".session_id().".mp4";
	$file=fopen($fileAddr,"w");
	$filedata="";
	$delimit=" ";
	for($i=0;$i<strlen($str);$i++){
		$c=substr($str,$i,1);
		if($c!=$delimit){
			$key=array_search($c,$arr,false);
			//echo $key;
			$letter="";
			do{
				if($key%2==0){
					$letter.=".";
					$key/=2;
				}
				else{
					$letter.="_";
					$key--;
					$key/=2;
				}
			}while($key>1);
			$letter=strrev($letter);
			$output.=($letter." ");
		}
		else{
			$output=rtrim($output," ");
			$output.="/";
		}
	}
	for($i=0;$i<strlen($output);$i++){
		$k=substr($output,$i,1);
		if($k=="." && (substr($output,$i+1,1) == "." || substr($output,$i+1,1) == "_")){
			$filedata.=$dit.$mid;
		}
		else if($k=="." && (substr($output,$i+1,1) == " " || substr($output,$i+1,1) == "/")){
			$filedata.=$dit;
		}
		
		if($k=="_" && (substr($output,$i+1,1) == "." || substr($output,$i+1,1) == "_")){
			$filedata.=$dah.$mid;
		}
		else if($k=="_" && (substr($output,$i+1,1) == " " || substr($output,$i+1,1) == "/")){
			$filedata.=$dah;
		}
		else if($k==" "){
			$filedata.=$intra;
		}
		else if($k=="/"){
			$filedata.=$inter;
		}
	}
	fwrite($file,$filedata);
	//unlink("Audio_Files/output.mp4");
	$out=shell_exec("ffmpeg -f concat -i ".$fileAddr." -c copy ".$outAddr." -y ");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="-1"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="javascript.js"></script> 
<title>TARS</title>
<link rel="stylesheet" type="text/css" href="style.css" >
</head>

<body >
<div id="heading">
<h1>TARS</h1>
<h3>English to Morse Converter</h3>
</div>
<div id="main">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
<label class="lab">English Text <br />
<textarea name="text" maxlength="50" rows="6" cols="50" id="test"></textarea>
</label><br />
<input type="submit" value="Translate" class="btn-success btn-lg">
</form><hr />
<a href="case" ><button class="btn-lg btn-default">Go to CASE</button></a><br />
<label class="lab">Morse <br />
<textarea name="morse" rows="6" cols="50"><?php echo $output ?></textarea><br />
</label>
<?php 
if($output){
?>
<br /><button id="player" class="btn-lg" onClick="playAud()">Play Morse</button>
<audio id="output">
<source src="<?php echo $outAddr; ?>" type="audio/mpeg">
Your browser doesnt support html5
</audio>
  <?php 
}
?>
</div>
<footer id="foot">
Designed and Developed by Jatin Bhola &copy;
</footer>
</body>
</html>
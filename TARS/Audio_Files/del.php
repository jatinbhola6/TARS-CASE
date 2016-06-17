<?php
//This php file should be scheduled on the server to be executed on regular intervals to prevent server from flooding from users' audio and text files.
foreach(glob("file*.txt") as $filename){
	unlink($filename);
}
foreach(glob("output*.mp4") as $audio){
	unlink($audio);
}
?>

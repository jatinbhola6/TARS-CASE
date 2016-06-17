# TARS-CASE
This project has 2 parts.
1.TARS. It converts and english sentence into morse code. Converted morse code is displayed 
in form of "."s, "_"s, "/"s and spaces. "." represent a dit, "_" represent a dash. Space 
is placed between morse codes of different alphabets of same word. "/" is placed betweeen
morse code of last alphabet and first alphabet of 2 adjacent words.
An audio file is also generated which can be played through a button. Dot sound has length of 0.3s.
Dash sound is 0.5 sec long. Inter word gap is also 0.5 sec long whereas Intraword gap is
0.3 sec long. Gap between sounds of 1 alphabet's morse code is 0.1 seconds.
2.CASE. This part converts string of ".", "_","/" and spaces into english sentence.
A common binary tree is used for these cinversions which was created by Samuel F.B. Morse.
TARS and CASE instruments PHP,Javascript and AJAX along with HTML and CSS for successful
working. MATLAB was used to create sounds of dot,dash and blanks. FFMPEG was used to concatenate
mp4 audio files to create desired output. 
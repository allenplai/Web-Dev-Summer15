<?php
	ob_start(); // creates output buffer 
	echo "We are done setting the cookie";
	setcookie("FavoriteGame", "Tetris");
	ob_end_flush();  // ends the buffer and sends the data
?>
<?php
	require_once("support.php");

	session_start();

	$body = "Session ID is: ".session_id()."<br />";
	$_SESSION["name"] = "John Smith";
	$_SESSION["¿id"] = 101;
	
	echo generatePage($body);
?>

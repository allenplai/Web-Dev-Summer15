<?php
	require_once("support.php");
	
	session_start();
	
	// notice the session_id() method
	$body = "Session ID is: ".session_id()."<br />";
	$body .= "Name: {$_SESSION['name']}<br />";
	$body .= "ID: {$_SESSION['id']}";
	
	echo generatePage($body);
?>
